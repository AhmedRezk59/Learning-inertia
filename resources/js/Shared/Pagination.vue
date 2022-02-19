<template>
    <div>
        <Component
            v-for="(link, index) in links"
            :is="link.url ? 'Link' : 'span'"
            :key="index"
            :href="link.url"
            v-html="link.label"
            class="mx-2 px-2 py-1 rounded-full hover:bg-blue-500 hover:text-white"
            :class="{
                'text-gray-500': !link.url,
                'font-bold bg-blue-500  text-white': link.active,
            }"
        />
    </div>
</template>
<script setup>
defineProps({ links: Array });
</script>
