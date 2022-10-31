<template>
  <AppHead :title="`${work.title}のレビュー`" />
  <section class="text-gray-600 body-font bg-slate-50">
  <FlashMessage />
  <AnimeWork v-if="work.category === 'anime'" :work="work" :is_bookmark="is_bookmark" />
  <ComicWork v-else-if="work.category === 'comic'" :work="work" :is_bookmark="is_bookmark" />
  <!-- 認証ユーザーのレビュー表示 -->
  <ReviewShow :review="review" :work="work" />
</section>
</template>

<script>
import AppHead from "@/Components/AppHead";
import AnimeWork from "@/Components/AnimeWork";
import ComicWork from "@/Components/ComicWork";
import ReviewShow from "@/Components/ReviewShow";
import FlashMessage from "@/Components/FlashMessage";

export default {
  components: {
    AppHead,
    AnimeWork,
    ComicWork,
    ReviewShow,
    FlashMessage
  },
  props: {
    work: {
      type: Object,
    },
    review: {
      type: Object,
    },
    is_bookmark: {
      type: Boolean,
    },
  },
};
</script>