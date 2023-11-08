<script setup>
import { computed } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps(['checked', 'value', 'label']);

const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(val) {
        emit('update:checked', val);
    },
});
</script>

<template>
     <div class="flex items-start">
        <div class="flex items-center h-5">
            <input
                :value="value"
                v-model="proxyChecked"
                type="checkbox"
                class="bg-white border-gray-300 focus:ring-0 focus:ring-transparent focus:border-emerald-700 h-5 w-5 rounded">
        </div>
        <div class="text-sm ml-3">
            <label v-if="label" for="remember" class="font-medium text-gray-900">{{ label }}</label>
            <span v-else><slot /></span>

        </div>
    </div>
</template>
