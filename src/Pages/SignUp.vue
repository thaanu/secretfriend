<script setup>
import {ref, onBeforeMount} from 'vue'
import MainLayout from '@/Layouts/MainLayout.vue';
import HowTo from '@/Pages/Partials/HowTo.vue';

import {signUp} from '@/Models/Notion.js';

import Input from '@/Components/Form/Input.vue';
import SubmitButton from '@/Components/Form/SubmitButton.vue';

const dueDate = "2024-09-30";
const regOpen = ref(false);
const diff = ref(0);
let daysLeft = "";

const errors = ref([]);

const form = {
    full_name: null,
    email: null,
    password: null
}

const getTodayDate = () => {
    const today = new Date();
    // Extract year, month, and day
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0'); // Months are 0-based, so add 1 and pad with leading zero if needed
    const day = String(today.getDate()).padStart(2, '0'); // Pad day with leading zero if needed
    // Format date as yyyy-mm-dd
    return `${year}-${month}-${day}`;
}

const calculateDateDifference = (date1, date2) => {
    const d1 = new Date(date1);
    const d2 = new Date(date2);
    const timeDifference = d2.getTime() - d1.getTime();
    const dayDifference = Math.ceil(timeDifference / (1000 * 3600 * 24));
    return dayDifference;
}

onBeforeMount(() => {
    let today = getTodayDate();
    diff.value = calculateDateDifference(today,dueDate);
    regOpen.value = diff.value > 0;
    daysLeft = diff.value + (diff.value == 1 ? " day " : " days ") + " left"
});

const submitForm = async () => {
    if ( ! validate() ) { return false; }
    let response = await signUp(form.full_name, form.password, form.email);
    console.log(response);
}

const validate = () => {
    let good = true;
    errors.value = [];
    if ( form.full_name == null ) {
        errors.value['full_name'] = 'Name is required';
        good = false;
    }
    if ( form.password == null ) {
        errors.value['password'] = 'Password is required';
        good = false;
    }
    if ( form.email == null ) {
        errors.value['email'] = 'Email is required';
        good = false;
    }
    return good;
}

</script>

<template>
    <MainLayout>
        <template #hero_section>
            <div class="bg-teal-50 py-10 flex flex-col justify-center">
                <div class="transition-all w-11/12 md:w-9/12 mx-auto py-10">
                    <div class="flex flex-col lg:flex-row">
                        <div class="lg:w-1/2 mb-10">
                            <h1 class="mb-5 text-5xl font-bold uppercase text-teal-500">Let's Play</h1>
                            <p class="mb-5 text-xl text-gray-400">Welcome to the Secret Friend Game! In this fun and mysterious activity, you'll be secretly assigned a friend to surprise with small gifts. The goal is to spread joy and keep your identity a secret. At the end, we'll reveal who was behind each surprise and share some laughs. Let's get started and spread some cheer!</p>
                            <p v-if="!regOpen" class="uppercase font-bold text-gray-400">Registration is <span class="text-red-700">closed</span></p>
                        </div>
                        <div class="lg:w-1/2">
                            <form v-if="regOpen" @submit.prevent="submitForm" class="w-10/12 mx-auto block">
                                <Input
                                    type="text"
                                    label="Your Name"
                                    id="full_name"
                                    v-model="form.full_name"
                                    :error="errors.full_name"
                                />
                                <Input
                                    type="email"
                                    label="Your Email"
                                    id="email"
                                    v-model="form.email"
                                    :error="errors.email"
                                />
                                <Input
                                    type="password"
                                    label="Password"
                                    id="password"
                                    v-model="form.password"
                                    :error="errors.password"
                                />
                                <div class="flex justify-center lg:justify-start mb-5">
                                    <SubmitButton label="Sign Up" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <div class="transition-all w-11/12 md:w-9/12 mx-auto my-5 py-10">
            <HowTo />
        </div>
    </MainLayout>
</template>

