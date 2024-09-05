<script setup>
import {ref, onBeforeMount} from 'vue'
import MainLayout from '@/Layouts/MainLayout.vue';
import HowTo from '@/Pages/Partials/HowTo.vue';

import Input from '@/Components/Form/Input.vue';
import SubmitButton from '@/Components/Form/SubmitButton.vue';

const submitForm = () => {
    alert("submitted")
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
                        </div>
                        <div class="lg:w-1/2">
                            <form @submit.prevent="submitForm" class="w-10/12 mx-auto block">
                                <Input
                                    type="text"
                                    label="Username"
                                    id="username"
                                />
                                <Input
                                    type="password"
                                    label="Password"
                                    id="password"
                                />
                                <div class="flex justify-center lg:justify-start mb-5">
                                    <SubmitButton
                                        label="Login"
                                    />
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

