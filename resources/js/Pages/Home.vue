<script setup>
import Layout from '../Layouts/Layout.vue';

    defineProps({
        user: String
    })
</script>
<template>
    <h1>Home {{ $page.props.user }}</h1>
</template>