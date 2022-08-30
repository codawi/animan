<template>
  <Navbar />
  <animeWork :work="work" />
 <!-- レビュー投稿画面 -->
  <ReviewEdit :work="work" :review="review" />
  <Footer />
</template>

<script>
import animeWork from "@/Components/AnimeWork";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import ReviewEdit from "@/Components/ReviewEdit";

export default {
  components: {
    animeWork,
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
  },
};
</script>