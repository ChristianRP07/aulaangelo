<template>
  <div class="row">
      
    <div class="col-auto">
      <label for="titulo" class="form-label">Título: </label>
    </div>
    <div class="col-auto">
      <input
        v-model="serie.titulo"
        id="titulo"
        placeholder="Digite o título da série"
        class="form-control"
        required
      />
    </div>


    <div class="col-auto">
      <label for="Categoria" class="form-label">Categoria: </label>
    </div>
      <div class="col-auto">
        <select v-model="selected">
          <option disabled value="">Escolha a Categoria</option>
          <option>Ação</option>
          <option>Aventura</option>
          <option>Comédia</option>
          <option>Drama</option>
          <option>Fantasia</option>
          <option>Ficção Científica</option>
          <option>Romance</option>
          <option>Terror</option>
        </select>
    </div>


    <div class="col-auto">
      <label for="Streaming" class="form-label">Plataforma de Streaming: </label>
    </div>
      <div class="col-auto">
        <select v-model="selected">
          <option disabled value="">Escolha a Plataforma</option>
          <option>Amazon Prime Video</option>
          <option>Apple TV+</option>
          <option>Disney+</option>
          <option>Globoplay</option>
          <option>HBO Go</option>
          <option>Netflix</option>
          </select>
    </div>


    <div class="col-auto">
      <button class="btn btn-primary" @click="cadastrarSerie()">
        Cadastrar
      </button>
    </div>

  </div>
</template>

<script>
export default {
  data: function () {
    return {
      serie: {
        titulo: "",
      },
    };
  },
  methods: {
    cadastrarSerie() {
      if (this.serie.titulo == "") {
        return;
      }
      axios
        .post("api/v1/serie", {
          nome: this.serie.titulo,
        })
        .then((response) => {
          if (response.status == "201") {
            this.serie.titulo = "";
            this.$emit("reloadlist");
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style scoped>
label {
  margin: 0;
}
.row {
  align-items: center;
  align-content: center;
  margin-bottom: 0px;
}
</style>