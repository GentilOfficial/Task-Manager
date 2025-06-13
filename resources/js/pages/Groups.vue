<script setup lang="ts">
import GroupsGrid from '@/components/GroupsGrid.vue';
import LoadingSpinner from '@/components/LoadingSpinner.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem, Group } from '@/types';
import { Deferred, Head } from '@inertiajs/vue3';

defineProps<{
    owned?: Group[];
    member?: Group[];
}>();

const breadcrumbs: BreadcrumbItem[] = [{ title: 'Groups', href: route('groups.user') }];
</script>

<template>
    <Head title="Groups" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <h2 class="mt-10 scroll-m-20 border-b pb-2 text-3xl font-semibold tracking-tight transition-colors first:mt-0">Owned Groups</h2>
            <Deferred data="owned">
                <template #fallback>
                    <div class="flex h-20 items-center justify-center">
                        <LoadingSpinner />
                    </div>
                </template>
                <GroupsGrid :groups="owned" />
            </Deferred>
            <h2 class="mt-10 scroll-m-20 border-b pb-2 text-3xl font-semibold tracking-tight transition-colors first:mt-0">Groups Member</h2>
            <Deferred data="member">
                <template #fallback>
                    <div class="flex h-20 items-center justify-center">
                        <LoadingSpinner />
                    </div>
                </template>
                <GroupsGrid :groups="member" />
            </Deferred>
        </div>
    </AppLayout>
</template>
