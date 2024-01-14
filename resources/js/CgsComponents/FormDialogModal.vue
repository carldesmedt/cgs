<script setup>
import Modal from '@/Components/Modal.vue';

const emit = defineEmits(['close', 'submitted']);

defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    maxWidth: {
        type: String,
        default: '2xl',
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const close = () => {
    emit('close');
};
</script>

<template>
    <Modal
        :show="show"
        :max-width="maxWidth"
        :closeable="closeable"
        @close="close"
    >
        <div >
            <form @submit.prevent="$emit('submitted')">
                <div class="flex justify-between px-6 py-4 border-b-2 text-2xl text-cgs-green font-black  underline-offset-8 bg-gray-100">
                    <slot name="title" />
                    <div class="hover:cursor-pointer" @click="close">x</div>
                </div>

                <div class="px-6 py-4 text-sm text-gray-600">
                    <slot name="content" />
                </div>
                <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-end">
                    <slot name="footer" />
                </div>
            </form>
        </div>

        
    </Modal>
</template>
