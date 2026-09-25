<template>
    <div>
        <h1>{{ user.name }}</h1>
        <div v-for="blog in user.blogs" :key="blog.id">
            <Link :href="route('blog.show', blog.id)">{{ blog.title }}</Link>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    user: Object,
});
</script>

<style lang="scss" scoped></style>
