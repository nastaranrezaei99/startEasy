<script setup>
// Props werden verwendet, um Daten an die InfoCard-Komponente zu übergeben. 
//Dadurch können dieselben Karten mehrfach verwendet werden, ohne den Code zu duplizieren.
defineProps({
  title: String,
  image: String,
  text: String,
  link1Name: String,
  link1Url: String,
  link2Name: String,
  link2Url: String
})
</script>

<template>
  <div class="card">

    <img :src="image" :alt="title">

    <div class="card-content">

      <h2>{{ title }}</h2>

      <p>{{ text }}</p>

      <div class="links">

        <a
          :href="link1Url"
          target="_blank"
        >
          {{ link1Name }}
        </a>
      <!-- Zweiter Link wird nur angezeigt,
             wenn link2Name vorhanden ist -->

      <!--Conditional Rendering-->
        <a v-if="link2Name" :href="link2Url" target="_blank">
          {{ link2Name }}
        </a>

      </div>

    </div>

  </div>
</template>

<style scoped>

.card {
  background-color: #f5f3d0;
  border-radius: 22px;
  overflow: hidden;
  width: 330px;
}

.card img {
  width: 100%;
  height: 180px;
  object-fit: cover;
}

.card-content {
  padding: 25px;
}

.card h2 {
  margin: 0 0 15px;
  font-size: 26px;
}

.card p {
  font-size: 18px;
  line-height: 1.5;
}

.links {
  margin-top: 20px;
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
}

.links a {
  text-decoration: none;
  background: white;
  color: black;
  padding: 8px 12px;
  border-radius: 10px;
  font-size: 14px;
  font-weight: bold;
}

.links a:hover {
  background: #dddddd;
}

</style>