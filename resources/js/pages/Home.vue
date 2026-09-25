<template>
    <div>
        <h1>Vue Blog</h1>
    </div>
</template>

<script setup>
const props = defineProps({
    blogs: Array,
});
console.log(props.blogs);
</script>

<style></style>
