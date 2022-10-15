<template>
  <section class="text-gray-600 body-font">
    <div
      class="
        container
        mx-auto
        flex
        px-5
        py-20
        flex-col
      "
    >
    <div
          v-if="work.image !== null"
          class="flex justify-center items-center mx-8 my-4 md:mb-0 max-w-2xl"
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
          class="flex justify-center mx-auto mb-4 md:mb-0"
        />
        <p
          v-text="work.title"
          class="list-none mt-2 mx-8 title-font text-2xlfont-medium text-gray-900"
        ></p>
        <p v-text="work.copyright" class="mb-4 ml-8 leading-relaxed text-xs"></p>
        <p class="mb-8 flex justify-center leading-relaxed">
        あらすじ<br>
        {{ work.summary }}
        </p>

        <div v-if="$page.props.auth.user" class="flexbg-white">
          <nav class="flex flex-row justify-center">
            <Link
              Link
              :href="route('comic.work', { id: work.id })"
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
              :href="route('comic.review.create', { id: work.id })"
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
    border-color: #3B82F6;
  }
</style>
