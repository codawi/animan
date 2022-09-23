<template>
  <Navbar />
  <div class="container py-32 mx-auto w-80 sm:w-1/2">
    <h1 class="text-xl font-medium text-gray-900">ユーザー情報編集</h1>
    <div class="mt-5">
      <form action="#" method="POST">
        <div class="overflow-hidden shadow sm:rounded-md">
          <div class="bg-white px-4 py-5">
            <div class="flex-col">
              <label
                for="first-name"
                class="pt-4 block text-sm font-medium text-gray-700"
                >ユーザー名</label
              >
              <input
                type="text"
                name="first-name"
                id="first-name"
                autocomplete="given-name"
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

              <label
                for="email-address"
                class="pt-4 block text-sm font-medium text-gray-700"
                >メールアドレス</label
              >
              <input
                type="text"
                name="street-address"
                id="street-address"
                autocomplete="street-address"
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

              <label
                for="email-address"
                class="pt-4 block text-sm font-medium text-gray-700"
                >メールアドレス※確認用</label
              >
              <input
                type="text"
                name="street-address"
                id="street-address"
                autocomplete="street-address"
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

              <label
                for="country"
                class="pt-4 block text-sm font-medium text-gray-700"
                >パスワード</label
              >
              <input
                type="text"
                name="email-address"
                id="email-address"
                autocomplete="email"
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

              <label
                for="street-address"
                class="pt-4 block text-sm font-medium text-gray-700"
                >パスワード※確認用</label
              >
              <input
                type="text"
                name="email-address"
                id="email-address"
                autocomplete="email"
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
  </div>
  <Footer />
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
export default {
  components: {
    Link,
    Navbar,
    Footer,
  },
  props: {
    user: {
      type: Object,
    },
  },
};
</script>