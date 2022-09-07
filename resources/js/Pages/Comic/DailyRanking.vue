<template>  
<!-- propsを子コンポーネントへ -->
<ComicRanking :works="works" :is_bookmark="is_bookmark" />
</template>

<script>
    import ComicRanking from "@/Components/ComicRanking";
    export default {
        components: { 
          ComicRanking
           },
        props:{
          works: {
            type: Object,
          },
          is_bookmark: {
            type: Object, 
          },
    },
    }
</script>