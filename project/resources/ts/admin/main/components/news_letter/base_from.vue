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
                label="件名"
                label-for="subject"
                :invalid-feedback="errors.subject"
                :state="input_state(errors.subject)">
                    <b-form-input
                    v-model="item.subject"
                    type="search"
                    id="subject"
                    :state="input_state(errors.subject)">
                    </b-form-input>
                </b-form-group>
            </b-col>

            <b-col lg="12" class="my-1">
                <b-form-group
                label="メッセージ"
                label-for="message"
                :invalid-feedback="errors.message"
                :state="input_state(errors.message)">
                    <b-form-textarea
                    id="message"
                    v-model="item.message"
                    rows="30"
                    max-rows="30"
                    :state="input_state(errors.message)">
                    </b-form-textarea>
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
    import { Vue, Component, Model, Watch, Prop } from 'vue-property-decorator';
    // コンポーネント
    import MsgDanger from '@admin/main/components/utility/msg_danger.vue';
    // モデル
    import Item from './models/IItem';
    import BaseFormError from './models/IBaseFormError';

    @Component({
        components: {
            'msg-danger': MsgDanger,
        }
    })
    export default class BaseFrom extends Vue{
        @Model('input') readonly item!: Item

        @Prop({required: true })
        errors!: BaseFormError;

        @Prop({required: true })
        title!: string;

        @Prop({required: true })
        isCreate!: boolean;
  }
</script>
