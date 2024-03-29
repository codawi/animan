<template>
  <AppHead title="ユーザー情報編集" />
  <section class="bg-slate-50">
    <FlashMessage />
    <div class="container py-32 mx-auto w-80 sm:w-1/2">
      <h1 class="text-xl font-medium text-gray-900">ユーザー情報編集</h1>
      <p v-if="user.id === 5" class="text-red-500">※ゲストユーザーはアカウント情報を編集できません</p>
      <div class="mt-5">
        <div
          v-if="form.hasErrors"
          class="border border-red-100 p-1 m-1 text-sm text-red-600"
        >
          入力された値をもう一度確認してください。
          <ul class="list-disc list-inside">
            <li v-for="error in form.errors" :key="error">{{ error }}</li>
          </ul>
        </div>

        <!-- 通常の方法でログインしていた場合 -->
        <form v-if="user.google_id === null" @submit.prevent="submit">
          <div class="overflow-hidden shadow sm:rounded-md">
            <div class="bg-white px-4 py-5">
              <div class="flex-col">
                <label
                  class="pt-4 block text-sm font-medium text-gray-700"
                  >ユーザー名</label
                >
                <input
                  type="text"
                  v-model="user.name"
                  :disabled="isDisabled"
                  id="name"
                  required
                  class="
                    mt-1
                    block
                    w-full
                    rounded-md
                    border-gray-300
                    shadow-sm
                    focus:border-indigo-500 focus:ring-indigo-500
                    sm:text-sm
                  "
                />

                <label class="pt-4 block text-sm font-medium text-gray-700"
                  >メールアドレス</label
                >
                <input
                  type="email"
                  v-model="user.email"
                  :disabled="isDisabled"
                  required
                  class="
                    mt-1
                    block
                    w-full
                    rounded-md
                    border-gray-300
                    shadow-sm
                    focus:border-indigo-500 focus:ring-indigo-500
                    sm:text-sm
                  "
                />

                <label class="pt-4 block text-sm font-medium text-gray-700"
                  >メールアドレス※確認用</label
                >
                <input
                  type="email"
                  v-model="form.email_confirmation"
                  :disabled="isDisabled"
                  required
                  class="
                    mt-1
                    block
                    w-full
                    rounded-md
                    border-gray-300
                    shadow-sm
                    focus:border-indigo-500 focus:ring-indigo-500
                    sm:text-sm
                  "
                />

                <label class="pt-4 block text-sm font-medium text-gray-700"
                  >現在のパスワード</label
                >
                <input
                  type="password"
                  v-model="form.current_password"
                  :disabled="isDisabled"
                  required
                  class="
                    mt-1
                    block
                    w-full
                    rounded-md
                    border-gray-300
                    shadow-sm
                    focus:border-indigo-500 focus:ring-indigo-500
                    sm:text-sm
                  "
                />

                <label class="pt-4 block text-sm font-medium text-gray-700"
                  >新しいパスワード</label
                >
                <input
                  type="password"
                  v-model="form.new_password"
                  :disabled="isDisabled"
                  required
                  class="
                    mt-1
                    block
                    w-full
                    rounded-md
                    border-gray-300
                    shadow-sm
                    focus:border-indigo-500 focus:ring-indigo-500
                    sm:text-sm
                  "
                />

                <label class="pt-4 block text-sm font-medium text-gray-700"
                  >パスワード※確認用</label
                >
                <input
                  type="password"
                  v-model="form.new_password_confirmation"
                  :disabled="isDisabled"
                  required
                  class="
                    mt-1
                    block
                    w-full
                    rounded-md
                    border-gray-300
                    shadow-sm
                    focus:border-indigo-500 focus:ring-indigo-500
                    sm:text-sm
                  "
                />
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
              <button
                type="submit"
                :disabled="isDisabled"
                class="
                  inline-flex
                  justify-center
                  rounded-md
                  border border-transparent
                  bg-orange-600
                  py-2
                  px-4
                  text-sm
                  font-medium
                  text-white
                  shadow-sm
                  hover:bg-orange-700
                  focus:outline-none
                  focus:ring-2
                  focus:ring-orange-500
                  focus:ring-offset-2
                "
              >
                更新
              </button>
            </div>
          </div>
        </form>

      <!-- googleアカウントでログインしていた場合 -->
        <form v-if="user.google_id" @submit.prevent="googleSubmit">
          <div class="overflow-hidden shadow sm:rounded-md">
            <div class="bg-white px-4 py-5">
              <div class="flex-col">
                <label
                  class="pt-4 block text-sm font-medium text-gray-700"
                  >ユーザー名</label
                >
                <input
                  type="text"
                  v-model="user.name"
                  id="name"
                  required
                  class="
                    mt-1
                    block
                    w-full
                    rounded-md
                    border-gray-300
                    shadow-sm
                    focus:border-indigo-500 focus:ring-indigo-500
                    sm:text-sm
                  "
                />
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                <button
                  type="submit"
                  class="
                    inline-flex
                    justify-center
                    rounded-md
                    border border-transparent
                    bg-orange-600
                    py-2
                    px-4
                    text-sm
                    font-medium
                    text-white
                    shadow-sm
                    hover:bg-orange-700
                    focus:outline-none
                    focus:ring-2
                    focus:ring-orange-500
                    focus:ring-offset-2
                  "
                >
                  更新
                </button>
              </div>
          </div>
        </form>

      </div>
      <DeleteConfirmButton v-if="!user.if === 4" class="mt-24" />
    </div>
  </section>
</template>

<script>
import AppHead from "@/Components/AppHead.vue"
import { Link } from "@inertiajs/inertia-vue3";
import FlashMessage from "@/Components/FlashMessage";
import DeleteConfirmButton from "@/Components/DeleteConfirmButton";

export default {
  components: {
    AppHead,
    Link,
    FlashMessage,
    DeleteConfirmButton,
  },
  props: {
    user: {
      type: Object,
    },
  },
  data() {
    return {
      form: this.$inertia.form({
        name: this.user.name,
        email: this.user.email,
        email_confirmation: null,
        current_password: null,
        new_password: null,
        new_password_confirmation: null,
      }),
      google_form: this.$inertia.form({
        name: this.user.name,
      }),
      isDisabled: false,
    };
  },
  methods: {
    submit() {
      this.form.patch(route("user.update"));
    },
    googleSubmit() {
      this.google_form.patch(route("user.name.update"));
    },
  },
  mounted() {
    // ゲストユーザーならdisabled
    if(this.user.id === 5) {
        this.isDisabled = true;
      }
    }
};
</script>