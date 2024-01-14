<script setup>
import { ref } from 'vue'
import { router, Head, Link, useForm } from '@inertiajs/vue3';

import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import FormDialogModal from '@/CgsComponents/FormDialogModal.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';



const props = defineProps({
    users: Object,
    roles: Object,
});

//const users = ref(props.users);
const modals = ref({
    'newEmployee' : false,
});
    
const form = useForm({
    id: '',
    firstname: '',
    lastname: '',
    email: '',
    
});
const deleteUser = (myuser) => {
    if(confirm('are you sure')){
        router.delete(route('users.destroy', myuser))}
    };
    
const submit = () => {
    form.post(route('users.store'),{
        preserveScroll: true,
        onSuccess: () => { modals.value.newEmployee = false; }
    }

    );
}
;
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <ApplicationLogo class="block h-12 w-auto" />
            <h1 class="mt-8 text-2xl font-medium text-gray-900">
                Welcome to your Jetstream application!
            </h1>
        </div>
        
        <div class="bg-gray-200 bg-opacity-25 p-6 lg:p-8 divide-y-2">
            <div class="my-8">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"  class="w-6 h-6 stroke-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                    <h2 class="ms-3 text-xl font-semibold text-gray-900">
                        Medewerkers
                    </h2>
                    <button @click.prevent="modals.newEmployee = true" class="flex mx-8 bg-cgs-green  rounded-full text-white opacity-50 hover:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </button>
                </div>
                <div  v-for="user in users" class="flex justify-between mt-4 text-gray-500 text-sm leading-relaxed">
                    <span>{{ user.firstname }}</span> 
                    <span>{{ user.lastname }}</span> 
                    <span>{{ user.id }}</span>
                    <span>{{ user.email }}</span>
                    <span>{{ user.roles[0].name }}</span>
                    <button @click="deleteUser(user.id)" class="font-bold hover:cursor-pointer bg-red-200 hover:bg-red-500 text-white px-4 rounded-full" >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </button>
                </div>  
            </div>     
            
            <div class="pt-8">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                    </svg>

                    <h2 class="ms-3 text-xl font-semibold text-gray-900">
                        Rollen
                    </h2>
                    <button @click.prevent="modals.newEmployee = true" class="flex mx-8 bg-cgs-green  rounded-full text-white opacity-50 hover:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                        
                    </button>
                </div>
                <div  v-for="user in users" class="flex justify-between mt-4 text-gray-500 text-sm leading-relaxed">
                    <span>{{ user.firstname }}</span> <span>{{ user.lastname }}</span> <span>{{ user.id }}</span><span>{{ user.email }}</span><button @click="deleteUser(user.id)" class="font-bold hover:cursor-pointer bg-red-200 hover:bg-red-500 text-white px-4 rounded-full" >DELETE</button>
                </div>     
            </div>
        </div>
    </div>

    <FormDialogModal :show="modals.newEmployee" @submitted="submit" @close="modals.newEmployee = false">
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
                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Registreer
                </PrimaryButton>
            </div>
        </template>
    </FormDialogModal>
</template>
