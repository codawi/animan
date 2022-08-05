<template>
<Header/>
<div class="md:flex">
<!-- アニメ作品表示 -->
<section class="text-gray-600 body-font md:ml-16">
  <div  v-for="animeWork in animeWorks" :key="animeWork" class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <div v-if="animeWork.image !== null">
       <img :src=" animeWork.image ">
          </div>
          <div v-else>
            <img :src="'/img/noimage.svg'">
          </div>
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <h1 v-text="animeWork.title" class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
      </h1>
      <div v-if="animeWork.copyright !== null">
      <p v-text="animeWork.copyright" class="mb-8 leading-relaxed"></p>
      </div>
      <div class="flex justify-center">
        <button class="inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">詳細</button>
        <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">配信サイト</button>
      </div>
    </div>
  </div>
</section>
</div>
<!-- 漫画作品表示 -->
<div class="md:flex">
<section class="text-gray-600 body-font md:ml-16">
  <div  v-for="comicWork in comicWorks" :key="comicWork" class="container flex px-5 py-24 md:flex-row flex-col items-center">
    <div v-if="comicWork.image !== null" class="mx-auto lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
       <img :src=" comicWork.image ">
          </div>
          <div v-else>
            <img :src="'/img/noimage.svg'">
          </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <h1 v-text="comicWork.title" class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
      </h1>
      <div v-if="comicWork.copyright !== null">
      <p v-text="comicWork.copyright" class="mb-8 leading-relaxed"></p>
      </div>
      <div class="flex justify-center">
        <button class="inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">詳細</button>
        <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">配信サイト</button>
      </div>
    </div>
  </div>
</section>
</div>
<Footer/>
</template>

<script>
    import Header from "@/Components/Header"
    import Footer from "@/Components/Footer"

    export default {
        components: { Header, Footer },
        props:{
          animeWorks: {
            type:Object,
          },
          comicWorks: {
            type:Object,
          },
    },
    }
</script>