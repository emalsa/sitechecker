<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  terms: false,
});

const submit = () => {
  form.post(route('register'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  });
};
</script>
<template>
  <BreezeGuestLayout>

    <Head title="Register"/>

    <BreezeValidationErrors class="mb-4"/>

    <div class="flex items-center justify-center h-screen px-6 bg-gray-200">
      <div class="w-full max-w-sm p-6 bg-white rounded-md shadow-md">
        <div class="flex items-center justify-center">
          <svg></svg>
          <span class="text-2xl font-semibold text-gray-700"></span>
        </div>

        <form class="mt-4" @submit.prevent="submit">

          <div class="block mt-3">
            <BreezeLabel class="block mt-3" for="name" value="Name"/>
            <BreezeInput id="name" type="text" class="block w-full mt-1 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500" v-model="form.name" required autofocus
                         autocomplete="name"/>
          </div>

          <div class="block mt-3">
            <BreezeLabel class="block mt-3" for="email" value="Email"/>
            <BreezeInput id="email" type="email" class="block w-full mt-1 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500" v-model="form.email" required
                         autocomplete="username"/>
          </div>
          <div class="block mt-3">
            <BreezeLabel class="block mt-3" for="password" value="Password"/>
            <BreezeInput id="password" type="password" class="block w-full mt-1 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500" v-model="form.password" required
                         autocomplete="new-password"/>
          </div>

          <div class="block mt-3">
            <BreezeLabel class="block mt-3" for="password_confirmation" value="Confirm Password"/>
            <BreezeInput id="password_confirmation" type="password" class="block w-full mt-1 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                         v-model="form.password_confirmation" required autocomplete="new-password"/>
          </div>

          <div class="flex items-center justify-between mt-4">
            <div>
              <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">Already
                registered?
              </Link>
            </div>
          </div>

          <div class="mt-6">
            <BreezeButton
                class="w-full px-4 py-2 text-sm text-center text-white bg-indigo-600 rounded-md focus:outline-none hover:bg-indigo-500"
                :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Register
            </BreezeButton>

          </div>
        </form>
      </div>
    </div>
  </BreezeGuestLayout>
</template>
