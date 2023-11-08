<script setup>

const { width } = defineProps({
    width: {
        type: String,
        default: 'w-full'
    }
})
</script>
<template>
    <button
        class="box-border inline-block h-10 cursor-pointer whitespace-nowrap rounded border-1 px-4 py-3 text-center text-sm font-medium leading-none outline transition-all duration-100 ease-in-out bg-gradient-to-t from-emerald-700 to-emerald-600 text-white"
        :class="width"
    >
        <slot />
    </button>
</template>
