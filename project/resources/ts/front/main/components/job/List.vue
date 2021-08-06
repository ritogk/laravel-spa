<style scoped>
    /* トリミング外枠 */
    .trim {
        overflow: hidden;
        width: 100%;
        height: 300px;
        position: relative;
    }
    /* 横幅に合わせてリサイズ、はみ出た分をトリミング */
    .trim_img {
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        width: 100%;
        height: auto;
    }
    /* 仕事内容 */
    .job_content{
        white-space: pre-wrap;
    }
    /* 注目の求人 */
    .job_attention{
        padding: 1px 3px;
        border: solid 1px #FFDA45;
        background: #FFDA45;color: #333;
        text-align: center;
    }
</style>

<template>
    <div class="col">
        <vue-loading type="spiningDubbles" color="#3490dc" :size="{ width: '50%', height: '50%' }" v-show="loading"></vue-loading>
        <div v-for="(job, index) in currentPageJobs" :key="`job-${index}`" v-show="!loading">
            <b-card
                border-variant="info"
                header-bg-variant="primary"
                header-text-variant="white"
                :header="job.title"
                img-alt="Image"
                img-top
                tag="article"
                class="mb-3"
                no-body
                :id="`job-${job.id}`"
            >
                <div class="trim">
                    <b-card-img :src="job.image" alt="Image" class="trim_img">
                    </b-card-img>
                </div>
                <div class="p-2">
                    <b-card-text>
                        <p v-text="job.content" class="job_content"></p>
                        <p v-text="decoPrice(job.price)" class="job_content"></p>
                        <div >
                            <p v-if="job.attention" class="job_attention">
                                注目の求人
                            </p>
                        </div>
                    </b-card-text>
                    <a href="#" @click.prevent="openDetail(job)" class="stretched-link"></a>
                </div>
            </b-card>
        </div>

        <b-pagination
            v-model="currentPage"
            :total-rows="jobs.length"
            :per-page="perPage"
            first-number
            last-number
        ></b-pagination>

        <app-detail :job="selJob" v-on:close="closeDetail"></app-detail>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Watch } from 'vue-property-decorator';

    // コンポーネント
    import Detail from './Detail.vue';
    // モデル
    import IJob from "@front/main/models/IJob";
    import ICond from "@front/main/models/ICond";
    // 状態管理
    import { state } from "@root/front/main/state/job_cond";

    @Component({
        components: {
            'app-detail': Detail,
        }
    })
    export default class List extends Vue {
        allJobs:Array<IJob> = []
        perPage: number = 5
        currentPage: number = 1

        selJob:IJob|null = null

        loading: boolean = true

        get currentPageJobs(): Array<IJob>{
            return this.jobs.slice(
                                    (this.currentPage - 1) * this.perPage,
                                    (this.currentPage - 1) * this.perPage + this.perPage
                                    );
        }

        get conds(): ICond{
            return state.getCond
        }

        get jobs(): Array<IJob>{
            let jobs_filter: Array<IJob> = this.allJobs;
            jobs_filter = jobs_filter.filter(job => job.job_category_id == this.conds.category);
            if(this.conds.content != ''){
                jobs_filter = jobs_filter.filter(job => job.content.indexOf(this.conds.content) > -1);
            }
            if(this.conds.price != ''){
                jobs_filter = jobs_filter.filter(job => job.price >= Number(this.conds.price));
            }
            if(this.conds.attention){
                jobs_filter = jobs_filter.filter(job => job.attention == true);
            }
            return jobs_filter;
        }

        mounted(): void{
            this.loading = true
            window.axios.get('/api/jobs',
                {
                    params:{
                        filters_json:JSON.stringify(''),
                        fields:['id',
                                'title',
                                'content',
                                'attention',
                                'job_category_id',
                                'price',
                                'welfare',
                                'holiday',
                                'image',
                                'sort_no']
                    }
                }
            ).then(response => {
                this.allJobs = response.data
                this.loading = false
            })
        }

        openDetail(job: IJob): void {
            this.selJob = job
        }

        closeDetail(): void {
            this.selJob = null
        }

        decoPrice(num: number): string{
            return num.toLocaleString() + '円 ～'
        }
    }
</script>
