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
        <tr v-for="(temporadas, index) in temporadas" :key="index">
          <th scope="row">{{ temporadas.id }}</th>
          <td>{{ temporadas.nome }}</td>
          <td>{{ temporadas.quant_temp }}</td>
        <td>
            <i class="bi bi-pencil-square" @click="editarTemp(temporadas.id)"></i>
            <i class="bi bi-trash" @click="removerTemp(temporadas.id)"></i>
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
    
    removerTemp(id){
      if (confirm("Deseja excluir essa temporada juntamente com seus episódios?")) {
      axios
        .delete('api/v1/temporada/' +id)
          
        .then((response) => {
            axios
              .delete("api/v1/episodio/" + id)

              .then((response) => {
                
                this.$emit("reloadlist");
                
              })

              .catch((error) => {
                console.log(error);
              });
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