<script setup lang="ts">
const videoSrc = `/backgrounds/auth-split-background-video.webm`;
const posterSrc = `/backgrounds/auth-split-background-poster.webp`;
</script>

<template>
    <video
        class="animate animate-in fade-in absolute inset-0 h-full w-full bg-black object-cover duration-500"
        autoplay
        muted
        loop
        playsinline
        preload="auto"
        :poster="posterSrc"
        aria-hidden="true"
    >
        <source :src="videoSrc" type="video/webm" />
    </video>
</template>
