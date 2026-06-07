<script setup>
import { ref } from "vue"

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

      <div v-if="showUniversities" class="box">

        <a
          href="https://www.ruhr-uni-bochum.de/"
          target="_blank"
        >
          Ruhr-Universität Bochum (RUB)
        </a>

        <a
          href="https://www.hochschule-bochum.de/"
          target="_blank"
        >
          Hochschule Bochum
        </a>

        <a
          href="https://www.hs-gesundheit.de/"
          target="_blank"
        >
          Hochschule für Gesundheit (HSZG)
        </a>

        <a
          href="https://www.thga.de/"
          target="_blank"
        >
          Technische Hochschule Georg Agricola (THGA)
        </a>

        <a
          href="https://www.folkwang-uni.de/"
          target="_blank"
        >
          Folkwang Universität der Künste
        </a>

      </div>

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

.box {
  background-color: #e5ec98;
  width: 330px;
  padding: 30px;
  position: absolute;
  top: 0;
  left: 380px;
}

.box a {
  display: block;
  color: black;
  text-decoration: none;
  font-weight: bold;
  margin-bottom: 25px;
  line-height: 1.3;
}

.box a:hover {
  text-decoration: underline;
}

</style>