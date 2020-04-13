<template>
    <div class="container">
        <p>{{ this.name }}</p>
    </div>
</template>

<script>
    export default {
        props: [
            'name',
            'available',
            'zoneId',
            'created_at',
            'updated_at'
        ],

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
