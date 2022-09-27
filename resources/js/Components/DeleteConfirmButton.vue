<template>
  <div class="container mx-auto">
    <div class="flex justify-center">
      <button
        @click="isOpen = true"
        class="px-4 py-2 text-white bg-red-500 rounded shadow"
        type="button"
      >
        アカウントを削除
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
            <h3 class="text-2xl">アカウントを削除してもよろしいですか？</h3>
          </div>
          <div class="mt-4">
            <p class="mb-4 text-sm">
              「削除する」のボタンを押すとアカウントが削除されます
            </p>
            <button
              @click="isOpen = false"
              class="px-4 py-2 text-blue-800 border border-blue-500 rounded"
            >
              キャンセル
            </button>
            <Link :href="route('user.delete')" method="delete" class="px-4 py-2 ml-8 text-blue-100 bg-red-500 rounded">
              削除する
            </Link>
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