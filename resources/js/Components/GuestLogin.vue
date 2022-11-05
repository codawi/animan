<template>
  <div
    class="mt-8 p-2 border-2 rounded-lg flex justify-center hover:bg-gray-100"
  >
    <Link :href="route('guestLogin')" method="get" as="button" type="button">
      <font-awesome-icon icon="fa-solid fa-user" />
      <span class="pl-2">ゲストアカウントでログイン</span>
    </Link>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Link,
  },
};
</script>