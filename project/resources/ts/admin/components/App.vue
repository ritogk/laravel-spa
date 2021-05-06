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

<script>
import AppHeader from './Header'
import AppAside from './Aside'
    export default {
        name: 'app',
        components: {
          AppHeader,
          AppAside
        },
        data () {
            return {
                isError: false,
                user: {}
            }
        },
        created() {
            axios.get('/admin/auth/user').then(res => {
                this.user = res.data;
            }).catch(error => {
                this.isError = true;
            });
        }
    }
</script>
