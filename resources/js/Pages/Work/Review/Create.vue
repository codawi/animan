<template>
  <AppHead :title="`${work.title}のレビューをする`" />
  <section class="text-gray-600 body-font bg-slate-50">
  <!-- 作品詳細画面 -->
    <AnimeWork v-if="work.category === 'anime'" :work="work" :is_bookmark="is_bookmark" />
    <ComicWork v-else-if="work.category === 'comic'" :work="work" :is_bookmark="is_bookmark"/>
  <!-- レビュー投稿画面 -->
  <ReviewCreate :work="work" />
  </section>
</template>

<script>
import AppHead from "@/Components/AppHead";
import AnimeWork from "@/Components/AnimeWork";
import ComicWork from "@/Components/ComicWork";
import ReviewCreate from "@/Components/ReviewCreate";

export default {
  components: {
    AppHead,
    AnimeWork,
    ComicWork,
    ReviewCreate,
  },
  props: {
    work: {
      type: Object,
    },
    is_bookmark: {
      type: Boolean,
    },
  },
};
</script>