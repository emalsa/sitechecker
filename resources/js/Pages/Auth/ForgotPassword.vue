<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import {Head, useForm} from '@inertiajs/inertia-vue3';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>


<template>
  <BreezeGuestLayout>

    <Head title="Forgot Password"/>


    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
      {{ status }}
    </div>

    <div class="flex items-center justify-center h-screen px-6 bg-gray-200">
      <div class="w-full max-w-sm p-6 bg-white rounded-md shadow-md">
        <div class="flex items-center justify-center">
          <svg></svg>
          <span class="text-2xl font-semibold text-gray-700"></span>
        </div>
        <div class="mb-4 text-sm text-gray-600">
          Forgot your password? No problem. Just let us know your email address and we will email you a password reset
          link that will allow you to choose a new one.
        </div>
        <form class="mt-4" @submit.prevent="submit">


          <div class="mt-4">
            <BreezeLabel class="block mt-3" for="email" value="Email"/>
            <BreezeInput  id="email" type="email" class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500" v-model="form.email" required autofocus
                         autocomplete="username"/>
          </div>

          <div class="mt-6">
            <BreezeButton class="w-full px-4 py-2 text-sm text-center text-white bg-indigo-600 rounded-md focus:outline-none hover:bg-indigo-500" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Email Password Reset Link
            </BreezeButton>
          </div>
        </form>
      </div>
    </div>
  </BreezeGuestLayout>
</template>
