<template>
  <div>
    <nav class="navbar navbar-dark bg-dark">
      <a href="#" class="navbar-brand">Séries</a>
    </nav>
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h2>Séries</h2>
          <form-series
            :serie="serie"
            :temporada="temporada"
            :episodio="episodio"
            v-on:reloadlist="getSeries(), getTemporada(), getEpisodios()"
          />
        </div>
        <div class="card-body">
          <table-series
            :series="series"
            :temporadas="temporadas"
            :episodios="episodios"
            v-on:reloadlist="getSeries(), getTemporada(), getEpisodios()"
            v-on:editarserie="editar($event)"
          />
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h2>Temporadas</h2>
          <form-temporadas
            :temporada="temporada"
            v-on:reloadlist="getTemporada(), getEpisodios()"
          />
        </div>
        <div class="card-body">
          <table-temporadas
            :temporadas="temporadas"
            v-on:reloadlist="getTemporada(), getEpisodios()"
            v-on:editartemporada="editarTemporada($event)"
          />
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h2>Episódios</h2>
          <form-episodios
            :episodio="episodio"
            v-on:reloadlist="getEpisodios()"
          />
        </div>
        <div class="card-body">
          <table-episodios
            :episodios="episodios"
            v-on:reloadlist="getEpisodios()"
            v-on:editarepisodios="editarEpisodios($event)"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
tableSeries;

tableTemporadas;

tableEpisodios;

import formSeries from "./Series/formSeries.vue";
import tableSeries from "./Series/tableSeries";

import tableTemporadas from "./Temporadas/tableTemporadas.vue";
import formTemporadas from "./Temporadas/formTemporadas.vue";

import tableEpisodios from "./Episodios/tableEpisodios.vue";
import formEpisodios from "./Episodios/formEpisodios.vue";

export default {
  components: {
    tableSeries,
    formSeries,

    tableTemporadas,
    formTemporadas,

    tableEpisodios,
    formEpisodios,
  },

  data: function () {
    return {
      serie: [],
      series: [],

      temporada: [],
      temporadas: [],

      episodio: [],
      episodios: [],
    };
  },
  methods: {
    getSeries() {
      axios
        .get("api/v1/series")

        .then((response) => {
          this.series = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    editar(id) {
      axios
        .get("api/v1/serie/" + id)
        .then((response) => {
          this.serie = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },

    getTemporada() {
      axios
        .get("api/v1/temporadas")

        .then((response) => {
          this.temporadas = response.data;
        })

        .catch((error) => {
          console.log(error);
        });
    },

    editarTemporada(id) {
      axios
        .get("api/v1/temporada/" + id)
        .then((response) => {
          this.temporada = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },

    getEpisodios() {
      axios
        .get("api/v1/episodios")

        .then((response) => {
          this.episodios = response.data;
        })

        .catch((error) => {
          console.log(error);
        });
    },

    editarEpisodios(id) {
      axios
        .get("api/v1/episodio/" + id)
        .then((response) => {
          this.episodio = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },

  created() {
    this.getSeries();
    this.getTemporada();
    this.getEpisodios();
  },
};
</script>

<style scoped>
nav {
  margin-bottom: 10px;
}

.card {
  margin: 20px 30px;
}

.navbar-brand {
  margin-left: 20px;
}
</style>