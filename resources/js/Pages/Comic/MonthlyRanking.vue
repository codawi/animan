<template>  
<!-- propsを子コンポーネントへ -->
<ComicRanking :comicWorks="comicWorks" />
</template>

<script>
    import ComicRanking from "@/Components/ComicRanking";
    export default {
        components: { 
          ComicRanking
           },
        props:{
          comicWorks: {
            type:Object,
          },
    },
    }
</script>