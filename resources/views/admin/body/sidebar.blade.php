   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
       <a href="{{ route('home') }}" class="brand-link">
           <img src="{{ URL::asset('../backend/dist/img/bms.png') }}" alt="AdminLTE Logo" class="brand-image ">
           <span class="brand-text font-weight-light">BMS 
           </span>
       </a>
       <!-- Sidebar -->
       <div class="sidebar">
           <!-- Sidebar Menu -->
           <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                   data-accordion="false">
                   <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                   <li class="nav-item">
                       <a href="{{ route('home') }}" class="nav-link active">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                               Dashboard
                           </p>
                       </a>
                   </li>
              

                   <li class="nav-header">Donor</li>
                   <li class="nav-item">
                       <a href="{{ url('manage-donor') }}" class="nav-link">
                           <i class="nav-icon fas fa-user-plus"></i>
                           <p>
                               Manage donor
                           </p>
                       </a>
                   </li>
                   <li class="nav-header">Blood Request</li>
                   <li class="nav-item">
                       <a href="{{ url('manage-request') }}" class="nav-link">
                           <i class="nav-icon fas fa-user-plus"></i>
                           <p>
                               Manage Request
                           </p>
                       </a>
                   </li>
                   <li class="nav-header">Inventory</li>
                   <li class="nav-item">
                       <a href="{{ url('manage-inv') }}" class="nav-link">
                           <i class="nav-icon fas fa-user-plus"></i>
                           <p>
                               Manage Inventory
                           </p>
                       </a>
                   </li>
             
        
               </ul>
           </nav>
           <!-- /.sidebar-menu -->
       </div>
       <!-- /.sidebar -->
   </aside>
