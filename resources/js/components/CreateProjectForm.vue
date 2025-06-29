<script setup lang="ts">
import { vAutoAnimate } from '@formkit/auto-animate/vue';
import { toTypedSchema } from '@vee-validate/zod';
import { useForm } from 'vee-validate';
import { h } from 'vue';
import * as z from 'zod';

import { Button } from '@/components/ui/button';
import { FormControl, FormField, FormItem, FormLabel, FormMessage } from '@/components/ui/form';
import { Input } from '@/components/ui/input';
import { toast } from 'vue-sonner';

const formSchema = toTypedSchema(
    z.object({
        name: z.string(),
        description: z.string().optional(),
        users: z
            .array(
                z.object({
                    id: z.number(),
                }),
            )
            .optional(),
    }),
);

const { isFieldDirty, handleSubmit } = useForm({
    validationSchema: formSchema,
});

const onSubmit = handleSubmit((values) => {
    // router.post(route('projects.store'), values);
    toast('You submitted the following values:', {
        description: h(
            'pre',
            { class: 'mt-2 w-[340px] rounded-md bg-primary p-4' },
            h('code', { class: 'text-white' }, JSON.stringify(values, null, 2)),
        ),
    });
});
</script>

<template>
    <form class="w-2/3 space-y-6" @submit="onSubmit">
        <FormField v-slot="{ componentField }" name="name" :validate-on-blur="!isFieldDirty">
            <FormItem v-auto-animate>
                <FormLabel>Name</FormLabel>
                <FormControl>
                    <Input type="text" v-bind="componentField" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <FormField v-slot="{ componentField }" name="description" :validate-on-blur="!isFieldDirty">
            <FormItem v-auto-animate>
                <FormLabel>Description</FormLabel>
                <FormControl>
                    <Input type="text" v-bind="componentField" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <Button type="submit"> Submit </Button>
    </form>
</template>
