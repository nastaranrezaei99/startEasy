<script setup>
import { ref } from 'vue'
import MarketplaceCard from '../components/MarketplaceCard.vue'
import MarketplaceForm from '../components/MarketplaceForm.vue'
import SignupBox from '../components/SignupBox.vue'

const showCreateForm = ref(false)
const showSignup = ref(false)

const items = ref([
  {
    id: 1,
    title: "Zwischenmiete",
    description: "1 Zimmer 24m2",
    location: "Laerholzstr.21",
    contact: "test@email.de",
    image: "https://images.unsplash.com/photo-1505693416388-ac5ce068fe85"
  },
  {
    id: 2,
    title: "Fahrrad",
    description: "Elektro zustand sehr gut preis 40€",
    location: "Bochum",
    contact: "017612345678",
    image: "https://images.unsplash.com/photo-1485965120184-e220f721d03e"
  }
])

function openCreateForm() {
  showCreateForm.value = true
  showSignup.value = false
}

function openSignup() {
  showSignup.value = true
}
</script>

<template>
  <main class="page">
    <header class="header">
      <h1>Marketplace</h1>

      <div class="location-box">
        <p>Bochum</p>
      </div>

      <button class="create-button" @click="openCreateForm">
        + Neue Anzeige erstellen
      </button>
    </header>

    <section class="items">
      <MarketplaceCard
        v-for="item in items"
        :key="item.id"
        :item="item"
      />
    </section>

    <section v-if="showCreateForm" class="create-area">
      <MarketplaceForm @formSubmit="openSignup" />

      <SignupBox v-if="showSignup" />
    </section>
  </main>
</template>

<style>
body {
  margin: 0;
  font-family: Arial, sans-serif;
  background-color: #edf5a8;
}

.page {
  min-height: 100vh;
  padding: 30px 50px;
}

.header {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
}

h1 {
  margin: 0;
  background-color: #f5f5c9;
  padding: 10px 40px 25px 10px;
  font-size: 36px;
}

.location-box {
  margin-right: auto;
  margin-left: 500px;
  font-size: 24px;
}

.location-box p {
  margin: 0 0 10px 0;
}

.create-button {
  background-color: #2d007d;
  color: white;
  border: none;
  border-radius: 30px;
  padding: 18px 40px;
  font-size: 20px;
  cursor: pointer;
}

.items {
  display: flex;
  justify-content: center;
  gap: 60px;
  margin-top: 110px;
}

.create-area {
  position: relative;
  width: 700px;
  min-height: 470px;
  margin: 100px auto 0;
  background-color: #ddffd7;
  padding: 30px;
}
</style>