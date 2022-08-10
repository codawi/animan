<template>  
<!-- propsを子コンポーネントへ -->
<ComicRanking :comicWorks="comicWorks" />
</template>

<script>
    import Navbar from "@/Components/Navbar";
    import Footer from "@/Components/Footer";

    export default {
        components: { 
          Navbar,
          Footer,
           },
        props: {
          comicWorks: {
            type:Object,
          },
    },
    }
</script>