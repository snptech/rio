<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="menu-icon" data-feather="home"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('inward-rawmaterials') }}">
          <i class="menu-icon" data-feather="layers"></i>
          <span class="menu-title">Inward Raw Material</span>
        </a>
      </li>
      <li class="nav-item">

        <a class="nav-link" href="{{ route('inwardpackingrawmaterial-list') }}">

          <i class="menu-icon" data-feather="package"></i>
          <span class="menu-title">Inward Packing Material</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('issue_material_for_production') }}">
          <i class="menu-icon" data-feather="hard-drive"></i>
          <span class="menu-title">Issue Material For Production</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('new_stock') }}">
          <i class="menu-icon" data-feather="shopping-cart"></i>
          <span class="menu-title">Inward Finished Goods -<br />New Stock</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dispatch_finished_goods') }}">
          <i class="menu-icon" data-feather="truck"></i>
          <span class="menu-title">Dispatch Finished Goods</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('quality_control') }}">
          <i class="menu-icon" data-feather="check-square"></i>
          <span class="menu-title">Quality Control</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('issual_by_stores_for_production') }}">
          <i class="menu-icon" data-feather="check-square"></i>
          <span class="menu-title">Issual By Stores For Production</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon" data-feather="pie-chart"></i>
          <span class="menu-title">Reports</span>
          <i class="icon-layout menu-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('annexure_i') }}">Finished Goods Inward (Annexure - I)</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('annexure_ii') }}">Issual by stores for production for captive consumption-simethicone (Annexure - II)</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('annexure_iii') }}">Issed by Stores for Production (Annexure - III)</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('annexure_iv') }}">Goods Receipt Note (Annexure - IV)</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('packing_annexure') }}">Packing Material Inward (Annexure - IV)</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('annexure_vi') }}">Quality Control Approval/Rejection (Annexure -VI)</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('comingsoon') }}">
          <i class="menu-icon" data-feather="shopping-bag"></i>
          <span class="menu-title">Product Masters</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('comingsoon') }}">
          <i class="menu-icon" data-feather="users"></i>
          <span class="menu-title">User Masters</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-master" aria-expanded="false" aria-controls="ui-master">
          <i class="menu-icon" data-feather="pie-chart"></i>
          <span class="menu-title">Masters</span>
          <i class="icon-layout menu-arrow" data-feather="settings"></i>
        </a>
        <div class="collapse" id="ui-master">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('department') }}">Department</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('role') }}">Role</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('designation') }}">Designation</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('grade') }}">Grade</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('supplier') }}">Supplier</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('modedispatch') }}">Mode of Dispatch</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('manufacturer') }}">Manufacturers</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('rawmaterial') }}">Matrials Master</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('controller') }}">Controllers</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('action') }}">Actions</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('ar_no') }}">AR .NO</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('product') }}">Product</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('party_master') }}">Party Master</a></li>
            <li class="nav-item"><a class="nav-link" href="annexure-VI.html">User Permisition</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
          <i class="menu-icon" data-feather="power"></i>
          <span class="menu-title">Logout</span>
        </a>
      </li>
    </ul>
  </nav>
