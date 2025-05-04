  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Webinar</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('webinar.list')}}">
              <i class="bi bi-circle"></i><span>Webinar List</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>User Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>User Management</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Role Management</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Permission Management</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#master-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear"></i><span>Master Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="master-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('general.setting')}}">
              <i class="bi bi-circle"></i><span>General Settings</span>
            </a>
          </li>
          <li>
            <a href="{{ route('category.list')}}">
              <i class="bi bi-circle"></i><span>Category</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->






  



 



    </ul>

  </aside><!-- End Sidebar-->