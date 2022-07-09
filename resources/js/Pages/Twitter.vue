<template>
<div v-for="twitter in twitter" :key="twitter.keyword">
<p>{{ twitter }}</p>
</div>
</template>

<script>
export default {
        props:{
          twitter: {
            type:Object,
          }
    },
    }
</script>