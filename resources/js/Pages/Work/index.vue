<template>
<div class="md:flex">
<!-- アニメ作品表示 -->
<section class="text-gray-600 body-font md:ml-16">
  <div  v-for="animeWork in animeWorks" :key="animeWork.anime" class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <div v-if="animeWork.image !== null">
       <img :src=" animeWork.image ">
          </div>
          <div v-else>
            <img :src="'/img/noimage.svg'">
          </div>
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">タイトル
      </h1>
      <p class="mb-8 leading-relaxed">Copyright</p>
      <div class="flex justify-center">
        <button class="inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">詳細</button>
        <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">配信サイト</button>
      </div>
    </div>
  </div>
</section>

<!-- 漫画作品表示 -->
<section class="text-gray-600 body-font justify-end md:mr-16">
  <div  v-for="comicWork in comicWorks" :key="comicWork.comic" class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <div v-if="comicWork.image !== null">
       <img :src=" comicWork.image ">
          </div>
          <div v-else>
            <img :src="'/img/noimage.svg'">
          </div>
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">タイトル
      </h1>
      <p class="mb-8 leading-relaxed">Copyright</p>
      <div class="flex justify-center">
        <button class="inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">詳細</button>
        <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">配信サイト</button>
      </div>
    </div>
  </div>
</section>
</div>
</template>

<script>
    import Header from "@/Components/Header"
    import Footer from "@/Components/Footer"

    export default {
        name: 'app',
        components: { Header, Footer },
        props:{
          animeWorks: {
            type:Object,
          },
          comicWorks: {
            type: Object,
          }
    },
    }
</script>

<!-- <template>
    <div id="app">
        <Header/>
        <section class="text-gray-600 body-font">
          アニメ作品表示
  <div class="container flex justify-center mx-auto">
    <div class="flex-col max-w-2xl mb-10 text-center">
      <div v-for="animeWork in animeWorks" :key="animeWork.anime" class="my-36 px-4">
        <div class="rounded-lg overflow-hidden">
          <div v-if="animeWork.image !== null">
           <img :src=" animeWork.image ">
          </div>
          <div v-else class="flex justify-center">
            <img :src="'/img/no_image_logo.png'">
          </div>
        </div>
        <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">{{ animeWork.title }}</h2>
        <p class="leading-relaxed text-xs font-thin" >{{ animeWork.copyright }}</p>
        <button class="flex mx-auto mt-4 text-white bg-yellow-500 border-0 py-4 px-8 focus:outline-none hover:bg-yellow-600 rounded">詳細</button>
      </div>
    </div>
  </div>
</section>
        <Footer/>
    </div>
</template>

<script>
    import Header from "@/Components/Header"
    import Footer from "@/Components/Footer"

    export default {
        name: 'app',
        components: {Header, Footer},
        props:{
          animeWorks: {
            type:Object,
          }
    },
    }

    
</script>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: fot-tsukuardgothic-std, sans-serif;
        line-height: 1.5;
        font-size: 14px;
    }

    .container {
        width: 100%;
        padding: 0 20px;
        box-sizing: border-box;
    }

    @media (min-width: 768px) {
        .container {
            width: 700px;
            padding: 0;
            margin: 0 auto;
        }
    }

    @media (min-width: 1024px) {
        .container {
            width: 980px;
        }
    }
</style> -->