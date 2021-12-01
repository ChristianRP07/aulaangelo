<template>
  <div class="row" v-if="episodio.id != null">
    <div class="col-auto">
      <label for="nome" class="form-label">Título: </label>
    </div>
    <div class="col-auto">
      <input
        v-model="episodio.nome"
        id="nome"
        placeholder="Título da série"
        class="form-control"
        disabled
      />
    </div>

    <div class="col-auto">
      <label for="quant_ep" class="form-label"
        >Quantidade de Episodios:
      </label>
    </div>
    <div class="col-auto">
      <input
        v-model="episodio.quant_ep"
        id="quant_ep"
        placeholder="Episodios"
        class="form-control"
        required
      />
    </div>

    <div class="col-auto">
      <button class="btn btn-primary" @click="editarEp()">Editar</button>
      <button class="btn btn-danger" @click="cancelarEditar()">Cancelar</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["episodio"],

  methods: {
    editarEp() {      
      axios
        .patch("api/v1/episodio/" + this.episodio.id, {
          quant_ep: this.episodio.quant_ep,
        })

        .then((response) => {
          if (response.status == "204") {
            this.episodio.id = null;
            this.episodio.nome = "";
            this.episodio.quant_ep = "";
            this.$emit("reloadlist");
          }
        })

        .catch((error) => {
          console.log(error);
        });
    },

    cancelarEditar() {
      this.episodio.id = null;
      this.episodio.nome = "";
      this.episodio.quant_ep = "";
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