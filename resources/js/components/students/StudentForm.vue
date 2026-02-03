<template>
  <form @submit.prevent="enviar" class="mb-4">
    <input v-model="estudiante.name" placeholder="Nombre Alumno" required class="border p-1 mr-2">
    <input v-model="estudiante.email" type="email" placeholder="Email" required class="border p-1 mr-2">
    
    <select v-model="estudiante.course_id" required class="border p-1 mr-2">
      <option value="">Seleccionar Curso...</option>
      <option v-for="c in courses" :key="c.id" :value="c.id">{{ c.name }}</option>
    </select>
    
    <button type="submit" class="bg-green-500 text-white px-4 py-1 rounded">Guardar</button>
  </form>
</template>

<script setup>
import axios from 'axios';
import { courses, loadStudents, loadCourses } from '../../state.js';
const props = defineProps(['estudiante']);
const emit = defineEmits(['limpiar']);

const enviar = async () => {
  if (props.estudiante.id) await axios.put(`/api/students/${props.estudiante.id}`, props.estudiante);
  else await axios.post('/api/students', props.estudiante);
  
  await loadStudents();
  await loadCourses(); // Recargamos cursos para que el contador del reduce se actualice
  emit('limpiar');
};
</script>