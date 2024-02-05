
@php
function isCurrentRoute($routes)
{
    foreach ($routes as $route) {
        if (request()->is($route) || request()->is($route . '/*')) {
            return true;
        }
    }
    return false;
}
@endphp
    <!-- Brand Logo -->
    <a href="{{ url('dashboard') }}" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Webstone Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item {{ isCurrentRoute(['manageMenu','manageSubMenu','addMenu','editMenu','addSubMenu','editSubMenu']) ? 'menu-is-opening menu-open' : '' }}">
            <a href="{{ url('manageMenu') }}" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Menu
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('manageMenu') }}" class="nav-link {{ isCurrentRoute(['manageMenu','addMenu','editMenu']) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p> Manage Menu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('manageSubMenu') }}" class="nav-link {{ isCurrentRoute(['manageSubMenu','addSubMenu','editSubMenu']) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p> Manage SubMenu</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item {{ isCurrentRoute(['manageSlider','addSlider','editSlider']) ? 'menu-is-opening menu-open' : '' }}">
            <a href="{{ url('manageSlider') }}" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                Slider
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('manageSlider') }}" class="nav-link {{ isCurrentRoute(['manageSlider','addSlider','editSlider']) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p> Manage Slider</p>
                    </a>
                </li>                
            </ul>
        </li>
    </ul>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item {{ isCurrentRoute(['manageCrowler','addCrowler','editCrowler']) ? 'menu-is-opening menu-open' : '' }}">
            <a href="{{ url('manageSlider') }}" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                Crowler
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('manageCrowler') }}" class="nav-link {{ isCurrentRoute(['manageCrowler','addCrowler','editCrowler']) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p> Manage Crowler</p>
                    </a>
                </li>                
            </ul>
        </li>
    </ul>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item {{ isCurrentRoute(['manageExcellenceAndExpertise','addExcellenceAndExpertise','editExcellenceAndExpertise']) ? 'menu-is-opening menu-open' : '' }}">
            <a href="{{ url('manageExcellenceAndExpertise') }}" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>                
                Excellence & Expertise
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('manageExcellenceAndExpertise') }}" class="nav-link {{ isCurrentRoute(['manageExcellenceAndExpertise','addExcellenceAndExpertise']) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage</p>
                    </a>
                </li>                
            </ul>
        </li>
    </ul>

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item {{ isCurrentRoute(['manageSettings','addSettings','editSetting']) ? 'menu-is-opening menu-open' : '' }}">
            <a href="{{ url('manageSettings') }}" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>                
                Setting
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('manageSettings') }}" class="nav-link {{ isCurrentRoute(['manageSettings','addSettings','editSetting']) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage</p>
                    </a>
                </li>                
            </ul>
        </li>
    </ul>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item {{ isCurrentRoute(['manageAwardsAndRecognition','addAwardsAndRecognition','editAwardsAndRecognition']) ? 'menu-is-opening menu-open' : '' }}">
            <a href="{{ url('manageAwardsAndRecognition') }}" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>                
                Awards & Recognition
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('manageAwardsAndRecognition') }}" class="nav-link {{ isCurrentRoute(['manageAwardsAndRecognition','addAwardsAndRecognition','editAwardsAndRecognition']) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage</p>
                    </a>
                </li>                
            </ul>
        </li>
    </ul>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item {{ isCurrentRoute(['manageTecnologyWeWork','addAwardsAndRecognition','editAwardsAndRecognition']) ? 'menu-is-opening menu-open' : '' }}">
            <a href="{{ url('manageTecnologyWeWork') }}" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>                
                Technology We Work
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('manageTecnologyWeWork') }}" class="nav-link {{ isCurrentRoute(['manageTecnologyWeWork','addAwardsAndRecognition','editAwardsAndRecognition']) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage</p>
                    </a>
                </li>                
            </ul>
        </li>
    </ul>
  </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  