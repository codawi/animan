<template>
  <Navbar />
  <Ranking v-if="period === 'daily'" :works="works" :is_bookmark="is_bookmark" :period="period" :category="category">日間ランキング</Ranking>
  <Ranking v-if="period === 'weekly'" :works="works" :is_bookmark="is_bookmark" :period="period" :category="category">週間ランキング</Ranking>
  <Ranking v-if="period === 'monthly'" :works="works" :is_bookmark="is_bookmark" :period="period" :category="category">月間ランキング</Ranking>
  <Footer />
</template>
  
  <script>
import Ranking from "@/Components/Ranking";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";

export default {
  components: {
    Ranking,
    Navbar,
    Footer,
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
    }
  },
};
</script>