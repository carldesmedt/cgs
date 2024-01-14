<script setup>
import FormDialogModal from '@/CgsComponents/FormDialogModal.vue';
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    users: Object,
    roles: Object,
    showModal: Object,
})


const form = useForm({
    user_id: '',
    role_id: '',
});

const submit = () => {
    form.post(route('relations.user-role'),{
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
            <div class="flex items-center justify-between">
                <div>
                    <InputLabel for="employee" value="Medewerker" />
                    <select v-model="form.user_id" id="employee">
                        <option v-for="user in props.users" :value="user.id">{{ user.firstname }} {{ user.lastname }}</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.user_id" />
                </div>
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </div>
                <div>
                    <InputLabel for="role" value="Rol/functie" />
                    <select v-model="form.role_id">
                        <option v-for="role in props.roles" :value="role.id">{{ role.name }} </option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.user_id" />
                </div>
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