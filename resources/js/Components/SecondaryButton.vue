<script setup>
withDefaults(
    defineProps({
        type: 'button',
    })

);
</script>

<template>
    <button
        :type="type"
        class="box-border inline-block h-10 cursor-pointer whitespace-nowrap rounded border-1 px-4 py-3 text-center text-sm font-medium leading-none outline outline-gray-200 transition-all duration-100 ease-in-out bg-gradient-to-t from-slate-200 to-slate-100 w-full text-black"
    >
        <slot />
    </button>
</template>
