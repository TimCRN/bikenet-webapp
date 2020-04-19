<template>
    <div class="container">
        <BikeModal v-if="showEditModal" :name="changeBike.name" :available="changeBike.available" @close="closeModal()" @submit="submitModal()"></BikeModal>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Available</th>
                    <th scope="col">Longitude</th>
                    <th scope="col">Latitude</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="bike in bikes" :key="bike.id">
                    <th scope="row">{{ bike.id }}</th>
                    <td>{{ bike.name }}</td>
                    <td>{{ bike.available }}</td>
                    <td>{{ bike.position? bike.position.longitude: '' }}</td>
                    <td>{{ bike.position? bike.position.latitude: '' }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-danger" @click="removeBike(bike.id)">Remove</button>
                            <button type="button" class="btn btn-primary" @click="changeBike(bike)">Settings</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import BikeModal from './BikeSingleModalComponent.vue'

    export default {
        props: [
            'bikes'
        ],

        components: {
            BikeModal
        },

        data: () => {
            return {
                editBike: null,
                showEditModal: false
            }
        },

        methods: {
            removeBike(bikeid) {
                axios.delete('/api/bikes/' + bikeid.toString())
                    .then(response => {
                        this.$emit('refresh')
                        this.$toasted.show(response.data)
                    })
                    .catch(response => {
                        this.$toasted.show(response.data)
                    })
            },

            changeBike(bike) {
                this.editBike = bike
                this.showEditModal = true
            },

            closeModal() {
                this.showEditModal = false
            },

            submitModal() {
                axios.put('/api/bikes/' + this.editBike.id.toString(), this.editBike)
                    .then(response => {
                        this.$emit('refresh')
                        this.$toasted.show(response.data)
                    })
                    .catch(response => {
                        this.$toasted.show(response.data)
                    })

            }
        }
    }
</script>
