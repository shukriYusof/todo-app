<script setup>
import Auth from '@/auth.js';
import { ref, onMounted, onBeforeUnmount, reactive } from 'vue';
import moment from 'moment';
import AuthenticatedLayout from '../Layouts/AuthenticatedLayout.vue';
import Modal from '@/Components/Modal.vue';
import Datepicker from '@/Components/Datepicker.vue';

const auth = new Auth();
const isShowModal = ref(false)
const router = useRouter()

const closeModal = () => {
    isShowModal.value = false
}
const showModal = () => {
    isShowModal.value = true
}

const { authenticated, user, priorities } = useAuth(auth);
const processing = ref(false)

const form = reactive({
    title: '',
    description: '',
    priority: '',
    dueDate: moment().format('YYYY-MM-DD'),
    attachment: '',
})

const items = ref([]); // Store your data
const isLoading = ref(false);
const page = ref(1); // Track the current page
const divRef = ref(null); // Reference to the scrollable div
const scrollPosition = ref(0); // Store scroll position

// Method to handle scroll
const handleScroll = () => {
    const div = divRef.value;
    if (div) {
        const scrollHeight = div.scrollHeight;
        const scrollTop = div.scrollTop;
        const offsetHeight = div.offsetHeight;

        // Check if you've reached the end of the div
        if (scrollTop + offsetHeight >= scrollHeight && !isLoading.value) {
            isLoading.value = true;
            // Fetch more data here (e.g., an API request)
            fetchTask();
        }

        // Update the scroll position
        scrollPosition.value = scrollTop;
    }
};

const fetchTask = () => {
    axios.get('/task?page=${this.currentPage}&perPage=${this.itemsPerPage}')
        .then((data) => {
            // const newItems = data.response; // Replace with your data
            // items.value = [...items.value, ...newItems];
            // isLoading.value = false;
            // page.value++;
            console.log(data)
        }).catch((response) => {
            console.log(response)
        })
}

const submit = async () => {

    processing.value = true;

    let data = {
        title: form.title,
        description: form.description,
        priority: form.priority,
        dueDate: form.dueDate,
        attachment: form.attachment,
    }

    axios.post('/task`', data)
        .then(({data}) => {
            if (data.errors) {
                formErrors = data.errors
                processing.value = false
                return
            }
            fetchTask()
            closeModal()
        })
        .catch(({response}) => {
            processing.value = false
        })


    processing.value = false;
};

onMounted(() => {
    auth.addUserLoggedInListener((loggedInUser) => {
        authenticated.value = true;
        user.value = loggedInUser;
    });


    fetchTask()
});

onBeforeUnmount(() => {
    // Remove the scroll event listener when the component is unmounted
    divRef.value.removeEventListener('scroll', handleScroll);
});


const generateGreetings = (m) => {
    if (!m || !m.isValid()) {
        return;
    }

    const currentHour = parseFloat(m.format("HH"));
    if (currentHour >= 12 && currentHour <= 17) {
        return "afternoon";
    } else if (currentHour >= 17) {
        return "evening";
    } else {
        return "morning";
    }
};

</script>

<script>
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const useAuth = (auth) => {
    const authenticated = ref(auth.check());
    const user = ref(auth.user);
    const priorities = ref(auth.priorities.length < 1 ? ['Urgent', 'High', 'Normal', 'Low'] : auth.priorities);
    auth.addUserLoggedInListener((loggedInUser) => {
        authenticated.value = true;
        user.value = loggedInUser;
    });

    return { authenticated, user, priorities };
}
</script>

<template>

    <AuthenticatedLayout header="Dashboard">
        <div class="p-6 main-bg mb-20" >
                <!-- breadcrumb -->
                <nav class="text-sm font-semibold mb-6" aria-label="Breadcrumb">
                    <ol class="list-none p-0 inline-flex">
                        <li class="flex items-center text-blue-500">
                        <a href="#" class="text-gray-700">Home</a>
                        <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                        </li>
                        <li class="flex items-center">
                        <a href="#" class="text-gray-600">Dashboard</a>
                        </li>
                    </ol>
                </nav>
                <!-- breadcrumb end -->

                <div class="lg:flex justify-between items-center mb-6">
                    <p class="text-2xl font-semibold mb-2 lg:mb-0">Good {{ generateGreetings(moment()) }}, {{ user.name }}!</p>
                    <button class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white font-semibold shadow" @click="showModal">Add Task</button>
                </div>



                <div class="flex flex-wrap -mx-3">

                    <div class="w-full xl:w-1/3 px-3">
                        <div class="flex justify-start">
                            <p class="text-xl font-semibold mb-4">All Task</p>
                        </div>


                        <div class="w-full bg-white border rounded-lg p-4 mb-8 xl:mb-0"
                            @scroll="handleScroll"
                        >
                            <div v-for="item in items" :key="item.id">{{ item.name }}</div>

                        </div>
                    </div>

                    <div class="w-full xl:w-1/3 px-3">
                        <div class="flex justify-start">
                            <p class="text-xl font-semibold mb-4">Completed</p>
                        </div>
                    </div>

                    <div class="w-full xl:w-1/3 px-3">
                        <div class="flex justify-start">
                            <p class="text-xl font-semibold mb-4">Archived</p>
                        </div>
                    </div>
                </div>

            </div>
    </AuthenticatedLayout>
    <modal :show="isShowModal" @close="closeModal">
        <div>
            <form @submit.prevent="submit">
                <header class="p-6 bg-gray-50">
                    <h2 class="font-bold">Adding New Task</h2>
                    <span class="text-sm font-thin">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos dignissimos voluptatem ipsam debitis corrupti magni recusandae blanditiis veritatis ratione nihil! Aliquam eius nemo libero mollitia reiciendis aspernatur exercitationem, recusandae sit.</span>
                </header>
                <hr>
                <div class="p-6">
                    <div class="mb-6">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="title" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Lorem ipsum" v-model="form.title" required>
                    </div>
                    <div class="mb-6">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..." v-model="form.description" required></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 mb-6 gap-5">
                        <div>
                            <label for="priorities" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Priority</label>
                            <select id="priorities" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="form.priority">
                                <option v-for="(priority, index) in priorities" :key="index">{{  priority }}</option>
                            </select>
                        </div>
                        <div class="datepicker">
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Due Date</label>
                            <datepicker v-model="form.dueDate" date-format="YYYY-MM-DD"/>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file" @change="form.attachment">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile picture is useful to confirm your are logged into your account</div>
                    </div>
                </div>
                <hr>
                <div class="flex justify-end p-6">
                    <button class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white font-semibold shadow">Add Task</button>
                </div>
            </form>
        </div>
    </modal>
</template>
