<template>
  <tr>
    <td>{{ product.id }}</td>
    <td>{{ product.name }}</td>
    <td>{{ product.description }}</td>
    <td>{{ product.price }}</td>
    <td>
      <button class="mini ui blue button" @click="onEdit">Edit</button>
      <button class="mini ui red button" @click="onDelete">Delete</button>
    </td>
  </tr>
</template>

<script>
export default {
  name: "Product",
  props: {
    product: {
      type: Object
    }
  },
  methods: {
    onDelete() {
      // window.console.log("product delete " + this.product.id);
      this.$emit("onDelete", this.product.id);
    },
    onEdit() {
      // window.console.log("product edit " + this.product.id);
      this.$emit("onEdit", this.product);
    }
  }
};
</script>

<style scoped></style>
