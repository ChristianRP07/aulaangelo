<template>
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título da Série</th>
                    <th scope="col">Status</th>
                    
                </tr>
            </thead>
            <tbody>

                <tr v-for="(serie, index) in series" :key="index">
                    <th scope="row">{{ serie.id }}</th>
                    <td>{{ serie.nome }}</td>
                    <td>{{ serie.status }}</td>

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