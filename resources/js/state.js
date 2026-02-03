import { ref } from 'vue';
import axios from 'axios';

export const courses = ref([]);
export const students = ref([]);

export const loadCourses = () => axios.get('/api/courses').then(r => courses.value = r.data);
export const loadStudents = () => axios.get('/api/students').then(r => students.value = r.data);