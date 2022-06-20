<template>
  <div class="pay">
    <div class="hidden w-full flex justify-center items-center">
      <h1>Noice, you bought a beautiful lamp!</h1>
    </div>
    <div
      class="w-1/2 pt-8 h-fit flex justify-center items-center bg-black rounded-lg"
      ref="paypal"
    ></div>
  </div>
</template>

<script>
export default {
  name: "Paypal",
  data: function () {
    return {
      loaded: false,
      paidFor: false,
      product: {
        price: "",
        description: "",
        img: "",
      },
    };
  },
  mounted: function () {
    const script = document.createElement("script");
    script.src =
      "https://www.paypal.com/sdk/js?client-id=AWYERZOqR7Lbnzk1gMVMppJFVKwx3mB2YPnOqo7jGrXooJs2qeVcitB0LcylEWsM6fgaNk3uSyDVrTOL";
    script.addEventListener("load", this.setLoaded);
    document.body.appendChild(script);
  },
  methods: {
    setLoaded: function () {
      this.loaded = true;
      window.paypal
        .Buttons({
          createOrder: (data, actions) => {
            return actions.order.create({
              purchase_units: [
                {
                  description: this.product.description,
                  amount: {
                    currency_code: "USD",
                    value: this.product.price,
                  },
                },
              ],
            });
          },
          onApprove: async (data, actions) => {
            const order = await actions.order.capture();
            this.paidFor = true;
            console.log(order);
          },
          onError: (err) => {
            console.log(err);
          },
        })
        .render(this.$refs.paypal);
    },
  },
};
</script>

<style scoped></style>
