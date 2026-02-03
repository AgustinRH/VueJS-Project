<template>
  <div class="bg-gray-50 p-4 rounded shadow">
    <StudentForm :estudiante="editando" @limpiar="limpiar" />
    <StudentList @editar="s => editando = {...s}" />
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { loadStudents, loadCourses } from '../../state.js';
import StudentForm from './StudentForm.vue';
import StudentList from './StudentList.vue';

const editando = ref({ name: '', email: '', course_id: '' });
const limpiar = () => editando.value = { name: '', email: '', course_id: '' };

onMounted(() => {
    loadStudents();
    loadCourses();
});
</script>