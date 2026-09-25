<template>
    <div>
        <h1>Edit Blog</h1>
        <form @submit.prevent="updateBlog">
            <input type="text" placeholder="Title" v-model="form.title" />
            <div v-if="form.errors.title" class="error">
                {{ form.errors.title }}
            </div>
            <textarea
                placeholder="Description"
                v-model="form.description"
                rows="5"
                cols="50"
            ></textarea>
            <div v-if="form.errors.description" class="error">
                {{ form.errors.description }}
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    blog: Object,
});
const form = useForm({
    title: props.blog.title,
    description: props.blog.description,
});

const updateBlog = () => {
    form.put(route("blog.update", props.blog.id));
};
</script>

<style scoped>
.error {
    color: red;
}
</style>
