<template>
  <div>
      <InvalidOrdersCard/>
      <DetailCard :class="display"/>
  </div>
</template>

<script>
import InvalidOrdersCard from "../../components/cards/InvalidOrdersCard.vue";
import DetailCard from "../../components/cards/DetailCard.vue";
export default {
  name: "InvalidOrders",
  components:{
    InvalidOrdersCard,
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
