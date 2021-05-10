import { Mutation, Action, VuexModule, getModule, Module } from "vuex-module-decorators";
import Vuex from 'vuex';
import Vue from 'vue';

export interface IJob {
    title: string
    content: string
    attention: boolean
    job_category_id: string
    image: string
    sort_no: string
}
// state's interface
export interface IState {
    jobs: Array<IJob>
    jobDetail: IJob
    isShowDetail: boolean
}

Vue.use(Vuex);
const store=new Vuex.Store({})

@Module({ dynamic: true, store, name: "state", namespaced: true })
class State extends VuexModule implements IState {
    // state
    jobs: Array<IJob> = [];
    jobDetail: IJob = {title: '', content: '', attention: false, job_category_id: '', image: '', sort_no: ''};
    isShowDetail: boolean = false;

    // getter
    public get getJobs(): Array<IJob> {
        return this.jobs
    }
    public get getJobDetail(): IJob {
        return this.jobDetail
    }
    public get getIsShowDetail(): boolean {
        return this.isShowDetail
    }

    // mutation
    @Mutation
    public setJobs(value: Array<IJob>) {
        this.jobs = value;
    }
    @Mutation
    public setJobDetail(value: IJob) {
        this.jobDetail = value;
    }
    @Mutation
    public setIsShowDetail(value: boolean) {
        this.isShowDetail = value;
    }

    // action
    @Action
    public openJob(job: IJob) {
        this.setJobDetail(job)
        this.setIsShowDetail(true)
    }
}
export const state = getModule(State);
