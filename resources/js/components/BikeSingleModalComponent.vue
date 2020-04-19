<template>
    <Modal @close="close()" :name="name" title="Bike settings">
        <template slot="body">
            <div class="form-group">
                <label class="form-label" for="name">Bike name</label>
                <input type="text" class="form-control" v-model="name">
            </div>
            <div class="form-check">
                <input id="available" type="checkbox" class="form-check-input" v-model="available">
                <label for="available" class="form-check-label">Available</label>
            </div>
        </template>
    </Modal>
</template>

<script>
    import Modal from './ModalComponent.vue';

    export default {
        props: [
            'name',
            'available'
        ],

        components: {
            Modal
        },

        methods: {
            close() {
                this.$emit('close')
            },

            submit() {
                this.$emit('submit')
            },

            submitModal() {
                axios.put('/api/bikes/' + this.name.id.toString(), {name: this.name, available: this.available})
                    .then(response => {
                        this.$emit('refresh')
                        this.$toasted.show(response.data)
                    })
                    .catch(response => {
                        this.$toasted.show(response.data)
                    })

            }
        },


    }
</script>
