<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ProductCard from '@/Components/ProductCard.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { ref, computed, toRef, provide } from 'vue';


const page = usePage();

const props = defineProps({
    products: Array,
    isDarkMode: Boolean
})

const message = ref('This is a shared data.');

provide('data', message)
</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl leading-tight dark:text-white">All Products</h2>
                <Link 
                v-show="page.props.auth.user.permissions.includes('create')" 
                href="/products/create" 
                class="px-4 py-2 text-sm rounded-md bg-gray-500 dark:bg-indigo-600 text-white"
                >Add Product</Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-4 gap-4">
                    <ProductCard  v-for="product in products" :key="product.id" :product="product" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>