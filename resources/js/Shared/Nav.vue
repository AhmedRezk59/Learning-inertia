<template>
    <nav>
        <ul class="flex space-x-12">
            <li>
                <nav-link href="/" :active="$page.component === 'Home'"
                    >Home</nav-link
                >
            </li>
            <li>
                <nav-link href="/users" :active="$page.component === 'Users'"
                    >Users</nav-link
                >
            </li>
            <li>
                <nav-link
                    href="/settings"
                    :active="$page.component === 'Settings'"
                    >Settings</nav-link
                >
            </li>
            <li>
                <nav-link href="/logout" method="post">Log out</nav-link>
            </li>
        </ul>
    </nav>
</template>

<script>
import NavLink from "../Shared/NavLink.vue";
export default {
    components: { NavLink },
};
</script>

<style></style>
