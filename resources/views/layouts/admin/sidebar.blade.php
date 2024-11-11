<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('admin.form')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Add products
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{route('admin.list')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                List products
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            
            </a>
          </li>

          @yield('aside_content')

        </ul>
      </nav>