<div class="max-w-3xl mx-auto bg-white shadow p-6 rounded-lg">

    <h2 class="text-xl font-bold mb-4">Detail Servis</h2>

    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="updateService" class="space-y-4">

        <div>
            <label class="block">Model Motor</label>
            <input type="text" wire:model="motor_model" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block">Masalah</label>
            <input type="text" wire:model="problem_description" class="w-full border rounded p-2">
        </div>

       <div>
    <label class="block text-sm text-gray-700">Pilih Mekanik</label>
    <select wire:model="mechanic_id" class="w-full mt-1 border rounded px-3 py-2">
        <option value="">-- Belum ditentukan --</option>
        @foreach($mechanics as $mechanic)
            <option value="{{ $mechanic->id }}">{{ $mechanic->name }}</option>
        @endforeach
    </select>
</div>

        
        <div>
            <label class="block">Status</label>
            <select wire:model="status" class="w-full border rounded p-2">
                <option value="menunggu">Menunggu</option>
                <option value="dalam proses">Dalam Proses</option>
                <option value="menunggu parts">Menunggu Parts</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>

        <div>
            <label class="block">Harga</label>
            <input type="number" wire:model="price" class="w-full border rounded p-2">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Update Servis
        </button>
    </form>

</div>
