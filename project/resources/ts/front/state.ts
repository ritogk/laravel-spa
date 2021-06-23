import { Mutation, Action, VuexModule, getModule, Module } from "vuex-module-decorators";
import Vuex from 'vuex';
import Vue from 'vue';

import ICond from "@root/front/models/ICond";

// state's interface
export interface IState {
    cond: ICond
}

// 検索条件 初期値
const dafaultCond: ICond = {category: '', content: '', price: null, attention: false}

Vue.use(Vuex);
const store=new Vuex.Store({})

@Module({ dynamic: true, store, name: "state", namespaced: true })
class State extends VuexModule implements IState {
    // state
    cond: ICond = dafaultCond;

    // getter
    public get getCond(): ICond {
        return this.cond
    }

    // mutation
    @Mutation
    public setCond(value: ICond) {
        this.cond = value;
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
