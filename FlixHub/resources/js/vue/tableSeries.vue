<template>
  <div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Título da Série</th>
          <th scope="col">Categoria</th>
          <th scope="col">Streaming</th>
          <th scope="col">Status</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(serie, index) in series" :key="index">
          <th scope="row">{{ serie.id }}</th>
          <td>{{ serie.nome }}</td>
          <td>{{ serie.categoria }}</td>
          <td>{{ serie.streaming }}</td>
          <td>{{ serie.status }}</td>
          <td>
            <i class="bi bi-pencil-square" @click="editar(serie.id)"></i>
            <i class="bi bi-trash"></i>
            <i class="bi bi-check2-square"></i>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<script>
export default {
  props: ['series'],
  
  methods: {
    editar(id) {
      this.$emit('editarserie', id);
    },
  },
};
</script>


<style scoped></style> 