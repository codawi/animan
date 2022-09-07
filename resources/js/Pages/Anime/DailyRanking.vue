<template>  
<!-- propsを子コンポーネントへ -->
<AnimeRanking :works="works" :is_bookmark="is_bookmark" />
</template>

<script>
    import AnimeRanking from "@/Components/AnimeRanking";

    export default {
        components: { 
          AnimeRanking,
           },
        props: {
          works: {
            type:Object,
          },
          is_bookmark: {
            type: Object,
          },
    },
    }
</script>