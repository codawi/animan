<template>
  <Navbar />
  <animeWork :work="work" />
  <!-- 認証ユーザーのレビュー表示 -->
  <ReviewShow :review="review" />
  <Footer />
</template>

<script>
import animeWork from "@/Components/AnimeWork";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import ReviewShow from "@/Components/ReviewShow";

export default {
  components: {
    animeWork,
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