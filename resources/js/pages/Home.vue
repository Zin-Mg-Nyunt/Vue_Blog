<template>
    <div>
        <h1>Vue Blog</h1>
        <div v-for="blog in blogs" :key="blog.id">
            <Link :href="route('blog.show', blog.id)">{{ blog.title }}</Link>
            -
            <Link>{{ blog.user.name }}</Link>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    blogs: Array,
});
</script>

<style></style>
