<template>
    <div class="col" id="main">
        <div v-for="(job, index) in currentPageJobs" :key="`job-${index}`">
            <b-card
                :title="job.title"
                :img-src="job.image"
                img-alt="Image"
                img-top
                img-height="200px"
                tag="article"
                class="mb-2"
            >
                <b-card-text>
                    <p v-text="job.content" style="white-space: pre-wrap;"></p>
                    <div >
                        <p v-if="job.attention" style="padding: 1px 3px;border: solid 1px #FFDA45;background: #FFDA45;color: #333;text-align: center;">
                            注目の求人
                        </p>
                    </div>
                </b-card-text>
                <a href="#" @click.prevent="openJob(job)" class="stretched-link"></a>
            </b-card>
        </div>

        <b-pagination
            v-model="currentPage"
            :total-rows="jobs.length"
            :per-page="perPage"
            first-number
            last-number
        ></b-pagination>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Watch } from 'vue-property-decorator';

    // モデル
    import IJob from "@root/front/models/IJob";
    // 状態管理
    import { state } from "@root/front/state";

    @Component
    export default class List extends Vue {
        perPage: number = 5
        currentPage: number = 1

        get currentPageJobs(): Array<IJob>{
            return this.jobs.slice(
                                    (this.currentPage - 1) * this.perPage,
                                    (this.currentPage - 1) * this.perPage + this.perPage
                                    );
        }

        get jobs(): Array<IJob>{
            return state.getJobs
        }

        openJob(job: IJob): void {
            state.openDetail(job)
        }
    }
</script>
