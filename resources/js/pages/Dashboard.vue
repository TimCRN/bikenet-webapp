<template>
    <div class="container">
        <div class="row justify-content-center">
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                bikes: []
            };
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

