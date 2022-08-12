<template>
<animeWork :animeWork="animeWork" />
</template>

<script>
    import animeWork from "@/Components/AnimeWork";
    export default {
        components: { 
          animeWork,
           },
        props: {
          animeWork: {
            type:Object,
          },
    },
    }
</script>