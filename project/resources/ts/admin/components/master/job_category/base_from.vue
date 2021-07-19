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
                    label="内容"
                    label-for="content"
                    :invalid-feedback="errors.content"
                    :state="input_state(errors.content)">
                        <b-form-textarea
                        id="content"
                        v-model="item.content"
                        rows="3"
                        max-rows="4"
                        :state="input_state(errors.content)">
                        </b-form-textarea>
                    </b-form-group>
                </b-col>

                <b-col lg="12" class="my-1">
                <b-form-group
                    label="画像"
                    label-for="image"
                    :invalid-feedback="errors.image"
                    :state="input_state(errors.image)">
                        <b-input-group>
                            <b-form-file
                            accept="image/jpeg, image/png, image/gif"
                            @change="uploadFile"
                            id="image"
                            :state="input_state(errors.image)">
                            </b-form-file>
                        </b-input-group>
                    </b-form-group>
                </b-col>
                <b-col lg="11" class="my-1 offset-1">
                    <div v-if="image_path">
                        <b-img fluid-grow :src="`${image_path}`" alt="Left image"></b-img>
                    </div>
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
            <b-button variant="success" @click="$emit('submit', image_file)">登録</b-button>
            <b-button variant="secondary" @click="$emit('back')">戻る</b-button>
            </template>
        </b-card>
    </b-container>
</template>

<script lang="ts">
    import { Vue, Component, Model, Watch, Prop } from 'vue-property-decorator';
    // コンポーネント
    import BaseForm from './base_from.vue';
    import MsgDanger from '@root/admin/components/utility/msg_danger.vue';
    // モデル
    import Item from './models/Item';
    import BaseFormError from './models/IBaseFormError';

    @Component({
        components: {
            'base-form': BaseForm,
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

        image_path: string = '';
        image_file: any = '';

        @Watch('item.image', { immediate: true })
        onChangeImage(){
            this.image_path = this.item.image;
        }

        uploadFile(event: any): void{
            this.image_path = URL.createObjectURL(event.currentTarget.files[0])
            this.image_file = event.currentTarget.files[0];
        }
  }
</script>
