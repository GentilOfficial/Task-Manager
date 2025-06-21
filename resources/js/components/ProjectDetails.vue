<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Card, CardAction, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Project } from '@/types';
import { Link } from '@inertiajs/vue3';
import { FolderSymlink, Package } from 'lucide-vue-next';

defineProps<{
    project: Project;
}>();
</script>

<template>
    <Card class="flex-row px-4 py-4">
        <div class="flex items-center justify-center">
            <div class="rounded-lg border border-sidebar-border bg-accent p-2">
                <Package />
            </div>
        </div>
        <CardHeader class="grow px-0">
            <CardTitle class="w-full truncate">{{ project.name }}</CardTitle>
            <CardDescription class="w-full truncate">
                {{ project?.description }}
            </CardDescription>
        </CardHeader>
        <CardAction>
            <Button :as="Link" :href="route('project.show', { project })" size="icon" class="size-6">
                <FolderSymlink />
            </Button>
        </CardAction>
    </Card>
</template>
