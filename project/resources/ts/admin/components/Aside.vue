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
                <!-- 求人一覧 -->
                <li class="nav-item">
                    <router-link :to="{ name: 'entry_index', params: { isInit: true }}" class="nav-link">
                    <i class="nav-icon fas fa-network-wired"></i>
                    <p>求人一覧</p>
                    </router-link>
                </li>
                <!-- マスタ -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-adjust"></i>
                        <i class="right fas fa-angle-left"></i>
                        <p>マスタ</p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- 仕事マスタ -->
                        <li class="nav-item">
                            <router-link :to="{ name: 'job_index', params: { isInit: true }}" class="nav-link">
                                <i class="nav-icon fas fa-diagnoses"></i>
                                <p>仕事</p>
                            </router-link>
                        </li>
                        <!-- 仕事カテゴリマスタ -->
                        <li class="nav-item">
                            <router-link :to="{ name: 'job_category_index', params: { isInit: true }}" class="nav-link">
                                <i class="nav-icon fas fa-atlas"></i>
                                <p>仕事カテゴリ</p>
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
