<script setup>
import { ref } from 'vue'

const showCreateForm = ref(false)

const events = ref([
  {
    id: 1,
    title: 'Lerngruppe Informatik',
    date: '20.05.2026',
    time: '12:00',
    location: 'RUB Bibliothek',
    participants: 5
  },
  {
    id: 2,
    title: 'Fußball spielen',
    date: '23.05.2026',
    time: '17:00',
    location: 'Querenburger Straße 29, 44789 Bochum',
    participants: 3
  },
  {
    id: 3,
    title: 'Coffee Meetup',
    date: '10.05.2026',
    time: '19:00',
    location: 'Bermudadreieck',
    participants: 5
  }
])

const newEvent = ref({
  title: '',
  date: '',
  time: '',
  location: '',
  description: ''
})

function openCreateForm() {
  showCreateForm.value = true
}

function createEvent() {
  events.value.push({
    id: Date.now(),
    title: newEvent.value.title,
    date: newEvent.value.date,
    time: newEvent.value.time,
    location: newEvent.value.location,
    participants: 1
  })

  newEvent.value = {
    title: '',
    date: '',
    time: '',
    location: '',
    description: ''
  }

  showCreateForm.value = false
}
</script>

<template>
  <main class="page">
    <header class="header">
      <h1>Events</h1>

      <div class="location">
        <p>+ Standort</p>
        <p>Bochum</p>
      </div>

      <button class="create-button" @click="openCreateForm">
        + Neues Event erstellen
      </button>
    </header>

    <section class="events-grid">
      <div v-for="event in events" :key="event.id" class="event-card">
        <h2>[ {{ event.title }} ]</h2>
        <p>📅 {{ event.date }}</p>
        <p>🕒 {{ event.time }}</p>
        <p>📍 {{ event.location }}</p>
        <p>👥 {{ event.participants }} Teilnehmer</p>

        <button class="join-button">Beitreten</button>
      </div>
    </section>

    <section v-if="showCreateForm" class="form-section">
      <div class="form-left">
        <h2>Neues Event erstellen</h2>
        <p>
          Um ein neues Event zu erstellen,
          musst du dich zuerst registrieren.
        </p>
        <button class="signup-button">Sign-up</button>
      </div>

      <form class="event-form" @submit.prevent="createEvent">
        <label>
          Titel:
          <input v-model="newEvent.title" type="text" placeholder="z.B. Fußball spielen" required>
        </label>

        <label>
          Datum:
          <input v-model="newEvent.date" type="text" placeholder="TT.MM.JJJJ" required>
        </label>

        <label>
          Uhrzeit:
          <input v-model="newEvent.time" type="text" placeholder="--:--" required>
        </label>

        <label>
          Standort:
          <input v-model="newEvent.location" type="text" placeholder="z.B. Bochum" required>
        </label>

        <label>
          Beschreibung:
          <textarea v-model="newEvent.description" placeholder="Beschreibung des Events"></textarea>
        </label>

        <button class="submit-button" type="submit">
          erstellen
        </button>
      </form>
    </section>
  </main>
</template>

<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, sans-serif;
  background: #edf5a8;
}

.page {
  min-height: 100vh;
  padding: 20px 50px;
  background: #edf5a8;
}

.header {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
}

h1 {
  margin: 0;
  font-size: 36px;
  background: #f5f5c9;
  padding: 10px 35px 25px 5px;
}

.location {
  margin-right: auto;
  margin-left: 40px;
  font-size: 24px;
  line-height: 1.4;
}

.location p {
  margin: 0 0 10px;
}

.create-button,
.join-button,
.signup-button,
.submit-button {
  border: none;
  background: #003c9e;
  color: white;
  border-radius: 30px;
  cursor: pointer;
}

.create-button {
  background: #2d007d;
  padding: 18px 45px;
  font-size: 20px;
}

.events-grid {
  display: flex;
  justify-content: space-around;
  gap: 60px;
  margin-top: 120px;
}

.event-card {
  width: 300px;
  min-height: 190px;
  background: #ddffd7;
  text-align: center;
  padding: 35px 20px 20px;
}

.event-card h2 {
  font-size: 17px;
  margin: 0 0 8px;
}

.event-card p {
  margin: 3px 0;
  font-size: 16px;
}

.join-button {
  margin-top: 20px;
  padding: 10px 35px;
  font-size: 16px;
}

.form-section {
  display: flex;
  gap: 40px;
  width: 70%;
  margin: 100px auto 0;
  padding: 40px;
  background: #ddffd7;
}

.form-left {
  width: 35%;
  border-right: 1px solid #999;
  padding-right: 40px;
}

.form-left h2 {
  margin-top: 0;
}

.form-left p {
  margin-top: 70px;
  font-size: 20px;
  line-height: 1.5;
}

.signup-button {
  margin-top: 20px;
  padding: 12px 30px;
  font-size: 16px;
}

.event-form {
  width: 65%;
  display: flex;
  flex-direction: column;
  gap: 22px;
}

.event-form label {
  display: grid;
  grid-template-columns: 120px 1fr;
  align-items: center;
  font-size: 18px;
}

.event-form input,
.event-form textarea {
  padding: 12px;
  border: 1px solid #ddd;
  font-size: 16px;
}

.event-form textarea {
  min-height: 80px;
}

.submit-button {
  align-self: center;
  padding: 12px 50px;
  font-size: 18px;
}
</style>