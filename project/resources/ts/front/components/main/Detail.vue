<template>
    <div>
        <b-modal
        v-model="isShow"
        @close="close_modal()"
        size="lg"
        :title="selectJob.title"
        :header-bg-variant="headerBgVariant"
        :header-text-variant="headerTextVariant"
        >
            <b-card-group deck>
                <b-card
                :img-src="selectJob.image"
                img-alt="Card image"
                img-top>
                    <b-card-text>
                        <div>
                            <h1 v-text='selectJob.title'></h1>
                        </div>
                        <div class="py-3">
                            <h3>仕事内容</h3>
                            <span v-text='selectJob.content'></span>
                        </div>
                        <div class="py-3">
                            <h3>給料</h3>
                            <span v-text='selectJob.price'></span>
                        </div>
                    </b-card-text>
                </b-card>
            </b-card-group>

            <template #modal-footer>
                <b-button variant="warning" class="float-right" style="background: #ffc107;">
                    お気に入り
                </b-button>
                <b-button variant="primary" class="float-right">
                    申し込む
                </b-button>
            </template>
        </b-modal>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Prop } from 'vue-property-decorator';

    // 状態管理
    import { state } from "@root/front/state";

    @Component
    export default class Detail extends Vue {
        // ヘッダスタイル
        headerBgVariant: string = 'primary '
        headerTextVariant: string = 'light'
        job: any = {title: '公務員募集中!!', content: '高待遇、高給料、安定♪', price: 1000000, image: 'https://reon777.com/images/%E3%83%A0%E3%83%BC%E3%83%9F%E3%83%B31.jpg'};

        private get isShow(): boolean{
            return state.getIsShowDetail
        }
        private set isShow(value: boolean) {
            state.setIsShowDetail(value)
        }
        get selectJob(): any{
            return state.getJobDetail
        }

        close_modal(): void{
            state.closeDetail()
        }
    }
</script>
