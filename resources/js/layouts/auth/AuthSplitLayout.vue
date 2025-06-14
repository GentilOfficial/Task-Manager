<script setup lang="ts">
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import { Link, usePage } from '@inertiajs/vue3';
import { defineAsyncComponent, onMounted, onUnmounted, reactive, ref, toRefs } from 'vue';

const page = usePage();
const reactiveProps = reactive(page.props);
const { name, quote } = toRefs(reactiveProps);

const LazyVideo = defineAsyncComponent({
    loader: () => import('./AuthSplitBackgroundVideo.vue'),
});

const showVideo = ref(false);

onMounted(() => {
    const mediaQuery = window.matchMedia('(min-width: 1024px)');

    if (mediaQuery.matches) {
        showVideo.value = true;
    }

    const handler = (event: MediaQueryListEvent) => {
        if (event.matches) {
            showVideo.value = true;
        }
    };

    mediaQuery.addEventListener('change', handler);

    onUnmounted(() => {
        mediaQuery.removeEventListener('change', handler);
    });
});

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <div class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
        <div class="relative hidden h-full flex-col bg-muted p-10 text-white lg:flex dark:border-r">
            <LazyVideo v-if="showVideo" />
            <div class="absolute inset-0 bg-zinc-900/60" />
            <Link :href="route('home')" class="relative z-20 flex w-fit items-center text-lg font-medium">
                <AppLogoIcon class="mr-2 size-8 stroke-current text-white" />
                {{ name }}
            </Link>
            <div v-if="quote" class="relative z-20 mt-auto">
                <blockquote class="space-y-2">
                    <p class="text-lg">&ldquo;{{ quote.message }}&rdquo;</p>
                    <footer class="text-sm text-neutral-300">{{ quote.author }}</footer>
                </blockquote>
            </div>
        </div>
        <div class="lg:p-8">
            <div class="mx-auto flex w-full flex-col justify-center space-y-6 py-6 sm:w-[350px]">
                <Link :href="route('home')" class="mx-auto flex w-fit items-center text-lg font-medium">
                    <AppLogoIcon class="block size-8 stroke-current text-black lg:hidden dark:text-white" />
                </Link>
                <div class="flex flex-col space-y-2 text-center">
                    <h1 class="text-xl font-medium tracking-tight" v-if="title">{{ title }}</h1>
                    <p class="text-sm text-muted-foreground" v-if="description">{{ description }}</p>
                </div>
                <slot />
            </div>
        </div>
    </div>
</template>
