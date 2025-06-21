<script setup lang="ts">
import LoadingSpinner from '@/components/LoadingSpinner.vue';
import ProjectDetails from '@/components/ProjectDetails.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Project, type BreadcrumbItem } from '@/types';
import { Deferred, Head } from '@inertiajs/vue3';

defineProps<{
    owned?: Project[];
    member?: Project[];
}>();

const breadcrumbs: BreadcrumbItem[] = [{ title: 'Projects', href: route('projects') }];
</script>

<template>
    <Head title="Projects" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <h2 class="mt-10 scroll-m-20 border-b pb-2 text-3xl font-semibold tracking-tight transition-colors first:mt-0">Owned Projects</h2>
            <Deferred data="owned">
                <template #fallback>
                    <div class="flex h-20 items-center justify-center">
                        <LoadingSpinner />
                    </div>
                </template>
                <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    <template v-for="item in owned" :key="item.id">
                        <ProjectDetails :project="item" />
                    </template>
                </div>
            </Deferred>
            <h2 class="mt-10 scroll-m-20 border-b pb-2 text-3xl font-semibold tracking-tight transition-colors first:mt-0">Project Member</h2>
            <Deferred data="member">
                <template #fallback>
                    <div class="flex h-20 items-center justify-center">
                        <LoadingSpinner />
                    </div>
                </template>
                <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    <template v-for="item in member" :key="item.id">
                        <ProjectDetails :project="item" />
                    </template>
                </div>
            </Deferred>
        </div>
    </AppLayout>
</template>
