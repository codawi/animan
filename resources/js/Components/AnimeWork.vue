<template>
  <Navbar />
  <section class="text-gray-600 body-font">
    <div
      class="
        container
        mx-auto
        flex
        px-5
        py-12
        items-center
        justify-center
        flex-col
      "
    >
      <div v-if="animeWork.image !== null">
        <img
          :src="animeWork.image"
          class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 mx-auto object-cover object-center rounded"
        />
      </div>
      <img
        v-else
        :src="'/img/noimage.svg'"
        class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded"
      />
      <div class="text-center lg:w-2/3 w-full">
        <h1
          v-text="animeWork.title"
          class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900"
        ></h1>
        <p v-text="animeWork.copyright" class="mb-8 leading-relaxed"></p>
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
  <section class="text-gray-600 body-font relative">
  <div class="container px-5 pb-24 mx-auto">
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
      <div class="flex flex-wrap -m-2">
        <div class="p-2 w-full">
          <div class="relative">
            <label for="message" class="leading-7 text-sm text-gray-600">感想</label>
            <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
          </div>
        </div>
        <div class="p-2 w-full">
          <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">送信する</button>
        </div>
      </div>
    </div>
  </div>
</section>
  <Footer />
</template>

<script>
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";

export default {
  components: {
    Navbar,
    Footer,
  },
  props: {
    animeWork: {
      type: Object,
    },
  },
};
</script>