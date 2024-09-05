<script setup>
import Nav from '@/Components/Nav.vue';
</script>
<template>
    <Nav />
    <slot name="hero_section"></slot>
    <slot></slot>
</template>