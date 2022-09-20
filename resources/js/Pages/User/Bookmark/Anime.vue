<template>
  <Navbar />
  <Bookmarks :works="works" :is_bookmark="is_bookmark" />
  <Footer />
</template>

<script>
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import Bookmarks from "@/Components/Bookmarks";

export default {
  components: {
    Navbar,
    Footer,
    Bookmarks,
  },
  props: {
    works: {
      type: Object,
    },
    is_bookmark: {
      type: Object,
    },
  },
};
</script>