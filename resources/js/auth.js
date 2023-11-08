import axios from 'axios';

class Auth {
    constructor() {
        this.token = window.localStorage.getItem('token');
        this.user = this.loadUserFromLocalStorage();
        if (this.token) {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.token;
            this.getUser();
        }
        this.userLoggedInListeners = [];
        this.priorities = this.loadPrioritiesFromLocalStorage();
    }

    check() {
        return !!this.token;
    }

    loadUserFromLocalStorage() {
        const userData = window.localStorage.getItem('user');
        if (userData != "undefined") {
            return JSON.parse(userData)
        }

        return null
    }

    loadPrioritiesFromLocalStorage() {
        const priorities = window.localStorage.getItem('priorities');

        if (priorities != null) {
            return JSON.parse(priorities)
        }
        return []
    }

    saveUserToLocalStorage(token, user) {
        window.localStorage.setItem('token', token);
        window.localStorage.setItem('user', JSON.stringify(user));
    }

    setAuthorizationHeader(token) {
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
    }

    getUser() {
        api.call('get', '/get-user')
        .then(({ data }) => {
            this.user = data;
        });
    }

    login(token, user) {
        this.saveUserToLocalStorage(token, user);
        this.loadUserFromLocalStorage()
        this.setAuthorizationHeader(token);
        this.fetchPriority()
        this.token = token;
        this.user = user;

    }

    logout() {
        this.setAuthorizationHeader(''); // Clear the Authorization header
        window.localStorage.removeItem('token');
        window.localStorage.removeItem('user');
        window.localStorage.removeItem('priorities');
    }

    // Define a method to add event listeners
    addUserLoggedInListener(callback) {
        this.userLoggedInListeners.push(callback);
    }

    // Define a method to trigger user login events
    triggerUserLoggedIn(user) {
        this.user = user;
        // Notify all registered listeners
        this.userLoggedInListeners.forEach(callback => {
            callback(user);
        });
    }

    // Fetch priority after login
    fetchPriority()
    {
        if(this.priorities.length < 1 || this.priorities == null) {

            api.call('get', '/priority')
            .then(({data}) => {
                data.response.forEach((priority) => {
                    this.priorities.push(priority)
                })
                window.localStorage.setItem('priorities', JSON.stringify(this.priorities))
            })
        }
        return
    }
}

export default Auth;
