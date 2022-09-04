<template>
  <button type="button">
    <font-awesome-icon
      icon="fa-regular fa-heart"
      class="text-2xl"
      @click="bookMarkStore(work.id)"
    />
  </button>
</template>

<script>
export default {
  props: {
    work: {
      type: Object,
    },
  },
  methods: {
    bookMarkStore() {
      this.$inertia.post(route("bookmark.store", this.work.id));
    },
  },
};
</script>