<script setup>
const model = defineModel();
defineProps({
    type: String,
    error: String,
    id: String,
    label: String
});
</script>
<template>
    <div class="mb-3">
        <input 
            :type="type" 
            :placeholder="label" 
            autocomplete="off" 
            class="border border-gray-200 w-full p-4 rounded-lg text-gray-400" 
            v-model="model"
        />
        <div class="text-red-400 text-sm mt-1">{{ error }}</div>
    </div>
</template>