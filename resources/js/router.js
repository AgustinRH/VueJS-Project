import { createRouter, createWebHistory } from 'vue-router';
import CourseIndex from './components/courses/CourseIndex.vue';
import StudentIndex from './components/students/StudentIndex.vue';

const routes = [
    { path: '/', redirect: '/cursos' },
    { path: '/cursos', component: CourseIndex },
    { path: '/estudiantes', component: StudentIndex },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});