<template>
  <div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Título da Série</th>
          <th scope="col">Quantidade de Temporadas</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(temporada, index) in temporadas" :key="index">
          <th scope="row">{{ temporadas.id }}</th>
          <td>{{ temporadas.nome }}</td>
          <td>{{ temporadas.quant_temp }}</td>
        <td>
            <i class="bi bi-pencil-square" @click="editarTemp(temporada.id)"></i>
            <i class="bi bi-trash"></i>
        </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<script>
export default {
  props: ['temporadas'],
  
  methods: {
    editarTemp(id) {
      this.$emit('editartemporada', id);
    },
    
    remover(id){
      axios
        .delete('api/v1/temporada/' +id)
          
        .then(response => {
          if (response.status == '204') {
            this.$emit('reloadlist');
            
          }
        })

        .catch(error => {
          console.log(error);
        });
    },
  },
};
</script>


<style scoped></style> 