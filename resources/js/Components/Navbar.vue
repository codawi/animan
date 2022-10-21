<template>
  <nav class="bg-white shadow sticky top-0 z-50">
    <div class="container px-4 py-3 mx-auto md:flex">
      <div class="flex items-center justify-between">
        <Link :href="route('home')">
          <img
            :src="'/img/logo.png'"
            class="object-contain w-28 inline"
            alt="logo"
          />
        </Link>

        <div class="flex justify-end md:hidden">
          <div class="text-right">
            <Dropdown class="flex justify-end" align="right" width="48">
            <template #trigger>
              <button>
                <font-awesome-icon v-if="!$page.props.auth.user" icon="fa-solid fa-right-to-bracket" />
                <font-awesome-icon v-if="$page.props.auth.user" icon="fa-solid fa-user" />
          </button>
            </template>
            <template #content>
            <DropdownLink
              :href="route('myLogin')" method="get" as="button"
              v-if="!$page.props.auth.user"
              class="
                flex flex-col
                justify-end
                px-2
                py-1
                text-gray-700
                transition-colors
                duration-200
                transform
                rounded
                hover:bg-orange-500 hover:text-gray-100
              "
            >
              ログイン
            </DropdownLink>
            <DropdownLink
              :href="route('register')" method="get" as="button"
              v-if="!$page.props.auth.user"
              class="
                flex flex-col
                justify-end
                px-2
                py-1
                text-gray-700
                transition-colors
                duration-200
                transform
                rounded
                hover:bg-orange-500 hover:text-gray-100
              "
            >
              会員登録
            </DropdownLink>
            <div v-else-if="$page.props.auth.user">
              <div
                class="flex flex-col md:flex-row justify-end"
              >
                <DropdownLink
                :href="route('user.mypage')" method="get" as="button"
                  class="
                    px-2
                    py-1
                    text-gray-700
                    transition-colors
                    duration-200
                    transform
                    rounded
                    hover:bg-orange-500 hover:text-gray-100
                  "
                >
                  マイページ
                </DropdownLink>
                <DropdownLink
                :href="route('logout')" method="post" as="button"
                  class="
                    px-2
                    py-1
                    text-gray-700
                    transition-colors
                    duration-200
                    transform
                    rounded
                    hover:bg-red-500 hover:text-gray-100
                  "
                >
                  ログアウト</DropdownLink
                >
              </div>
            </div>
            </template>
          </Dropdown>
          </div>
        </div>
      </div>

      <div class="w-full md:flex md:items-center md:justify-between">
        <div class="flex flex-col m-2 -mx-4 md:flex-row md:mx-0 md:py-0">
          <Dropdown class="justify-end flex" align="right" width="48">
            <template #trigger>
              <span class="inline-flex rounded-md">
                <button
                  type="button"
                  class="
                  px-2
                    justify-end
                    inline-flex
                    items-center
                    border border-transparent
                    text-sm
                    leading-4
                    font-medium
                    rounded-md
                    text-gray-500
                    bg-white
                    hover:text-gray-700
                    focus:outline-none
                    transition
                    ease-in-out
                    duration-150
                  "
                >
                  アニメ

                  <svg
                    class="ml-2 -mr-0.5 h-4 w-4"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </button>
              </span>
            </template>
            <template #content>
              <DropdownLink :href="route('anime.daily')" method="get" as="button">
                日間ランキング
              </DropdownLink>
              <DropdownLink :href="route('anime.weekly')" method="get" as="button">
                週間ランキング
              </DropdownLink>
              <DropdownLink :href="route('anime.monthly')" method="get" as="button">
                月間ランキング
              </DropdownLink>
            </template>
          </Dropdown>
          
          <Dropdown class="flex justify-end" align="right" width="48">
            <template #trigger>
              <span class="inline-flex rounded-md">
                <button
                  type="button"
                  class="
                  px-2
                    inline-flex
                    items-center
                    border border-transparent
                    text-sm
                    leading-4
                    font-medium
                    rounded-md
                    text-gray-500
                    bg-white
                    hover:text-gray-700
                    focus:outline-none
                    transition
                    ease-in-out
                    duration-150
                  "
                >
                  漫画

                  <svg
                    class="ml-2 -mr-0.5 h-4 w-4"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </button>
              </span>
            </template>

            <template #content>
              <DropdownLink :href="route('comic.daily')" method="get" as="button">
                日間ランキング
              </DropdownLink>
              <DropdownLink :href="route('comic.weekly')" method="get" as="button">
                週間ランキング
              </DropdownLink>
              <DropdownLink :href="route('comic.monthly')" method="get" as="button">
                月間ランキング
              </DropdownLink>
            </template>
          </Dropdown>
        </div>

        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
              <path
                d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              ></path>
            </svg>
          </span>

          <input
            type="text"
            v-model="key"
            @keypress.enter="onKeypressEnter"
            class="
              w-full
              py-2
              pl-10
              pr-4
              text-gray-700
              bg-white
              border
              rounded-md
              focus:border-blue-400
              focus:outline-none
              focus:ring
              focus:ring-opacity-40
              focus:ring-blue-300
            "
            placeholder="作品検索"
          />
        </div>
        <div class="hidden md:inline-block">
          <div class="flex flex-col md:flex-row justify-end">
            <Link
              :href="route('myLogin')" method="get" as="button"
              v-if="!$page.props.auth.user"
              class="
                flex flex-col
                justify-end
                px-2
                py-1
                text-gray-700
                transition-colors
                duration-200
                transform
                rounded
                hover:bg-orange-500 hover:text-gray-100
              "
            >
              ログイン
            </Link>
            <Link
            :href="route('register')" method="get" as="button"
              v-if="!$page.props.auth.user"
              class="
                flex flex-col
                justify-end
                px-2
                py-1
                text-gray-700
                transition-colors
                duration-200
                transform
                rounded
                hover:bg-orange-500 hover:text-gray-100
              "
            >
              会員登録
            </Link>
            <div v-else-if="$page.props.auth.user">
              <div class="flex flex-col md:flex-row justify-end">
                <Link
                :href="route('user.mypage')" method="get" as="button"
                  class="
                    px-2
                    py-1
                    text-gray-700
                    transition-colors
                    duration-200
                    transform
                    rounded
                    hover:bg-orange-500 hover:text-gray-100
                  "
                >
                  マイページ
                </Link>
                <Link
                :href="route('logout')" method="post" as="button"
                  class="
                    px-2
                    py-1
                    text-gray-700
                    transition-colors
                    duration-200
                    transform
                    rounded
                    hover:bg-red-500 hover:text-gray-100
                  "
                >
                  ログアウト</Link
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";

export default {
  components: {
    Link,
    Dropdown,
    DropdownLink,
  },
  data() {
    return {
      key: null, //検索キーワード
    };
  },
  methods: {
    onKeypressEnter() {
      this.$inertia.get(route("work.search", this.key));
    },
  },
};
</script>

