<template>
  <div>
    <nav class="navbar navbar-dark bg-dark">
      <a href="#" class="navbar-brand">Séries</a>
    </nav>
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h2>Séries</h2>
          <form-series :serie="serie" v-on:reloadlist="getSeries()"/>
          
        </div>
        <div class="card-body">
          <table-series :series="series" v-on:editarserie="editar($event)" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
tableSeries;

import formSeries from "./formSeries.vue";
import tableSeries from "./tableSeries";

export default {
  components: {
    tableSeries,
    formSeries,
  },

  data: function () {
    return {
      serie: [],
      series:[],
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
  },

  created() {
    this.getSeries();
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