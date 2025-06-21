<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Project, type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{
    project: Project;
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Projects',
        href: route('projects'),
    },
    {
        title: props.project.name,
        href: route('project.show', { project: props.project }),
    },
];
</script>

<template>
    <Head title="Projects" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            {{ project.name }}
        </div>
    </AppLayout>
</template>
