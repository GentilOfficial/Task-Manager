<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import character from '/public/character.svg';
</script>

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#1b1b18] lg:justify-center lg:p-8 dark:bg-[#0a0a0a]">
        <header class="mb-6 w-full max-w-[335px] text-sm not-has-[nav]:hidden lg:max-w-4xl">
            <nav class="flex items-center justify-end gap-4">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                    Dashboard
                </Link>
                <template v-else>
                    <Link
                        :href="route('login')"
                        class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]"
                    >
                        Log in
                    </Link>
                    <Link
                        :href="route('register')"
                        class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                    >
                        Register
                    </Link>
                </template>
            </nav>
        </header>
        <div class="flex w-full items-center justify-center opacity-100 transition-opacity duration-750 lg:grow starting:opacity-0">
            <main class="flex w-full max-w-[335px] flex-col-reverse overflow-hidden rounded-lg lg:max-w-4xl lg:flex-row">
                <div
                    class="mx-auto flex w-full max-w-2xl flex-1 flex-col items-center justify-between gap-6 px-8 pt-32 text-left md:px-12 lg:max-w-7xl lg:flex-row lg:pt-32 lg:pb-16 xl:px-20"
                >
                    <div class="w-full lg:w-1/2">
                        <h1
                            class="text-left text-6xl font-bold tracking-tighter text-balance text-zinc-900 sm:text-center sm:text-7xl md:text-8xl lg:text-left"
                        >
                            <span class="block origin-left text-nowrap lg:scale-90">Lorem ipsum dolor sit</span>
                            <span class="bg-gradient-to-b from-neutral-900 to-neutral-500 bg-clip-text pr-4 text-neutral-600 text-transparent"
                                >Amet consectetur adipisicing elit</span
                            >
                        </h1>
                        <p
                            class="mx-auto mt-5 text-left text-2xl font-normal text-zinc-500 sm:max-w-md sm:text-center lg:ml-0 lg:max-w-md lg:text-left"
                        >
                            Libero officia explicabo numquam eius facere? Aut fuga nam cumque quos, ratione debitis repudiandae modi? Delectus
                            corporis quisquam quasi quibusdam tempora voluptatem.
                        </p>
                    </div>
                    <div class="mt-12 flex w-full items-center justify-center lg:mt-0 lg:w-1/2">
                        <img :src="character" class="relative w-full lg:scale-125 xl:translate-x-6" alt="Tasks Note" style="max-width: 450px" />
                    </div>
                </div>
            </main>
        </div>
        <div class="hidden h-14.5 lg:block"></div>
    </div>
</template>
