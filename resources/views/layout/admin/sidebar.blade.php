 <!-- Sidebar Menu Start -->
 <div class="app-menu">

     <!-- Brand Logo -->
     <a href="index.html" class="logo-box gap-2">
         <img src="{{asset('assets/images/logofix.png')}}" class="logo-light h-6" alt="Light logo">
         <img src="{{asset('assets/images/logofix.png')}}" class="logo-dark h-8" alt="Dark logo">
         <h1 class="text-slate-900 text-xl font-bold">Portal Prestasi</h1>
     </a>

     <!--- Menu -->
     <div data-simplebar>
         <ul class="menu">
             <li class="menu-title">Menu</li>

             <li class="menu-item">
                 <a href="/admin/dashboard" class="menu-link">
                     <span class="menu-icon"><i class="uil uil-estate"></i></span>
                     <span class="menu-text"> Dashboard </span>
                     <span class="badge bg-primary rounded ms-auto">01</span>
                 </a>
             </li>



             <li class="menu-item">
                 <a href="/admin/competition/index" class="menu-link">
                     <span class="menu-icon"><i class="uil uil-trophy"></i></span>
                     <span class="menu-text"> Competition </span>
                 </a>
             </li>
             <li class="menu-item">
                 <a href="/admin/scholarship/index" class="menu-link">
                     <span class="menu-icon"><i class="uil uil-graduation-cap"></i></span>
                     <span class="menu-text"> Scholarship  </span>
                 </a>
             </li>
             <li class="menu-item">
                 <a href="/admin/work/index" class="menu-link">
                     <span class="menu-icon"><i class="uil uil-suitcase"></i></span>
                     <span class="menu-text"> Job Vacancy </span>
                 </a>
             </li>
         </ul>
     </div>
 </div>
