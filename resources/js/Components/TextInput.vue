<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: {
        type: [String, Number],
        required: true
    },
    placeholder: {
        type: String,
        default: ''
    },
    autocomplete: {
        type: String
    }
});

defineEmits(['update:modelValue']);

const input = ref<HTMLInputElement | null>(null);

onMounted(() => {
    if (input.value?.hasAttribute('autofocus')) {
        input.value?.focus();
    }
});

defineExpose({ focus: () => input.value?.focus() });
</script>

<template>
    <input
        :placeholder="placeholder"
        :autocomplete="autocomplete"
        class="h-10 w-full border border-1 rounded border-gray-300 border-solid bg-white bg-clip-padding text-sm focus:bg-emerald-50 focus:border-emerald-700 focus:ring-0 focus:ring-transparent"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>




