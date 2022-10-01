<template>
  <Navbar />
  <section class="text-gray-600 body-font">
    <p>{{ works.total }}件中</p>
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
        />
      </div>
      <div
        v-else
        :src="'/img/noimage.svg'"
        class="
          flex
          justify-center
          lg:max-w-lg lg:w-full
          md:w-1/2
          w-5/6
          mb-10
          md:mb-0
        "
      ></div>
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
            :href="'/anime/work/' + work.id"
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
            :href="'/comic/work/' + work.id"
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
          <button
            class="
              ml-4
              inline-flex
              text-gray-700
              bg-gray-100
              border-0
              py-2
              px-6
              focus:outline-none
              hover:bg-gray-200
              rounded
              text-lg
            "
          >
            配信サイト
          </button>
          <BookMarkButton :work="work" :is_bookmark="is_bookmark"/>
        </div>
      </div>
    </div>
    <Pagination class="my-8 flex justify-center" :links="works.links" />
  </section>
  <Footer />
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import BookMarkButton from "@/Components/BookMarkButton";
import Pagination from "@/Components/Pagination";

export default {
  components: {
    Link,
    Navbar,
    Footer,
    BookMarkButton,
    Pagination,
  },
  props: {
    works: {
      type: Object,
    },
    is_bookmark: {
      type: [Object,Boolean]
    },
  },
};
</script>