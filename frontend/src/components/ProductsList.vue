<template>
  <div class="products-list">
    <div class="data">
      <table class="ui celled table">
        <thead>
          <tr>
            <th style="width: 50px; text-align: center;">#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th style="width: 148px;">Action</th>
          </tr>
        </thead>

        <tbody>
          <Product
            v-for="product in products"
            :key="product.id"
            :product="product"
            @onDelete="onDelete"
            @onEdit="onEdit"
          />
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import Product from "./Product";
export default {
  name: "ProductsList",
  components: {
    Product
  },
  props: {
    products: {
      type: Array
    }
  },
  methods: {
    onDelete(id) {
      // window.console.log("product list delete " + id);
      this.$emit("onDelete", id);
    },
    onEdit(data) {
      // window.console.log("product list edit " + data);
      this.$emit("onEdit", data);
    }
  }
};
</script>

<style scoped></style>
