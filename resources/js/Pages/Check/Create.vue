<template>
    <BreezeAuthenticatedLayout>
        <div v-if="form.errors">{{ form.errors }}</div>
        <form @submit.prevent="submit">
            <div>
                <div>
                    <BreezeLabel for="name" value="Titless"/>
                    <BreezeInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required
                                 autofocus
                                 autocomplete="title"/>
                    <BreezeLabel for="resource" value="Resource"/>
                    <BreezeInput id="resource" type="text" class="mt-1 block w-full" v-model="form.resource" required
                                 autofocus autocomplete="resource"/>
                    <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Save
                    </BreezeButton>
                </div>
            </div>
        </form>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeInput from '@/Components/Input.vue';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeButton from '@/Components/Button.vue';
import {Head, Link, useForm} from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeInput,
        BreezeLabel,
        BreezeButton,
        Head,
        Link
    },
    setup() {
        const form = useForm({
            title: null,
            resource: null
        });
        return {form};
    },

    methods: {
        submit() {
            this.form.post(route("checks.store"), {
                onSuccess: () => this.form.reset(),
                onError: () => {
                    console.log('hhuu');
                    console.log(this.form.errors)
                }
            })
        }
    }
}

</script>
