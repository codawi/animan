<template>
        <footer class="flex flex-col items-center justify-between px-6 py-2 bg-white bottom-0 sm:flex-row">
            <Link :href="route('home')">
          <img :src="'/img/logo.png'" class="w-40 inline" alt="logo" />
        </Link>         
            <p class="py-2 text-gray-800 sm:py-0">All rights reserved</p>
        </footer>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Link,
  },
}
</script>