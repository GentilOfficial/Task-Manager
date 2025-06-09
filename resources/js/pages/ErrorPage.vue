<script setup>
import { Button } from '@/components/ui/button';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Home } from 'lucide-vue-next';
import { computed } from 'vue';

const props = defineProps({ status: Number });

const title = computed(() => {
    return {
        401: '401: Unauthorized',
        402: '402: Payment Required',
        403: '403: Forbidden',
        404: '404: Page Not Found',
        429: '429: Too Many Requests',
        500: '500: Server Error',
        503: '503: Service Unavailable',
    }[props.status];
});

const description = computed(() => {
    return {
        401: 'Sorry, you are not authorized to access this page.',
        402: 'Payment is required to access this page.',
        403: 'Sorry, you do not have permission to access this page.',
        404: 'Sorry, the page you are looking for could not be found.',
        429: 'Too many requests. Please try again later.',
        500: 'Sorry, there was an error on the server.',
        503: 'Service is currently unavailable. Please try again later.',
    }[props.status];
});
</script>

<template>
    <AuthBase :title="title" :description="description">
        <Head :title="title" />
        <div class="flex items-center justify-center gap-4">
            <Link :href="route('dashboard')">
                <Button size="sm" class="hover:cursor-pointer"> <Home class="mr-2 size-4" /> Go to Homepage </Button>
            </Link>
        </div>
    </AuthBase>
</template>
