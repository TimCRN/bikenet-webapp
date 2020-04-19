<template>
    <div class="container">

        <GmapMap :center="{lat: 1.38, lng: 102.8}" :zoom="12" style="width: 100%; height: 800px">
            <gmap-marker 
            v-for="bike in bikePositions" 
            :key="bike.id" 
            :position="{lat: parseFloat(bike.position.latitude), lng: parseFloat(bike.position.longitude)}" 
            :title="bike.name"
            :label="bike.name"
            @click="reserveBike(bike)"
            />
        </GmapMap>
        

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
            },
            reserveBike(bike) {
                axios.post('/api/bookings', {
                    bike_id: bike.id,
                    user_id: window.Laravel.user.id
                })
                    .finally(response => {
                        console.log(response)
                        this.$toasted.show(response.data)
                    })
            }
        },

        computed: {
            bikePositions() {
                let filtered = this.bikes.filter(value => {
                    return value.position
                })
                return filtered
            }
        }
    };
</script>
