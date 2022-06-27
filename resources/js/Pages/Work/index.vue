<template>
    <div id="app">
        <Header/>
        <section class="text-gray-600 body-font">
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
</style>