<template>
    <div class="container">

        <ConfirmModal @submit="reserveBike()" @close="closeModal()"/>

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
import ConfirmModal from '../components/ConfirmationModalComponent.vue'

    export default {
        data() {
            return {
                bikes: []
            };
        },

        components: [
            ConfirmModal
        ],

        data() {
            return {
                selectedBike: null,
                showModal: false
            }
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
            reserveBike() {
                let bike = this.selectedBike
                axios.post('/api/bookings', {
                    bike_id: bike.id,
                    user_id: window.Laravel.user.id
                })
                    .finally(response => {
                        console.log(response)
                        this.$toasted.show(response.data)
                    })
                this.closeModal()
            },
            openModal(bike) {
                this.selectedBike = bike
                this.showModal = true
            },
            closeModal() {
                this.showModal = false
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
