<template>
    <div>
        <b-alert
            dismissible
            variant="danger"
            :show="shoMsg">
            {{ message }}
        </b-alert>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Model, Prop } from 'vue-property-decorator';

    @Component
    export default class Edit extends Vue{
        @Prop({ type: String, required: true })
        message!: string;

        get shoMsg(){
            return this.message != '';
        }
    }
</script>
