<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('landing-page.head')
</head>

<body>

    <header>
        <nav class="px-[100px] pt-[50px] flex items-center justify-between">
            <div class="flex items-center gap-x-[70px]">
                <div>
                    <a href="">
                        <h6 class="text-[28px] font-bold text-[#13214A] text-logo">Bara<span
                                class="text-[#8c99dd]">ntin</span></h6>
                    </a>
                </div>
                <ul class="flex items-center gap-x-[40px] text-[15px] text-[#13214A]">
                    <li class="relative group hover:font-medium transition-all duration-150">
                        <a href="#form_perhomonan" onclick="removeHashAfterClick(event)" class="block">Form Permohonan
                            Tindakan Karantina</a>
                        <div
                            class="absolute bottom-0 left-0 w-full h-[1px] bg-[#8c99dd] rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300">
                        </div>
                    </li>
                    <li class="relative group hover:font-medium transition-all duration-150">
                        <a href="#status_perhomonan" onclick="removeHashAfterClick(event)" class="block">Cek Status</a>
                        <div
                            class="absolute bottom-0 left-0 w-full h-[1px] bg-[#8c99dd] rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="flex items-center gap-x-[16px]">
                <div class="">
                    <a href="{{ route('filament.app.auth.login') }}">
                        <div
                            class="bg-[#8c99dd] text-white font-semibold px-10 pt-[10px] pb-[10px] flex items-center justify-center rounded-xl hover:shadow-sm hover:shadow-[#8c99dd] transition-all duration-300 text-[15px]">
                            Sign in</div>
                    </a>
                </div>
            </div>
        </nav>
        <section class="mt-[70px]">
            <div class="max-w-[1512px] mx-auto px-[130px] flex items-center justify-between">
                <div>
                    <h1 class="text-[38px] font-bold text-[#13214A] max-w-[462px] leading-[50px]">Badan <span
                            class="text-[#8c99dd]">Karantina</span> Indonesia</h1>
                    <p class="text-[15px] text-[#78839E] leading-[28px] max-w-[393px] mt-[20px]">Pelayanan karantina
                        hewan, tumbuhan, dan keamanan hayati di wilayah Bontang. Mendukung kelancaran perdagangan
                        sekaligus memastikan perlindungan sumber daya alam Indonesia.</p>
                    <div class="mt-[40px]">
                        <a href="#form_perhomonan" onclick="removeHashAfterClick(event)">
                            <div
                                class="bg-[#8c99dd] text-white font-semibold w-[300px] py-[20px] flex items-center justify-center rounded-xl hover:shadow-sm hover:shadow-[#8c99dd] transition-all duration-300 text-[15px]">
                                Form Permohonan</div>
                        </a>
                    </div>
                </div>
                <div class="relative shrink-0">
                    <img src="{{ asset('assets/images/photos/hero-image.jpg') }}" alt=""
                        class="w-[680px] h-[520px] object-cover rounded-[40px] shrink-0">
                </div>
            </div>
        </section>
    </header>

    <main>
        <section class="mt-[100px]" id="form_perhomonan">
            <div class="w-full bg-[#5e6aad] flex items-center justify-center px-[218px] py-[100px]">
                <div class="flex flex-col items-center text-center">
                    <h2 class="text-[24px] font-bold text-white">Form Permohonan Tindakan Karantina</h2>
                    <p class="text-[15px] leading-[26px] text-[#c1cbed] mt-[20px]">Formulir ini digunakan oleh pemohon
                        untuk mengajukan pelaksanaan tindakan karantina terhadap media pembawa sesuai ketentuan Badan
                        Karantina Indonesia.</p>
                    <div class="mt-[50px] w-full text-left">
                        @livewire('form-permohonan')
                    </div>
                </div>
            </div>
        </section>

        <section id="status_perhomonan">
            <div class="w-full flex items-center justify-center px-[318px] py-[100px]">
                <div class="flex flex-col items-center text-center">
                    <h2 class="text-[24px] font-bold text-[#13214A]"> Cek Status Permohonan Tindakan Karantina</h2>
                    <p class="text-[15px] leading-[26px] text-[#8f95a8] mt-[20px]">Formulir ini digunakan oleh pemohon
                        untuk mengecek status pengajuan pelaksanaan tindakan karantina terhadap media pembawa sesuai
                        ketentuan Badan
                        Karantina Indonesia.</p>
                    <div class="mt-[50px] w-full text-left">
                        <form action="" method="POST">
                            @csrf
                            <div class="w-full">
                                <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">Nomor
                                    Permohonan Tindakan Karantina (PIK) <span class="text-red-500">*</span></label>
                                <input type="text" id="input-label"
                                    class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg"
                                    placeholder="X8G011" required />
                            </div>
                            <button type="submit" class="btn-status">Cek Status</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

    {{-- Back to top --}}
    <button id="backToTop"
        class="hidden fixed bottom-5 right-5 px-5 py-3 font-bold rounded-lg bg-slate-300 text-slate-950 shadow-lg hover:bg-slate-400 transition-all duration-300"
        onclick="scrollToTop()" aria-label="Back to top">↑</button>

    @livewire('notifications') {{-- Only required if you wish to send flash notifications --}}

    @filamentScripts

    @stack('scripts')

    <script>
        const backToTopBtn = document.getElementById('backToTop');

        // Tampilkan tombol saat scroll ke bawah
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                backToTopBtn.classList.remove('hidden');
            } else {
                backToTopBtn.classList.add('hidden');
            }
        });

        // Scroll ke atas saat tombol diklik
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        document.querySelectorAll('a.navbar-link[href^="#"]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault(); // Hindari perubahan URL
                const targetId = this.getAttribute('href').substring(1); // Ambil ID tanpa #
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        function removeHashAfterClick(event) {
            // Biarkan browser menavigasi ke anchor secara normal
            setTimeout(() => {
                // Setelah browser selesai memproses klik, hapus hash dari URL
                history.replaceState(null, '', window.location.pathname + window.location.search);
            }, 1); // Waktu tunda minimal untuk memastikan navigasi anchor terjadi duluan
        }
    </script>
</body>

</html>
