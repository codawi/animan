<template>
  <AppHead title="ランキング"/>
  <Ranking
    v-if="period === 'daily'"
    :works="works"
    :is_bookmark="is_bookmark"
    :period="period"
    :category="category"
    >日間ランキング</Ranking
  >
  <Ranking
    v-if="period === 'weekly'"
    :works="works"
    :is_bookmark="is_bookmark"
    :period="period"
    :category="category"
    >週間ランキング</Ranking
  >
  <Ranking
    v-if="period === 'monthly'"
    :works="works"
    :is_bookmark="is_bookmark"
    :period="period"
    :category="category"
    >月間ランキング</Ranking
  >
</template>
  
<script>
import AppHead from "@/Components/AppHead"
import Ranking from "@/Components/Ranking";

export default {
  components: {
    AppHead,
    Ranking,
    AppHead
},
  props: {
    works: {
      type: Object,
    },
    is_bookmark: {
      type: Object,
    },
    period: {
      type: String,
    },
    category: {
      type: String,
    },
  },
};
</script>