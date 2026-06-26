<script setup>
import { ref, computed } from 'vue'

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

const progress = computed(() => {
  const done = todos.value.filter(todo => todo.done).length
  return Math.round((done / todos.value.length) * 100)
})
</script>

<template>
  <div class="checklist-box">
    <h2>Checkliste</h2>

    <div class="progress-text">
      Fortschritt: {{ progress }}%
    </div>

    <div class="progress-bar">
      <div
        class="progress-fill"
        :style="{ width: progress + '%' }"
      ></div>
    </div>

    <div
      v-for="todo in todos"
      :key="todo.id"
      class="todo-item"
    >
      <input type="checkbox" v-model="todo.done">

      <span :class="{ done: todo.done }">
        {{ todo.text }}
      </span>
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
</style>