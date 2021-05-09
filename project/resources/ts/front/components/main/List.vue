<template>
    <div class="col" id="main">
        <div v-for="sample in [1,2,3,4,5]" :key="sample">
            <b-card
                title="求人タイトル"
                img-src="https://picsum.photos/600/300/?image=25"
                img-alt="Image"
                img-top
                img-height="200px"
                tag="article"
                class="mb-2"
            >
                <b-card-text>
                    良い求人です。給料も良い。
                </b-card-text>
                <b-button href="#" variant="primary">お気に入り</b-button>
            </b-card>
        </div>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Watch } from 'vue-property-decorator';

    @Component
    export default class List extends Vue {
    }
</script>
