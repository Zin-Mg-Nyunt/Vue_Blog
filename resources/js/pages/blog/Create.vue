<template>
    <div class="max-w-2xl mx-auto px-4 py-12">
        <div
            class="rounded-xl border border-border bg-card p-6 md:p-8 shadow-sm"
        >
            <div class="mb-6">
                <h1 class="text-2xl font-bold tracking-tight text-foreground">
                    Create New Blog
                </h1>
                <p class="text-sm text-muted-foreground mt-1">
                    မျှဝေလိုသော အကြောင်းအရာကို ရေးသားပါ။
                </p>
            </div>

            <form @submit.prevent="createBlog" class="space-y-5">
                <div>
                    <label
                        class="block text-sm font-medium mb-1.5 text-foreground"
                        >Title</label
                    >
                    <input
                        type="text"
                        v-model="form.title"
                        placeholder="ခေါင်းစဉ် ရေးပါ..."
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
                        v-model="form.description"
                        placeholder="အသေးစိတ် အကြောင်းအရာ ရေးပါ..."
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
                        {{ form.processing ? "Publishing..." : "Publish Blog" }}
                    </button>
                </div>
            </form>
        </div>
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

<style scoped></style>
