<template>
    <ValidOrdersCard />
    <DetailCard :class="display"/>
</template>

<script>
import ValidOrdersCard from "../../components/cards/ValidOrdersCard.vue";
import DetailCard from "../../components/cards/DetailCard.vue";
export default {
  name: "ValidOrders",
  components: {
    ValidOrdersCard,
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
