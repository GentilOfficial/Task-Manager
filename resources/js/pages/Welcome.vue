<script setup lang="ts">
import AppearanceDropdown from '@/components/AppearanceDropdown.vue';
import AppLogo from '@/components/AppLogo.vue';
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import CharacterSvg from '@/components/CharacterSvg.vue';
import { Button } from '@/components/ui/button';
import { Separator } from '@/components/ui/separator';
import { Sheet, SheetContent, SheetDescription, SheetHeader, SheetTitle, SheetTrigger } from '@/components/ui/sheet';
import { Head, Link } from '@inertiajs/vue3';
import { ChartNoAxesColumn, Github, Handshake, HeartHandshake, History, Menu, Play, Users } from 'lucide-vue-next';
import { onMounted, onUnmounted, ref } from 'vue';

const scrolled = ref(false);

const handleScroll = () => {
    scrolled.value = window.scrollY > 0;
};

onMounted(() => window.addEventListener('scroll', handleScroll));
onUnmounted(() => window.removeEventListener('scroll', handleScroll));

const topics = [
    {
        title: 'Key Feature',
        description: 'Organize projects and tasks in clicks. Create and assign tasks easily — all in one platform.',
    },
    {
        title: 'Highlights',
        description: 'No Excel. No confusion. Easy assignments. Full visibility. Efficient collaboration.',
    },
    {
        title: 'Benefits',
        description: 'Tasks, projects, assignments — all in one. Simple, scalable. Faster teams, faster delivery.',
    },
];

const features = [
    {
        title: 'Team Management',
        description: 'Effortlessly add, remove, and organize team members in your projects.',
        icon: Users,
    },
    {
        title: 'Task Assignment',
        description: 'Quickly assign tasks to project members and track responsibilities.',
        icon: Handshake,
    },
    {
        title: 'Activity Reports',
        description: 'Get detailed reports on team performance and task completion.',
        icon: ChartNoAxesColumn,
    },
    {
        title: 'Project Tracking',
        description: 'Monitor project progress with clear timelines and status indicators.',
        icon: History,
    },
];

const creators = [
    {
        name: 'Federico Gentili',
        mansion: 'Web Developer',
        avatar: 'https://avatars.githubusercontent.com/u/80174849',
        link: 'https://github.com/GentilOfficial',
    },
];

const repo = 'https://github.com/GentilOfficial/Task-Manager';
const license = 'https://github.com/GentilOfficial/Task-Manager/blob/main/LICENSE';
</script>

