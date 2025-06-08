<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, WhenVisible, Deferred } from '@inertiajs/vue3';
import {
  Tabs,
  TabsContent,
  TabsList,
  TabsTrigger,
} from '@/components/ui/tabs'
import Separator from '@/components/ui/separator/Separator.vue';
import { BookHeart, BookMarked, BookUser } from 'lucide-vue-next';
import MyGroupsTable from '../components/groups/MyGroupsTable.vue';
import AllGroupsTable from '../components/groups/AllGroupsTable.vue';
import LoadingSpinner from '@/components/LoadingSpinner.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Groups',
        href: '/groups',
    },
];

defineProps({
  myGroups: Object,
  allGroups: Object,
});
</script>

<template>
    <Head title="Groups" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <h1 class="scroll-m-20 text-4xl font-extrabold tracking-tight lg:text-5xl flex items-center">
                <BookUser class="size-9 lg:size-12 mr-2" />
                Groups
            </h1>
            <Separator/>
            <Tabs default-value="my-groups" class="w-full gap-4">
                <TabsList class="flex w-full items-center justify-between gap-1 max-w-xl mx-auto">
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
                    <!-- <WhenVisible data="myGroups">
                        <template #fallback>
                            <div class="flex items-center justify-center h-20">
                                <LoadingSpinner />
                            </div>
                        </template>
                        <MyGroupsTable :myGroups="myGroups" />
                    </WhenVisible> -->
                    <Deferred data="myGroups">
                        <template #fallback>
                            <div class="flex items-center justify-center h-20">
                                <LoadingSpinner />
                            </div>
                        </template>
                        <MyGroupsTable :myGroups="myGroups" />
                    </Deferred>
                </TabsContent>
                <TabsContent value="all-groups" class="flex flex-col gap-4">
                    <WhenVisible data="allGroups">
                        <template #fallback>
                            <div class="flex items-center justify-center h-20">
                                <LoadingSpinner />
                            </div>
                        </template>
                        <AllGroupsTable :groups="allGroups" />
                    </WhenVisible>
                    <!-- <Deferred data="allGroups">
                        <template #fallback>
                            <div class="flex items-center justify-center h-20">
                                <LoadingSpinner />
                            </div>
                        </template>
                        <AllGroupsTable :allGroups="allGroups" />
                    </Deferred> -->
                </TabsContent>
            </Tabs>
        </div>
    </AppLayout>
</template>
