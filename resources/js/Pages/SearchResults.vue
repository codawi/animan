<template>
  <Navbar />
    <p class="text-gray-900 body-font underline">検索結果 {{ works.total }}件中 {{ works.from }}〜{{ works.to}}件</p>
    <h1 v-if="works.total === 0" class="text-center title-font sm:text-4xl text-2xl font-medium my-40 text-gray-900">ヒットした作品はありませんでした</h1>
    <div
      v-for="(work, key) in works.data"
      :key="key"
      class="
        container
        flex
        mx-auto
        px-5
        py-24
        md:flex-row
        flex-col
        items-center
      "
    >
      <div
        v-if="work.image !== null"
        class="
          flex
          justify-center
          lg:max-w-lg lg:w-full
          md:w-1/2
          w-5/6
          mb-10
          md:mb-0
        "
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
        class="
          flex
          justify-center
          lg:max-w-lg lg:w-full
          md:w-1/2
          w-5/6
          mb-10
          md:mb-0
        "
      />
      <div
        class="
          lg:flex-grow
          md:w-1/2
          lg:pl-24
          md:pl-16
          flex flex-col
          items-center
          text-center
        "
      >
        <h1
          v-text="work.title"
          class="title-font text-2xl mb-4 font-medium text-gray-900"
        ></h1>
        <p v-text="work.copyright" class="mb-8 leading-relaxed"></p>
        <div class="flex mx-auto">
          <div v-if="work.title === 'anime'">
          <Link
          :href="route('anime.work', { id: work.id })"
            class="
              inline-flex
              text-white
              bg-orange-500
              border-0
              py-2
              px-6
              focus:outline-none
              hover:bg-orange-600
              rounded
              text-lg
            "
            >詳細</Link
          >
        </div>
        <div v-else>
          <Link
          :href="route('comic.work', { id: work.id })"
            class="
              inline-flex
              text-white
              bg-orange-500
              border-0
              py-2
              px-6
              focus:outline-none
              hover:bg-orange-600
              rounded
              text-lg
            "
            >詳細</Link
          >
        </div>
        <BookmarkButton
            :work="work"
            :is_bookmark="is_bookmark[key]"
          />
        </div>
      </div>
    </div>
    <Pagination class="my-8 flex justify-center" :links="works.links" />
  <Footer />
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import BookmarkButton from "@/Components/BookmarkButton";
import Pagination from "@/Components/Pagination";

export default {
  components: {
    Link,
    Navbar,
    Footer,
    BookmarkButton,
    Pagination,
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
      type: [Object,Boolean]
    },
  }
};
</script>