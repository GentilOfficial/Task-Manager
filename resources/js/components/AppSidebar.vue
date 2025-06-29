<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavProjects from '@/components/NavProjects.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { BookOpen, FolderClosed, FolderGit2, FolderOpen, LayoutDashboard, LayoutGrid, LayoutList, ListTodo } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
        activeIcon: LayoutDashboard,
    },
    {
        title: 'Projects',
        href: '/projects',
        icon: FolderClosed,
        activeIcon: FolderOpen,
    },
    {
        title: 'Assigned Tasks',
        href: '/assigned-tasks',
        icon: LayoutList,
        activeIcon: ListTodo,
    },
];

const footerNavItems: NavItem[] = [
    {
        title: 'GitHub Repository',
        href: 'https://github.com/GentilOfficial/Task-Manager',
        icon: FolderGit2,
    },
    {
        title: 'Documentation',
        href: 'https://gentilofficial.github.io/Task-Manager',
        icon: BookOpen,
    },
];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="route('dashboard')">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
            <NavProjects />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