<template>
    <Head title="Welcome" />
    <header
        :class="{
            'border-b border-neutral-200/60 bg-background/90 backdrop-blur-lg dark:border-neutral-800/60': scrolled,
            'translate-y-0 border-b border-transparent bg-transparent': !scrolled,
        }"
        class="sticky top-0 z-50 box-content h-18 w-full transition-all duration-300"
    >
        <div class="mx-auto max-w-7xl px-7 md:px-12 xl:px-20">
            <div class="z-30 flex h-18 items-center justify-between">
                <div class="flex items-center gap-1">
                    <AppLogoIcon class="size-8" />
                    <span class="text-md font-bold whitespace-nowrap">{{ $page.props.name }}</span>
                </div>
                <div class="me-2 flex h-full w-full items-center justify-end lg:me-4">
                    <AppearanceDropdown />
                </div>
                <div :class="$page.props.auth.user ? 'flex' : 'hidden lg:flex'" class="w-fit items-center justify-end gap-4">
                    <Button v-if="$page.props.auth.user" :as="Link" :href="route('dashboard')"> Dashboard </Button>
                    <template v-else>
                        <Button :as="Link" :href="route('register')" variant="outline"> Register </Button>
                        <Button :as="Link" :href="route('login')"> Log in </Button>
                    </template>
                </div>
                <div v-if="!$page.props.auth.user" class="lg:hidden">
                    <Sheet>
                        <SheetTrigger :as-child="true">
                            <Button variant="ghost" size="icon" class="inline-flex items-center justify-center p-2">
                                <Menu class="size-5" />
                            </Button>
                        </SheetTrigger>
                        <SheetContent side="right" class="max-w-[450px] overflow-auto p-6">
                            <SheetTitle class="sr-only">Navigation Menu</SheetTitle>
                            <SheetHeader class="flex flex-row items-center gap-1 px-0 py-1">
                                <AppLogo />
                                <SheetDescription class="hidden">Navigation links</SheetDescription>
                            </SheetHeader>
                            <Separator />
                            <Button :as="Link" :href="route('register')" variant="outline"> Register </Button>
                            <Button :as="Link" :href="route('login')"> Log in </Button>
                        </SheetContent>
                    </Sheet>
                </div>
            </div>
        </div>
    </header>
    <main class="flex-grow overflow-x-hidden">
        <section class="relative top-0 -mt-18 flex min-h-screen w-full flex-col items-center justify-center lg:min-h-screen">
            <div
                class="mx-auto flex w-full max-w-2xl flex-1 flex-col items-center justify-between gap-6 px-8 pt-32 text-left md:px-12 lg:max-w-7xl lg:flex-row lg:pt-32 lg:pb-16 xl:px-20"
            >
                <div class="w-full lg:w-1/2">
                    <h1 class="text-left text-6xl font-bold tracking-tighter text-balance sm:text-center sm:text-7xl md:text-8xl lg:text-left">
                        <span class="block origin-left text-nowrap">
                            <span class="text-red-600 drop-shadow drop-shadow-red-800/50">Less</span>
                            <span
                                class="bg-gradient-to-b from-neutral-950 to-neutral-400 bg-clip-text px-1 text-transparent dark:from-neutral-100 dark:to-neutral-700"
                            >
                                Chaos
                            </span>
                        </span>
                        <span class="text-nowrap">
                            <span
                                class="bg-gradient-to-t from-neutral-950 to-neutral-400 bg-clip-text px-1 text-transparent dark:from-neutral-100 dark:to-neutral-700"
                            >
                                Reach
                            </span>
                            <span class="text-green-600 drop-shadow drop-shadow-green-800/50">More</span>
                        </span>
                    </h1>
                    <p
                        class="mx-auto mt-5 text-left text-2xl font-normal text-neutral-500 sm:max-w-lg sm:text-center lg:ml-0 lg:text-left dark:text-neutral-400"
                    >
                        Track your tasks and collaborate efficiently with your team.
                    </p>
                    <div class="mx-auto mt-8 flex flex-row items-center justify-center gap-3 md:ml-0 md:gap-2 lg:justify-start">
                        <Button :as="Link" :href="route('dashboard')" size="lg">Get started <Play /> </Button>
                        <Button as="a" variant="secondary" :href="repo" size="lg" target="_blank">View repository <Github /> </Button>
                    </div>
                </div>
                <div class="mt-12 flex w-full items-center justify-center text-foreground lg:mt-0 lg:w-1/2">
                    <CharacterSvg class="relative w-full max-w-[450px] drop-shadow drop-shadow-neutral-500/75 lg:scale-125 xl:translate-x-6" />
                </div>
            </div>
            <div class="flex w-full flex-shrink-0 items-center border-t border-sidebar-accent lg:h-[150px]">
                <div
                    class="mx-auto grid h-auto max-w-7xl grid-cols-1 space-y-5 divide-y divide-sidebar-accent px-8 py-10 md:px-12 lg:grid-cols-3 lg:space-y-0 lg:divide-x lg:divide-y-0 lg:px-20 lg:py-0"
                >
                    <div v-for="(item, i) in topics" :key="i" class="lg:px-10" :class="i === topics.length - 1 ? '' : 'pb-5 lg:pb-0'">
                        <h3 class="font-medium">{{ item.title }}</h3>
                        <p class="mt-2 text-sm font-medium text-neutral-500">{{ item.description }}</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="mx-auto max-w-7xl border-t border-sidebar-accent px-7 py-12 sm:py-24 md:px-12 xl:px-20">
            <section>
                <div class="relative w-full text-center">
                    <h2 class="text-left text-3xl font-medium tracking-tighter sm:text-4xl md:text-center lg:text-5xl">
                        Take Control of <br />Your Team’s Workflow
                    </h2>
                    <p class="mx-auto mt-4 max-w-2xl text-left text-sm font-medium text-neutral-500 sm:text-base md:text-center md:text-balance">
                        Cut the chaos with powerful task management. Organize projects, assign tasks effortlessly, and speed up delivery — all within
                        one intuitive, all-in-one platform designed to keep your team aligned and productive.
                    </p>
                </div>
                <div class="text-center">
                    <div class="mt-12 grid grid-cols-2 gap-x-6 gap-y-12 text-center lg:mt-16 lg:grid-cols-4 lg:gap-x-8 lg:gap-y-16">
                        <div v-for="(item, i) in features" :key="i">
                            <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-secondary/75">
                                <component :is="item.icon" />
                            </div>
                            <div class="mt-6">
                                <h3 class="font-medium">{{ item.title }}</h3>
                                <p class="mt-2 text-sm text-neutral-500">{{ item.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="mx-auto max-w-7xl border-t border-sidebar-accent px-7 py-12 sm:py-24 md:px-12 xl:px-20">
            <section>
                <div class="relative w-full text-center">
                    <h2
                        class="flex items-center justify-start gap-2 text-3xl font-medium tracking-tighter sm:gap-3 sm:text-4xl md:justify-center lg:gap-4 lg:text-5xl"
                    >
                        Made with love
                        <HeartHandshake
                            class="size-8 text-red-600 drop-shadow drop-shadow-red-400/50 sm:size-10 lg:size-12 dark:drop-shadow-red-600/50"
                        />
                    </h2>
                    <p class="mx-auto mt-4 max-w-2xl text-left text-sm font-medium text-neutral-500 sm:text-base md:text-center md:text-balance">
                        Driven by a passion for programming and a desire to simplify teamwork, this tool is thoughtfully crafted to help you and your
                        team achieve your best together.
                    </p>
                </div>
                <div class="text-center">
                    <div class="mx-auto mt-12 flex w-fit gap-8 text-center lg:mt-16">
                        <a
                            v-for="(item, i) in creators"
                            :key="i"
                            :href="item.link"
                            target="_blank"
                            class="mx-auto flex w-fit flex-col items-center justify-center gap-4"
                        >
                            <img
                                :src="item.avatar"
                                class="size-20 rounded-full border border-foreground shadow shadow-foreground/50 grayscale"
                                :alt="item.name"
                            />
                            <div>
                                <div class="font-medium">{{ item.name }}</div>
                                <div class="mt-1 text-sm text-neutral-500">{{ item.mansion }}</div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <footer class="pt-10">
        <div class="mx-auto max-w-7xl px-7 md:px-12 xl:px-20">
            <div class="flex flex-col items-center justify-center border-t border-solid border-sidebar-accent py-5 lg:flex-row">
                <ul class="flex flex-wrap space-x-5 text-xs">
                    <li class="flex-full mb-6 text-center lg:mb-0 lg:flex-none">
                        Distributed under the
                        <a class="after:content-['_↗'] hover:underline" target="_blank" :href="license">MIT License</a>.
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</template>
