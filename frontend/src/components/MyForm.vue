<template>
  <div class="my-form">
    <form class="ui form">
      <div class="fields">
        <div class="four wide field">
          <label>Name</label>
          <input
            type="text"
            name="name"
            placeholder="Name"
            @change="handleChange"
            :value="form.name"
          />
        </div>

        <div class="four wide field">
          <label>Description</label>
          <input
            type="text"
            name="description"
            placeholder="Description"
            @change="handleChange"
            :value="form.description"
          />
        </div>

        <div class="six wide field">
          <label>Price</label>
          <input
            type="number"
            name="price"
            placeholder="200.34"
            @change="handleChange"
            :value="form.price"
          />
        </div>

        <div class="two wide field">
          <button :class="btnClass" @click="onFormSubmit">
            {{ btnName }}
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "MyForm",
  data() {
    return {
      btnName: "Save",
      btnClass: "ui primary button submit-button"
    };
  },
  props: {
    form: {
      type: Object
    }
  },
  methods: {
    handleChange(event) {
      const { name, value } = event.target;
      let form = this.form;
      form[name] = value;
      this.form = form;
    },
    onFormSubmit(event) {
      // prevent form submit
      event.preventDefault();

      // form validation
      if (this.formValidation()) {
        // window.console.log("ready to submit");
        this.$emit("onFormSubmit", this.form);

        // change the button to save
        this.btnName = "Save";
        this.btnClass = "ui primary button submit-button";

        // clear form fields
        this.clearFormFields();
      }
    },
    formValidation() {
      // first name
      if (document.getElementsByName("name")[0].value === "") {
        alert("Enter Name");
        return false;
      }

      // last name
      if (document.getElementsByName("description")[0].value === "") {
        alert("Enter Descrition");
        return false;
      }

      // email
      if (document.getElementsByName("price")[0].value === "") {
        alert("Enter Price");
        return false;
      }

      return true;
    },
    clearFormFields() {
      // clear form data
      this.form.name = "";
      this.form.description = "";
      this.form.price = "";
      this.form.isEdit = false;

      // clear form fields
      document.querySelector(".form").reset();
    }
  },
  updated() {
    if (this.form.isEdit) {
      this.btnName = "Update";
      this.btnClass = "ui orange button submit-button";
    }
  }
};
</script>

<style scoped></style>
