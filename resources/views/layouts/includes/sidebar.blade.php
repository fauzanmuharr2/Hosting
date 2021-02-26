<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('assets/dist/img/covid.png')}}" alt="" class="brand-image img-circle elevation-5"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Tracking Covid</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/fauzan.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-1">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p><i class="fas fa-globe">
                Kasus Global
                </i>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview menu-open">
              <li  class="{{request()->is('negara') ? 'active' : ''}">
                <a href="/negara" class="nav-link">
                  <p>Negara</p>
                </a>
              </li>
              <li  class="{{request()->is('kasus') ? 'active' : ''}">
                <a href="/kasus" class="nav-link">
                  <p>Kasus Global</p>
                </a>
              </li>
            </ul>
          </li>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <p> <i class='fas fa-home'>
                Kasus Local
                </i>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="{{request()->is('provinsi') ? 'active' : ''}">
                <a href="/provinsi" class="nav-link">
                  <p>Provinsi</p>
                </a>
              </li>
              <li  class="{{request()->is('kota') ? 'active' : ''}">
                <a href="/kota" class="nav-link">
                  <p>Kota</p>
                </a>
              </li>
              <li  class="{{request()->is('kecamatan') ? 'active' : ''}">
                <a href="/kecamatan" class="nav-link">
                  <p>Kecamatan</p>
                </a>
              </li>
              <li  class="{{request()->is('kelurahan') ? 'active' : ''}">
                <a href="/kelurahan" class="nav-link">
                  <p>Kelurahan</p>
                </a>
              </li>
              <li  class="{{request()->is('rw') ? 'active' : ''}">
                <a href="/rw" class="nav-link">
                  <p>Rw</p>
                </a>
              </li>
              <li  class="{{request()->is('kasusid') ? 'active' : ''}">
                <a href="/kasusid" class="nav-link">
                  <p>Kasus ID</p>
                </a>
              </li>
            </ul>
          </li>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>