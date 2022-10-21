<template>
  <div class="bg-slate-50 text-gray-600 body-font">
    <h1 class="text-center py-4 text-gray-900 text-xl font-bold">
      <slot></slot>
    </h1>
    <nav
      v-if="category === 'anime'"
      class="
        flex
        justify-center
        space-x-8
        text-gray-600
        py-4
        px-6
        focus:outline-none
      "
    >
      <Link
        Link
        :href="route('anime.daily')"
        method="get"
        as="button"
        type="button"
        :class="{ active: period === 'daily' }"
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
        preserve-scroll
      >
        月間
      </Link>

    </nav>
    <nav v-if="category === 'comic'" class="flex
        justify-center
        space-x-8
        text-gray-600
        py-4
        px-6
        focus:outline-none">
      <Link
        Link
        :href="route('comic.daily')"
        method="get"
        as="button"
        type="button"
        :class="{ active: period === 'daily' }"
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
          border-2
          rounded-sm
          border-white border-opacity-50
          bg-white
          flex
          mx-auto
          mb-16
          flex-col
          max-w-2xl
        "
      >
        <div
          class="
            text-left
            flex
            justify-between
            border-b-2
            texet-gray-900
            font-semibold
            items-center-none
          "
        >
          <div class="left ml-1">{{ works.from + key }}位</div>
          <div class="right font-medium my-auto text-xs mr-1">
            {{ work.media }}
          </div>
        </div>
        <div class="mx-auto px-4 flex-col items-center my-4">
    <div
          v-if="work.image !== null"
        >
          <img
            :src="work.image"
            @error="altImg"
          />
        </div>
        <img
          v-else
          :src="'/img/noimage.png'"
        />
        <div class="mr-auto">
          <p
          v-text="work.title"
          class="mt-2 title-font text-2xl font-medium text-gray-900"
          ></p>
          <p v-text="work.copyright" class="mb-4 leading-relaxed text-xs"></p>
        </div>
      </div>
        <div class="flex mx-auto mb-4">
          <div
            class="
              text-center text-white
              bg-orange-400
              border-0
              py-2
              px-6
              focus:outline-none
              hover:bg-orange-500
              rounded
              text-lg
            "
          >
            <Link
              v-if="work.category === 'anime'"
              :href="route('anime.work', { id: work.id })"
              >詳細</Link
            >
            <Link
              v-if="work.category === 'comic'"
              :href="route('comic.work', { id: work.id })"
              >詳細</Link
            >
          </div>
          <BookmarkButton :work="work" :is_bookmark="is_bookmark[key]" />
        </div>
      </div>
    </div>
    <MoveTop />
    <Pagination
      v-if="works"
      class="flex justify-center pb-4"
      :links="works.links"
    />
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
    },
  },
  methods: {
    altImg(element) {
      element.target.src = "/img/noimage.png";
    },
  },
};
</script>

<style scoped>
.active {
  border-bottom-width: 2px;
  border-color: #fc9c43;
}
</style>