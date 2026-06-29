<script setup>
import { ref, computed, onMounted, watch } from 'vue'


const todos = ref([
  {
    id: 1,
    text: 'Anmeldung beim Bürgerbüro',
    image: '/animation/Anmeldung.png',
    done: false,
    successMessage: 'Super! Du hast dich jetzt offiziell angemeldet.',
    nextSteps: [
      'Bankkonto eröffnen',
      'Verträge abschließen',
      'Offizielle Briefe empfangen'
    ]
  },
  {
    id: 2,
    text: 'Krankenversicherung abschließen',
    image: '/animation/versicherung.png',
    done: false,
    successMessage: 'Sehr gut! Du bist jetzt krankenversichert.',
    nextSteps: [
      'Arzttermine wahrnehmen',
      'Versicherungsnachweis an die Hochschule schicken'
    ]
  },
  {
    id: 3,
    text: 'Bankkonto eröffnen',
    image: '/animation/Bank.png',
    done: false,
    successMessage: 'Perfekt! Du hast jetzt ein deutsches Bankkonto.',
    nextSteps: [
      'Miete überweisen',
      'Deutschlandticket bezahlen'
    ]
  },
  {
    id: 4,
    text: 'Uni-Account aktivieren',
    image: '/animation/Uni.png',
    done: false,
    successMessage: 'Gut gemacht! Dein Uni-Account ist aktiv.',
    nextSteps: ['Moodle nutzen', 'Uni-Mails lesen']
  },
  {
    id: 5,
    text: 'Semesterticket prüfen',
    image: '/animation/Ticket.png',
    done: false,
    successMessage: 'Super! Du hast dein Semesterticket geprüft.',
    nextSteps: ['ÖPNV nutzen', 'Verbindung zur Hochschule planen']
  },
  {
    id: 6,
    text: 'Termin bei der Ausländerbehörde buchen',
    image: '/animation/ausland.png',
    done: false,
    successMessage: 'Sehr gut! Du hast einen wichtigen Behördentermin gebucht.',
    nextSteps: ['Unterlagen vorbereiten', 'Termin im Kalender speichern']
  },
  {
    id: 7,
    text: 'Wohnung oder Wohnheim organisieren',
    image: '/animation/wohnung.png',
    done: false,
    successMessage: 'Perfekt! Deine Wohnsituation ist organisiert.',
    nextSteps: ['Adresse anmelden', 'Mietvertrag sicher aufbewahren']
  },
  {
    id: 8,
    text: 'Notrufnummern kennenlernen',
    image: '/animation/911.png',
    done: false,
    successMessage: 'Sehr gut! Du kennst jetzt wichtige Notrufnummern.',
    nextSteps: ['112 für Notfälle merken', '110 für Polizei merken']
  }
])


const showPopup = ref(false)
const activeTodo = ref(null)

function handleCheck(todo) {
  if (todo.done) {
    activeTodo.value = todo
    showPopup.value = true
  }
}

function closePopup() {
  showPopup.value = false
}
const progress = computed(() => {
  const done = todos.value.filter(todo => todo.done).length
  return Math.round((done / todos.value.length) * 100)
})
onMounted(() => {
  const saved = localStorage.getItem('todos')

  if (saved) {
    todos.value = JSON.parse(saved)
  }
})

watch(
  todos,
  () => {
    localStorage.setItem('todos', JSON.stringify(todos.value))
  },
  { deep: true }
)

</script>

<template>
  <div class="checklist-box">
    <h2>Checkliste</h2>

    <div class="progress-text">
      Fortschritt: {{ progress }}%
    </div>

    <div class="progress-bar">
      <div class="progress-fill" :style="{ width: progress + '%' }"></div>
    </div>

    <div v-for="todo in todos" :key="todo.id" class="todo-item">
      <input type="checkbox" v-model="todo.done" @change="handleCheck(todo)">

      <span :class="{ done: todo.done }">
        {{ todo.text }}
      </span>
    </div>

    <div v-if="showPopup" class="popup-overlay">
      <div class="popup-card">
        <img :src="activeTodo.image" class="celebration-image" alt="Success">

        <h3>{{ activeTodo.successMessage }}</h3>

        <p>Jetzt kannst du zum Beispiel:</p>

        <ul>
          <li v-for="step in activeTodo.nextSteps" :key="step">
            {{ step }}
          </li>
        </ul>

        <button @click="closePopup">Okay</button>
      </div>
    </div>
  </div>
</template>

<style scoped>
.checklist-box {
  flex: 1;
  background: #f5f3d0;
  padding: 35px;
  border-radius: 18px;
  min-height: 650px;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
}

.progress-text {
  text-align: center;
  margin-bottom: 10px;
}

.progress-bar {
  width: 100%;
  height: 14px;
  background: white;
  border-radius: 20px;
  overflow: hidden;
  margin-bottom: 25px;
}

.progress-fill {
  height: 100%;
  background: #8a704d;
  transition: .3s;
}

.todo-item {
  background: white;
  padding: 15px;
  margin-bottom: 12px;
  border-radius: 10px;
}

.todo-item input {
  margin-right: 10px;
}

.done {
  text-decoration: line-through;
  color: gray;
}

.popup-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.35);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
}

.popup-card {
  background: white;
  padding: 28px;
  border-radius: 20px;
  width: 420px;
  max-width: 90%;
  text-align: center;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
  animation: popIn 0.4s ease;
}

.celebration-image {
  width: 120px;
  margin-bottom: 15px;
  animation: jump 1s ease infinite;
}

.popup-card ul {
  text-align: left;
}

.popup-card button {
  margin-top: 16px;
  padding: 10px 20px;
  border: none;
  border-radius: 12px;
  background-color: #846c4b;
  color: white;
  cursor: pointer;
}

@keyframes popIn {
  from {
    transform: scale(0.7);
    opacity: 0;
  }

  to {
    transform: scale(1);
    opacity: 1;
  }
}

@keyframes jump {
  0% {
    transform: translateY(0) scale(1);
  }

  30% {
    transform: translateY(-18px) scale(1.05);
  }

  60% {
    transform: translateY(0) scale(1);
  }

  100% {
    transform: translateY(0) scale(1);
  }
}
</style>