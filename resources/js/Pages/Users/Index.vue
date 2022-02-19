<template>
    <Head>
        <title>Users</title>
    </Head>
    <div class="flex justify-between">
        <div class="flex items-center">
            <h1 class="text-2xl font-bold">Users</h1>
            <Link
                href="/users/create"
                v-if="can.create_user"
                class="text-blue-300 ml-2 text-sm mt-1"
                >New User</Link
            >
        </div>
        <input
            type="text"
            name="search"
            placeholder="Search..."
            class="border border-gray-200 border-2 focus:border-blue-500 p-1 pl-2 rounded-full outline-none"
            v-model="search"
        />
    </div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div
                class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"
            >
                <div
                    class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
                >
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="user in users.data" :key="user.id">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div>
                                            <div
                                                class="text-sm font-medium text-gray-900"
                                            >
                                                {{ user.name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ user.email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                                >
                                    <Link
                                    v-if="user.editable"
                                        :href="`/user/${user.id}/edit`"
                                        class="text-indigo-600 hover:text-indigo-900"
                                        >Edit</Link
                                    >
                                </td>
                            </tr>

                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <pagination class="mt-6" :links="users.links" />
</template>

<script setup>
import Pagination from "../../Shared/Pagination.vue";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import throttle from "lodash/throttle";
let props = defineProps({ users: Object, filters: Object ,can : Object});
let search = ref(props.filters.search);

watch(
    search,
    throttle((value) => {
        Inertia.get(
            "/users",
            { search: value },
            {
                preserveState: true,
                replace: true,
            }
        );
    }, 500)
);
</script>

<style></style>
