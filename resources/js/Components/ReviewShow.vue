<template>
  <div
    class="
      max-w-2xl
      px-8
      py-8
      mx-auto
      bg-white
      rounded-lg
      shadow-md
      dark:bg-gray-800
    "
  >
    <div class="flex items-center justify-between">
      <span
        v-text="review.created_at"
        class="text-sm font-light text-gray-600 dark:text-gray-400"
      ></span>
    </div>

    <div class="mt-2">
      <star-rating
        :star-size="20"
        :increment="0.5"
        :show-rating="false"
        :read-only="true"
        v-model:rating="review.rating_value"
        class="py-4"
      ></star-rating>
      <p
        v-text="review.review"
        class="mt-2 text-gray-600 dark:text-gray-300"
      ></p>
    </div>

    <div class="flex items-center justify-between mt-16">
      <div>
        <Link
          v-if="work.category === 'anime'"
          :href="route('anime.review.edit', { id: work.id })"
          method="get"
          as="button"
          type="button"
          class="
            px-2
            py-1
            text-orange-500
            border border-orange-500
            font-semibold
            rounded
            hover:bg-orange-100
          "
        >編集
        </Link>
        <Link
          v-else-if="work.category === 'comic'"
          :href="route('comic.review.edit', { id: work.id })"
          method="get"
          as="button"
          type="button"
          class="
            px-2
            py-1
            mr-4
            text-orange-500
            border border-orange-500
            font-semibold
            rounded
            hover:bg-orange-100
          "
        >編集
        </Link>
      </div>
      <div class="flex items-center">
        <a
          v-text="review.user.name"
          class="font-bold text-gray-700 cursor-pointer dark:text-gray-200"
        ></a>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import StarRating from "vue-star-rating";

export default {
  components: {
    Link,
    StarRating,
  },
  props: {
    work: {
      type: Object,
    },
    review: {
      type: Object,
    },
  },
  data: function () {
    return {
      rating: 0,
    };
  },
};
</script>