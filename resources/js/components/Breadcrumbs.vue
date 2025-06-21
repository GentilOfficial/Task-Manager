<script lang="ts" setup>
import {
    Breadcrumb,
    BreadcrumbEllipsis,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from '@/components/ui/breadcrumb';
import { Button } from '@/components/ui/button';
import {
    Drawer,
    DrawerClose,
    DrawerContent,
    DrawerDescription,
    DrawerFooter,
    DrawerHeader,
    DrawerTitle,
    DrawerTrigger,
} from '@/components/ui/drawer';
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuTrigger } from '@/components/ui/dropdown-menu';
import { BreadcrumbItemType } from '@/types';
import { Link } from '@inertiajs/vue3';
import { useMediaQuery } from '@vueuse/core';
import { computed, ref } from 'vue';

const isDesktop = useMediaQuery('(min-width: 768px)');
const isOpen = ref(false);

const props = defineProps<{
    breadcrumbs: BreadcrumbItemType[];
}>();

const items = props.breadcrumbs;

const itemsToDisplay = 2;
const firstLabel = computed(() => items[0].title);

const allButLastItem = computed(() => items.slice(1, (itemsToDisplay - 1) * -1));
const lastItem = computed(() => items.slice(-Math.min(itemsToDisplay, items.length) + 1));
</script>

<template>
    <Breadcrumb>
        <BreadcrumbList>
            <BreadcrumbItem>
                <BreadcrumbLink v-if="items.length > 1">
                    <Link :href="items[0].href ?? '#'">
                        {{ items[0].title }}
                    </Link>
                </BreadcrumbLink>
                <BreadcrumbPage v-else> {{ firstLabel }} </BreadcrumbPage>
            </BreadcrumbItem>
            <BreadcrumbSeparator v-if="items.length > 1" />
            <template v-if="items.length > itemsToDisplay">
                <BreadcrumbItem>
                    <DropdownMenu v-if="isDesktop" v-model:open="isOpen">
                        <DropdownMenuTrigger class="flex items-center gap-1" aria-label="Toggle menu">
                            <Button size="icon" variant="ghost" class="size-6 hover:cursor-pointer">
                                <BreadcrumbEllipsis class="size-4" />
                            </Button>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent align="start">
                            <DropdownMenuItem
                                class="hover:cursor-pointer"
                                :as="Link"
                                :href="item.href || '#'"
                                v-for="item of allButLastItem"
                                :key="item.title"
                            >
                                {{ item.title }}
                            </DropdownMenuItem>
                        </DropdownMenuContent>
                    </DropdownMenu>
                    <Drawer v-else v-model:open="isOpen">
                        <DrawerTrigger aria-label="Toggle Menu">
                            <BreadcrumbEllipsis class="h-4 w-4" />
                        </DrawerTrigger>
                        <DrawerContent>
                            <DrawerHeader class="text-left">
                                <DrawerTitle>Navigate to</DrawerTitle>
                                <DrawerDescription> Select a page to navigate. </DrawerDescription>
                            </DrawerHeader>
                            <div class="grid gap-4 px-4">
                                <Button
                                    :as="Link"
                                    variant="outline"
                                    v-for="item of allButLastItem"
                                    :key="item.title"
                                    :href="item.href ?? '#'"
                                    class="justify-start py-1 text-sm"
                                >
                                    {{ item.title }}
                                </Button>
                            </div>
                            <DrawerFooter class="pt-4">
                                <DrawerClose as-child>
                                    <Button> Close </Button>
                                </DrawerClose>
                            </DrawerFooter>
                        </DrawerContent>
                    </Drawer>
                </BreadcrumbItem>
                <BreadcrumbSeparator />
            </template>
            <BreadcrumbItem class="max-w-[45svw]" v-if="items.length > 1" v-for="(item, index) of lastItem" :key="item.title">
                <template v-if="index === lastItem.length - 1">
                    <BreadcrumbPage class="truncate">
                        {{ item.title }}
                    </BreadcrumbPage>
                </template>
                <template v-else>
                    <BreadcrumbLink as-child class="truncate">
                        <Link :href="item.href ?? '#'">{{ item.title }}</Link>
                    </BreadcrumbLink>
                </template>
                <BreadcrumbSeparator v-if="index !== lastItem.length - 1" />
            </BreadcrumbItem>
        </BreadcrumbList>
    </Breadcrumb>
</template>
