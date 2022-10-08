<template>  
  <!-- propsを子コンポーネントへ -->
  <Ranking :works="works" :is_bookmark="is_bookmark">月間ランキング</Ranking>
  </template>
  
  <script>
      import Ranking from "@/Components/Ranking";
  
      export default {
          components: { 
            Ranking,
             },
          props: {
            works: {
              type:Object,
            },
            is_bookmark: {
              type: Object,
            }
      },
      }
  </script>