<template>
    <div class="container">
        <div class="row justify-content-center">
            <BikeComponent v-for="bike in bikes" :key="bike.id" :name="bike.name"/>
        </div>
    </div>
</template>

<script>
    import BikeComponent from '../components/BikeComponent.vue'

    export default {
        data() {
            return {
                bikes: []
            };
        },

        components: {
            BikeComponent
        },

        created() {
            this.getBikes();
        },

        methods: {
            getBikes() {
                axios.get('/api/bikes')
                    .then(response => {
                        this.bikes = response.data
                    })
                    .catch(err => console.log(err));
            }
        }
    };
</script>

