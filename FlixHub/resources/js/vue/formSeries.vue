<template>
  <div class="row">
    <div class="col-auto">
      <label for="nome" class="form-label">Título: </label>
    </div>
    <div class="col-auto">
      <input
        v-model="serie.nome"
        id="nome"
        placeholder="Digite o título da série"
        class="form-control"
        required
      />
    </div>

    <div class="col-auto">
      <label for="Categoria" class="form-label">Categoria: </label>
    </div>
    <div class="col-auto">
      <select v-model="serie.categoria" id="categoria" class="form-control">
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
      <label for="Streaming" class="form-label"
        >Plataforma de Streaming:
      </label>
    </div>
    <div class="col-auto">
      <select v-model="serie.streaming" id="streaming" class="form-control">
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
      <button class="btn btn-primary" @click="serie.id ? editarSerie() : cadastrarSerie()">
        {{ serie.id ? 'Editar': 'Cadastrar' }}
      </button>
      <button class="btn btn-danger" @click="cancelarEditar()" v-if="serie.id!=null">
        Cancelar
      </button>
    
    </div>
  </div>
</template>

<script>
export default {
  props: ['serie'],

  methods: {
    cadastrarSerie() {
      if (this.existeCampoVazio() === true) {
        return;
      }

      axios
        .post('api/v1/serie/', {
          nome: this.serie.nome,
          categoria: this.serie.categoria,
          streaming: this.serie.streaming,
        })

        .then(response => {
          if (response.status == '201') {
            this.serie.id = null;
            this.serie.nome = '';
            this.serie.categoria = '';
            this.serie.streaming = '';
            this.$emit('reloadlist');
          }
        })

        .catch(error => {
          console.log(error);
        });
    },

    editarSerie() {
      if (this.existeCampoVazio() === true) {
        return;
      }
      axios
        .patch('api/v1/serie/'+ this.serie.id,{
          nome: this.serie.nome,
          categoria: this.serie.categoria,
          streaming: this.serie.streaming,
          status: this.serie.status,
        })
          
        .then(response => {

          if (response.status == '204') {
            this.serie.id = null;
            this.serie.nome = '';
            this.serie.categoria = '';
            this.serie.streaming = '';
            this.$emit('reloadlist');
          }
        })

        .catch(error => {
          console.log(error);
        });
    },

    cancelarEditar() {
      this.serie.id=null;
      this.serie.nome = '';
      this.serie.categoria = '';
      this.serie.streaming = '';
      
    },  

    existeCampoVazio() {
      if (
        this.serie.nome == '' ||
        this.serie.categoria == '' ||
        this.serie.streaming == ''
      ) {
        return true;
      }
      return false;
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