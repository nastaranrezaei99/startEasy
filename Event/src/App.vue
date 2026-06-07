<script setup>
import { ref } from 'vue'
import EventCard from './components/EventCard.vue'
import EventForm from './components/EventForm.vue'
import SignupBox from './components/SignupBox.vue'

const showCreateForm = ref(false)
const showSignup = ref(false)

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
      <EventCard
        v-for="event in events"
        :key="event.id"
        :event="event"
      />
    </section>

    <section v-if="showCreateForm" class="create-area">
      <EventForm @formSubmit="openSignup" />

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

.create-area {
  position: relative;
  width: 700px;
  min-height: 330px;
  margin: 100px auto 0;
  background-color: #ddffd7;
  padding: 30px;
}
</style>