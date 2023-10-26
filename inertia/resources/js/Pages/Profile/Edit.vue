<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import App from '@/Layouts/App.vue';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile" />
    <App></App>
    <AuthenticatedLayout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>
        </template> -->

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                        class="max-w-xl"
                    />
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <UpdatePasswordForm class="max-w-xl" />
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <DeleteUserForm class="max-w-xl" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
    <div class="back-button">
    <button class="back" onclick="history.back(-1);">＜戻る</button>
  </div>
</template>
<style scoped>
.back-button {
  width: 100%;
  height: 10vh;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 1rem 0 2rem 0;
}
.back {
  width: 20%;
  height: 10vh;
  color: #002b5b;
  font-size: 1.4rem;
  background-color: #e4dccf;
  border-radius: 20px;
  border: 2px solid #e4dccf;
}
.back:hover {
  transition: all 0.5s linear;
  transform: translateY(-10px);
  box-shadow: 9px 9px 10px #aaa;
}
</style>