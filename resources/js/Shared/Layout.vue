<template>
    <section class="bg-gray-200 p-4">
        <header class="flex justify-around items-center">
            <div class="flex  items-center">
                <h1 class="font-bold text-xl">My app</h1>
                <p class="text-base ml-4 ">Hello {{$page.props.username}}!</p>
            </div>
            <Nav />
        </header>
    </section>
    <section>
        <div class="max-w-4xl mx-auto pt-12">
            <slot />
        </div>
    </section>
</template>

<script>
import Nav from "./Nav.vue";
export default {
    components: {
        Nav,
    },
};
</script>

<style></style>
