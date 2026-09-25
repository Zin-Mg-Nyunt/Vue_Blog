<template>
    <div class="max-w-2xl mx-auto px-4 py-12">
        <div
            class="rounded-xl border border-border bg-card p-6 md:p-8 shadow-sm"
        >
            <div class="mb-6">
                <h1 class="text-2xl font-bold tracking-tight text-foreground">
                    Edit Blog
                </h1>
                <p class="text-sm text-muted-foreground mt-1">
                    ဆောင်းပါး အချက်အလက်များကို ပြင်ဆင်ပါ။
                </p>
            </div>

            <form @submit.prevent="updateBlog" class="space-y-5">
                <div>
                    <label
                        class="block text-sm font-medium mb-1.5 text-foreground"
                        >Title</label
                    >
                    <input
                        type="text"
                        placeholder="Title"
                        v-model="form.title"
                        class="w-full rounded-lg border border-input bg-background px-3.5 py-2.5 text-sm text-foreground shadow-xs placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring"
                    />
                    <div
                        v-if="form.errors.title"
                        class="mt-1.5 text-xs font-medium text-destructive"
                    >
                        {{ form.errors.title }}
                    </div>
                </div>

                <div>
                    <label
                        class="block text-sm font-medium mb-1.5 text-foreground"
                        >Description</label
                    >
                    <textarea
                        placeholder="Description"
                        v-model="form.description"
                        rows="6"
                        class="w-full rounded-lg border border-input bg-background px-3.5 py-2.5 text-sm text-foreground shadow-xs placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring resize-none"
                    ></textarea>
                    <div
                        v-if="form.errors.description"
                        class="mt-1.5 text-xs font-medium text-destructive"
                    >
                        {{ form.errors.description }}
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="inline-flex items-center justify-center rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-primary-foreground shadow-sm transition-all hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:opacity-50"
                    >
                        {{ form.processing ? "Updating..." : "Update Blog" }}
                    </button>
                </div>
            </form>
        </div>
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

<style scoped></style>
