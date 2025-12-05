<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('landing-page.head')
</head>

<body>

    <header>
        <section class="min-h-screen flex justify-center items-center bg-gray-50">
            <div class="bg-white p-10 rounded-2xl shadow-sm flex flex-col items-center">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="#8c99dd" class="size-16">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                </svg>

                <h1 class="text-[16px] font-bold text-[#13214A] mt-2 mb-10">Badan <span
                        class="text-[#8c99dd]">Karantina</span> Indonesia</h1>
                <p class="font-semibold text-[#515a72] text-sm">Nomor Permohonan Tindakan Karantina</p>
                <h2 class="text-[32px] text-[#8c99dd] font-bold max-w-[862px] leading-[50px]">{{ $id }}</h2>
                <p class="font-bold text-[#515a72] text-sm px-20 mt-6 text-center">Silahkan simpan Nomor Permohonan Tindakan
                    Karantina <br /> agar dapat melihat status dari Permohonan.</p>
                <div class="mt-[40px]">
                    <a href="{{ route('lp') }}">
                        <div class="text-[#8c99dd] font-medium text-[14px] hover:underline transition-all duration-150">
                            Kembali ke Halaman Utama</div>
                    </a>
                </div>
            </div>
            </div>
        </section>
    </header>

</body>

</html>
