<template>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Available</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(bike, index) in bikes" :key="bike.id">
                    <th scope="row">{{ bike.id }}</th>
                    <td>{{ bike.name }}</td>
                    <td>{{ bike.available }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-danger" @click="removeBike(index)">Remove</button>
                            <button type="button" class="btn btn-primary" @click="changeBike(bike.id)">Settings</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: [
            'bikes'
        ],
        methods: {
            removeBike(index) {
                let bikeid = this.bikes[index].id
                axios.delete('/api/bikes/' + bikeid.toString())
                    .then(response => {
                        console.log(response)
                        this.$emit('refresh')
                    })
                    .catch(response => {

                    })
            },
            changeBike(bikeid) {
                // axios.
            }
        }
    }
</script>
