<template>
  <Head :title="title ? `${title} - AniMan` : 'AniMan'">
    <meta name="description" content="Animanはアニメ 漫画のトレンドをランキング形式で表示するサービスです。">
  </Head>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'

export default {
  components: {
    Head,
  },
  props: {
    title: String,
  },
}
</script>