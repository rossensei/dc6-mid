<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center">
                <Link href="/products" class="inline-flex items-center px-4 py-2 text-sm mr-3 dark:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                  </svg>
                  </Link>
                  <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">Add a New Product</h2>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                

                <div class="bg-white dark:bg-[#1f1f1f] overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4">
                        <h2 class="font-semibold text-lg text-gray-800 dark:text-white leading-tight">Product Details</h2>

                        <div class="flex items-start mt-5">
                            <div class="max-w-md mr-6">
                                <div class="mb-4">
                                    <InputLabel class="dark:text-white" for="product" value="Product name" />
                                    <TextInput 
                                    type="text"
                                    class="mt-1 block w-full"
                                    id="product" />
                                </div>
    
                                <div class="mb-4">
                                    <InputLabel class="dark:text-white" for="brand" value="Brand" />
                                    <TextInput 
                                    type="text"
                                    class="mt-1 block w-full"
                                    id="brand" />
                                </div>
    
                                <div class="mb-4">
                                    <InputLabel class="dark:text-white" for="description" value="Description" />
                                    <textarea id="description" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                                </div>
    
                                <div class="flex items-center justify-between mb-4">
                                    <div class="mr-3">
                                        <InputLabel class="dark:text-white" for="retail_price" value="Retail Price" />
                                        <TextInput 
                                        type="number"
                                        class="mt-1 block w-full"
                                        id="retail_price" />
                                    </div>
                                    <div>
                                        <InputLabel class="dark:text-white" for="qty_stock" value="Quantity Stock" />
                                        <TextInput 
                                        type="number"
                                        class="mt-1 block w-full"
                                        id="qty_stock" />
                                    </div>
                                </div>
    
                                <div class="mb-4">
                                    <InputLabel class="dark:text-white" for="brand" value="Category" />
                                    <select id="brand" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        <option value="" selected>-- Select a category --</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex-1">

                                <p class="block font-medium text-sm text-gray-700 dark:text-white">Add Product Images</p>
                                
                                <div class="flex items-center justify-center max-w-xl">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" />
                                    </label>
                                </div> 
                            </div>
                        </div>

                        <button class="px-4 py-2 text-sm rounded-md bg-gray-500 text-white">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>