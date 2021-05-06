<template>
  <b-container fluid class="py-4">
    <h2>{{ title }}</h2>

    <!-- 登録内容 -->
    <b-card
        header="登録内容"
        header-tag="header">
        <b-row>
            <b-col lg="12" class="my-1">
                <b-form-group
                label="名称"
                label-for="name"
                :invalid-feedback="errors.name"
                :state="input_state(errors.name)">
                    <b-form-input
                    v-model="item.name"
                    type="search"
                    id="name"
                    :state="input_state(errors.name)">
                    </b-form-input>
                </b-form-group>
            </b-col>

            <b-col lg="12" class="my-1">
                <b-form-group
                label="並び順"
                label-for="value"
                :invalid-feedback="errors.sort_no"
                :state="input_state(errors.sort_no)">
                    <b-input-group>
                        <b-form-input
                        v-model="item.sort_no"
                        type="search"
                        id="sort_no"
                        :state="input_state(errors.sort_no)"></b-form-input>
                    </b-input-group>
                </b-form-group>
            </b-col>
        </b-row>
        <template #footer>
        <b-button variant="success" @click="$emit('submit')">登録</b-button>
        <b-button variant="secondary" @click="$emit('back')">戻る</b-button>
        </template>
    </b-card>
  </b-container>
</template>

<script lang="ts">
    import { Vue, Component, Model, Prop } from 'vue-property-decorator';
    // コンポーネント
    import BaseForm from './base_from.vue';
    import MsgDanger from '@admin/components/utility/msg_danger.vue';

    @Component({
        components: {
            'base-form': BaseForm,
            'msg-danger': MsgDanger,
        }
    })
    export default class BaseFrom extends Vue{
        @Model('input', { type: Object, required: true }) readonly item!: any

        @Prop({ type: Object, required: true })
        errors!: object;

        @Prop({ type: String, required: true })
        title!: string;

        @Prop({ type: Boolean, required: true })
        isCreate!: boolean;
  }
</script>
