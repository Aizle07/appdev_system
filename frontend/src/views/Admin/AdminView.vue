<template>

  <!-- aside -->

  <aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>
      Admin <b class="font-black">One</b>
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
        <a href="tables.html">
          <span class="icon"><i class="mdi mdi-table"></i></span>
          <span class="menu-item-label">Tables</span>
        </a>
      </li>
      <li class="--set-active-forms-html">
        <a href="forms.html">
          <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
          <span class="menu-item-label">Forms</span>
        </a>
      </li>
      <li class="--set-active-profile-html">
        <a href="profile.html">
          <span class="icon"><i class="mdi mdi-account-circle"></i></span>
          <span class="menu-item-label">Profile</span>
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
      <li>Admin</li>
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
            <div class="widget-label">
              <h3>
                Clients
              </h3>
              <h1>
                512
              </h1>
            </div>
            <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3>
                Sales
              </h3>
              <h1>
                $7,770
              </h1>
            </div>
            <span class="icon widget-icon text-blue-500"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3>
                Performance
              </h3>
              <h1>
                256%
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
            <th>Vendor_ID</th>
            <th>Vendor Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Status</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="vendor in vendors" :key="vendor.vendor_id" @click="showModal(vendor)">
            <td>{{ vendor.vendor_id }}</td>
            <td>{{ vendor.vendor_name }}</td>
            <td>{{ vendor.contact_email }}</td>
            <td>{{ vendor.contact_number }}</td>
            <td>{{ vendor.status }}</td>

          </tr>

          </tbody>
        </table>

        <v-dialog v-model="modalVisible">
      <v-card>
        <v-card-title>Vendor Details</v-card-title>
        <v-card-text>
          <v-form>
            <div>Vendor ID: {{ selectedVendor.vendor_id }}</div>
            <v-text-field label="Vendor Name" v-model="selectedVendor.vendor_name"></v-text-field>
            <v-text-field label="Email" v-model="selectedVendor.contact_email"></v-text-field>
            <v-text-field label="Contact Number" v-model="selectedVendor.contact_number"></v-text-field>
            <v-text-field label="Status" v-model="selectedVendor.status" readonly></v-text-field>
          </v-form>
        </v-card-text>
        <v-card-actions>
          <v-btn @click="approvedVendor">Approve</v-btn>
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

</template>

<script>
import axios from 'axios'

import Main from '../../assets/js/main.js';
import MainMin from '../../assets/js/main.min.js';

export default {
    data() {
        return {
        vendors: [],
        modalVisible: false,
      selectedVendor: {},
        };
    },

    created(){
        console.log(Main);
        console.log(MainMin);
    },

    mounted() {
    // Fetch data from your API endpoint
    this.fetchVendorData();
  
    },
    methods: {
      showModal(vendor) {
      this.selectedVendor = { ...vendor }; // Create a copy to avoid modifying the original data
      this.modalVisible = true;
    },

    async approvedVendor() {
      try {
        const response = await axios.post(`approved/${this.selectedVendor.vendor_id}`);

        if (response.data.msg === 'Vendor approved successfully') {
          this.selectedVendor.status = 'Approved';
          this.modalVisible = false;
        } else {
          console.error('Error approving vendor:', response.data.msg);
        }
      } catch (error) {
        console.error('Error approving vendor:', error);
      }
    },

    closeModel() {
      this.modalVisible = false;
    },
        async fetchVendorData() {
        try {
            const response = await axios.get('getVendorData'); // Update the API endpoint
            this.vendors = response.data;
        } catch (error) {
            console.error('Error fetching vendor data:', error);
        }
        },
    },
}
</script>

<style>
@import url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css');
@import '../../assets/css/main.css';
</style>