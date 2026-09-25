<template>
    <div>
        <h1>Create Blog</h1>
        <form @submit.prevent="createBlog">
            <input type="text" v-model="form.title" placeholder="Title" />
            <div v-if="form.errors.title" class="error">
                {{ form.errors.title }}
            </div>
            <textarea
                v-model="form.description"
                placeholder="Description"
            ></textarea>
            <div v-if="form.errors.description" class="error">
                {{ form.errors.description }}
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    title: "",
    description: "",
});

const createBlog = () => {
    form.post(route("blog.add"));
};
</script>

<style scoped>
.error {
    color: red;
}
</style>
