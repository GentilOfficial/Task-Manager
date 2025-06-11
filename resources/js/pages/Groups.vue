<script setup lang="ts">
import GroupsGrid from '@/components/GroupsGrid.vue';
import LoadingSpinner from '@/components/LoadingSpinner.vue';
import Separator from '@/components/ui/separator/Separator.vue';
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@/components/ui/tabs';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem, Group } from '@/types';
import { Deferred, Head } from '@inertiajs/vue3';
import { BookHeart, BookMarked, BookUser } from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [{ title: 'Groups', href: '/groups' }];

defineProps<{
    owned?: Group[];
    member?: Group[];
    all?: Group[];
}>();
</script>

<template>
    <Head title="Groups" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <h1 class="flex scroll-m-20 items-center text-4xl font-extrabold tracking-tight lg:text-5xl">
                <BookUser class="mr-2 size-9 lg:size-12" />
                Groups
            </h1>
            <Separator />
            <Tabs default-value="my-groups" class="w-full gap-4">
                <TabsList class="mx-auto flex w-full max-w-xl items-center justify-between gap-1">
                    <TabsTrigger value="my-groups" class="hover:cursor-pointer">
                        <BookHeart />
                        My Groups
                    </TabsTrigger>
                    <Separator orientation="vertical" />
                    <TabsTrigger value="all-groups" class="hover:cursor-pointer">
                        <BookMarked />
                        All Groups
                    </TabsTrigger>
                </TabsList>
                <TabsContent value="my-groups" class="flex flex-col gap-4">
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
                </TabsContent>
                <TabsContent value="all-groups" class="flex flex-col gap-4">
                    <h2 class="mt-10 scroll-m-20 border-b pb-2 text-3xl font-semibold tracking-tight transition-colors first:mt-0">All Groups</h2>
                    <Deferred data="all">
                        <template #fallback>
                            <div class="flex h-20 items-center justify-center">
                                <LoadingSpinner />
                            </div>
                        </template>
                        <GroupsGrid :groups="all" />
                    </Deferred>
                </TabsContent>
            </Tabs>
        </div>
    </AppLayout>
</template>
