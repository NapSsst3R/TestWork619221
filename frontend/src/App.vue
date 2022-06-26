<template>
  <div id="app">
    <div class="ui fixed inverted menu vue-color">
      <div class="ui container">
        <a href="#" class="header item">Vue JS with Laravel API TestWork 619221</a>
      </div>
    </div>

    <div class="ui main container">
      <MyForm :form="form" @onFormSubmit="onFormSubmit" />
      <Loader v-if="loader" />
      <ProductsList
        :products="products"
        @onDelete="onDelete"
        @onEdit="onEdit"
      />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import MyForm from "./components/MyForm";
import ProductsList from "./components/ProductsList";
import Loader from "./components/Loader";

export default {
  name: "App",
  components: {
    MyForm,
    ProductsList,
    Loader
  },
  data() {
    return {
      url: "http://localhost:3800/product",
      products: [],
      form: { name: "", description: "", price: "", isEdit: false },
      loader: false
    };
  },
  methods: {
    getProducts() {
      this.loader = true;

      axios.get(this.url).then(response => {
        this.products = response.data.results;
        this.loader = false;
      });
    },
    deleteProduct(id) {
      this.loader = true;

      axios
        .delete(`${this.url}/${id}`)
        .then(() => {
          this.getProducts();
        })
        .catch(e => {
          alert(e);
        });
    },
    createProduct(data) {
      this.loader = true;

      axios
        .post(this.url, {
          name: data.name,
          description: data.description,
          price: data.price
        })
        .then(() => {
          this.getProducts();
        })
        .catch(e => {
          alert(e);
        });
    },
    editProduct(data) {
      this.loader = true;

      axios
        .post(`${this.url}/${data.id}`, {
          name: data.name,
          description: data.description,
          price: data.price
        })
        .then(() => {
          this.getProducts();
        })
        .catch(e => {
          alert(e);
        });
    },
    onDelete(id) {
      // window.console.log("app delete " + id);

      this.deleteProduct(id);
    },
    onEdit(data) {
      // window.console.log("app edit ", data);

      this.form = data;
      this.form.isEdit = true;
    },
    onFormSubmit(data) {
      // window.console.log("app onFormSubmit", data);

      if (data.isEdit) {
        // call edit product
        this.editProduct(data);
      } else {
        // call create product
        this.createProduct(data);
      }
    }
  },
  created() {
    this.getProducts();
  }
};
</script>

<style>
.vue-color {
  background: #41b883 !important;
}

.main.container {
  margin-top: 60px;
}

.submit-button {
  margin-top: 24px !important;
  float: right;
}

.data {
  margin-top: 15px;
}

thead tr th {
  background: #e0e0e0 !important;
}

.ui.inverted.dimmer {
  background-color: rgba(255, 255, 255, 0) !important;
}
</style>
