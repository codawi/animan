<template>
  <Navbar />
  <comicWork :work="work" />
 <!-- レビュー投稿画面 -->
  <ReviewEdit :work="work" :review="review" />
  <Footer />
</template>

<script>
import comicWork from "@/Components/ComicWork";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import ReviewEdit from "@/Components/ReviewEdit";

export default {
  components: {
    comicWork,
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