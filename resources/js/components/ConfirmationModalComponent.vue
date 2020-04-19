<template>
    <Modal @close="close()">
        <template slot="header"><h3>Confirm</h3></template>
        <template slot="body">
            Are you sure you want this bike?
        </template>
        <template slot="footer">
            <button @click="confirm()" type="button" class="btn btn-danger">Confirm</button>
        </template>
    </Modal>
</template>

<script>
    import Modal from './ModalComponent.vue'

    export default {
        components: {
            Modal
        },



        methods: {
            close() {
                this.$emit('close')
            },

            confirm() {
                this.$emit('confirm')
            }
        }
    }
</script>
