<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Judul -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Servis Anda</h2>
            <p class="text-gray-500 mt-1">Pantau semua layanan servis motor Anda di sini.</p>
        </div>

        <!-- Servis Aktif -->
        <div class="bg-white shadow-sm rounded-lg mb-8">
            <div class="p-6 border-b">
                <h3 class="text-lg font-semibold text-gray-800">Servis Aktif</h3>
            </div>

            @if(count($activeServices) > 0)
                <div class="divide-y">
                    @foreach($activeServices as $service)
                        <div class="p-6 flex justify-between">
                            <div>
                                <h4 class="font-semibold text-gray-900">
                                    {{ $service->service_type }} - {{ $service->motor_model }}
                                </h4>
                                <p class="text-sm text-gray-500 mt-1">
                                    Status: <span class="font-semibold text-[var(--primary)]">{{ ucfirst($service->status) }}</span>
                                </p>
                                <p class="text-sm text-gray-500 mt-1">
                                    Mekanik: <strong>{{ $service->mechanic->name ?? 'Belum ditentukan' }}</strong>
                                </p>
                                <p class="text-sm text-gray-500 mt-1">
                                    Estimasi Selesai: <strong>{{ $service->estimasi ?? '-' }}</strong>
                                </p>
                            </div>

                            <div class="text-right">
                                <p class="font-semibold text-[var(--primary)]">
                                    Rp {{ number_format($service->price, 0, ',', '.') }}
                                </p>
                                <button class="mt-2 text-sm text-[var(--primary)] hover:text-[var(--primary-dark)]">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="p-6 text-gray-500">Belum ada servis aktif.</p>
            @endif
        </div>

        <div>

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Booking Form -->
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Booking Servis</h2>

        <form wire:submit.prevent="submitBooking" class="space-y-4">

            <div>
                <label class="block text-sm text-gray-700">Model Motor</label>
                <input type="text" wire:model="motor_model"
                       class="w-full mt-1 border rounded px-3 py-2">
                @error('motor_model') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm text-gray-700">Keluhan</label>
                <textarea wire:model="problem_description" class="w-full mt-1 border rounded px-3 py-2"></textarea>
                @error('problem_description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm text-gray-700">Tanggal Servis</label>
                <input type="date" wire:model="tanggal"
                       class="w-full mt-1 border rounded px-3 py-2">
                @error('tanggal') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <button class="bg-[var(--primary)] text-white px-4 py-2 rounded hover:bg-[var(--primary-dark)]">
                Booking Sekarang
            </button>
        </form>
    </div>

    <!-- My Services -->
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Daftar Servis Anda</h2>

        @forelse ($services as $service)
            <div class="border-b py-4">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="font-semibold text-gray-900">{{ $service->motor_model }}</p>
                        <p class="text-sm text-gray-500">Keluhan: {{ $service->problem_description }}</p>
                        <p class="text-sm mt-1">
                            Status:
                            <span class="font-semibold capitalize text-red-600">{{ $service->status }}</span>
                        </p>
                    </div>

                    <div class="text-right">
                        <p class="font-semibold text-[var(--primary)]">Rp {{ number_format($service->price ?? 0) }}</p>
                        <p class="text-xs text-gray-400">{{ $service->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Belum ada servis.</p>
        @endforelse
    </div>

</div>


        <!-- Riwayat Servis -->
        <div class="bg-white shadow-sm rounded-lg mb-8">
            <div class="p-6 border-b">
                <h3 class="text-lg font-semibold text-gray-800">Riwayat Servis</h3>
            </div>

            @if(count($historyServices) > 0)
                <div class="divide-y">
                    @foreach($historyServices as $service)
                        <div class="p-6 flex justify-between">
                            <div>
                                <h4 class="font-semibold text-gray-900">
                                    {{ $service->service_type }} - {{ $service->motor_model }}
                                </h4>
                                <p class="text-sm text-gray-500 mt-1">
                                    Selesai pada: <strong>{{ $service->updated_at->format('d M Y') }}</strong>
                                </p>
                            </div>

                            <div class="text-right">
                                <p class="font-semibold text-[var(--primary)]">
                                    Rp {{ number_format($service->price, 0, ',', '.') }}
                                </p>
                                <button class="mt-2 text-sm text-[var(--primary)] hover:text-[var(--primary-dark)]">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

            @else
                <p class="p-6 text-gray-500">Belum ada riwayat servis.</p>
            @endif
        </div>

    </div>
</div>
