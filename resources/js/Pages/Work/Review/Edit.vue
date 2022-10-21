<template>
  <Navbar />
  <section class="text-gray-600 body-font bg-slate-50">
  <FlashMessage />
  <AnimeWork v-if="work.category === 'anime'" :work="work" :is_bookmark="is_bookmark" />
  <ComicWork v-else-if="work.category === 'comic'" :work="work" :is_bookmark="is_bookmark" />
  <!-- レビュー投稿画面 -->
  <ReviewEdit :work="work" :review="review" />
</section>
  <Footer />
</template>

<script>
import AnimeWork from "@/Components/AnimeWork";
import ComicWork from "@/Components/ComicWork";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import ReviewEdit from "@/Components/ReviewEdit";
import FlashMessage from "@/Components/FlashMessage";

export default {
  components: {
    AnimeWork,
    ComicWork,
    Navbar,
    Footer,
    ReviewEdit,
    FlashMessage,
  },
  props: {
    work: {
      type: Object,
    },
    review: {
      type: Object,
    },
    is_bookmark: {
      type: Boolean,
    },
  },
};
</script>