<template>
    <div class="serie">
        <label :class="serie-id">{{ serie.id }}</label> | 
        <label :class="serie-name">{{ serie.nome }}</label> | 
        <label :class="serie-status">{{ serie.status }}</label>
    </div>
</template>

<script>
export default {
    props: ['serie'],
}
</script>

<style scoped>
    .serie {
        display: flex;
        justify-content: center;
        align-content: center;
    }
    .serie-id {
        width: 10%;
    }
    .serie-name {
        width: 70%;
    }
    .serie-status {
        width: 20%;
    }
</style>