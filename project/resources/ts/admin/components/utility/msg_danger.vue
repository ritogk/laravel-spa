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
    export default class MsgDanger extends Vue{
        @Prop({required: true })
        message!: string;

        get shoMsg(){
            return this.message != '';
        }
    }
</script>
