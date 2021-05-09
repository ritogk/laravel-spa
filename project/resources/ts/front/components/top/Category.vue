<template>
    <div>
        <b-card
            :title='name'
            :img-src='image'
            img-alt="Image"
            img-top
            img-height="200px"
            text-variant="white"
            tag="article"
            class="mb-4"
            style="max-width: 20rem;"
            overlay
        >
            <b-card-text>
                <span v-text='sub_title'></span>
                <a href="#" @click.prevent="" class="stretched-link"></a>
            </b-card-text>
        </b-card>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Prop, Emit } from 'vue-property-decorator';

    @Component
    export default class Detail extends Vue {
        id: string = '1'
        name: string = 'IT系'
        sub_title: string = 'アプリ開発、インフラ、ITコンサルタント、社内SE、ヘルプデスク、データサイエンティスト'
        image: string = 'https://reon777.com/images/%E3%83%A0%E3%83%BC%E3%83%9F%E3%83%B31.jpg'
    }
</script>
