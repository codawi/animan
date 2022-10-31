<template>
  <AppHead title="マイページ" />
  <section class="text-gray-600 body-font bg-slate-50">
    <div class="container px-5 py-24 mx-auto flex flex-col items-center">
      <h1 class="text-3xl font-medium text-gray-900 pb-8">
        {{ user.name }}さんのマイページ
      </h1>
      <div class="p-4 md:w-1/2 w-full">
        <div
          class="
            bg-white
            flex
            border-2
            rounded-lg
            border-gray-200 border-opacity-50
            py-8
            px-4
            mb-8
          "
        >
          <div
            class="
              w-16
              h-16
              mr-8
              mb-4
              inline-flex
              items-center
              justify-center
              rounded-full
              bg-indigo-100
              text-pink-500
              fa-2x
              flex-shrink-0
            "
          >
            <font-awesome-icon icon="fa-solid fa-heart" />
          </div>
          <div class="flex-col">
            <h2 class="text-gray-900 text-lg title-font font-medium mb-6 flex">
              ブックマーク作品一覧
            </h2>
            <div class="flex-row">
              <Link
                :href="route('bookmark.anime')"
                class="
                  text-white
                  bg-orange-400
                  px-3
                  py-2
                  border-0
                  focus:outline-none
                  transition-colors
                  duration-200
                  transform
                  rounded
                  dark:text-gray-200
                  hover:bg-orange-500 hover:text-gray-100
                "
              >
                アニメ
              </Link>
              <Link
                :href="route('bookmark.comic')"
                class="
                  text-white
                  bg-orange-400
                  px-3
                  py-2
                  ml-2
                  border-0
                  focus:outline-none
                  transition-colors
                  duration-200
                  transform
                  rounded
                  dark:text-gray-200
                  hover:bg-orange-500 hover:text-gray-100
                "
              >
                漫画
              </Link>
            </div>
          </div>
        </div>
      </div>
      <div class="p-4 md:w-1/2 w-full">
        <Link
          :href="route('user.edit')"
          class="
            flex
            bg-white
            border-2
            rounded-lg
            border-gray-200 border-opacity-50
            p-8
          "
        >
          <div
            class="
              w-16
              h-16
              mr-8
              mb-4
              inline-flex
              items-center
              justify-center
              rounded-full
              bg-indigo-100
              text-indigo-500
              fa-2x
              flex-shrink-0
            "
          >
            <font-awesome-icon icon="fa-solid fa-user-gear" />
          </div>
          <h2
            class="
              text-gray-900 text-lg
              title-font
              font-medium
              mb-3
              flex
              items-center
            "
          >
            アカウント情報
          </h2>
        </Link>
      </div>
    </div>
  </section>
</template>

<script>
import AppHead from '@/Components/AppHead';
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    AppHead,
    Link,
  },
  props: {
    user: {
      type: Object,
    },
  },
};
</script>