<template>
    <GuestLayout>
        <h2 class="text-3xl">Good <span>{{ generateGreetings(moment()) }}</span>!</h2>
        <p class="mt-3 mb-4 text-slate-500">Welcome back. Sign in to TodoApp Dashboard.</p>
        <form @submit.prevent="submit">
            <div class="mb-6 block w-full">
            <InputLabel for="email" value="Email">Email</InputLabel>
            <TextInput id="email" name="email" placeholder="Email" type="email" autofocus v-model="form.email" autocomplete="off" required/>
            <InputError class="mt-2" :message="formErrors.email" />
            </div>
            <div class="mb-6 block w-full">
            <InputLabel for="password" value="password">Password</InputLabel>
            <TextInput id="password" name="password" placeholder="Password" type="password" v-model="form.password" autocomplete="off" required/>
            <InputError class="mt-2" :message="formErrors.password" />
            </div>
            <div class="mb-6 block w-full">
            <Checkbox  id="remember" aria-describedby="remember" name="remember" v-model:checked="form.remember" label="Remember my session"/>
            </div>
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                <span class="relative">
                    Sign in to Dashboard
                </span>
            </PrimaryButton>
        </form>
        <ul class="mt-7">
            <!-- <li class="py-1">
            <a
                href="/forgot-password"
                class="font-medium text-emerald-700"
            >
                Forgot password?
            </a>
            </li> -->
            <li class="py-1">Don't have an account?
            <a
                href="/register"
                class="font-medium text-emerald-700"
            >
                Register
            </a>
            </li>
        </ul>
        <div class="pt-7">
            <small class="recaptcha-policy text-misc-200 text-center">By signing up, you agree to our
            <a
                href="/forgot-password"
                class="font-medium text-emerald-700"
            >Terms of Service</a> and
            <a
                href="/forgot-password"
                class="font-medium text-emerald-700"
            >Privacy Policy</a>.
            You also agree to receive account-related emails from todoapp, including tips and product updates.
            This page is protected by reCAPTCHA and the Google
            <a href="https://policies.google.com/privacy" rel="nofollow,noopener" class="font-medium text-emerald-700" target="_blank">Privacy Policy</a> and
            <a href="https://policies.google.com/terms" rel="nofollow,noopener" class="font-medium text-emerald-700" target="_blank">Terms of Service</a> apply.
            </small>
        </div>
    </GuestLayout>
</template>

<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import moment from 'moment';
import { onMounted, reactive } from 'vue';
import { useRouter } from 'vue-router';
import Auth from '@/auth.js';

const auth = new Auth()

onMounted(() => {
    auth.logout()
});

const form = reactive({
    email: '',
    password: '',
    remember: false,
    processing: false
});

const formErrors = ''
const router = useRouter()

const submit = async () => {

    form.processing = true;

    let data = {
        email: form.email,
        password: form.password
    }

    axios.post('/login', data)
        .then(({data}) => {
            if (data.errors) {
                formErrors = data.errors
                return
            }

            auth.login(data.response.token, data.response.user)
            router.push('/')
        })
        .catch(({response}) => {
            form.processing = false
        })


    form.processing = false;
};

const generateGreetings = (m) => {
    let g = null;

    if (!m || !m.isValid()) {
        return;
    }

    const split_afternoon = 12;
    const split_evening = 17;
    const currentHour = parseFloat(m.format("HH"));

    if (currentHour >= split_afternoon && currentHour <= split_evening) {
        g = "afternoon";
    } else if (currentHour >= split_evening) {
        g = "evening";
    } else {
        g = "morning";
    }

    return g;
};
</script>
