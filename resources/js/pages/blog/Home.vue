<template>
    <div class="max-w-4xl mx-auto px-4 py-10">
        <!-- Header Section -->
        <div
            class="flex items-center justify-between mb-8 pb-6 border-b border-border"
        >
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-foreground">
                    Vue Blog
                </h1>
                <p class="text-sm text-muted-foreground mt-1">
                    နောက်ဆုံးပေါ် ဆောင်းပါးများနှင့် ဗဟုသုတများကို ဖတ်ရှုပါ။
                </p>
            </div>
            <Link
                :href="route('blog.create')"
                class="inline-flex items-center justify-center rounded-lg bg-primary px-4 py-2 text-sm font-medium text-primary-foreground shadow-sm transition-all hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring"
            >
                + Create Blog
            </Link>
        </div>

        <!-- Blog Feed Card Grid -->
        <div class="grid gap-4">
            <div
                v-for="blog in blogs"
                :key="blog.id"
                class="group relative flex flex-col justify-between rounded-xl border border-border bg-card p-5 shadow-xs transition-all hover:border-primary/50 hover:shadow-md"
            >
                <div class="flex items-start justify-between gap-4">
                    <Link
                        :href="route('blog.show', blog.id)"
                        class="text-lg font-semibold text-foreground group-hover:text-primary transition-colors line-clamp-1"
                    >
                        {{ blog.title }}
                    </Link>
                    <Link
                        :href="route('user.profile', blog.user.id)"
                        class="inline-flex items-center gap-1.5 text-xs font-medium text-muted-foreground hover:text-foreground bg-muted px-2.5 py-1 rounded-full transition-colors shrink-0"
                    >
                        <span class="w-2 h-2 rounded-full bg-primary"></span>
                        {{ blog.user.name }}
                    </Link>
                </div>
            </div>

            <!-- Empty State -->
            <div
                v-if="!blogs || blogs.length === 0"
                class="text-center py-12 border border-dashed border-border rounded-xl"
            >
                <p class="text-muted-foreground">ဆောင်းပါးများ မရှိသေးပါ။</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    blogs: Array,
});
</script>

<style scoped></style>
