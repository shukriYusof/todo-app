<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { onMounted, reactive } from 'vue';
import { useRouter } from 'vue-router';


onMounted(() => {
    auth.logout()
})
const form = reactive({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    processing: false
})

const formErrors = ''
const router = useRouter()

const submit = () => {

    form.processing = true;

    let data = {
        name: form.name,
        email: form.email,
        password: form.password,
        password_confirmation: form.password_confirmation
    }

    axios.post('/register', data)
        .then(({data}) => {
            if (data.errors) {
                formErrors = data.errors
                return
            }

            router.push('/')
            auth.login(data.token, data.user)
        })
        .catch(({response}) => {
            form.processing = false
        })


    form.processing = false;
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />
        <h2 class="text-3xl">Create your account </h2>
        <p class="mt-3 mb-4 text-slate-500">Try TodoApp with our free trial.</p>
        <form @submit.prevent="submit">
            <div class="mb-6 block w-full">
                <InputLabel for="name" value="Name">Name</InputLabel>
                <TextInput id="name" name="name" placeholder="Name" type="text" v-model="form.name" autofocus autocomplete="off" required/>
                <!-- <InputError class="mt-2" :message="form.errors.email" /> -->
            </div>
            <div class="mb-6 block w-full">
                <InputLabel for="email" value="Email">Email</InputLabel>
                <TextInput id="email" name="email" placeholder="Email" type="email" v-model="form.email" autocomplete="off" required/>
                <!-- <InputError class="mt-2" :message="form.errors.email" /> -->
            </div>
            <div class="mb-6 block w-full">
                <InputLabel for="password" value="Password">Password</InputLabel>
                <TextInput id="password" name="password" placeholder="Password" type="password" v-model="form.password" autocomplete="off" required/>
                <!-- <InputError class="mt-2" :message="form.errors.password" /> -->
            </div>
            <div class="mb-6 block w-full">
                <InputLabel for="password" value="Verify Password">Verify Password</InputLabel>
                <TextInput id="password" name="password" placeholder="Verify Password" type="password" v-model="form.password_confirmation" autocomplete="off" required/>
                <!-- <InputError class="mt-2" :message="form.errors.password" /> -->
            </div>

            <!-- <div class="mb-6 block w-full">
                <Checkbox  id="remember" aria-describedby="remember" name="remember" v-model:checked="form.agreement" >
                I hereby agree to the Term of Service and Privacy Policy
                </Checkbox>
            </div> -->
            <!-- <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing"> -->
            <PrimaryButton>
                <span class="relative">
                    Sign in to Dashboard
                </span>
            </PrimaryButton>
        </form>
        <ul class="mt-7">
            <li class="py-1">Already a TodoApp user?
                <router-link to="/login" class="font-medium text-emerald-700">Login</router-link>
            </li>
        </ul>
        <div class="pt-7">
            <small class="recaptcha-policy text-misc-200 text-center">By signing up, you agree to our
                <a
                    href="#"
                    class="font-medium text-emerald-700"
                >Terms of Service</a> and
                <a
                    href="#"
                    class="font-medium text-emerald-700"
                >Privacy Policy</a>.
                You also agree to receive account-related emails from todoapp, including tips and product updates.
                This page is protected by reCAPTCHA and the Google
                <Link href="https://policies.google.com/privacy" rel="nofollow,noopener" class="font-medium text-emerald-700" target="_blank">Privacy Policy</Link> and
                <Link href="https://policies.google.com/terms" rel="nofollow,noopener" class="font-medium text-emerald-700" target="_blank">Terms of Service</Link> apply.
            </small>
        </div>
    </GuestLayout>
</template>
