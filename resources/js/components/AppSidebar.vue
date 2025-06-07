<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { FolderGit2, BookOpen, LayoutGrid, FolderOpen, LayoutDashboard, FolderClosed, LayoutList, ListTodo, BookUser, FileUser } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
        activeIcon: LayoutDashboard,
    },
    {
        title: 'Groups',
        href: '/groups',
        icon: BookUser,
        activeIcon: FileUser,
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
        href: 'https://github.com/GentilOfficial/Task-Manager',
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
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
