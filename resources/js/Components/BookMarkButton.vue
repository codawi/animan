<template>
  <div class="text-2xl my-auto px-4">
  <div v-if=" is_bookmark ">
  <button type="button">
    <font-awesome-icon
      icon="fa-solid fa-heart"
      class="text-pink-500"
      @click="bookMarkDelete(work.id)"
    />
  </button>
</div>
<div v-else>
  <button type="button">
    <font-awesome-icon
      icon="fa-regular fa-heart"
      @click="bookMarkStore(work.id)"
    />
  </button>
</div>
</div>
</template>

<script>
export default {
  props: {
    work: {
      type: Object
    },
    is_bookmark: {
      type: [Boolean, Object]
    },
  },
  methods: {
    bookMarkStore() {
      this.$inertia.post(route("bookmark.store", this.work.id), {
        preserveScroll: true,
      })
    },
    bookMarkDelete() {
      this.$inertia.delete(route('bookmark.delete', this.work.id), {
        preserveScroll: true,
      })
    }
  },
};
</script>