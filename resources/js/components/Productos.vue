<template>
  <div>
    <h2>Gestión de productos</h2>

    <input v-model="filtro" placeholder="Buscar producto..." class="border p-2 mb-3">

    <ul>
      <li v-for="p in productosFiltrados" :key="p.id">
        {{ p.nombre }} - {{ p.precio }} € 
        <button @click="editar(p)">Editar</button>
        <button @click="borrar(p.id)">Eliminar</button>
      </li>
    </ul>

    <h3>{{ editando ? 'Editar producto' : 'Nuevo producto' }}</h3>
    <input v-model="form.nombre" placeholder="Nombre">
    <input v-model="form.descripcion" placeholder="Descripción">
    <input v-model="form.precio" type="number" placeholder="Precio">
    <input v-model="form.stock" type="number" placeholder="Stock">
    <button @click="guardar">Guardar</button>
  </div>
</template>

<script>
export default {
  name: 'Productos',
  data() {
    return {
      productos: [],
      form: { id: null, nombre: '', descripcion: '', precio: '', stock: '' },
      filtro: '',
      editando: false,
      apiBase: 'http://localhost/api/productos'
    };
  },
  computed: {
    productosFiltrados() {
      return this.productos.filter(p =>
        p.nombre.toLowerCase().includes(this.filtro.toLowerCase())
      );
    },
  },
  methods: {
    async cargarProductos() {
      try {
        const res = await fetch(this.apiBase,{
          headers: { 'Accept': 'application/json' }
        });
        if (!res.ok) throw new Error('Error al cargar productos');
        this.productos = await res.json();
      } catch (error) {
        console.error(error);
      }
    },
    async guardar() {
      try {
        const options = {
          method: this.editando ? 'PUT' : 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          },
          body: JSON.stringify(this.form)
        };

        const url = this.editando ? `${this.apiBase}/${this.form.id}` : this.apiBase;

        const res = await fetch(url, options);
        if (!res.ok) throw new Error('Error al guardar el producto');

        this.resetForm();
        this.cargarProductos();
      } catch (error) {
        console.error(error);
      }
    },
    editar(prod) {
      this.form = { ...prod };
      this.editando = true;
    },
    async borrar(id) {
      try {
        const res = await fetch(`${this.apiBase}/${id}`, { method: 'DELETE' });
        if (!res.ok) throw new Error('Error al borrar el producto');
        this.cargarProductos();
      } catch (error) {
        console.error(error);
      }
    },
    resetForm() {
      this.form = { id: null, nombre: '', descripcion: '', precio: '', stock: '' };
      this.editando = false;
    },
  },
  mounted() {
    this.cargarProductos();
  },
};
</script>