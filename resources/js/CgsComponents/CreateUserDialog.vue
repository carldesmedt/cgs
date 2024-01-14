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
    id: '',
    firstname: '',
    lastname: '',
    email: '',
});

const submit = () => {
    form.post(route('users.store'),{
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
}
</script>

<template>
    <FormDialogModal :show="props.showModal" @submitted="submit" >
        <template #title>
            Nieuwe medewerker toevoegen
        </template>
        <template #content>
            <div>
                <InputLabel for="firstname" value="Voornaam" />
                <TextInput
                    id="firstname"
                    v-model="form.firstname"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="firstname"
                />
                <InputError class="mt-2" :message="form.errors.firstname" />
            </div>

            <div class="mt-4">
                <InputLabel for="lastname" value="Familienaam" />
                <TextInput
                    id="lastname"
                    v-model="form.lastname"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="lastname"
                />
                <InputError class="mt-2" :message="form.errors.lastname" />
            </div>

            <div class="mt-4">
                <InputLabel for="emplyee_id" value="Personeelsnummer" />
                <TextInput
                    id="id"
                    v-model="form.id"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="id"
                />
                <InputError class="mt-2" :message="form.errors.id" />
            </div>
            
            <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
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