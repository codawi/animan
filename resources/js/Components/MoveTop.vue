<template>
  <div class="fixed rounded-full right-3.5 bottom-3.5 leading-9 w-9 h-9 bg-orange-400 text-center" @click="scrollTop()">
    <i class="fas fa-chevron-up Page-Btn-Icon"></i>
  </div>
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