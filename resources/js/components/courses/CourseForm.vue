<template>
  <form @submit.prevent="enviar" class="mb-4">
    <input v-model="curso.name" placeholder="Nombre del curso" required class="border p-1 mr-2">
    <input v-model="curso.description" placeholder="Descripción" required class="border p-1 mr-2">
    <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded">
      {{ curso.id ? 'Actualizar' : 'Crear Curso' }}
    </button>
  </form>
</template>

<script setup>
import axios from 'axios';
import { loadCourses } from '../../state.js';
const props = defineProps(['curso']);
const emit = defineEmits(['limpiar']);

const enviar = async () => {
  if (props.curso.id) await axios.put(`/api/courses/${props.curso.id}`, props.curso);
  else await axios.post('/api/courses', props.curso);
  await loadCourses(); // Actualiza la lista global inmediatamente
  emit('limpiar');
};
</script>