<x-app-layout>
  

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-gradient-to-r from-[var(--primary)] to-[var(--primary-dark)] text-white">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                        <div>
                            <h3 class="text-2xl font-bold">Selamat Datang, {{ Auth::user()->name ?? 'Pengguna' }}!</h3>
                            <p class="mt-2 text-white/90">Terima kasih telah menggunakan layanan Bengkel Bass Motor</p>
                        </div>
                        <div class="mt-4 md:mt-0 bg-white/10 p-3 rounded-lg backdrop-blur">
                            <p class="text-sm">Status Akun: <span class="font-semibold">Aktif</span></p>
                            <p class="text-sm">Bergabung sejak: <span class="font-semibold">{{ Auth::user()->created_at->format('d M Y') ?? '-' }}</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-100 rounded-md p-3">
                                <i class="fas fa-tools text-[var(--primary)] text-xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Servis Aktif</dt>
                                    <dd>
                                        <div class="text-lg font-semibold text-gray-900">2</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-100 rounded-md p-3">
                                <i class="fas fa-history text-[var(--primary)] text-xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Riwayat Servis</dt>
                                    <dd>
                                        <div class="text-lg font-semibold text-gray-900">8</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-100 rounded-md p-3">
                                <i class="fas fa-star text-[var(--primary)] text-xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Poin Reward</dt>
                                    <dd>
                                        <div class="text-lg font-semibold text-gray-900">150</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-100 rounded-md p-3">
                                <i class="fas fa-calendar-alt text-[var(--primary)] text-xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Servis Berikutnya</dt>
                                    <dd>
                                        <div class="text-lg font-semibold text-gray-900">15 Des 2023</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Active Services -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Servis Aktif</h3>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <div class="p-6">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="font-medium text-gray-900">Servis Berkala - Honda Beat</h4>
                                        <p class="text-sm text-gray-500 mt-1">Estimasi selesai: 12 Des 2023</p>
                                        <div class="mt-2 flex items-center">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                Dalam Proses
                                            </span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-semibold text-[var(--primary)]">Rp 185.000</p>
                                        <button class="mt-2 text-sm text-[var(--primary)] hover:text-[var(--primary-dark)]">
                                            Lihat Detail
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="font-medium text-gray-900">Ganti Ban - Yamaha NMAX</h4>
                                        <p class="text-sm text-gray-500 mt-1">Estimasi selesai: 10 Des 2023</p>
                                        <div class="mt-2 flex items-center">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                Menunggu Parts
                                            </span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-semibold text-[var(--primary)]">Rp 450.000</p>
                                        <button class="mt-2 text-sm text-[var(--primary)] hover:text-[var(--primary-dark)]">
                                            Lihat Detail
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Aksi Cepat</h3>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <a href="#" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                                    <div class="flex-shrink-0 w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center text-[var(--primary)]">
                                        <i class="fas fa-plus text-xl"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="font-medium text-gray-900">Booking Servis</h4>
                                        <p class="text-sm text-gray-500">Jadwalkan servis motor Anda</p>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                                    <div class="flex-shrink-0 w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center text-[var(--primary)]">
                                        <i class="fas fa-history text-xl"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="font-medium text-gray-900">Riwayat Servis</h4>
                                        <p class="text-sm text-gray-500">Lihat semua servis sebelumnya</p>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                                    <div class="flex-shrink-0 w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center text-[var(--primary)]">
                                        <i class="fas fa-motorcycle text-xl"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="font-medium text-gray-900">Data Motor</h4>
                                        <p class="text-sm text-gray-500">Kelola data kendaraan Anda</p>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                                    <div class="flex-shrink-0 w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center text-[var(--primary)]">
                                        <i class="fas fa-user text-xl"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="font-medium text-gray-900">Profil Saya</h4>
                                        <p class="text-sm text-gray-500">Kelola informasi akun</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Promo Card -->
                    <div class="bg-gradient-to-r from-[var(--primary)] to-[var(--primary-dark)] text-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-2">Promo Spesial</h3>
                            <p class="text-white/90 text-sm mb-4">Diskon 15% untuk servis pertama. Gunakan kode:</p>
                            <div class="bg-white text-[var(--primary)] text-center py-3 rounded font-bold text-xl mb-4">BBM15</div>
                            <p class="text-xs text-white/70">*Promo berlaku hingga 30 November 2023</p>
                            <a href="https://wa.me/6281234567890" target="_blank" class="mt-4 inline-flex items-center justify-center gap-2 w-full px-4 py-2 rounded-md bg-white text-[var(--primary)] font-semibold hover:bg-gray-100 transition">
                                <i class="fab fa-whatsapp"></i> Klaim Promo
                            </a>
                        </div>
                    </div>

                    <!-- Recent Notifications -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Notifikasi Terbaru</h3>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <div class="p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-red-50 rounded-full flex items-center justify-center text-[var(--primary)]">
                                            <i class="fas fa-bell"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">Servis hampir selesai</p>
                                        <p class="text-sm text-gray-500">Servis Honda Beat Anda diperkirakan selesai besok.</p>
                                        <p class="text-xs text-gray-400 mt-1">2 jam yang lalu</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-red-50 rounded-full flex items-center justify-center text-[var(--primary)]">
                                            <i class="fas fa-tag"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">Promo baru tersedia</p>
                                        <p class="text-sm text-gray-500">Dapatkan diskon 20% untuk ganti oli premium.</p>
                                        <p class="text-xs text-gray-400 mt-1">1 hari yang lalu</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-red-50 rounded-full flex items-center justify-center text-[var(--primary)]">
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">Poin reward bertambah</p>
                                        <p class="text-sm text-gray-500">Anda mendapatkan 25 poin dari servis terakhir.</p>
                                        <p class="text-xs text-gray-400 mt-1">3 hari yang lalu</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        :root{
            --primary: #dc2626;
            --primary-dark: #b91c1c;
            --muted:#6b7280;
        }
        body { font-family: 'Montserrat', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; }
    </style>
</x-app-layout>