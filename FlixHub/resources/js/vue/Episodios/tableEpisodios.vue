<template>
  <div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Título da Série</th>
          <th scope="col">Quantidade de Episodios</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(episodios, index) in episodios" :key="index">
          <th scope="row">{{ episodios.id }}</th>
          <td>{{ episodios.nome }}</td>
          <td>{{ episodios.quant_ep }}</td>
        <td>
            <i class="bi bi-pencil-square" @click="editarEp(episodios.id)"></i>
            <i class="bi bi-trash" @click="removerEp(episodios.id)"></i>
        </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<script>
export default {
  props: ['episodios'],
  
  methods: {
    editarEp(id) {
      this.$emit('editarepisodios', id);
    },
    
    removerEp(id){
      if (confirm("Deseja excluir esses episódios?")) {
      axios
        .delete('api/v1/episodio/' + id)
          
        .then(response => {
          this.$emit('reloadlist');            
          
        })

        .catch(error => {
          console.log(error);
        });
      }
    },
  },
};
</script>


<style scoped></style> 