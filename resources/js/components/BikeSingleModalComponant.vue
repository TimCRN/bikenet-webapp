<template>
    <Modal @close="$emit('close')">

    </Modal>
</template>

<script>
    import Modal from 'ModalComponent.vue';

    export default {
        props: [
            'name',
            'available',
            'zoneId',
            'created_at',
            'updated_at'
        ],

        components: {
            Modal
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
