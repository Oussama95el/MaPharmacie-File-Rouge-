<template>
  <div class="flex flex-wrap justify-center items-center mt-4">
    <div class="w-full mb-12 px-4">
      <TableStaffCard />
    </div>
    <div class="w-full mb-12 px-4">
      <StaffForm v-if="this.showModal" id="staff_form" />
    </div>
  </div>
</template>

<script>
import TableStaffCard from "../../components/cards/TableStaffCard.vue";
import StaffForm from "../../components/forms/StaffForm.vue";
export default {
  name: "DeliveryStaff",
  components: { TableStaffCard, StaffForm },
  computed: {
    getAllStaff() {
      return this.$store.state.livreur;
    },
    showModal() {
      return this.$store.state.showModal;
    },
  },
  mounted() {
    this.fetchLivreur();
  },
  methods: {
    fetchLivreur() {
      this.$store.dispatch("fetchLivreur");
    },
  },
};
</script>

<style scoped></style>
