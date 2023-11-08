<script setup>
    defineProps(['value'])
</script>

<template>
    <p class="mt-2 text-slate-500">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </p>
</template>
