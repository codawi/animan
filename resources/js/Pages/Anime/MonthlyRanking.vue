<template>  
<!-- propsを子コンポーネントへ -->
<AnimeRanking :animeWorks="animeWorks" />
</template>

<script>
    import Navbar from "@/Components/Navbar";
    import Footer from "@/Components/Footer";
    import AnimeRanking from "@/Components/AnimeRanking";

    export default {
        components: { 
          Navbar,
          Footer,
          AnimeRanking,
           },
        props: {
          animeWorks: {
            type:Object,
          },
    },
    }
</script>