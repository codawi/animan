<template>
  <Navbar />
  <section class="text-gray-600 body-font">
    <div
      class="
        container
        mx-auto
        flex
        px-5
        py-24
        items-center
        justify-center
        flex-col
      "
    >
      <div v-if="comicWork.image !== null">
        <img
          :src="comicWork.image"
          class="w-5/6 mb-10 mx-auto object-cover object-center rounded"
        />
      </div>
      <img
        v-else
        :src="'/img/noimage.svg'"
        class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded"
      />
      <div class="text-center lg:w-2/3 w-full">
        <h1
          v-text="comicWork.title"
          class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900"
        ></h1>
        <p v-text="comicWork.author" class="mb-8 leading-relaxed"></p>
        <div class="flex justify-center">
          <button
            class="
              inline-flex
              text-white
              bg-orange-500
              border-0
              py-2
              px-6
              focus:outline-none
              hover:bg-orange-600
              rounded
              text-lg
            "
          >
            評価
          </button>
          <button
            class="
              ml-4
              inline-flex
              text-gray-700
              bg-gray-100
              border-0
              py-2
              px-6
              focus:outline-none
              hover:bg-gray-200
              rounded
              text-lg
            "
          >
            配信サイト
          </button>
        </div>
      </div>
    </div>
  </section>
  <Review />
  <Footer />
</template>

<script>
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import Review from "@/Components/Review";

export default {
  components: {
    Navbar,
    Footer,
    Review
},
  props: {
    comicWork: {
      type: Object,
    },
  },
};
</script>