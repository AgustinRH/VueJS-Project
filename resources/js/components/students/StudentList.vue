<template>
  <table class="w-full bg-white shadow-sm mt-4">
    <thead>
      <tr class="bg-gray-200">
        <th class="p-2 text-left">Nombre</th>
        <th class="p-2 text-left">Curso</th>
        <th class="p-2 text-right">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="s in students" :key="s.id" class="border-b">
        <td class="p-2">{{ s.name }}</td>
        <td class="p-2">
          <span class="bg-blue-100 px-2 py-1 rounded text-xs">
            {{ s.course?.name || 'Sin curso' }}
          </span>
        </td>
        <td class="p-2 text-right">
          <button @click="$emit('editar', s)" class="text-blue-500 mr-2">Editar</button>
          <button @click="borrar(s.id)" class="text-red-500">X</button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script setup>
import axios from 'axios';
import { students, loadStudents, loadCourses } from '../../state.js';

const borrar = (id) => {
  if (confirm('¿Borrar?')) {
    axios.delete(`/api/students/${id}`).then(() => {
        loadStudents();
        loadCourses();
    });
  }
};
</script>