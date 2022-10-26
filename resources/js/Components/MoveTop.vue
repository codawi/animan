<template>
  <button class="fixed rounded-full right-3.5 bottom-3.5 leading-9 w-9 h-9 bg-orange-300 bg-opacity-70 text-center" @click="scrollTop()">
    <i class="fas fa-chevron-up Page-Btn-Icon"></i>
  </button>
</template>

<script>
export default {
  methods: {
    scrollTop: function () {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    },
  },
};
</script>