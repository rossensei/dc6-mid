<script setup>
import { router } from '@inertiajs/vue3';

const props = defineProps({
    client: Object
})

function viewClient()
{
    router.visit('/clients/view/' + props.client.id);
}
</script>

<template>
    <div class="min-w-[350px] mb-4 mx-2 p-4 bg-white rounded shadow border flex-1 cursor-pointer" @click="viewClient">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white flex items-center">
            {{ client.first_name }} {{ client.last_name }} 
            <!-- <span class="text-xs px-3 py-1 5 bg-green-300 ml-3 rounded-lg">Level {{ client.level }}</span> -->
        </h5>
        <div class="mb-2">
            <p class="font-semibold text-gray-700 text-sm">Address</p>
            <p class="text-sm text-gray-700 font-light">{{ client.address }}</p>
        </div>
        <div class="mb-2">
            <p class="font-semibold text-gray-700 text-sm">Phone</p>
            <p class="text-sm text-gray-700 font-light">{{ client.phone }}</p>
        </div>
        <div>
            <p class="font-semibold text-gray-700 text-sm">Credit Limit</p>
            <p class="text-sm text-gray-700 font-light">{{ client.credit_limit }}</p>
        </div>
    </div>
</template>