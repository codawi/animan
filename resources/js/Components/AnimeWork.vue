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
        class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded"
      />
      <div class="text-center lg:w-2/3 w-full">
        <h1
          v-text="work.title"
          class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900"
        ></h1>
        <p v-text="work.copyright" class="mb-8 leading-relaxed"></p>
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
            レビュー一覧
          </button>
          <Link :href="'/anime/work/' + work.id + '/review/create'"
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
            レビュー
          </Link>
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
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Link,
  },
  props: {
    work: {
      type: Object,
    },
  },
}
</script>