<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuTrigger } from '@/components/ui/dropdown-menu';
import { useAppearance } from '@/composables/useAppearance';
import { Monitor, Moon, Sun } from 'lucide-vue-next';
import { computed } from 'vue';

const { appearance, updateAppearance } = useAppearance();

const tabs = [
    { value: 'light', Icon: Sun, label: 'Light' },
    { value: 'dark', Icon: Moon, label: 'Dark' },
    { value: 'system', Icon: Monitor, label: 'System' },
] as const;

const activeTab = computed(() => tabs.find((tab) => tab.value === appearance.value));
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger>
            <Button size="icon" variant="ghost">
                <component :is="activeTab?.Icon" class="size-5" />
            </Button>
        </DropdownMenuTrigger>
        <DropdownMenuContent>
            <DropdownMenuItem v-for="{ value, Icon, label } in tabs" :key="value" @click="updateAppearance(value)">
                <component :is="Icon" class="-ml-1 size-4" />
                <span class="ml-1.5 text-sm">{{ label }}</span>
            </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>
