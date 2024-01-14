<script setup>
import FormDialogModal from '@/CgsComponents/FormDialogModal.vue';
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    showModal: Object,
})


const form = useForm({
    name: '',
    description: '',
});

const submit = () => {
    form.post(route('roles.store'),{
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
}
</script>

<template>
    <FormDialogModal :show="props.showModal" @submitted="submit" >
        <template #title>
            Nieuwe rol / functie toevoegen
        </template>
        <template #content>
            <div>
                <InputLabel for="name" value="Naam functie" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="description" value="Beschrijving" />
                <TextInput
                    id="description"
                    v-model="form.description"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                />
                <InputError class="mt-2" :message="form.errors.description" />
            </div>
        </template>
        <template #footer>
            <div class="flex items-center justify-end mt-4">
                <ActionMessage :on="form.recentlySuccessful" class="me-3">
                    Saved.
                </ActionMessage>
                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Registreer
                </PrimaryButton>
            </div>
        </template>
    </FormDialogModal>
</template>