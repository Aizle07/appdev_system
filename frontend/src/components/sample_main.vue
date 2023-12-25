<template>
  <table>
    <thead>
      <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Token</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="vendor in filteredVendors" :key="vendor.id">
        <td>{{ vendor.username }}</td>
        <td>{{ vendor.password }}</td>
        <td>{{ vendor.token }}</td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      vendors: [],
    };
  },
  computed: {
    filteredVendors() {
      return this.vendors.filter(vendor => vendor.username === 'bebang');
    }
  },
  mounted() {
    this.getdata();
  },
  methods: {
    async getdata() {
      try {
        const response = await axios.get('getUserData');
        this.vendors = response.data;
      } catch (error) {
        console.error('Error fetching vendor data:', error);
      }
    },
  },
};
</script>
