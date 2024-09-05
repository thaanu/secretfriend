<script setup>
import {ref, onBeforeMount} from 'vue'
import MainLayout from '@/Layouts/MainLayout.vue';
import HowTo from '@/Pages/Partials/HowTo.vue';

const dueDate = "2024-09-30";
const regOpen = ref(false);
const diff = ref(0);
let daysLeft = "";

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

</script>

<template>
    <MainLayout>
        <template #hero_section>
            <div class="bg-teal-50 py-10 flex flex-col justify-center">
                <div class="transition-all w-11/12 md:w-9/12 mx-auto py-10">
                    <h1 class="mb-5 text-5xl font-bold uppercase text-teal-500">Let's Play</h1>
                    <p class="lg:w-1/2 mb-5 text-xl text-gray-400">Welcome to the Secret Friend Game! In this fun and mysterious activity, you'll be secretly assigned a friend to surprise with small gifts. The goal is to spread joy and keep your identity a secret. At the end, we'll reveal who was behind each surprise and share some laughs. Let's get started and spread some cheer!</p>

                    <template v-if="regOpen">
                        <div class="flex justify-center lg:justify-start mb-5">
                            <a href="/sign-up" class="bg-teal-600 p-6 my-3 text-xl uppercase text-white font-bold px-10 rounded-lg hover:bg-teal-700 active:bg-teal-950">Sign Up</a>
                        </div>
                        <p class="uppercase font-bold text-gray-400">Registration open until {{ dueDate }} ({{ daysLeft }})</p>
                    </template>
                    <p v-else class="uppercase font-bold text-gray-400">Registration is <span class="text-red-700">closed</span></p>
                </div>
            </div>
        </template>
        <div class="transition-all w-11/12 md:w-9/12 mx-auto my-5 py-10">
            <HowTo />
        </div>
    </MainLayout>
</template>

