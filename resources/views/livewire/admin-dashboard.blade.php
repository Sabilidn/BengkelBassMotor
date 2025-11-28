    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-gradient-to-r from-[var(--primary)] to-[var(--primary-dark)] text-white">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                        <div>
                            <h3 class="text-2xl font-bold">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}!</h3>
                            <p class="mt-2 text-white/90">Kelola seluruh layanan, mekanik, dan pelanggan Bengkel Bass
                                Motor</p>
                        </div>
                        <div class="mt-4 md:mt-0 bg-white/10 p-3 rounded-lg backdrop-blur">
                            <p class="text-sm">Status Akun: <span class="font-semibold">Aktif</span></p>
                            <p class="text-sm">Bergabung sejak: <span
                                    class="font-semibold">{{ Auth::user()->created_at->format('d M Y') ?? '-' }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-100 rounded-md p-3">
                                <i class="fas fa-users text-[var(--primary)] text-xl"></i>
                            </div>
                            <div class="ml-5 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500">Total Pelanggan</dt>
                                    <dd>
                                        <div class="text-lg font-semibold text-gray-900">{{ $totalCustomers ?? 0 }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-100 rounded-md p-3">
                                <i class="fas fa-tools text-[var(--primary)] text-xl"></i>
                            </div>
                            <div class="ml-5 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500">Servis Sekarang</dt>
                                    <dd>
                                        <div class="text-lg font-semibold text-gray-900">{{ $activeServices ?? 0 }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-100 rounded-md p-3">
                                <i class="fas fa-history text-[var(--primary)] text-xl"></i>
                            </div>
                            <div class="ml-5 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500">Total Services</dt>
                                    <dd>
                                        <div class="text-lg font-semibold text-gray-900">{{ $totalServices ?? 0 }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-100 rounded-md p-3">
                                <i class="fas fa-user-tie text-[var(--primary)] text-xl"></i>
                            </div>
                            <div class="ml-5 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500">Total Mekanik</dt>
                                    <dd>
                                        <div class="text-lg font-semibold text-gray-900">{{ $totalMechanics ?? 0 }}
                                        </div>
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
                    <!-- Recent Services -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Servis Terbaru</h3>
                        </div>
                        <div class="divide-y divide-gray-200">
                            @foreach ($recentServices as $service)
                                <div class="p-6 flex justify-between items-start">
                                    <div>
                                        <h4 class="font-medium text-gray-900">{{ $service->motor_model }} -
                                            {{ $service->user->name }}</h4>
                                        <p class="text-sm text-gray-500 mt-1">Status:
                                            <span class="font-semibold">{{ ucfirst($service->status) }}</span>
                                        </p>
                                        <p class="text-sm text-gray-500 mt-1">Mekanik:
                                            {{ $service->mechanic?->name ?? 'Belum Ditentukan' }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-semibold text-[var(--primary)]">Rp
                                            {{ number_format($service->price ?? 0, 0, ',', '.') }}</p>
                                        <a href="{{ route('admin.service.detail', $service->id) }}"
                                            class="mt-2 text-sm text-[var(--primary)] hover:text-[var(--primary-dark)]">
                                            Lihat Detail
                                        </a>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Aksi Cepat</h3>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <a href=""
                                    class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                                    <div
                                        class="flex-shrink-0 w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center text-[var(--primary)]">
                                        <i class="fas fa-tools text-xl"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="font-medium text-gray-900">Kelola Servis</h4>
                                        <p class="text-sm text-gray-500">Lihat dan kelola semua layanan</p>
                                    </div>
                                </a>
                                <a href=""
                                    class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                                    <div
                                        class="flex-shrink-0 w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center text-[var(--primary)]">
                                        <i class="fas fa-users text-xl"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="font-medium text-gray-900">Kelola Pelanggan</h4>
                                        <p class="text-sm text-gray-500">Lihat semua pelanggan terdaftar</p>
                                    </div>
                                </a>
                                <a href=""
                                    class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                                    <div
                                        class="flex-shrink-0 w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center text-[var(--primary)]">
                                        <i class="fas fa-user-tie text-xl"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="font-medium text-gray-900">Kelola Mekanik</h4>
                                        <p class="text-sm text-gray-500">Tambah atau edit mekanik bengkel</p>
                                    </div>
                                </a>
                                <a href=""
                                    class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                                    <div
                                        class="flex-shrink-0 w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center text-[var(--primary)]">
                                        <i class="fas fa-boxes text-xl"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="font-medium text-gray-900">Kelola Sparepart</h4>
                                        <p class="text-sm text-gray-500">Tambah atau edit sparepart bengkel</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Recent Notifications -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Notifikasi Terbaru</h3>
                        </div>
                        <div class="divide-y divide-gray-200">
                            @foreach ($recentNotifications as $note)
                                <div class="p-4 flex">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="w-10 h-10 bg-red-50 rounded-full flex items-center justify-center text-[var(--primary)]">
                                            <i class="fas fa-bell"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">{{ $note['title'] }}</p>
                                        <p class="text-sm text-gray-500">{{ $note['message'] }}</p>
                                        <p class="text-xs text-gray-400 mt-1">{{ $note['time'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <style>
            :root {
                --primary: #dc2626;
                --primary-dark: #b91c1c;
                --muted: #6b7280;
            }

            body {
                font-family: 'Montserrat', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            }
        </style>
    </div>
