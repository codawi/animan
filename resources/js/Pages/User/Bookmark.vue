<template>
  <AppHead title="ブックマーク" />
  <MoveTop />
  <Bookmarks v-if="is_bookmark !== null" :works="works" :is_bookmark="is_bookmark">
  <div v-if="category === 'anime'">ブックマークした作品（アニメ）</div>
  <div v-if="category === 'comic'">ブックマークした作品（漫画）</div>
  </Bookmarks>
  <h1 v-else class="text-center title-font sm:text-4xl text-2xl font-medium my-40 text-gray-900">ブックマークした作品はありません</h1>
</template>

<script>
import AppHead from "@/Components/AppHead";
import Bookmarks from "@/Components/Bookmarks";
import MoveTop from "@/Components/MoveTop";

export default {
  components: {
    AppHead,
    Bookmarks,
    MoveTop,
},
  props: {
    works: {
      type: Object,
    },
    is_bookmark: {
      type: Array,
    },
    category: {
      type: String,
    }
  },
};
</script>