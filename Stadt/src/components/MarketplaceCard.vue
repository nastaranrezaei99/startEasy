<script setup>
const props = defineProps({
  item: Object
})
</script>

<template>
  <div class="marketplace-card">
    <img :src="props.item.image" alt="Artikel Bild">

    <h2>{{ props.item.title }}</h2>
    <p>{{ props.item.description }}</p>
    <p>{{ props.item.location }}</p>

    <button class="contact-button">
      Kontakt
    </button>
  </div>
</template>

<style>
.marketplace-card {
  background-color: #846c4b;
  width: 300px;
  padding: 0 0 25px 0;
  text-align: center;
  border-radius: 20px;
}

.marketplace-card img {
  width: 300px;
  height: 180px;
  object-fit: cover;
  border-radius: 20px;
}

.marketplace-card h2 {
  font-size: 18px;
  margin: 12px 0 5px 0;
  font-weight: normal;
  color:white;
}

.marketplace-card p {
  margin: 5px 0;
  font-size: 16px;
   color:white;
}

.contact-button {
  margin-top: 18px;
  background-color: #483826;
  color: white;
  border: none;
  border-radius: 30px;
  padding: 10px 35px;
  cursor: pointer;
}
</style>