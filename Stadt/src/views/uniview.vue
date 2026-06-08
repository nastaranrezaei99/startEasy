<script setup>
import { ref } from "vue"
import UniBox from "../components/unibox.vue"

const showUniversities = ref(false)
</script>

<template>
  <div class="page">

    <div class="nav">

      <h1>StartEasy</h1>

      <RouterLink
      to="/erste-schritte"
      class="menu-link"
      >
      Erste Schritte
      </RouterLink>

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

      <span class="city-name">
        Bochum
      </span>

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
  padding: 20px;
  font-size: 20px;
}

.nav h1 {
  margin: 0;
  background-color: #f5f3d0;
  padding: 15px 35px;
}

.city-name {
  margin-left: auto;
  font-weight: bold;
  font-size: 24px;
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
  margin: 0 35px;
  background-image: url("/bochum_rathaus.jpg");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  position: relative;
}

</style>