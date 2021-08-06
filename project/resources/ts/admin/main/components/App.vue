<template>
    <div class="wrapper">
      <app-header :user="user"></app-header>
      <app-aside>
        <template v-slot:header_title>
          <span> 管理画面</span>
        </template>
      </app-aside>
      <div class="content-wrapper">
        <transition>
          <router-view/>
        </transition>
      </div>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Watch } from 'vue-property-decorator';
    // モデル
    import User from '@root/models/IAdmin';
    // コンポーネント
    import Header from './Header.vue';
    import Aside from './Aside.vue';

    @Component({
        components: {
            'app-header': Header,
            'app-aside': Aside,
        }
    })
    export default class App extends Vue {
        // data
        isError: boolean = false
        user: User = {id: '', name: '', email: '', email_verified_at: '', password: ''}

        created() {
            window.axios.get('/api/auth/admin/user').then(response => {
                this.user = response.data
            }).catch(error => {
                this.isError = true
            });
        }
    }
</script>
