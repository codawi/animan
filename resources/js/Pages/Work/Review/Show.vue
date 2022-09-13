<template>
  <Navbar />
  <AnimeWork v-if="work === 'anime'" :work="work" />
  <ComicWork v-else :work="work" />
  <!-- 認証ユーザーのレビュー表示 -->
  <ReviewShow :review="review" :work="work" />
  <Footer />
</template>

<script>
import AnimeWork from "@/Components/AnimeWork";
import ComicWork from "@/Components/ComicWork";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import ReviewShow from "@/Components/ReviewShow";

export default {
  components: {
    AnimeWork,
    ComicWork,
    Navbar,
    Footer,
    ReviewShow,
  },
  props: {
    work: {
      type: Object,
    },
    review: {
      type: Object,
    },
  },
};
</script>