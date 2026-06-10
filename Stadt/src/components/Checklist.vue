<script setup>
import { ref, computed } from 'vue'
//ref macht die Daten reaktiv. Wenn sich ein Wert ändert, wird die Oberfläche automatisch aktualisiert!!
const todos = ref([
  { id: 1, text: 'Anmeldung beim Bürgerbüro', done: false },
  { id: 2, text: 'Krankenversicherung abschließen', done: false },
  { id: 3, text: 'Bankkonto eröffnen', done: false },
  { id: 4, text: 'Uni-Account aktivieren', done: false },
  { id: 5, text: 'Semesterticket prüfen', done: false },
  { id: 6, text: 'Termin bei der Ausländerbehörde buchen', done: false },
  { id: 7, text: 'Wohnung oder Wohnheim organisieren', done: false },
  { id: 8, text: 'Notrufnummern kennenlernen', done: false }
  
])

</script>

<template>
  <div class="checklist">
    <h2>Checkliste</h2>
    <!-- v-for erzeugt für jede Aufgabe ein Element -->
    <div v-for="todo in todos":key="todo.id" class="todo-item">

      <!-- v-model verbindet Checkbox und done-Wert -->
       <!--Two-Way-Databinding-->
      <input type="checkbox" v-model="todo.done">

      <!--Wenn todo.done true ist, wird die CSS-Klasse done hinzugefügt und der Text wird durchgestrichen-->
      <span :class="{ done: todo.done }">
        {{ todo.text }}
      </span>
    </div>
  </div>
</template>

<style scoped>
.checklist {
  max-width: 1350px;
  margin: 60px auto;
  background-color: #846c4b;
  padding: 35px;
  border-radius: 18px;
}

.checklist h2 {
  margin-bottom: 20px;
  text-align: center;
  font-size: 30px;
  color: white;
}



.todo-item {
  background: white;
  margin-bottom: 12px;
  padding: 14px;
  font-size: 18px;
}

.todo-item input {
  margin-right: 12px;
}

.done {
  text-decoration: line-through;
  color: gray;
}
</style>