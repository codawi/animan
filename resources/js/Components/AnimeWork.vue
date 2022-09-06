<template>
  <section class="text-gray-600 body-font">
    <div
      class="
        container
        mx-auto
        flex
        px-5
        py-20
        items-center
        justify-center
        flex-col
      "
    >
      <div v-if="work.image !== null">
        <img
        :src="work.image"
        class="w-5/6 mb-10 mx-auto object-cover object-center rounded"
        />
      </div>
      <img
      v-else
      :src="'/img/noimage.svg'"
        class="w-5/6 mb-10 mx-auto object-cover object-center rounded"
      />
      <div class="text-center lg:w-2/3 w-full">
        <h1
          v-text="work.title"
          class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900"
        ></h1>
        <p v-text="work.copyright" class="mb-8 leading-relaxed"></p>
        <div class="flex">
          <button
            class="
              text-white
              bg-orange-500
              border-0
              py-2
              px-4
              focus:outline-none
              hover:bg-orange-600
              rounded
              text-sm
            "
          >
            レビュー一覧
          </button>
          <Link
            :href="'/comic/work/' + work.id + '/review/create'"
            class="
              text-white
              bg-orange-500
              border-0
              py-2
              px-4
              focus:outline-none
              hover:bg-orange-600
              rounded
              text-sm
            "
          >
            レビュー
          </Link>
          <button
            class="
              text-gray-700
              bg-gray-100
              border-0
              py-2
              px-4
              focus:outline-none
              hover:bg-gray-200
              rounded
              text-sm
            "
          >
            配信サイト
          </button>
        <BookMarkButton :work="work" :is_bookmark="is_bookmark" />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import BookMarkButton from "@/Components/BookMarkButton";
export default {
  components: {
    Link,
    BookMarkButton,
  },
  props: {
    work: {
      type: Object,
    },
    is_bookmark: {
      type: Boolean,
    }
  },
};
</script>