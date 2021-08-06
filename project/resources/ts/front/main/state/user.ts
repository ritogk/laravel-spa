import { Mutation, Action, VuexModule, getModule, Module } from "vuex-module-decorators";
import Vuex from 'vuex';
import Vue from 'vue';

import IUser from "@root/models/IUser";

// state's interface
export interface IState {
    loginUser: IUser
}

// ログイン会員情報 初期値
const dafaultLoginUser: IUser = {
    user:{id: '', name: '',email: '', email_verified_at: '', self_pr: '', tel: '', created_at: '', updated_at: ''},
    status: false
};

Vue.use(Vuex);
const store=new Vuex.Store({})

@Module({ dynamic: true, store, name: "state", namespaced: true })
class State extends VuexModule implements IState {
    // state
    // ログイン会員情報
    loginUser: IUser = dafaultLoginUser;

    // getter
    public get getLoginUser(): IUser{
        return this.loginUser
    }

    // mutation
    @Mutation
    public setLoginUser(value: IUser) {
        this.loginUser = value;
    }

    // action
    @Action
    // ログイン会員情報の初期化
    public init() {
        this.setLoginUser(dafaultLoginUser)
    }
}
export const state = getModule(State);
