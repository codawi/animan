<template>
    <div id="app">
        <Header/>
        <section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap -mx-4 -mb-10 text-center">
      <div v-for="animeWork in animeWorks" :key="animeWork.anime" class="sm:w-1/2 mb-10 px-4">
        <div class="rounded-lg h-64 overflow-hidden">
          <div>
           <img :src=" animeWork.image  ">
          </div>
        </div>
        <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">{{ animeWork.title }}</h2>
        <p class="leading-relaxed text-xs" >{{ animeWork.copyright }}</p>
        <button class="flex mx-auto mt-6 text-white bg-yellow-500 border-0 py-2 px-5 focus:outline-none hover:bg-yellow-600 rounded">詳細</button>
      </div>
      <div class="sm:w-1/2 mb-10 px-4">
        <div class="rounded-lg h-64 overflow-hidden">
          <img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/1202x502">
        </div>
        <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">The Catalyzer</h2>
        <p class="leading-relaxed text-base">Williamsburg occupy sustainable snackwave gochujang. Pinterest cornhole brunch, slow-carb neutra irony.</p>
        <button class="flex mx-auto mt-6 text-white bg-yellow-500 border-0 py-2 px-5 focus:outline-none hover:bg-yellow-600 rounded">詳細</button>
      </div>
    </div>
  </div>
</section>
        <Footer/>
    </div>
</template>

<script>
    import Header from "@/components/Header"
    import Footer from "@/components/Footer"
    // import Paginate from 'vujs-paginate'
    // VUe.component('paginate', Paginate)

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