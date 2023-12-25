<template>
  
    <!-- aside -->
  
    <aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
      <div>
        Vendor <b class="font-black">One</b>
      </div>
    </div>
    <div class="menu is-menu-main">
      <p class="menu-label">General</p>
      <ul class="menu-list">
        <li class="active">
          <a href="index.html">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">Dashboard</span>
          </a>
        </li>
      </ul>
      <p class="menu-label">Examples</p>
      <ul class="menu-list">
        <li class="--set-active-tables-html">
          <a href="/Vendor/Profile">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Profile</span>
          </a>
        </li>
        <li class="--set-active-forms-html">
          <a href="/AddProducts/Home">
            <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
            <span class="menu-item-label">Forms</span>
          </a>
        </li>
        <li>
          <a href="/Vendor/Login">
            <span class="icon"><i class="mdi mdi-lock"></i></span>
            <span class="menu-item-label">Login</span>
          </a>
        </li>
      </ul>
      <p class="menu-label">About</p>
      <ul class="menu-list">
        <li>
          <a href="https://justboil.me" onclick="alert('Coming soon'); return false" target="_blank" class="has-icon">
            <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
            <span class="menu-item-label">Premium Demo</span>
          </a>
        </li>
        <li>
          <a href="/about" class="has-icon">
            <span class="icon"><i class="mdi mdi-help-circle"></i></span>
            <span class="menu-item-label">About</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  
  <section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <ul>
        <li>Vendor</li>
        <li>Dashboard</li>
      </ul>
      <a href="https://justboil.me/" onclick="alert('Coming soon'); return false" target="_blank" class="button blue">
        <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
        <span>Premium Demo</span>
      </a>
    </div>
  </section>
  
  <section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <h1 class="title">
        Dashboard
      </h1>
    </div>
  </section>
  
  <!-- main section -->
  
  <section class="section main-section">
      <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
        <div class="card">
          <div class="card-content">
            <div class="flex items-center justify-between">
              <div class="widget-label" v-for="vendor in vendors" :key="vendor.vendor_id">
                <h3>
                  {{vendor.vendor_id}}
                </h3>
                <h1>
                  {{ vendor.vendor_name }}
                </h1>
              </div>
              <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-content">
            <div class="flex items-center justify-between">
              <div class="widget-label" >
                <h3>
                  Products
                </h3>
                <h1>
                  {{vendors.product_count}}
                </h1>
              </div>
              <span class="icon widget-icon text-blue-500"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
            </div>
          </div>
        </div>
  
        <div class="card">
          <div class="card-content">
            <div class="flex items-center justify-between">
              <div class="widget-label" >
                <h3>
                  Status
                </h3>
                <h1 v-for="vendor in vendors" :key="vendor.vendor_id">
                  {{vendor.status}}
                </h1>
              </div>
              <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>
            </div>
          </div>
        </div>
      </div>
  
      <div class="notification blue">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
          <div>
            <span class="icon"><i class="mdi mdi-buffer"></i></span>
            <b>Responsive table</b>
          </div>
        </div>
      </div>


  
      <div class="card has-table">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
            Clients
          </p>
          <a href="#" class="card-header-icon">
            <span class="icon"><i class="mdi mdi-reload"></i></span>
          </a>
        </header>
        <div class="card-content">
          <table>
            <thead>
            <tr>
              <th>Product_ID</th>
              <th>Product Name</th>
              <th>Product Image</th>
              <th>Type</th>
              <th>Price</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in products" :key="product.product_id" @click="showModal(product)">
              <td>{{ product.product_id }}</td>
              <td>{{ product.product_name }}</td>
              <td>
                  <img :src="product.prod_image" alt="Product Image" class="prod-image"/>
              </td>
              <td>{{ product.type }}</td>
              <td>{{ product.price }}</td>
            </tr>
  
            </tbody>
          </table>

          <v-dialog v-model="modalVisible">
  <v-card>
    <v-card-title>Product Details</v-card-title>
    <v-card-text>
      <v-form @submit.prevent="updateProduct">
        <div>Product ID: {{ selectedProduct.product_id }}</div>
        <v-text-field label="Product Name" v-model="selectedProduct.product_name"></v-text-field>
        <v-img :src="selectedProduct.prod_image" alt="Product Image" width="200"></v-img>
        <v-file-input
          label="Product Image"
          v-model="selectedProduct.newImage"
          accept="image/*"
          @change="onImageChange"
        ></v-file-input>
        <v-select label="Product Type" v-model="selectedProduct.type" :items="productTypes"></v-select>
        <v-text-field label="Product Price" v-model="selectedProduct.price"></v-text-field>
      </v-form>
    </v-card-text>
    <v-card-actions>
      <v-btn @click="updateProduct">Update</v-btn>
      <v-btn @click="closeModal">Close</v-btn>
    </v-card-actions>
  </v-card>
