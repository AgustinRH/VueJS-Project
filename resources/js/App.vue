<template>
  <div class="p-8 max-w-6xl mx-auto">
    <nav class="flex gap-4 mb-8 bg-white p-4 shadow rounded">
      <router-link to="/cursos" class="font-bold text-indigo-600" active-class="underline">Cursos</router-link>
      <router-link to="/estudiantes" class="font-bold text-green-600" active-class="underline">Estudiantes</router-link>
    </nav>

    <router-view></router-view>
  </div>
</template>