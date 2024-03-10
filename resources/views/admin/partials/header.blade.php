 <!-- header section strats -->
 <header class="header_section">
     <div class="header_top">
         <div class="container">
             <div class="contact_nav">
                 <a href="">
                     <i class="fa fa-phone" aria-hidden="true"></i>
                     <span class="ml-1">
                         Call : +62 XXXX XXXX XXXX
                     </span>
                 </a>
                 <a href="">
                     <i class="fa fa-envelope" aria-hidden="true"></i>
                     <span class="ml-1">
                         Email : demo@email.com
                     </span>
                 </a>
                 <a
                     href="https://www.google.com/maps/place/UPT+Puskesmas+Babakan+Tarogong/@-6.935317,107.5938203,17z/data=!3m1!4b1!4m6!3m5!1s0x2e68e908dadb0a53:0xae765fcd2becc7de!8m2!3d-6.935317!4d107.5938203!16s%2Fg%2F11fmypk9k8?entry=ttu">
                     <i class="fa fa-map-marker" aria-hidden="true"></i>
                     <span class="ml-1">
                         Location
                     </span>
                 </a>
             </div>
         </div>
     </div>
     <div class="header_bottom">
         <div class="container-fluid">
             <nav class="navbar navbar-expand-lg custom_nav-container ">
                 <a class="navbar-brand" href="{{ route('customer.index') }}">
                     <img src="{{ asset('img/logo_akses.png') }}" alt="logo akses">
                 </a>

                 <button class="navbar-toggler" type="button" data-toggle="collapse"
                     data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                     aria-label="Toggle navigation">
                     <span class=""></span>
                 </button>

                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <div class="d-flex mr-auto flex-column flex-lg-row align-items-center">
                         <ul class="navbar-nav ">
                             <li class="nav-item active">
                                 <a class="nav-link @yield('index')" href="/">Beranda</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link @yield('formularium')" href="{{ url('/formularium') }}">Formularium</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link @yield('persediaan')" href="{{ url('/medicine-data') }}">Persediaan
                                     Obat</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link @yield('class')" href="{{ route('admin.medicine-class') }}">Kelas
                                     Obat</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link @yield('sub-class')"
                                     href="{{ route('admin.medicine-sub-class') }}">Sub Kelas Obat</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link @yield('recipe')" href="{{ route('admin.recipe') }}">Resep Obat</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link @yield('medicineUnit')" href="{{ route('admin.medicine-unit') }}">Unit
                                     Obat</a>
                             </li>
                         </ul>
                         <div class="dropdown show">
                             <a class="btn btn-secondary dropdown-toggle shadow-none" href="#" role="button"
                                 id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                 style="background-color:#019F90; border: none;">
                                 Lainnya
                             </a>
                             <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                 <a class="dropdown-item @yield('laporan')" href="{{ url('/general-reports') }}">Laporan
                                 </a>
                                 @if (session('isAdmin'))
                                     <a class="dropdown-item @yield('kelola pegawai')" href="{{ url('/employee') }}">Managemen
                                         Pegawai
                                     </a>
                                 @endif

                                 <a class="dropdown-item @yield('pesan')" href="{{ url('/messages') }}">Managemen
                                     Pesan
                                 </a>

                                 <a class="dropdown-item @yield('posts')" href="{{ url('/education') }}">Managemen
                                     Unggahan
                                 </a>

                                 <a class="dropdown-item active font-weight-bold"
                                     href="{{ route('admin.logout') }}">Logout
                                 </a>

                             </div>
                         </div>
                     </div>
                 </div>
             </nav>
         </div>
     </div>
 </header>
 <!-- end header section -->
