<template>
    <main class="grid place-items-center min-h-screen">
        <section
            class="max-w-md mx-auto rounded-xl border border-gray-300 py-6 px-4 bg-gray-100"
        >
            <Head title="Login" />
            <h1 class="text-3xl">Login</h1>

            <form @submit.prevent="submit()" class="mt-8 w-96">
                <div class="mb-6">
                    <label
                        for="email"
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Email
                    </label>
                    <input
                        type="email"
                        class="border border-gray-400 p-2 w-full"
                        name="email"
                        id="email"
                        v-model="form.email"
                    />
                    <div
                        v-if="form.errors.email"
                        v-text="form.errors.email"
                        class="text-sm text-red-500 mt-1"
                    ></div>
                </div>
                <div class="mb-6">
                    <label
                        for="password"
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Password
                    </label>
                    <input
                        type="password"
                        class="border border-gray-400 p-2 w-full"
                        name="password"
                        id="password"
                        v-model="form.password"
                    />
                    <div
                        v-if="form.errors.password"
                        v-text="form.errors.password"
                        class="text-sm text-red-500 mt-1"
                    ></div>
                </div>
                <div class="mb-6">
                    <button
                        type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                        :disabled="form.processing"
                    >
                        Login
                    </button>
                </div>
            </form>
        </section>
    </main>
</template>
<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

defineProps({ errors: Object });

let form = useForm({
    email: "",
    password: "",
});

let submit = () => {
    form.post("/login");
};
</script>
