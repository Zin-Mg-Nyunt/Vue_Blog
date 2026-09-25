<template>
    <div class="max-w-3xl mx-auto px-4 py-10">
        <article
            class="rounded-xl border border-border bg-card p-6 md:p-10 shadow-xs"
        >
            <h1
                class="text-3xl font-extrabold tracking-tight text-foreground mb-6 leading-tight"
            >
                {{ blog.title }}
            </h1>

            <div
                class="prose prose-slate dark:prose-invert max-w-none text-foreground/90 leading-relaxed space-y-4 whitespace-pre-line mb-8"
            >
                {{ blog.description }}
            </div>

            <div
                class="flex items-center justify-between pt-6 border-t border-border"
            >
                <Link
                    :href="route('blog.edit', blog.id)"
                    class="inline-flex items-center justify-center rounded-lg border border-input bg-background px-4 py-2 text-sm font-medium text-foreground shadow-xs hover:bg-accent hover:text-accent-foreground transition-colors"
                >
                    Edit
                </Link>

                <form @submit.prevent="deleteBlog(blog.id)">
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-lg bg-destructive/10 text-destructive hover:bg-destructive hover:text-destructive-foreground px-4 py-2 text-sm font-medium transition-colors"
                    >
                        Delete
                    </button>
                </form>
            </div>
        </article>
    </div>
</template>

<script setup>
import { Link, router } from "@inertiajs/vue3";

const props = defineProps({
    blog: Object,
});

const deleteBlog = (id) => {
    if (confirm("ဒီ Blog ကို ဖျက်ရန် သေချာပါသလား?")) {
        router.delete(route("blog.destroy", id));
    }
};
</script>

<style scoped></style>
