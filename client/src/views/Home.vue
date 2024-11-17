<template>
    <div>
      <h1>Employee List</h1>
      <ul v-if="employees.length > 0">
        <li v-for="employee in employees" :key="employee.id">
          {{ employee.full_name }} - {{ employee.section }}
        </li>
      </ul>
      <p v-else>No employees found</p>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  
  const employees = ref([]);
  
  const fetchEmployees = async () => {
    try {
      const response = await axios.get('/employees'); 
      console.log('API Response:', response.data); 
      employees.value = response.data.data; 
    } catch (error) {
      console.error('Error fetching employees:', error);
    }
  };
  
  
  onMounted(fetchEmployees); 
  </script>
  