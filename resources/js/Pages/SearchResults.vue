<template>
  <Head title="検索結果" />
  <div class="bg-slate-50 text-gray-600 body-font">
    <p class="text-gray-900 body-font underline">
      検索結果 {{ works.total }}件中 {{ works.from }}〜{{ works.to }}件
    </p>
    <h1
      v-if="works.total === 0"
      class="
        text-center
        title-font
        sm:text-4xl
        text-2xl
        font-medium
        my-40
        text-gray-900
      "
    >
      ヒットした作品はありませんでした
    </h1>
    <div class="container px-4 py-8 mx-auto">
      <div
        v-for="(work, key) in works.data"
        :key="key"
        class="
          border-2
          rounded-sm
          border-white border-opacity-50
          bg-white
          flex
          mx-auto
          mb-16
          flex-col
          max-w-2xl
        "
      >
        <div
          class="
            text-left
            flex
            justify-between
            border-b-2
            texet-gray-900
            font-semibold
            items-center-none
          "
        >
        <div class="left ml-1">{{ works.from + key }}</div>
          <div class="right font-medium my-auto text-xs mr-1">
            {{ work.media }}
          </div>
        </div>
        <div
          v-if="work.image !== null"
          class="flex justify-center items-center mx-8 my-4 md:mb-0 max-w-2xl"
        >
          <img
            class="object-cover object-center rounded"
            :src="work.image"
            @error="altImg"
          />
        </div>
        <img
          v-else
          :src="'/img/noimage.png'"
          class="flex justify-center mx-auto mb-4 md:mb-0"
        />
        <p
          v-text="work.title"
          class="
            list-none
            mt-2
            mx-8
            title-font
            text-2xlfont-medium text-gray-900
          "
        ></p>
        <p
          v-text="work.copyright"
          class="mb-4 ml-8 leading-relaxed text-xs"
        ></p>
        <div class="flex mx-auto mb-4">
          <div
            class="
              text-center text-white
              bg-orange-400
              border-0
              py-2
              px-6
              focus:outline-none
              hover:bg-orange-500
              rounded
              text-lg
            "
          >
            <Link
              v-if="work.category === 'anime'"
              :href="route('anime.work', { id: work.id })"
              >詳細</Link
            >
            <Link
              v-if="work.category === 'comic'"
              :href="route('comic.work', { id: work.id })"
              >詳細</Link
            >
          </div>
          <BookmarkButton :work="work" :is_bookmark="is_bookmark[key]" />
        </div>
      </div>
    </div>
    <MoveTop />
    <Pagination
      v-if="works"
      class="flex justify-center pb-4"
      :links="works.links"
    />
  </div>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import BookmarkButton from "@/Components/BookmarkButton";
import Pagination from "@/Components/Pagination";
import MoveTop from "@/Components/MoveTop";

export default {
  components: {
    Head,
    Link,
    BookmarkButton,
    Pagination,
    MoveTop,
  },
  methods: {
    altImg(element) {
      element.target.src = "/img/noimage.png";
    },
  },
  props: {
    works: {
      type: Object,
    },
    is_bookmark: {
      type: [Object, Boolean],
    },
  },
};
</script>