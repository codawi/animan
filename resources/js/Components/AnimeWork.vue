<template>
  <section class="text-gray-600 body-font">
    <div
      class="
        container
        mx-auto
        flex
        px-5
        py-20
        items-center
        justify-center
        flex-col
      "
    >
      <div v-if="work.image !== null">
        <img
          :src="work.image"
          class="w-5/6 mb-10 mx-auto object-cover object-center rounded"
        />
      </div>
      <img
        v-else
        :src="'/img/noimage.svg'"
        class="w-5/6 mb-10 mx-auto object-cover object-center rounded"
      />
      <div class="text-center lg:w-2/3 w-full">
        <h1
          v-text="work.title"
          class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900"
        ></h1>
        <p v-text="work.author" class="mb-8 leading-relaxed"></p>
        <div v-if="$page.props.auth.user" class="flexbg-white">
          <nav class="flex flex-row justify-center">
            <Link
              Link
              :href="route('anime.work', { id: work.id })"
              method="get"
              as="button"
              type="button"
              :class="{ active: $page.component === 'Work/Work'}"
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
              トップ
            </Link>
            <Link
              :href="route('anime.review.create', { id: work.id })"
              method="get"
              as="button"
              type="button"
              :class="{ active: $page.component.startsWith('Work/Review')}"
              class="
                py-4
                px-6
                block
                hover:text-blue-500
                focus:outline-none
              "
              preserve-scroll
            >
              レビューする
            </Link>
            <BookmarkButton
            :work="work"
            :is_bookmark="is_bookmark"
          />
          </nav>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import BookmarkButton from "@/Components/BookmarkButton";

export default {
  components: {
    Link,
    BookmarkButton,
  },
  props: {
    work: {
      type: Object,
    },
    is_bookmark: {
      type: Boolean,
    },
  },
};
</script>

<style scoped>
  .active {
    border-bottom-width: 2px;
    border-color: #3B82F6;
  }
</style>