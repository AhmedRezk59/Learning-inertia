<template>
    <Link class="text-blue-500" :class="{ 'font-bold underline': active }"
        ><slot
    /></Link>
</template>

<script>
export default {
    props: {
        active: Boolean,
    },
};
</script>

<style></style>
