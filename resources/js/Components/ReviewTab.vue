<template>
  <div>
    <button @click="currentComponent = 'ReviewIndex'">トップ</button>
    <button @click="currentComponent = 'ReviewCreate'">レビューする</button>
    <component v-bind:is="currentComponent"></component>
  </div>
</template>

<script>
import ReviewIndex from "@/Components/ReviewIndex";
import ReviewCreate from "@/Components/ReviewCreate";

export default {
  components: {
    ReviewIndex,
    ReviewCreate,
  },
  data() {
    return {
      currentComponent: "ReviewIndex",
    };
  },
};
</script>