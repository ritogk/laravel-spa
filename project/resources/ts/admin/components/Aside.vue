<template>
    <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <span class="brand-text font-weight-light">
        <slot name="header_title">未設定</slot>
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

          <!-- マスタ -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-adjust"></i>
              <i class="right fas fa-angle-left"></i>
              <p>マスタ</p>
            </a>
            <ul class="nav nav-treeview">
              <!-- 仕事カテゴリマスタ -->
              <li class="nav-item">
                <router-link :to="{ name: 'job_category_index', params: { isInit: true }}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>仕事カテゴリ</p>
                </router-link>
              </li>
              <!-- 汎用マスタ -->
              <li class="nav-item">
                <router-link :to="{ name: 'general_index', params: { isInit: true }}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>汎用</p>
                </router-link>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>

<script>
    export default {}
</script>
