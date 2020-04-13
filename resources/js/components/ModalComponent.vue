<template>
    <div class="modal" tabindex="-1" role="dialog">
        <p>{{ this.name }}</p>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <slot name="header"/>
                        <button @click="$emit('close')" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <slot name="body"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'title'
        ],

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
