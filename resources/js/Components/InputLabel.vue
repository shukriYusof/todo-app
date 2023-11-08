<script setup>
  defineProps(['value'])
</script>

<template>
    <label class="mb-2 font-medium leading-5">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
