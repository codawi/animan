<template>
  <div class="bg-slate-50 text-gray-600 body-font">
  <h1 class="text-center py-4 text-gray-900 text-xl font-bold">
    <slot></slot>
  </h1>
  <nav v-if="category === 'anime'" class="flex flex-row justify-center">
            <Link
              Link
              :href="route('anime.daily')"
              method="get"
              as="button"
              type="button"
              :class="{ active: period === 'daily' }"
              class="
                text-gray-600
                py-4
                px-6
                block
                hover:text-blue-500
                focus:outline-none
              "
              preserve-scroll
            >
              日間
            </Link>
            <Link
              Link
              :href="route('anime.weekly')"
              method="get"
              as="button"
              type="button"
              :class="{ active: period === 'weekly' }"
              class="
                text-gray-600
                py-4
                px-6
                block
                hover:text-blue-500
                focus:outline-none
              "
              preserve-scroll
            >
              週間
          </Link>
            <Link
              Link
              :href="route('anime.monthly')"
              method="get"
              as="button"
              type="button"
              :class="{ active: period === 'monthly' }"
              class="
                text-gray-600
                py-4
                px-6
                block
                hover:text-blue-500
                focus:outline-none
              "
              preserve-scroll
            >
              月間
            </Link>
          </nav>
  <nav v-if="category === 'comic'" class="flex flex-row justify-center">
            <Link
              Link
              :href="route('comic.daily')"
              method="get"
              as="button"
              type="button"
              :class="{ active: period === 'daily' }"
              class="
                text-gray-600
                py-4
                px-6
                block
                hover:text-blue-500
                focus:outline-none
              "
              preserve-scroll
            >
              日間
            </Link>
            <Link
              Link
              :href="route('comic.weekly')"
              method="get"
              as="button"
              type="button"
              :class="{ active: period === 'weekly' }"
              class="
                text-gray-600
                py-4
                px-6
                block
                hover:text-blue-500
                focus:outline-none
              "
              preserve-scroll
            >
              週間
          </Link>
            <Link
              Link
              :href="route('comic.monthly')"
              method="get"
              as="button"
              type="button"
              :class="{ active: period === 'monthly' }"
              class="
                text-gray-600
                py-4
                px-6
                block
                hover:text-blue-500
                focus:outline-none
              "
              preserve-scroll
            >
              月間
            </Link>
          </nav>
  <div class="container px-4 py-8 mx-auto">
    <div
      v-for="(work, key) in works.data"
      :key="key"
      class="
        border-2 rounded-sm
      border-white
        border-opacity-50
        bg-white
        flex
        mx-auto
        mb-16
        flex-col
        max-w-2xl
      "
    >
        <div class="text-left border-b-2 mb-8 texet-gray-900 font-semibold items-center-none">
          {{ works.from + key}}位
        </div>
        <div
          v-if="work.image !== null"
          class="
            flex
            justify-center
            items-center
            mx-8
            mb-4
            md:mb-0
            max-w-2xl
          "
        >
          <img
            class="object-cover object-center rounded"
            :src="work.image"
            @error="altImg"
          />
        </div>
        <img
          v-else
          :src="'/img/noimage.png'"
          class="
          flex
            justify-center
            mx-auto 
            mb-4
            md:mb-0
          "
        />
      <div
        class="
          lg:flex-grow
          flex flex-col
          items-center
          text-center
        "
      >
        <li
          v-text="work.title"
          class="list-none title-font text-2xl mt-4 mb-2 font-medium text-gray-900"
        ></li>
        <p v-text="work.copyright" class="mb-4 leading-relaxed"></p>
        <div class="flex mx-auto mb-4">
          <Link
            :href="route('anime.work', { id: work.id })"
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
            >詳細</Link
          >
          <BookmarkButton :work="work" :is_bookmark="is_bookmark[key]" />
        </div>
      </div>
    </div>
</div>
<MoveTop />
<Pagination v-if="works" class="flex justify-center pb-4" :links="works.links" />
</div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import BookmarkButton from "@/Components/BookmarkButton";
import Pagination from "@/Components/Pagination";
import MoveTop from "@/Components/MoveTop";

export default {
  components: {
    Link,
    BookmarkButton,
    Pagination,
    MoveTop,
},
  props: {
    works: {
      type: Object,
    },
    is_bookmark: {
      type: Object,
    },
    period: {
      type: String,
    },
    category: {
      type: String,
    }
  },
  methods: {
    altImg(element) {
      element.target.src = "/img/noimage.png";
    }
  },
};
</script>

<style scoped>
  .active {
    border-bottom-width: 2px;
    border-color: #3B82F6;
  }
</style>