</v-dialog>



          <div class="table-pagination">
            <div class="flex items-center justify-between">
              <div class="buttons">
                <button type="button" class="button active">1</button>
                <button type="button" class="button">2</button>
                <button type="button" class="button">3</button>
              </div>
              <small>Page 1 of 3</small>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
  <div class="container mx-auto">
    <div class="flex justify-center">
      <div class="w-full md:w-8/12">
        <div class="custom-card shadow-md rounded-lg">
          <h1 class="text-2xl font-bold mb-4">Add Product</h1>
          <form @submit.prevent="addProduct">

            <label for="product_name" class="form-label">Product Name</label>
            <input v-model="product_name" type="text" id="product_name" class="form-input">

            <label for="prod_image" class="form-label">Product Image</label>
            <input @change="handleImageChange" type="file" id="prod_image" class="form-input">

            <label for="type" class="form-label">Type</label>
            <select v-model="type" id="type" class="form-select">
              <option value="" disabled>Select Product Type</option>
              <option v-for="productType in productTypes" :key="productType" :value="productType">{{ productType }}</option>
            </select>

            <label for="price" class="form-label">Price</label>
            <input v-model="price" type="text" id="price" class="form-input">

            <button type="submit" class="form-button">Add Product</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

  
  </template>
  
  <script>
  import router from '@/router';
  import axios from 'axios'
  
  import Main from '../../assets/js/main.js';
  import MainMin from '../../assets/js/main.min.js';
  
  export default {
      data() {
          return {
          vendors: [],
          modalVisible: false,
          selectedProduct: {
                product_id: null,
                product_name: '',
                prod_image: '',
                newImage: null,
                type: '',
                price: '',
            },

          //
          
          product_name: '',
          prod_image: null,
          type: null,
          price: '',
          productTypes: ['Fresh Produce', 'Meat and Poultry', 'Fish and Seafood', 'Grains and Legumes', 'Spices and Condiments'],
          user_id: null,
          vendor_id: null,

          //
          products: [],
          };
      },
  
      created(){
          console.log(Main);
          console.log(MainMin);
          //

          this.user_id = sessionStorage.getItem('user_id');
          this.vendor_id = sessionStorage.getItem('vendor_id');
      },
  
      mounted() {

          
      // Fetch data from your API endpoint
      this.fetchUserVendorData();
      //
      this.fetchProductsByVendor();
      },
      methods: {
        onImageChange(event) {
            this.selectedProduct.newImage = event.target.files[0];
        },

        showModal(product) {
      this.selectedProduct = { ...product }; // Create a copy to avoid modifying the original data
      this.modalVisible = true;
    },

    async updateProduct() {
      try {
        const formData = new FormData();
        formData.append('product_id', this.selectedProduct.product_id);
        formData.append('product_name', this.selectedProduct.product_name);
        formData.append('prod_image', this.selectedProduct.newImage);
        formData.append('type', this.selectedProduct.type);
        formData.append('price', this.selectedProduct.price);

        // Make an API call to update the product based on product_id
        const response = await axios.post(`/updateProduct/${this.selectedProduct.product_id}`, formData);

        const data = response.data;

        if (response.status === 200 && data.msg === 'Product updated successfully') {
          console.log('Product updated successfully:', data);
          // Close the modal after successful update
          this.closeModal();
        } else {
          console.error('Failed to update product:', data.msg);
        }
      } catch (error) {
        console.error('Error during product update:', error);
      }
    },




    //


          async fetchUserVendorData() {
              try {
                  const response = await axios.get(`getVendorsData/${this.vendor_id}`); // Update the API endpoint
                  // this.vendors = {vendor_id:response.data[0].vendor_id};
                  // this.vendors = {vendor_name:response.data[0].vendor_name};
                  
                  this.vendors = {status:response.data[0].status};
                  this.vendors = response.data;
              } catch (error) {
                  console.error('Error fetching vendor data:', error);
              }
          },

          //

          async fetchProductsByVendor() {
              try {
                  const response = await axios.get(`getProducts/${this.vendor_id}`); // Replace with your actual API endpoint
                  this.products = response.data;
              } catch (error) {
                  console.error('Error fetching products:', error);
              }
          },

          //

          handleImageChange(event) {
          // Handle the file input change and update the prod_image property
          this.prod_image = event.target.files[0];
          },
          async addProduct() {
              try {
                  const formData = new FormData();
                  formData.append('vendor_id', this.vendor_id);
                  formData.append('product_name', this.product_name);
                  formData.append('prod_image', this.prod_image);
                  formData.append('type', this.type);
                  formData.append('price', this.price);

                  const response = await axios.post('addProduct', formData);

                  const data = response.data;

                  if (response.status === 200 && data.msg === 'Product added successfully') {
                  console.log('Product added successfully:', data);
                  } else {
                  console.error('Failed to add product:', data.msg);
                  }
              } catch (error) {
                  console.error('Error during product addition:', error);
              }
          },
      },
  }
  </script>
  
  <style>
  @import url('https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css');
  @import '../../assets/css/main.css';

  .prod-image{
      max-width:100px;
      max-height:100px;
      object-fit:cover;
  }

  .custom-card {
    background-color: #3498db; /* Blue background color */
    color: #fff; /* White text color */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .form-label {
    display: block;
    margin-bottom: 8px;
    font-size: 14px;
    color: #fff;
  }

  .form-input {
    width: 100%;
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #fff;
    border-radius: 4px;
    background-color: transparent;
    color: #fff;
  }

  .form-select {
    width: 100%;
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #000000;
    border-radius: 4px;
    background-color: transparent;
    color: #130f0f;
  }

  .form-button {
    background-color: #000000; /* White background color */
    color: #3498db; /* Blue text color */
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
  }

  .form-button:hover {
    background-color: #2980b9; /* Darker blue on hover */
  }
  </style>