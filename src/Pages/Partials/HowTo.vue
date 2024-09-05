<script setup>
const howToPlay = [
    "Register using your email address",
    "Fill in your wish list",
    "Take note of your secret number",
    "Pick a friend (from their secret number)",
    "Take note of their wish list"
]
</script>
<template>
<div class="flex flex-col lg:flex-row gap-6">
    <div class="lg:w-1/2 mb-5">
        <img src="@/assets/saeed-karimi-JrrWC7Qcmhs-unsplash.jpg" class="transition-all w-fit rounded-lg hover:drop-shadow-lg" />
    </div>
    <div class="lg:w-1/2">
        <h1 class="mb-5 text-5xl font-bold uppercase text-gray-300">How to play</h1>
        <p class="text-gray-500 mb-10">Let's make it really simple. Simple game, simple rules.</p>
        <ul>
            <li v-for="(rule,i) in howToPlay" class="flex items-center gap-6 text-gray-500 my-2">
                <div class="rounded-full h-[60px] w-[60px] border border-gray-400 flex items-center justify-center text-2xl ">
                    <span>{{ i + 1 }}</span>
                </div>
                <span>{{ rule }}</span>
            </li>
        </ul>
    </div>
</div>
</template>