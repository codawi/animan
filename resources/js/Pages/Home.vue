<template>
  <Navbar />
  <FlashMessage />
  <section class="text-gray-600 body-font bg-slate-50">
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
      <div class="text-center w-full">
        <div class="relative">
        <img class="opacity-10 saturate-50 mb-16 " src="img/combine_images.png" alt="hero">
        <h1
          class="md:text-4xl text-xl w-4/5 font-bold text-gray-900 absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4" 
        >
        話題の作品を見つけよう
      </h1>
        <p
          class="
          w-11/12
            leading-relaxed
            text-xs
            font-medium
            md:text-base
            text-gray-900
            absolute left-2/4 top-2/4 -translate-x-2/4 translate-y-10
          "
        >
          Animanは<strong>アニメ 漫画</strong
          >のトレンドをランキング形式で表示するサービスです。
        </p>
      </div>
        <div class="flex justify-center mb-16">
          <Link
          :href="route('anime.daily')"
            method="get"
            as="button"
            type="button"
            class="
              inline-flex
              text-white
              bg-orange-400
              border-0
              py-2
              px-4
              focus:outline-none
              hover:bg-orange-500
              rounded
              text-xs
              sm:text-lg
            "
          >
            アニメランキング
          </Link>
          <Link
          :href="route('comic.daily')"
            method="get"
            as="button"
            type="button"
            class="
              ml-8
              inline-flex
              text-white
              bg-orange-400
              border-0
              py-2
              px-4
              focus:outline-none
              hover:bg-orange-500
              rounded
              text-xs
              sm:text-lg
            "
          >
            マンガランキング
          </Link>
        </div>
      </div>
      <h2 class="mb-8 text-2xl text-gray-900">Animanでできること</h2>
      <h1 class="mb-4 text-xl text-gray-700">
        話題のアニメ、漫画作品をチェック
      </h1>
      <img
        class="w-1/2 mb-56 object-cover object-center rounded"
        alt="ranking"
        src="img/work.png"
      />
      <h1 class="mb-4 text-xl text-gray-700">気になる作品をブックマーク</h1>
      <img
        class="w-1/2 mb-56 object-cover object-center rounded"
        alt="bookmark"
        src="img/bookmark.png"
      />
      <h1 class="mb-4 text-xl text-gray-700">
        観た、読んだ作品の評価、感想を書く
      </h1>
      <img
        class="w-1/2 mb-10 object-cover object-center rounded"
        alt="review"
        src="img/review.png"
      />
    </div>
  </section>
  <MoveTop />
  <Footer />
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import FlashMessage from "@/Components/FlashMessage";
import MoveTop from "@/Components/MoveTop"

export default {
  components: {
    Link,
    Navbar,
    Footer,
    FlashMessage,
    MoveTop,
  },
};
</script>