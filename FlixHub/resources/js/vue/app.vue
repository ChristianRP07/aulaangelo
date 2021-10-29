<template>
    <div class="seriesContainer">
        <div class="heading">
            <h1 id="title">Séries</h1>
            <!-- @todo botão do formulário -->
        </div>
        <table-series :series="series"/>
    </div>
</template>

<script>tableSeries

import tableSeries from './tableSeries'

export default {
    components: {
        tableSeries
    },
    data: function() {
        return {
            series: [],
        }
    },
    methods: {
        getSeries() {
            axios.get('api/v1/series')
                .then( response => {
                    this.series = response.data
                    console.log(this.series);
                }) 
                .catch( error => {
                    console.log(error);
                })
        },
    },
    created() {
        this.getSeries();
    }
}
</script>

<style scoped>
    .seriesContainer {
        margin: 10px auto;
        width: 60%;

    }
    .heading {
        border-radius: 10px;
        padding: 20px;

    }
    #title {
        text-align: center;
    }
</style>