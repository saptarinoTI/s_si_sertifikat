 <nav x-data="{ isOpen: false }" class="py-4 shadow">
     <div class="lg:items-center lg:justify-between lg:flex container">
         <div class="flex items-center justify-between">
             <a href="#" class="mx-auto ">
                 <img class="w-auto h-6 sm:h-7" src="{{ asset('img/logo2.png') }}" alt="">
             </a>

             <!-- Mobile menu button -->
             <div class="lg:hidden">
                 <button x-cloak @click="isOpen = !isOpen" type="button" class="text-slate-500 hover:text-slate-600 focus:outline-none focus:text-slate-600" aria-label="toggle menu">
                     <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                     </svg>

                     <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                     </svg>
                 </button>
             </div>
         </div>

         <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
         <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
             class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white shadow-md lg:bg-transparent lg:shadow-none lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:w-auto lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center">
             <a href="#riwayat" class="navbar-link">Riwayat</a>
             <a href="#pendaftaran" class="navbar-link">Daftar Bantuan</a>
             <a href="#calon" class="navbar-link">Calon Penerima</a>
             <a href="#statusEkonomi" class="navbar-link">Grafik</a>
             <a href="#menyalurkan" class="navbar-link">Salurkan Bantuan</a>
             <a href="#informasi" class="navbar-link">Informasi</a>
             <a href="{{ route('filament.app.auth.login') }}" class="navbar-button">Masuk</a>
         </div>
     </div>
 </nav>
