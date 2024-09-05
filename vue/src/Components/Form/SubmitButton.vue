<script setup>
defineProps({
    label: String
});
</script>
<template>
    <button type="submit" class="bg-teal-600 p-3 my-3 text-xl uppercase text-white font-bold px-10 rounded-lg hover:bg-teal-700 active:bg-teal-950">{{ label }}</button>
</template>