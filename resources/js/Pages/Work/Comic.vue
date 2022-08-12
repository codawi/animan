<template>
<comicWork :comicWork="comicWork" />
</template>

<script>
    import comicWork from "@/Components/ComicWork";
    export default {
        components: { 
          comicWork,
           },
        props: {
          comicWork: {
            type:Object,
          },
    },
    }
</script>