import { Mutation, Action, VuexModule, getModule, Module } from "vuex-module-decorators";
import Vuex from 'vuex';
import Vue from 'vue';

import ICond from "@front/main/models/ICond";
import IUser from "@root/models/IUser";

// state's interface
export interface IState {
    cond: ICond
}

// 検索条件 初期値
const dafaultCond: ICond = {category: '', content: '', price: '', attention: false}

Vue.use(Vuex);
const store=new Vuex.Store({})

@Module({ dynamic: true, store, name: "state", namespaced: true })
class State extends VuexModule implements IState {
    // state
    cond: ICond = dafaultCond;
    loginUser: IUser = {id: '', name: '',email: '', email_verified_at: '', self_pr: '', tel: '', created_at: '', updated_at: ''};

    // getter
    public get getCond(): ICond {
        return this.cond
    }

    public get getLoginUser(): IUser{
        return this.loginUser
    }

    // mutation
    @Mutation
    public setCond(value: ICond) {
        this.cond = value;
    }
    @Mutation
    public setLoginUser(value: IUser) {
        this.loginUser = value;
    }

    // action
    @Action
    public search(value: ICond) {
        this.setCond(value)
        localStorage.setItem('cond', JSON.stringify(value));
    }
    @Action // 入力値復元
    public restore() {
        let cond = localStorage.getItem('cond');
        if(cond){
            this.setCond(JSON.parse(cond))
        }
    }
}
export const state = getModule(State);
