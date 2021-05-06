<template>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ user.name }}
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#" @click="logout">ログアウト</a>
            <div class="dropdown-divider" hidden></div>
            <a class="dropdown-item" href="/">トップページへ戻る</a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
</template>

<script>
    export default {
        props: ['user'],
        methods: {
            logout() {
                axios.get("/admin/auth/logout").then(response => {
                    console.log(response)
                    localStorage.removeItem("auth")
                    window.location.href = '/'
                })
                .catch(error => {
                    console.log(error)
                });
            },
        },
    }
</script>
