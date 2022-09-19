<template>
  <Navbar />
  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex flex-col items-center">
      <h1 class="text-3xl font-medium text-gray-900 mb-8">{{ user.name }}さんのマイページ</h1>
        <div class="p-4 lg:w-1/2 w-full">
          <div
            class="
              flex
              border-2
              rounded-lg
              border-gray-200 border-opacity-50
              p-8
              mb-8
            "
          >
            <div
              class="
                w-16
                h-16
                mr-8
                mb-4
                inline-flex
                items-center
                justify-center
                rounded-full
                bg-indigo-100
                text-pink-500
                fa-2x
                flex-shrink-0
              "
            >
            <font-awesome-icon icon="fa-solid fa-heart" />
            </div>
              <h2 class="text-gray-900 text-lg title-font font-medium mb-3 flex items-center">
                ブックマーク作品一覧
              </h2>
          </div>
        </div>
        <div class="p-4 lg:w-1/2 w-full">
          <div
            class="
              flex
              border-2
              rounded-lg
              border-gray-200 border-opacity-50
              p-8
            "
          >
            <div
              class="
                w-16
                h-16
                mr-8
                mb-4
                inline-flex
                items-center
                justify-center
                rounded-full
                bg-indigo-100
                text-indigo-500
                fa-2x
                flex-shrink-0
              "
            >
            <font-awesome-icon icon="fa-solid fa-user-gear" />
            </div>
              <h2 class="text-gray-900 text-lg title-font font-medium mb-3 flex items-center">
                アカウント情報
              </h2>
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
    user: {
      type: Object
    },
  }
};
</script>