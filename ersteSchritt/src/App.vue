<script setup>
import Checklist from '../components/Checklist.vue'
import PersonalChecklist from '../components/PersonalChecklist.vue'
import FirstStep from '../components/FirstStep.vue'
import InfoCard from '../components/InfoCard.vue'

</script>

<template>

  <FirstStep />

  


</template>

<style>
html,
body,
#app {
  margin: 0;
  padding: 0;
}

.checklists {
  max-width: 1400px;
  margin: 60px auto;
  display: flex;
  gap: 30px;
  align-items: flex-start;
}
</style>