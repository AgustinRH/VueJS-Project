<template>
  <div>
    <div class="mb-2 font-bold text-lg text-indigo-700">
      Total Alumnos: {{ totalAlumnos }} </div>
    <ul class="border-t pt-2">
      <li v-for="c in courses" :key="c.id" class="mb-2 flex justify-between bg-white p-2 shadow-sm">
        <span><strong>{{ c.name }}</strong> ({{ c.students?.length || 0 }} alumnos)</span>
        <div>
          <button @click="$emit('editar', c)" class="text-blue-500 mr-2">Editar</button>
          <button @click="borrar(c.id)" class="text-red-500">Eliminar</button>
        </div>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { computed } from 'vue';
import axios from 'axios';
import { courses, loadCourses } from '../../state.js';

const totalAlumnos = computed(() => {
  return courses.value.reduce((acc, c) => acc + (c.students?.length || 0), 0);
});

const borrar = (id) => {
  if (confirm('¿Borrar curso?')) axios.delete(`/api/courses/${id}`).then(loadCourses);
};
</script>