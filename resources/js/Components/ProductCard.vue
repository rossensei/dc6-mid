<script setup>
defineProps({
    product: Object,
})
</script>

<template>
    <div class="h-[300px] bg-white dark:bg-[#1f1f1f]">
        <div class="h-auto bg-gray-100">
            <img class="object-cover h-[200px] w-full" :src="product.thumbnail" alt="">
        </div>
        <div class="p-2 leading-tight">

            <div class="flex justify-between items-start">
                <h1 class="text-md font-semibold text-gray-700 dark:text-white">{{ product.name }}</h1>
                <p class="text-xl text-red-400 font-semibold">${{ product.retail_price }}.00</p>
            </div>
            <span class="p-2 mt-3 text-xs font-semibold bg-gray-100 dark:bg-gray-600 dark:text-white mb-2">{{ product.category }}</span>
        </div>
    </div>
</template>