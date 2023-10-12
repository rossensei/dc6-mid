<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { inject } from 'vue';


const page = usePage();

defineProps({
    products: Array
})

const isDarkMode = inject('isDarkMode');
</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">All Products</h2>
                <Link 
                v-show="page.props.auth.user.permissions.includes('create')" 
                href="/products/create" 
                class="px-4 py-2 text-sm rounded-md bg-gray-500 text-white"
                >Add Product</Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-4 gap-4">
                    <div class="h-auto bg-white" v-for="product in products" :key="product.id">
                        <div class="h-[150px]">
                            <img class="w-full object-contain" :src="product.thumbnail" alt="">
                        </div>
                        <div class="p-4">

                            <h1 class="text-lg font-semibold text-gray-700">{{ product.name }}</h1>
                            <span class="px-4 py-1.5 mt-3 text-xs font-semibold bg-gray-50 tracking-wide uppercase">{{ product.category }}</span>
                            <p class="text-md font-semibold">{{ product.retail_price }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>