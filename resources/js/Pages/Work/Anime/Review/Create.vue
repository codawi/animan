<template>
  <Navbar />
  <animeWork :work="work" />
 <!-- レビュー投稿画面 -->
  <ReviewCreate :work="work" />
  <Footer />
</template>

<script>
import animeWork from "@/Components/AnimeWork";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import ReviewCreate from "@/Components/ReviewCreate";

export default {
  components: {
    animeWork,
    Navbar,
    Footer,
    ReviewCreate,
  },
  props: {
    work: {
      type: Object,
    },
  },
};
</script>