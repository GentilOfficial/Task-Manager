<script setup lang="ts">
import { Breadcrumb, BreadcrumbItem, BreadcrumbLink, BreadcrumbList, BreadcrumbPage, BreadcrumbSeparator } from '@/components/ui/breadcrumb';
import { Link } from '@inertiajs/vue3';

interface BreadcrumbItemType {
    title: string;
    href?: string;
}

defineProps<{
    breadcrumbs: BreadcrumbItemType[];
}>();
</script>

<template>
    <Breadcrumb>
        <BreadcrumbList class="flex-nowrap overflow-x-scroll whitespace-nowrap">
            <template v-for="(item, index) in breadcrumbs" :key="index">
                <BreadcrumbItem>
                    <template v-if="index === breadcrumbs.length - 1">
                        <BreadcrumbPage>{{ item.title }}</BreadcrumbPage>
                    </template>
                    <template v-else>
                        <BreadcrumbLink as-child>
                            <Link :href="item.href ?? '#'">{{ item.title }}</Link>
                        </BreadcrumbLink>
                    </template>
                </BreadcrumbItem>
                <BreadcrumbSeparator v-if="index !== breadcrumbs.length - 1" />
            </template>
            <BreadcrumbSeparator />
            <BreadcrumbPage
                >Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat ipsa aperiam ratione architecto sunt labore soluta officiis? Quam
                commodi iure aperiam ea temporibus minus dolorem. Voluptatum dicta minima provident ratione.</BreadcrumbPage
            >
        </BreadcrumbList>
    </Breadcrumb>
</template>
