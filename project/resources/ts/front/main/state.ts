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

    // 仕事一覧の抽出条件値
    cond: ICond = dafaultCond;
    // ログイン会員情報
    loginUser: IUser = {
        user:{id: '', name: '',email: '', email_verified_at: '', self_pr: '', tel: '', created_at: '', updated_at: ''},
        status: false
    };

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
    // 仕事一覧の検索
    public search(value: ICond) {
        this.setCond(value)
        localStorage.setItem('cond', JSON.stringify(value));
    }
    @Action
    // 仕事一覧の抽出条件値 入力値復元
    public restore() {
        let cond = localStorage.getItem('cond');
        if(cond){
            this.setCond(JSON.parse(cond))
        }
    }
    // ログイン会員情報の初期化
    public initLoginUser() {
        this.setLoginUser({
            user:{id: '', name: '',email: '', email_verified_at: '', self_pr: '', tel: '', created_at: '', updated_at: ''},
            status: false
        })
    }
}
export const state = getModule(State);
