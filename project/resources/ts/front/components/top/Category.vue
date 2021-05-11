<template>
    <div>
        <b-card
            :title='category.name'
            :img-src='category.image'
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
                <span v-text='category.content'></span>
                <a href="#" @click.prevent="" class="stretched-link"></a>
            </b-card-text>
        </b-card>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Prop, Emit } from 'vue-property-decorator';
    // モデル
    import ICategory from "@root/front/models/ICategory";
    @Component
    export default class Detail extends Vue {
        @Prop({required: true })
        category!: ICategory;
    }
</script>
