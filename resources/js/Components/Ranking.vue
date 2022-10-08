<template>
  <Navbar />
  <h1>
    <slot></slot>
  </h1>
  <section class="text-gray-600 body-font">
    <div
      v-for="(work, key) in works"
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
        <p class="texet-gray-900 font-semibold bg-orange-400 p-1.5">
          {{ key + 1 }}位
        </p>
        <div
          v-if="work.image !== null"
          class="
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
        <li
          v-text="work.title"
          class="list-none title-font text-2xl mb-4 font-medium text-gray-900"
        ></li>
        <p v-text="work.copyright" class="mb-8 leading-relaxed"></p>
        <div class="flex mx-auto">
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
          <BookmarkButton :work="work" :is_bookmark="is_bookmark[key]" />
        </div>
      </div>
    </div>
  </section>
  <Footer />
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import BookmarkButton from "@/Components/BookmarkButton";

export default {
  components: {
    Link,
    Navbar,
    Footer,
    BookmarkButton,
  },
  props: {
    works: {
      type: Object,
    },
    is_bookmark: {
      type: Object,
    },
  },
  methods: {
    altImg(element) {
      element.target.src = "/img/noimage.png";
    },
  },
};
</script>