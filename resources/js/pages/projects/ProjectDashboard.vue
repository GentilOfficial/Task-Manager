<script setup lang="ts">
import LoadingSpinner from '@/components/LoadingSpinner.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Project, Task, type BreadcrumbItem } from '@/types';
import { Deferred, Head } from '@inertiajs/vue3';

const props = defineProps<{
    project: Project;
    tasks: Task[];
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

            <Deferred data="tasks">
                <template #fallback>
                    <div class="flex h-20 items-center justify-center">
                        <LoadingSpinner />
                    </div>
                </template>
                <pre>{{ tasks }}</pre>
            </Deferred>
        </div>
    </AppLayout>
</template>
