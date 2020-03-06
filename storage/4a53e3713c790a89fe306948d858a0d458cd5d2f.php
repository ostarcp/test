<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo e(ADMIN_ASSET_URL); ?>dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Lê Hoàng hải</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo e(ADMIN_ASSET_URL); ?>dist/img/avatarH.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Ostar</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item has-treeview">
            <a href="<?php echo e(BASE_URL); ?>" class="nav-link ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                  Home 
              </p>
            </a>
      
          </li>

  <!-- user -->
          <li class="nav-item has-treeview">
            <a href="javascript:;" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Cars
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(BASE_URL . 'cars'); ?>" class="nav-link">
                  <i class="fa fa-list-ol nav-icon"></i>
                  <p>Danh sách ô tô</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(BASE_URL . 'cars/add-car'); ?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Thêm ô tô mới</p>
                </a>
              </li>
      
            </ul>
          </li>

<!-- sp -->
          <li class="nav-item has-treeview">
            <a href="javascript:;" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Brands
                <i class="fas fa-angle-left right"></i>
            
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(BASE_URL . 'brands'); ?>" class="nav-link">
                  <i class="fa fa-list-ol nav-icon"></i>
                  <p>Danh sách Brands</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(BASE_URL . 'brands/add-brand'); ?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Thêm mới Brand</p>
                </a>
              </li>
      
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside><?php /**PATH C:\xampp\htdocs\hailhph06122\views/layouts/_admin-share/sidebar.blade.php ENDPATH**/ ?>