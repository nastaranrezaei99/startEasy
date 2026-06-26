<script setup>
import { ref, computed, watch, onMounted } from 'vue'

const personalTodos = ref([])
const newTodo = ref('')

onMounted(() => {
  const saved = localStorage.getItem('personalTodos')

  if (saved) {
    personalTodos.value = JSON.parse(saved)
  }
})

watch(
  personalTodos,
  () => {
    localStorage.setItem(
      'personalTodos',
      JSON.stringify(personalTodos.value)
    )
  },
  { deep: true }
)

function addTodo() {
  if (newTodo.value.trim() === '') return

  personalTodos.value.push({
    id: Date.now(),
    text: newTodo.value,
    done: false
  })

  newTodo.value = ''
}

const progress = computed(() => {
  if (personalTodos.value.length === 0) return 0

  const done = personalTodos.value.filter(todo => todo.done).length

  return Math.round(done / personalTodos.value.length * 100)
})
</script>

<template>
  <div class="checklist-box">

    <h2>persönliche Checkliste</h2>

    <div class="progress-text">
      Fortschritt: {{ progress }}%
    </div>

    <div class="progress-bar">
      <div
        class="progress-fill"
        :style="{ width: progress + '%' }"
      ></div>
    </div>

    <div class="add-box">
      <input
        v-model="newTodo"
        placeholder="Neue Aufgabe..."
        @keyup.enter="addTodo"
      >

      <button @click="addTodo">
        Hinzufügen
      </button>
    </div>

    <div
      v-for="todo in personalTodos"
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

.add-box {
  display: flex;
  gap: 10px;
  margin-bottom: 20px;
}

.add-box input {
  flex: 1;
  padding: 12px;
  border: none;
  border-radius: 10px;
}

.add-box button {
  padding: 12px 18px;
  border: none;
  border-radius: 10px;
  background: #8a704d;
  color: white;
  cursor: pointer;
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