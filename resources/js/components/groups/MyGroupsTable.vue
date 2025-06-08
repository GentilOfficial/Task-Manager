<script setup lang="ts">
import PlaceholderPattern from '../PlaceholderPattern.vue';

const props = defineProps<{
  groups?: any;
}>();

console.log(props.groups);
</script>

<template>
    <div class="flex flex-col gap-4">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                <PlaceholderPattern />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                <PlaceholderPattern />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                <PlaceholderPattern />
            </div>
        </div>
        <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
            <PlaceholderPattern />
        </div>
    </div>
</template>
