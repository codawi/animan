<template>
  <Navbar />
  <animeWork v-if="work === 'anime'" :work="work" :is_bookmark="is_bookmark" />
  <ComicWork v-else :work="work" :is_bookmark="is_bookmark" />
  <!-- レビュー一覧 -->
  <ReviewIndex :reviews="reviews" />
  <Footer />
</template>

<script>
import animeWork from "@/Components/AnimeWork";
import ComicWork from "@/Components/ComicWork";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import ReviewIndex from "@/Components/ReviewIndex";

export default {
  components: {
    animeWork,
    ComicWork,
    Navbar,
    Footer,
    ReviewIndex,
  },
  props: {
    work: {
      type: Object,
    },
    reviews: {
      type: Object,
    },
    is_bookmark: {
      type: Boolean,
    }
  },
};
</script>