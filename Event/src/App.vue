<script setup>
import { ref } from 'vue'

const showCreateForm = ref(false)
const showSignup = ref(false)

//eine Liste von schon ertellten Events
//ich habe ref benutzt, da wi neue Events hinzufügen möchten und das braucen wir für später

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
//Jetzt ist die Variabeln leer, damit die Nutzer in Formuler die info ausfüllen

const title = ref('')
const date = ref('')
const time = ref('')
const location = ref('')
const description = ref('')


const name = ref('')
const vorname = ref('')
const email = ref('')
const password = ref('')

//Eventerstellung öffnen
function openCreateForm() {
  showCreateForm.value = true
  showSignup.value = false
}

function openSignup() {
  showSignup.value = true
}
</script>

<!--HTML-->
<template>
  <main class="page">

    <header class="header">
      <h1>Events</h1>

      <div class="location-box">
        <p>+ Standort</p>
        <p>Bochum</p>
      </div>

      <button class="create-button" @click="openCreateForm">
        + Neues Event erstellen
      </button>
    </header>

    <section class="events">
      <div v-for="event in events"  class="event-card">
        <h2> {{ event.title }} </h2>
        <p> {{ event.date }}</p>
        <p> {{ event.time }}</p>
        <p> {{ event.location }}</p>
        <p> {{ event.participants }} Teilnehmer</p>

        <button class="join-button">
          Beitreten
        </button>
      </div>
    </section>

    <section v-if="showCreateForm" class="create-area">

      <!--Es ist eine Button mit Type submit, damit wir später die Info sammeln können-->
      <!--prevent ist dafür die Seitge nicht aktualisiert werden-->
      <form class="event-form" @submit.prevent="openSignup">
        <label>Titel:</label>
        <input v-model="title" type="text" required>



        <label>Datum:</label>
        <input v-model="date" type="text" required>

        <label>Uhrzeit:</label>
        <input v-model="time" type="text" required>

        <label>Standort:</label>
        <input v-model="location" type="text" required>

        <label>Beschreibung:</label>
        <input v-model="description" type="text">

        <button class="submit-button" type="submit">
          erstellen
        </button>
      </form>

      <div v-if="showSignup" class="signup-box">
        <input type="text" placeholder="Name">
        <input type="text" placeholder="Vorname">
        <input type="email" placeholder="email:">
        <input type="password" placeholder="password:">

        <button class="signup-button">
          Sign-up
        </button>
      </div>

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
  margin-left: 40px;
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

.events {
  display: flex;
  justify-content: center;
  gap: 60px;
  margin-top: 110px;
}

.event-card {
  background-color: #ddffd7;
  width: 300px;
  padding: 30px 20px;
  text-align: center;
}

.event-card h2 {
  font-size: 17px;
}

.event-card p {
  margin: 5px 0;
}

.join-button {
  margin-top: 18px;
  background-color: #003c9e;
  color: white;
  border: none;
  border-radius: 30px;
  padding: 10px 35px;
  cursor: pointer;
}

.create-area {
  position: relative;
  width: 700px;
  min-height: 330px;
  margin: 100px auto 0;
  background-color: #ddffd7;
  padding: 30px;
}

.event-form {
  width: 250px;
  display: flex;
  flex-direction: column;
}

.event-form label {
  font-size: 20px;
  font-weight: bold;
  margin-top: 12px;
}

.event-form input {
  width: 120px;
  border: none;
  border-bottom: 2px solid gray;
  background-color: transparent;
  font-size: 18px;
  
}

.submit-button {
  position: absolute;
  bottom: 25px;
  left: 330px;
  background-color: #003c9e;
  color: white;
  border: none;
  border-radius: 10px;
  padding: 14px 45px;
  font-size: 18px;
  cursor: pointer;
}

.signup-box {
  position: absolute;
  top: 20px;
  left: 250px;
  width: 330px;
  background-color: #d7ffd7;
  border: 5px solid white;
  padding: 20px;
  box-shadow: -25px 15px 30px gray;
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.signup-box input {
  border: none;
  border-bottom: 2px solid gray;
  background-color: transparent;
  font-size: 22px;
  padding: 5px;
  outline: none;
}

.signup-button {
  width: 120px;
  margin: 5px auto 0;
  background-color: #003c9e;
  color: white;
  border: none;
  border-radius: 30px;
  padding: 10px;
  font-size: 16px;
  cursor: pointer;
}
</style>
