<template>
  <div class="row" v-if="temporada.id != null">
    <div class="col-auto">
      <label for="nome" class="form-label">Título: </label>
    </div>
    <div class="col-auto">
      <input
        v-model="temporada.nome"
        id="nome"
        placeholder="Título da série"
        class="form-control"
        required
      />
    </div>

    <div class="col-auto">
      <label for="quant_temp" class="form-label"
        >Quantidade de Temporadas:
      </label>
    </div>
    <div class="col-auto">
      <input
        v-model="temporada.quant_temp"
        id="quant_temp"
        placeholder="Temporadas"
        class="form-control"
        required
      />
    </div>

    <div class="col-auto">
      <button class="btn btn-primary" @click="editarTemp()">Editar</button>
      <button class="btn btn-danger" @click="cancelarEditar()">Cancelar</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["temporada"],

  methods: {
    editarTemp() {
      if (this.existeCampoVazio() === true) {
        return;
      }
      axios
        .patch("api/v1/temporadas/" + this.temporada.id, {
          quant_temp: this.temporada.quant_temp,
        })

        .then((response) => {
          if (response.status == "204") {
            this.temporada.id = null;
            this.temporada.nome = "";
            this.temporada.quant_temp = "";
            this.$emit("reloadlist");
          }
        })

        .catch((error) => {
          console.log(error);
        });
    },

    cancelarEditar() {
      this.temporada.id = null;
      this.temporada.nome = "";
      this.temporada.quant_temp = "";
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