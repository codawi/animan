<template>
  <div class="my-8 flex justify-center">
    <h1>レビュー一覧</h1>
  </div>
    <div v-for="(review, key) in reviews.data" :key="key" class="max-w-2xl px-8 py-8 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="flex items-center justify-between">
            <span v-text="review.created_at" class="text-sm font-light text-gray-600 dark:text-gray-400"></span>
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
            <p v-text="review.review" class="mt-2 text-gray-600 dark:text-gray-300"></p>
        </div>
        
        <div class="flex items-center justify-between mt-4">
            <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">続きを読む</a>

            <div class="flex items-center">
                <a v-text="review.user.name" class="font-bold text-gray-700 cursor-pointer dark:text-gray-200"></a>
            </div>
        </div>
      </div>
    <Pagination v-if="reviews" class="my-8 flex justify-center" :links="reviews.links" />
</template>

<script>
import StarRating from "vue-star-rating";
import Pagination from "@/Components/Pagination";

export default {
  components: {
    StarRating,
    Pagination,
  },
  props: {
    reviews: {
      type: Object,
    },
  },
  data: function() {
    return {
      rating: 0,
    }
  },
}
</script>