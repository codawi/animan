<template>
  <section class="text-gray-600 body-font relative">
    <div class="container px-5 pb-24 mx-auto">
      <div class="lg:w-1/2 md:w-2/3 mx-auto text-center">
        <div
          v-if="form.hasErrors"
          class="border border-red-100 p-1 m-1 text-sm text-red-600"
        >
          入力された値をもう一度確認してください。
          <ul class="list-disc list-inside">
            <li v-for="error in form.errors" :key="error">{{ error }}</li>
          </ul>
        </div>
        <p class="leading-relaxed">評価</p>
        <form @submit.prevent="submit">
          <star-rating
            :star-size="35"
            :increment="1"
            v-model:rating="form.rating_value"
            class="justify-center py-4"
          ></star-rating>
          <div class="flex flex-wrap -m-2">
            <div class="p-2 w-full">
              <div class="relative">
                <label for="message" class="leading-7 text-sm text-gray-600"
                  >感想</label
                >
                <textarea
                  id="message"
                  v-model="form.review"
                  class="
                    w-full
                    bg-gray-100 bg-opacity-50
                    rounded
                    border border-gray-300
                    focus:border-indigo-500
                    focus:bg-white
                    focus:ring-2
                    focus:ring-indigo-200
                    h-32
                    text-base
                    outline-none
                    text-gray-700
                    py-1
                    px-3
                    resize-none
                    leading-6
                    transition-colors
                    duration-200
                    ease-in-out
                  "
                ></textarea>
              </div>
            </div>
            <div class="p-2 w-full">
              <button
                type="submit"
                class="
                  flex
                  mx-auto
                  text-white
                  bg-orange-500
                  border-0
                  py-2
                  px-8
                  focus:outline-none
                  hover:bg-orange-600
                  rounded
                  text-lg
                "
                :disabled="form.processing"
                :class="{ 'cursor-not-allowed': form.processing }"
              >
                送信する
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</template>

<script>
import StarRating from "vue-star-rating";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";

export default {
  components: {
    StarRating,
    BreezeValidationErrors,
  },
  props: {
    work: {
      type: Object,
    },
  },
  data: function () {
    return {
      rating: 0,
      form: this.$inertia.form({
        work_id: this.work.id,
        rating_value: this.rating_value,
        review: "",
      }),
    };
  },
  methods: {
    submit() {
      this.form.post(route("review.store", this.work.id));
    },
  },
};
</script>