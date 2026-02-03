<template>
  <div class="bg-gray-50 p-4 rounded shadow">
    <CourseForm :curso="editando" @limpiar="limpiar" />
    <CourseList @editar="c => editando = {...c}" />
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { loadCourses } from '../../state.js';
import CourseForm from './CourseForm.vue';
import CourseList from './CourseList.vue';

const editando = ref({ name: '', description: '' });
const limpiar = () => editando.value = { name: '', description: '' };

onMounted(loadCourses);
</script>