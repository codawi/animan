<template>
<animeWork :work="work" />
</template>

<script>
    import animeWork from "@/Components/AnimeWork";
    export default {
        components: { 
          animeWork,
           },
        props: {
          work: {
            type:Object,
          },
    },
    }
</script>