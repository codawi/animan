<template>
  <Navbar />
  <comicWork :work="work" />
  <!-- 認証ユーザーのレビュー表示 -->
  <ReviewShow :review="review" />
  <Footer />
</template>

<script>
import comicWork from "@/Components/ComicWork";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import ReviewShow from "@/Components/ReviewShow";

export default {
  components: {
    comicWork,
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