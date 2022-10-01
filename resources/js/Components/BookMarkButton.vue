<template>
  <div class="fa-2x my-auto px-4">
    <button v-if="is_bookmark" @click="bookmarkDelete(work.id)">
      <font-awesome-icon
        icon="fa-solid fa-heart"
        class="text-pink-500"
      />
    </button>
    <button v-else @click="bookmarkStore(work.id)">
      <font-awesome-icon icon="fa-regular fa-heart" />
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
      type: [Boolean, Object],
    },
  },
  methods: {
    bookmarkStore() {
      this.$inertia.post(route("bookmark.store", this.work.id), {
        preserveScroll: true,
      });
    },
    bookmarkDelete() {
      this.$inertia.delete(route("bookmark.delete", this.work.id), {
        preserveScroll: true,
      });
    },
  },
};
</script>