<template>
  <AppHead :title="`${work.title}`" />
  <Navbar />
  <div class="bg-slate-50 text-gray-600 body-font">
  <FlashMessage />
  <animeWork v-if="work.category === 'anime'" :work="work" :is_bookmark="is_bookmark"  />
  <ComicWork v-else-if="work.category === 'comic'" :work="work" :is_bookmark="is_bookmark"  />
  <!-- レビュー一覧 -->
  <ReviewIndex :reviews="reviews" />
  </div>
  <Footer />
</template>

<script>
import AppHead from "@/Components/AppHead";
import animeWork from "@/Components/AnimeWork";
import ComicWork from "@/Components/ComicWork";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import ReviewIndex from "@/Components/ReviewIndex";
import FlashMessage from "@/Components/FlashMessage";
import AnimeWork from "@/Components/AnimeWork.vue";

export default {
  components: {
    AppHead,
    animeWork,
    ComicWork,
    Navbar,
    Footer,
    ReviewIndex,
    FlashMessage,
    AnimeWork,
    AppHead
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
    },
  },
};
</script>