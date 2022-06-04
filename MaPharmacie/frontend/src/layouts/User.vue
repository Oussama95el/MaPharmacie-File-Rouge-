<template>
  <HeaderNav/>
  <router-view/>
  <Footer/>
</template>

<script>
import HeaderNav from "../components/navbars/HeaderNav.vue";
import Footer from "../components/footers/Footer.vue";

export default {
  name: "User",
  components:{
    HeaderNav,
    Footer,
  }
}
</script>

<style scoped>

</style>