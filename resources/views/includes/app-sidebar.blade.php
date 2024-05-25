<div class="sidebar-brand">
     <a href="./index.html" class="brand-link">
         <img src="{{ asset('images/logo-ec-southsudan.jpeg') }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow">
       
         <span class="brand-text fw-light">EC Portal</span>
     </a>
 </div>

 <div class="sidebar-wrapper" data-overlayscrollbars="host">
     <div class="os-size-observer os-size-observer-appear">
         <div class="os-size-observer-listener ltr"></div>
     </div>
     <div data-overlayscrollbars-viewport="scrollbarHidden" style="margin-right: -16px; margin-bottom: -16px; margin-left: 0px; top: -8px; right: auto; left: -8px; width: calc(100% + 16px); padding: 8px; overflow-y: scroll;">
         <nav class="mt-2">
             <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                 <li class="nav-item">
                     <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->routeIs('dashboard')) ? 'active' : '' }}">
                         <i class="nav-icon bi bi-speedometer"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('users.index') }}" class="nav-link {{ (request()->routeIs('users.*')) ? 'active' : '' }}"> 
                        <i class="nav-icon bi bi-people"></i>
                         <p>Admins</p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('clients.index') }}" class="nav-link {{ (request()->routeIs('clients.*')) ? 'active' : '' }}"> 
                        <i class="nav-icon bi bi-building"></i>
                         <p>Clients</p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('platforms.index') }}" class="nav-link {{ (request()->routeIs('platforms.*')) ? 'active' : '' }}"> 
                        <i class="nav-icon bi bi-hdd-network"></i>
                         <p>Platforms</p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('distribution-list.index') }}" class="nav-link {{ (request()->routeIs('distribution-list.*')) ? 'active' : '' }}"> 
                        <i class="nav-icon  bi bi-envelope"></i>
                         <p>Distribution List</p>
                     </a>
                 </li>
             </ul>
         </nav>
     </div>
     <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-track-interactive os-scrollbar-cornerless os-scrollbar-unusable os-theme-light os-scrollbar-auto-hide-hidden">
         <div class="os-scrollbar-track">
             <div class="os-scrollbar-handle" style="width: 100%;"></div>
         </div>
     </div>
     <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-track-interactive os-scrollbar-visible os-scrollbar-cornerless os-theme-light os-scrollbar-auto-hide-hidden">
         <div class="os-scrollbar-track">
             <div class="os-scrollbar-handle" style="height: 50.885%;"></div>
         </div>
     </div>
 </div>
