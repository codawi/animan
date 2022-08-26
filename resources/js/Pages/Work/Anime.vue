<template>
  <Navbar />
  <animeWork :work="work" />
  <!-- レビュー投稿画面
  <Review :work="work" /> -->
  <!-- レビュー一覧 -->
  <ReviewIndex :reviews="reviews" />
  <Footer />
</template>

<script>
import animeWork from "@/Components/AnimeWork";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import Review from "@/Components/Review";
import ReviewIndex from "@/Components/ReviewIndex";

export default {
  components: {
    animeWork,
    Navbar,
    Footer,
    Review,
    ReviewIndex,
  },
  props: {
    work: {
      type: Object,
    },
    reviews: {
      type: Object,
    },
  },
};
</script>