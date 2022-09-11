<template>
  <Navbar />
  <!-- 作品詳細画面 -->
    <AnimeWork v-if="work === 'anime'" :work="work" />
    <ComicWork v-else :work="work"/>
  <!-- レビュー投稿画面 -->
  <ReviewCreate :work="work" />
  <Footer />
</template>

<script>
import AnimeWork from "@/Components/AnimeWork";
import ComicWork from "@/Components/ComicWork";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import ReviewCreate from "@/Components/ReviewCreate";

export default {
  components: {
    AnimeWork,
    ComicWork,
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