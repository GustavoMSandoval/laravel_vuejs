<script setup>


</script>
<template>
    <Head :title="` | ${$page.component}`"/>
    <div>
        <header class="bg-blue-1000 text-white">
            <nav class="flex">
                <div class="flex gap-2">
                    <Link :href="route('home')" class="nav-link" :class="{'bg-slate-700': $page.component === 'Home'}">Home</Link>
                    <Link :href="route('about')" class="nav-link" :class="{'bg-slate-700': $page.component === 'About'}">About</Link>
                </div>
                <div v-if="$page.props.auth.user" class="flex gap-2 items-center">
                    <img class="avatar"  :src="$page.props.auth.user.avatar ? ('storage/' + $page.props.auth.user.avatar): ('storage/avatars/default.png')" alt="">
                    <Link :href="route('dashboard')" class="nav-link" :class="{'bg-slate-700': $page.component === 'Dashboard'}">Dashboard</Link>
                    <Link :href="route('logout')" class="nav-link" method="post" as="button" type="button" >Logout</Link>
                </div>
                <div v-else class="flex gap-2">
                    <Link :href="route('login')" class="nav-link" :class="{'bg-slate-700': $page.component === 'Auth/Login'}">Login</Link>
                    <Link :href="route('register')" class="nav-link" :class="{'bg-slate-700': $page.component === 'Auth/Register'}">Register</Link>
                </div>
            </nav>
        </header>
        <main class="p-4">
            <slot></slot>
        </main>
    </div>
</template>