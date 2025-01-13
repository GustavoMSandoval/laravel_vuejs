<script setup>

        const navLinks = [
            {
                link: 'home' ,
                name: 'Home',
            
            },
            {
                link : 'about',
                name : 'About',
            },
            {
                link: 'register',
                name: 'Register'
            }
        ]

</script>
<template>
    <Head :title="` | ${$page.component}`"/>
    <div>
        <header class="p-5 bg-blue-900">
            <nav class="flex">
                <div v-for="navLink in navLinks" :key="navLink.name">
                   <Link class="p-4 text-white"  :href="route(navLink.link)">{{ navLink.name }}</Link>
                   
                </div>
            </nav>
        </header>
        <main class="p-4">
            <slot></slot>
        </main>
    </div>
</template>