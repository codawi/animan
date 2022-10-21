<script setup>
import { computed } from 'vue';
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    status: String,
});

const form = useForm();

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Email Verification" />

        <div class="mb-4 text-sm text-gray-600">
            登録時に入力されたメールアドレスへお送りした、確認メールのリンクへアクセスして本登録を完了してください。<br>
            メールが届いていない場合は下記のリンクをクリックすると再度確認メールが送信されます。
        </div>

        <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent" >
            登録時に入力されたメールアドレス宛に、確認メールを送信しました。
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    認証メールを再送信する
                </BreezeButton>

                <Link :href="route('logout')" method="post" as="button" class="underline text-sm text-gray-600 hover:text-gray-900">ログアウト</Link>
            </div>
        </form>
    </BreezeGuestLayout>
</template>
