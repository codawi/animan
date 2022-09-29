<template>
  <Navbar />
  <FlashMessage />
  <AnimeWork v-if="work.category === 'anime'" :work="work" :is_bookmark="is_bookmark" />
  <ComicWork v-else-if="work.category === 'comic'" :work="work" :is_bookmark="is_bookmark" />
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
import FlashMessage from "@/Components/FlashMessage";

export default {
  components: {
    AnimeWork,
    ComicWork,
    Navbar,
    Footer,
    ReviewShow,
    FlashMessage
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