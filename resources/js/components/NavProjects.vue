<script setup lang="ts">
import { Badge } from '@/components/ui/badge';
import { SidebarGroup, SidebarGroupAction, SidebarGroupLabel, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { Link, usePage } from '@inertiajs/vue3';
import { Package, Plus } from 'lucide-vue-next';

const page = usePage();
const projects = page.props.auth.projects;

function onlyPath(url: string) {
    return new URL(url).pathname;
}
</script>

<template>
    <SidebarGroup>
        <SidebarGroupLabel>Projects</SidebarGroupLabel>
        <SidebarGroupAction title="Add Project"> <Plus class="size-4" /> <span class="sr-only">Add Project</span> </SidebarGroupAction>
        <SidebarMenu>
            <SidebarMenuItem v-for="project in projects" :key="project.title">
                <SidebarMenuButton as-child :is-active="onlyPath(project.href) === page.url">
                    <Link :href="project.href" class="flex items-center justify-between">
                        <p class="flex items-center gap-2">
                            <Package class="size-5" />
                            <span class="truncate">{{ project.title }}</span>
                        </p>
                        <Badge>
                            <span class="max-w-12 truncate">{{ project.count && project.count <= 99 ? project.count : '99+' }}</span>
                        </Badge>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>
        </SidebarMenu>
    </SidebarGroup>
</template>
