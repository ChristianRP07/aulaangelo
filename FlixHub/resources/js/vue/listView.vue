<template>
    <div>
        <div v-for="(serie, index) in series" :key="index">
            <list-item 
                :serie="serie"
                class="serie"
            />
        </div>
    </div>
</template>

<script>
import listItem from './listItem';
export default {
    props: ['series'],
    components: {
        listItem
    }
}
</script>

<style scoped>
    .serie {
        background: #e6e6e6;
        padding: 5px;
        margin-top: 5px;;
    }
</style>