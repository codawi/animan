<template>
  <div class="my-8 flex justify-center">
    <h1 v-if="reviews.data.length">レビュー一覧</h1>
    <h2 class="mb-16" v-else>レビューはまだありません</h2>
  </div>
  <div
    v-for="(review, key) in reviews.data"
    :key="key"
    class="max-w-2xl px-4 py-4 mb-8 mx-auto bg-white rounded-lg shadow-md"
  >
    <div class="flex items-center justify-between">
      <span
        class="text-sm font-light text-gray-600"
      >{{ format(review.updated_at) }}</span>
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
      <p v-if="!readMoreActived" class="mt-2 break-all text-gray-600">
        {{ review.review.slice(0,120) }}
      </p>
      <p v-if="readMoreActived" class="mt-2 break-all text-gray-600">
        {{ review.review }}
      </p>
    </div>

    <div class="mt-4">
      <button
        v-if="!readMoreActived"
        @click="readMore()"
        class="text-blue-600 dark:text-blue-400 hover:underline"
      >
        続きを読む
      </button>

        <a
          v-text="review.user.name"
          class="font-bold flex justify-end text-gray-700 cursor-pointer"
        ></a>
    </div>
  </div>
  <Pagination
    v-if="reviews"
    class="my-8 flex justify-center"
    :links="reviews.links"
  />
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import StarRating from "vue-star-rating";
import Pagination from "@/Components/Pagination";
import dayjs from "dayjs";
dayjs.locale("ja");

export default {
  components: {
    Link,
    StarRating,
    Pagination,
  },
  props: {
    reviews: {
      type: Object,
    },
  },
  data: function () {
    return {
      rating: 0,
      readMoreActived: false,
    };
  },
  methods: {
    readMore() {
      this.readMoreActived = true;
    },
    format(date) {
      let updated_at = dayjs(date).format("YYYY-MM DD:mm");
      return updated_at;
    }
  },
};
</script>