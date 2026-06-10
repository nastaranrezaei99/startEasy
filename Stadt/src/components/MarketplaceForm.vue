<script setup>
import { ref } from 'vue'

const emit = defineEmits(['formSubmit'])

const title = ref('')
const description = ref('')
const location = ref('')
const contact = ref('')
const imageUrl = ref('')
const imageFile = ref('')

function submitForm() {
  emit('formSubmit')
}
</script>

<template>
  <form class="marketplace-form" @submit.prevent="submitForm">
    <label>Artikel:</label>
    <input v-model="title" type="text" required>

    <label>Beschreibung:</label>
    <input v-model="description" type="text" required>

    <label>Standort:</label>
    <input v-model="location" type="text" required>

    <label>Email oder Telefonnummer:</label>
    <input v-model="contact" type="text" required>

    <label>Foto URL:</label>
    <input v-model="imageUrl" type="text">

    <label>Oder Bild auswählen:</label>
    <input class="file-input" type="file">

    <button class="submit-button" type="submit">
      erstellen
    </button>
  </form>
</template>

<style>
.marketplace-form {
  width: 500px;
  display: flex;
  flex-direction: column;
  
}

.marketplace-form label {
  font-size: 20px;
  margin-top: 22px;
  color: white;
}

.marketplace-form input {
  width: 470px;
  height: 32px;
  border: 1px solid gray;
  background-color: white;
  font-size: 18px;
  outline: none;
}

.marketplace-form .file-input {
  border: none;
  background-color: transparent;
  font-size: 16px;
  height: auto;
}

.submit-button {
  margin-top: 25px;
  width: 120px;
  background-color: #483826;
  color: white;
  border: none;
  border-radius: 12px;
  padding: 14px 25px;
  font-size: 18px;
  cursor: pointer;
}
</style>