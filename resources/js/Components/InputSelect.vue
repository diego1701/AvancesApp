<script setup>
import { ref, onMounted } from 'vue';

const model = defineModel({
    type: [String, Number],
    required: true,
});

const select = ref(null);

onMounted(() => {
    if (select.value.hasAttribute('autofocus')) {
        select.value.focus();
    }
});

defineExpose({ focus: () => select.value.focus() });
</script>

<template>
    <select
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        v-model="model"
        ref="select"
    >
        <slot></slot>
    </select>
</template>
