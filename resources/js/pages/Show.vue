<template>
    <div>
        <h2>{{ blog.title }}</h2>
        <p>{{ blog.description }}</p>
        <Link :href="route('blog.edit', blog.id)">Edit</Link>
        <form @submit.prevent="deleteBlog(blog.id)">
            <button type="submit">Delete</button>
        </form>
    </div>
</template>

<script setup>
import { Link, router } from "@inertiajs/vue3";

const props = defineProps({
    blog: Object,
});
const deleteBlog = (id) => {
    router.delete(route("blog.destroy", id));
};
</script>

<style lang="scss" scoped></style>
