
<template>
  <div>
    <h2>Uptime Monitor</h2>
    <select v-model="clientId" @change="loadWebsites">
      <option value="">Select Client</option>
      <option v-for="c in clients" :key="c.id" :value="c.id">{{ c.email }}</option>
    </select>
    <ul>
      <li v-for="w in websites" :key="w.id">
        <a href="#" @click.prevent="open(w.url)">{{ w.url }}</a>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const clients = ref([])
const websites = ref([])
const clientId = ref('')

onMounted(async () => {
  clients.value = (await axios.get('/api/clients')).data
})

const loadWebsites = async () => {
  websites.value = (await axios.get(`/api/clients/${clientId.value}/websites`)).data
}

const open = (url) => {
  if (confirm(`You are about to visit ${url}. Continue?`)) {
    window.open(url,'_blank')
  }
}
</script>
