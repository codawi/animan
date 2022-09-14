<template>
  <Navbar />
  <AnimeWork v-if="work === 'anime'" :work="work" :is_bookmark="is_bookmark" />
  <ComicWork v-else :work="work" :is_bookmark="is_bookmark" />
  <!-- レビュー投稿画面 -->
  <ReviewEdit :work="work" :review="review" />
  <Footer />
</template>

<script>
import AnimeWork from "@/Components/AnimeWork";
import ComicWork from "@/Components/ComicWork";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import ReviewEdit from "@/Components/ReviewEdit";

export default {
  components: {
    AnimeWork,
    ComicWork,
    Navbar,
    Footer,
    ReviewEdit,
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