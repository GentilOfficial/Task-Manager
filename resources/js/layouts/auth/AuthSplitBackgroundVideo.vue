<script setup lang="ts">
const videoSrc = `/backgrounds/auth-split-background-video.webm`;
const posterSrc = `/backgrounds/auth-split-background-poster.webp`;
</script>

<template>
  <video
    class="absolute inset-0 h-full w-full object-cover bg-black animate animate-in fade-in duration-500"
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
