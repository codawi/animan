<template>
    <div
      class="
        container
        mx-auto
        flex
        pt-20
        flex-col
        max-w-3xl
      "
    >
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

        <ul class="flex flex-wrap mx-2 mb-16 text-left text-sm">
      <li
        class="
          px-2
          py-1
          mr-2
          border-2 border-orange-400
          rounded-full
          inline-block
          text-orange-400
          hover:text-white hover:bg-orange-400
          duration-300
        "
      >
        <a
          :href="
            'https://www.amazon.co.jp/s?k=' + work.title + '&rh=n%3A466280'
          "
          target="_blank"
          rel="noopener noreferrer"
          >Amazon
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            class="w-5 h-5 inline-block"
          >
            <path
              fill-rule="evenodd"
              d="M4.25 5.5a.75.75 0 00-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 00.75-.75v-4a.75.75 0 011.5 0v4A2.25 2.25 0 0112.75 17h-8.5A2.25 2.25 0 012 14.75v-8.5A2.25 2.25 0 014.25 4h5a.75.75 0 010 1.5h-5z"
              clip-rule="evenodd"
            />
            <path
              fill-rule="evenodd"
              d="M6.194 12.753a.75.75 0 001.06.053L16.5 4.44v2.81a.75.75 0 001.5 0v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 000 1.5h2.553l-9.056 8.194a.75.75 0 00-.053 1.06z"
              clip-rule="evenodd"
            />
          </svg>
        </a>
      </li>
      <li
        class="
          px-2
          py-1
          mr-2
          border-2 border-orange-400
          rounded-full
          inline-block
          text-orange-400
          hover:text-white hover:bg-orange-400
          duration-300
        "
      >
        <a
          :href="'https://comic.k-manga.jp/search/word/' + work.title"
          target="_blank"
          rel="noopener noreferrer"
          >まんが王国
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            class="w-5 h-5 inline-block"
          >
            <path
              fill-rule="evenodd"
              d="M4.25 5.5a.75.75 0 00-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 00.75-.75v-4a.75.75 0 011.5 0v4A2.25 2.25 0 0112.75 17h-8.5A2.25 2.25 0 012 14.75v-8.5A2.25 2.25 0 014.25 4h5a.75.75 0 010 1.5h-5z"
              clip-rule="evenodd"
            />
            <path
              fill-rule="evenodd"
              d="M6.194 12.753a.75.75 0 001.06.053L16.5 4.44v2.81a.75.75 0 001.5 0v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 000 1.5h2.553l-9.056 8.194a.75.75 0 00-.053 1.06z"
              clip-rule="evenodd"
            />
          </svg>
        </a>
      </li>
    </ul>

        <p v-if="work.summary" class="mb-16 px-4 flex justify-center leading-relaxed">
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
