<script setup lang="ts">
import {
    SidebarGroup,
    SidebarGroupAction,
    SidebarGroupLabel,
    SidebarMenu,
    SidebarMenuBadge,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { type NavProjectItem } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { MoreHorizontal, Package, Plus } from 'lucide-vue-next';

defineProps<{
    projects: NavProjectItem[];
}>();

const page = usePage();
</script>

<template>
    <SidebarGroup>
        <SidebarGroupLabel>Projects</SidebarGroupLabel>
        <SidebarGroupAction title="Add Project"> <Plus /> <span class="sr-only">Add Project</span> </SidebarGroupAction>
        <SidebarMenu>
            <SidebarMenuItem v-for="project in projects" :key="project.title">
                <SidebarMenuButton as-child :tooltip="project.title" :is-active="project.href === page.url">
                    <Link :href="project.href">
                        <Package />
                        <span>{{ project.title }}</span>
                    </Link>
                </SidebarMenuButton>
                <SidebarMenuBadge>{{ project.count }}</SidebarMenuBadge>
            </SidebarMenuItem>
            <SidebarMenuItem>
                <SidebarMenuButton as-child tooltip="More projects" class="text-sidebar-foreground/70">
                    <Link href="#">
                        <MoreHorizontal class="text-sidebar-foreground/70" />
                        <span>More</span>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>
        </SidebarMenu>
    </SidebarGroup>
</template>
