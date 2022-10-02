<template>
  <Navbar />
  <AnimeBookmarks v-if="is_bookmark !== null" :works="works" :is_bookmark="is_bookmark" />
  <h1 v-else class="text-center title-font sm:text-4xl text-2xl font-medium my-40 text-gray-900">ブックマークした作品はありません</h1>
  <Footer />
</template>

<script>
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import AnimeBookmarks from "@/Components/AnimeBookmarks";

export default {
  components: {
    Navbar,
    Footer,
    AnimeBookmarks,
  },
  props: {
    works: {
      type: Object,
    },
    is_bookmark: {
      type: Array,
    },
  },
};
</script>