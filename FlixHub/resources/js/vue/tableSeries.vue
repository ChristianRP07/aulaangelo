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
            <i class="bi bi-trash" @click="remover(serie.id)"></i>
            <i class="bi bi-check2-square" @click="status(serie.id)"></i>
          </td>
        </tr>
      </tbody>
    </table>
    
  </div>
</template>


<script>
export default {
  props: ["series"],

  methods: {
    editar(id) {
      this.$emit("editarserie", id);
    },
    status(id) {
               
      axios
        .put("api/v1/serie/status/" + id)

        .then((response) => {
          if (response.status == "204") {
            this.$emit("reloadlist");
          }
        })

        .catch((error) => {
          console.log(error);
        });
    },
    
    remover(id) {
      if(confirm("Deseja excluir essa série?")){

      axios
          .delete("api/v1/serie/" + id)

          .then((response) => {
              this.$emit("reloadlist");
            
          })

          .catch((error) => {
            console.log(error);
          });
      }
    },
  },
};
</script>


<style scoped></style> 