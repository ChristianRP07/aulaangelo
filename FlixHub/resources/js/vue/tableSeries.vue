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
                    <th scope="col">Editar</th>
                    
                </tr>
            </thead>
            <tbody>

                <tr v-for="(serie, index) in series" :key="index">
                    <th scope="row">{{ serie.id }}</th>
                    <td>{{ serie.nome }}</td>
                    <td>{{ serie.categoria }}</td>
                    <td>{{ serie.streaming}}</td>
                    <td>{{ serie.status }}</td>
                    <td>
                        
                         <button 
                            class = "btn-editar"
                            @click="editarSerie()"
                                                        
                        >
                        
                        Editar

                        </button>
                         
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
</template>


<script>

export default {
    props: ['series'],

}

</script>


<style scoped></style> 