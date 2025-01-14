<script setup></script>
<template>
    <div>
        <p class="text-center p-4 bg-green-200 ">{{ $page.props.flash.greet }}</p>
        <h1 class="title">Welcome back {{ $page.props.auth.user.name }}</h1>
    </div>
</template>