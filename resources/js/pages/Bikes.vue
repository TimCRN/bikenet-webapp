<template>
    <div class="container">

        <BikeTable @refresh="getBikes()" :bikes=bikes></BikeTable>

    </div>
</template>

<script>
    import BikeTable from '../components/BikeTableComponent.vue'

    export default {
        data() {
            return {
                bikes: []
            };
        },

        components: {
            BikeTable
        },

        created() {
            this.getBikes();
        },

        methods: {

        }
    };
</script>

