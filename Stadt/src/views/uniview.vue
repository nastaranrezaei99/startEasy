<script setup>
import { ref } from "vue"
import UniBox from "../components/UniBox.vue"

const showUniversities = ref(false)
</script>

<template>
  <div class="page">

    <div class="nav">
      <h1>Bochum</h1>

      <span>+ Standort</span>
      <span>Erste Schritte</span>

      <span
        @click="showUniversities = !showUniversities"
        class="clickable"
      >
        {{ showUniversities ? "× Universität" : "+ Universität" }}
      </span>

      <RouterLink to="/events" class="menu-link">
        Events
      </RouterLink>

      <span>Marketplace</span>
    </div>

    <div class="background">
      <UniBox v-if="showUniversities" />
    </div>

  </div>
</template>

<style scoped>
.page {
  min-height: 100vh;
  background-color: #e5ec98;
  font-family: Arial, sans-serif;
}

.nav {
  display: flex;
  align-items: center;
  gap: 35px;
  background-color: #e5ec98;
  padding: 20px;
  font-size: 20px;
}

.nav h1 {
  margin: 0;
  background-color: #f5f3d0;
  padding: 15px 35px;
}

.clickable {
  cursor: pointer;
  font-weight: bold;
}

.menu-link {
  color: black;
  text-decoration: none;
}

.menu-link:hover {
  text-decoration: underline;
}

.background {
  height: 80vh;
  background-image: url("/bochum_rathaus.jpg");
  background-size: cover;
  background-position: center;
  position: relative;
}
</style>