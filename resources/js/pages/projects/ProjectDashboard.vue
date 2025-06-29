<script setup lang="ts">
import LoadingSpinner from '@/components/LoadingSpinner.vue';
import { NavigationMenu, NavigationMenuItem, NavigationMenuList, navigationMenuTriggerStyle } from '@/components/ui/navigation-menu';
import AppLayout from '@/layouts/AppLayout.vue';
import { NavItem, Project, Task, User, type BreadcrumbItem } from '@/types';
import { Deferred, Head, Link, usePage } from '@inertiajs/vue3';
import { List, Settings, Users } from 'lucide-vue-next';
import { computed } from 'vue';

const props = defineProps<{
    project: Project;
    users: User[];
    tasks: Task[];
}>();

const mainNavItems: NavItem[] = [
    {
        title: 'Tasks',
        href: route('project.tasks', { project: props.project }),
        icon: List,
    },
    {
        title: 'Users',
        href: route('project.users', { project: props.project }),
        icon: Users,
    },
    {
        title: 'Settings',
        href: route('project.settings', { project: props.project }),
        icon: Settings,
    },
];

const page = usePage();
const isCurrentRoute = computed(() => (url: string) => page.url === new URL(url).pathname);

const activeItemStyles = computed(() => (url: string) => (isCurrentRoute.value(url) ? 'text-foreground' : 'text-muted-foreground'));

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Projects',
        href: route('projects'),
    },
    {
        title: props.project.name,
        href: route('project.tasks', { project: props.project }),
    },
];
</script>

<template>
    <Head title="Projects" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            {{ project.name }}

            <div class="h-10 w-full border-b">
                <NavigationMenu>
                    <NavigationMenuList class="flex space-x-2">
                        <NavigationMenuItem v-for="(item, index) in mainNavItems" :key="index" class="relative flex h-full items-center">
                            <Link :href="item.href" :class="[navigationMenuTriggerStyle(), activeItemStyles(item.href), 'h-9 cursor-pointer px-3']">
                                <component v-if="item.icon" :is="item.icon" class="mr-1 size-4" />
                                {{ item.title }}
                            </Link>
                            <div v-if="isCurrentRoute(item.href)" class="absolute bottom-0 left-0 h-px w-full translate-y-1 bg-foreground"></div>
                        </NavigationMenuItem>
                    </NavigationMenuList>
                </NavigationMenu>
            </div>

            <h2>Users</h2>
            <Deferred data="users">
                <template #fallback>
                    <div class="flex h-20 items-center justify-center">
                        <LoadingSpinner />
                    </div>
                </template>
                <div class="rounded-lg border bg-accent p-4 shadow-inner">
                    <pre class="max-h-96 overflow-auto">
                        <code>
                            {{ users }}
                        </code>
                    </pre>
                </div>
            </Deferred>

            <h2>Tasks</h2>
            <Deferred data="tasks">
                <template #fallback>
                    <div class="flex h-20 items-center justify-center">
                        <LoadingSpinner />
                    </div>
                </template>
                <div class="rounded-lg border bg-accent p-4 shadow-inner">
                    <pre>
                        <code>
                            {{ tasks }}
                        </code>
                    </pre>
                </div>
            </Deferred>
        </div>
    </AppLayout>
</template>
