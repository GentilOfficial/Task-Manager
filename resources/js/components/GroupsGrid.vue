<script setup lang="ts">
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { HoverCard, HoverCardContent, HoverCardTrigger } from '@/components/ui/hover-card';
import UserInfo from '@/components/UserInfo.vue';
import { Group } from '@/types';

const MAX_AVATARS = 5;

defineProps<{
    groups?: Group[];
}>();
</script>

<template>
    <div class="flex flex-col gap-4">
        <div class="grid auto-rows-fr gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <div v-for="(group, index) in groups" :key="index" class="h-full">
                <Card class="flex h-full flex-col">
                    <CardHeader>
                        <CardTitle>{{ group.name }}</CardTitle>
                        <CardDescription>{{ group.description }}</CardDescription>
                    </CardHeader>
                    <CardContent class="flex flex-1 flex-col">
                        <div class="mt-auto flex items-center gap-2">
                            <template
                                v-for="user in group.members.slice(0, group.members.length > MAX_AVATARS ? MAX_AVATARS - 1 : MAX_AVATARS)"
                                :key="user.id"
                            >
                                <HoverCard>
                                    <HoverCardTrigger as-child>
                                        <div class="hover:cursor-pointer">
                                            <UserInfo :user="user" :show-info="false" />
                                        </div>
                                    </HoverCardTrigger>
                                    <HoverCardContent class="w-80 rounded-xl">
                                        <div class="flex justify-between space-x-4">
                                            <div class="w-full space-y-1">
                                                <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                                    <UserInfo :user="user" :show-email="true" />
                                                </div>
                                                <div class="flex items-center justify-end gap-2">
                                                    <span class="text-xs text-muted-foreground">
                                                        Joined {{ new Date(user.created_at).toLocaleDateString() }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </HoverCardContent>
                                </HoverCard>
                            </template>
                            <p v-if="group.members.length > MAX_AVATARS">
                                <HoverCard>
                                    <HoverCardTrigger as-child>
                                        <div class="hover:cursor-pointer hover:underline">+{{ group.members.length - (MAX_AVATARS - 1) }}</div>
                                    </HoverCardTrigger>
                                    <HoverCardContent class="w-80 rounded-xl">
                                        <div class="max-h-60 space-y-4 divide-y overflow-y-auto pr-2">
                                            <template v-for="user in group.members.slice(MAX_AVATARS - 1)" :key="user.id">
                                                <div class="flex justify-between space-x-4">
                                                    <div class="w-full space-y-1">
                                                        <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                                            <UserInfo :user="user" :show-email="true" />
                                                        </div>
                                                        <div class="flex items-center justify-end gap-2">
                                                            <span class="text-xs text-muted-foreground">
                                                                Joined {{ new Date(user.created_at).toLocaleDateString() }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </HoverCardContent>
                                </HoverCard>
                            </p>
                        </div>
                    </CardContent>
                </Card>
            </div>
        </div>
    </div>
</template>
