<template>
  <Navbar />
  <comicWork :work="work" />
  <!-- レビュー投稿画面
  <Review :work="work" /> -->
  <!-- レビュー一覧 -->
  <ReviewIndex :reviews="reviews" />
  <Footer />
</template>

<script>
import comicWork from "@/Components/ComicWork";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import Review from "@/Components/Review";
import ReviewIndex from "@/Components/ReviewIndex";

export default {
  components: {
    comicWork,
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