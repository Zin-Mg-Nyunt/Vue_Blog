<template>
    <div class="max-w-4xl mx-auto px-4 py-10 space-y-8">
        <!-- User Info Card -->
        <div
            class="rounded-xl border border-border bg-card p-6 md:p-8 shadow-xs flex flex-col md:flex-row md:items-center justify-between gap-6"
        >
            <div class="space-y-2">
                <div class="inline-flex items-center gap-3">
                    <div
                        class="w-12 h-12 rounded-full bg-primary/10 text-primary font-bold text-xl flex items-center justify-center shrink-0"
                    >
                        {{ user.name.charAt(0).toUpperCase() }}
                    </div>
                    <div>
                        <h1
                            class="text-2xl font-bold tracking-tight text-foreground"
                        >
                            {{ user.name }}
                        </h1>
                        <p
                            v-if="user.nrc?.nrc_number"
                            class="text-xs text-muted-foreground font-mono"
                        >
                            {{ user.nrc.nrc_number }}
                        </p>
                    </div>
                </div>
                <p
                    v-if="user.nrc?.address"
                    class="text-sm text-muted-foreground pt-1"
                >
                    📍 {{ user.nrc.address }}
                </p>
            </div>
        </div>

        <!-- User's Blogs List -->
        <div>
            <h2
                class="text-xl font-semibold tracking-tight text-foreground mb-4"
            >
                Articles by {{ user.name }}
            </h2>

            <div class="grid gap-3">
                <div
                    v-for="blog in user.blogs"
                    :key="blog.id"
                    class="rounded-lg border border-border bg-card p-4 hover:border-primary/50 transition-all shadow-xs"
                >
                    <Link
                        :href="route('blog.show', blog.id)"
                        class="text-base font-medium text-foreground hover:text-primary transition-colors block"
                    >
                        {{ blog.title }}
                    </Link>
                </div>

                <div
                    v-if="!user.blogs || user.blogs.length === 0"
                    class="text-center py-8 text-sm text-muted-foreground border border-dashed border-border rounded-lg"
                >
                    ဒီ User ရေးထားသော Blog မရှိသေးပါ။
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    user: Object,
});
</script>

<style scoped></style>
