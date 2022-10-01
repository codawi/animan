<template>
  <div v-if="$page.props.auth.user" class="fa-2x my-auto px-4">
  <div v-if="is_bookmark">
  <Link
    as="button" method="delete"
    :href="route('bookmark.delete', work.id)"
    preserve-scroll
  >
    <font-awesome-icon
      icon="fa-solid fa-heart"
      class="text-pink-500"
    />
  </Link>
</div>
<div v-else>
  <Link
    as="button" method="post"
    :href="route('bookmark.store', work.id)"
    preserve-scroll
  >
    <font-awesome-icon
      icon="fa-regular fa-heart"
    />
  </Link>
</div>
</div>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Link,
  },
  props: {
    work: {
      type: Object,
    },
    is_bookmark: {
      type: [Boolean, Object],
    },
  },
};
</script>