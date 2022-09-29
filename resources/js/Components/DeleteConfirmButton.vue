<template>
  <div class="container mx-auto">
    <div class="flex justify-center">
      <button
        @click="isOpen = true"
        class="flex
                  mx-auto
                  text-white
                  bg-red-500
                  border-0
                  py-2
                  px-8
                  focus:outline-none
                  hover:bg-red-600
                  rounded
                  text-lg"
        type="button"
      >
      <slot name="button">
        アカウントを削除
      </slot>
      </button>

      <div
        v-show="isOpen"
        class="
          absolute
          inset-0
          flex
          items-center
          justify-center
          bg-gray-700 bg-opacity-50
        "
      >
        <div class="max-w-2xl p-6 bg-white rounded-md shadow-xl">
          <div class="flex items-center justify-between">
            <h3 class="text-2xl"><slot  name="confirm">アカウントを削除してもよろしいですか？</slot></h3>
          </div>
          <div class="mt-4">
            <p class="mb-4 text-sm">
              <slot name="confirmText">
              「削除する」のボタンを押すとアカウントが削除されます
            </slot>
            </p>
            <button
              @click="isOpen = false"
              class="px-4 py-2 text-blue-800 border border-blue-500 rounded"
            >
              キャンセル
            </button>
            <slot name="link">
            <Link :href="route('user.delete')" method="delete" as="button" class="px-4 py-2 ml-8 text-blue-100 bg-red-500 rounded">
              削除する
            </Link>
          </slot>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Link,
  },
  data() {
    return {
      isOpen: false,
    };
  },
};
</script>