<template>
  <Navbar />
  <FlashMessage />
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
      <div class="text-center lg:w-2/3 w-full">
        <h1
          class="title-font sm:text-4xl text-3xl mb-8 font-medium text-gray-900"
        >
          話題の作品を見つけよう
        </h1>
        <p
          class="
            mb-8
            leading-relaxed
            text-sm
            font-normal
            md:text-lg
            text-gray-700
          "
        >
          Animanは<strong>アニメ 漫画</strong
          >のトレンドをランキング形式で表示するサービスです。<br />
          ログインすると気になった作品をブックマークしたり、感想を投稿することもできます。
        </p>
        <div class="flex justify-center mb-32">
          <Link
          :href="route('anime.daily')"
            method="get"
            as="button"
            type="button"
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
            アニメランキングへ
          </Link>
          <Link
          :href="route('comic.daily')"
            method="get"
            as="button"
            type="button"
            class="
              ml-16
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
            マンガランキングへ
          </Link>
        </div>
      </div>
      <h2 class="mb-8 text-2xl text-gray-900">Animanでできること</h2>
      <h1 class="mb-4 text-xl text-gray-700">
        話題のアニメ、漫画作品をチェック
      </h1>
      <img
        class="w-5/6 mb-56 object-cover object-center rounded"
        alt="hero"
        src="https://dummyimage.com/720x600"
      />
      <h1 class="mb-4 text-xl text-gray-700">気になる作品をブックマーク</h1>
      <img
        class="w-5/6 mb-56 object-cover object-center rounded"
        alt="hero"
        src="https://dummyimage.com/720x600"
      />
      <h1 class="mb-4 text-xl text-gray-700">
        観た、読んだ作品の評価、感想を書く
      </h1>
      <img
        class="w-5/6 mb-10 object-cover object-center rounded"
        alt="hero"
        src="https://dummyimage.com/720x600"
      />
    </div>
  </section>

  <Footer />
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import Navbar from "@/Components/Navbar";
import Footer from "@/Components/Footer";
import FlashMessage from "@/Components/FlashMessage";

export default {
  components: {
    Link,
    Navbar,
    Footer,
    FlashMessage,
  },
};
</script>