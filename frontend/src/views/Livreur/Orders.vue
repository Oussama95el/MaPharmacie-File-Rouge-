<template>
  <LivraisonCard/>
  <DetailCard :class="display"/>
</template>

<script>
import LivraisonCard from "../../components/cards/LivraisonCard.vue";
import DetailCard from "../../components/cards/DetailCard.vue";
export default {
  name: "Orders",
  components:{
    LivraisonCard,
    DetailCard
  },
  computed:{
    display(){
      return this.$store.state.detailCard;
    }
  }
};
</script>

<style scoped></style>
