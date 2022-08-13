<template>  
<Navbar/>
<section class="text-gray-600 body-font">
  <div v-for="(animeWork, key) in animeWorks" :key="key" class="container flex mx-auto px-5 py-24 md:flex-row flex-col items-center">
  <p>{{ key + 1 }}位</p>
    <div v-if="animeWork.image !== null" class="flex justify-center lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <img class="object-cover object-center rounded" :src="animeWork.image">
          </div>
      <div v-else :src="'/img/noimage.svg'" class="flex justify-center lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <h1 v-text="animeWork.title" class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
      </h1>
      <p v-text="animeWork.copyright" class="mb-8 leading-relaxed"></p>
      <div class="flex justify-center">
        <Link :href="'/anime/work/' + animeWork.id" class="inline-flex text-white bg-orange-500 border-0 py-2 px-6 focus:outline-none hover:bg-orange-600 rounded text-lg">詳細</Link>
        <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">配信サイト</button>
      </div>
    </div>
  </div>
</section>
<Footer/>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue3";
    import Navbar from "@/Components/Navbar";
    import Footer from "@/Components/Footer";


    export default {
        components: { 
          Link,
          Navbar,
          Footer,
           },
        props: {
          animeWorks: {
            type:Object,
          },
    },
    }
</script>