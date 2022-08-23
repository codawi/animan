<template>
<comicWork :work="work" />
</template>

<script>
    import comicWork from "@/Components/ComicWork";
    export default {
        components: { 
          comicWork,
           },
        props: {
          work: {
            type:Object,
          },
    },
    }
</script>