<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const props = defineProps({
    client: Object,
    sales: Array,
})

const totalAmount = computed(() => {
    let sum = 0;
    props.sales.map(obj => sum += obj.amount);

    return sum;
})

</script>

<template>
    <Head :title="client.first_name + ' ' + client.last_name" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">View Client</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white flex items-center">
                            {{ client.first_name }} {{ client.last_name }} 
                        </h5>
                        
                        <div class="flex items-start">
                            <div class="max-w-md">
                                <h4 class="mb-2 text-md font-semibold tracking-tight text-gray-700">Client Details</h4>
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

                            <div class="flex-1 ml-4">
                                <h4 class="text-md font-semibold tracking-tight text-gray-700">Sales Transactions</h4>
                                <table class="table-fixed w-full mt-3">
                                    <thead class="bg-gray-100">
                                        <th class="text-center px-4 py-2">Date</th>
                                        <th class="text-center px-4 py-2">Cash/Credit</th>
                                        <th class="text-center px-4 py-2">Total</th>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b border-gray-200" v-for="sale in sales" :key="sale.id">
                                            <td class="text-center py-2">
                                                {{ sale.date }}
                                            </td>
                                            <td class="text-center py-2">
                                                {{ sale.is_credit ? 'Credit' : 'Cash' }}
                                            </td>
                                            <td class="text-center py-2">
                                                {{ sale.amount }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-end py-2">
                                                Sum:
                                            </td>
                                            <td class="text-center py-2 font-semibold text-xl">
                                                {{ totalAmount }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
