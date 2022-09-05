<template>
  <div v-if=" is_bookmark ">
  <button type="button">
    <font-awesome-icon
      icon="fa-solid fa-heart"
      class="text-2xl"
      @click="bookMarkDelete(work.id)"
    />
  </button>
</div>
<div v-else>
  <button type="button">
    <font-awesome-icon
      icon="fa-regular fa-heart"
      class="text-2xl"
      @click="bookMarkStore(work.id)"
    />
  </button>
</div>
</template>

<script>
export default {
  props: {
    work: {
      type: Object,
    },
    is_bookmark: {
      type: Boolean,
    },
  },
  methods: {
    bookMarkStore() {
      this.$inertia.post(route("bookmark.store", this.work.id))
    },
    bookMarkDelete() {
      this.$inertia.delete(route('bookmark.delete', this.work.id))
    }
  },
};
</script>