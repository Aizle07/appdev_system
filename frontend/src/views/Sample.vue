<template>
    <sample_main />
  </template>
  
  <script>
  import { defineComponent } from 'vue';
  

  import sample_main from '../components/sample_main.vue';
  
  export default defineComponent({
    name: 'HomeView',
  
    components: {
      sample_main,
    },
  });
  </script>