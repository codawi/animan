<template>
  <Navbar />
  <comicWork :work="work" />
 <!-- レビュー投稿画面 -->
  <ReviewCreate :work="work" />
  <Footer />
</template>

<script>
import comicWork from "@/Components/ComicWork";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import ReviewCreate from "@/Components/ReviewCreate";

export default {
  components: {
    comicWork,
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