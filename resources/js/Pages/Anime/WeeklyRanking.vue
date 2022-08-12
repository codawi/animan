<template>  
<!-- propsを子コンポーネントへ -->
<AnimeRanking :animeWorks="animeWorks" />
</template>

<script>
    import AnimeRanking from "@/Components/AnimeRanking";

    export default {
        components: { 
          AnimeRanking,
           },
        props: {
          animeWorks: {
            type:Object,
          },
    },
    }
</script>