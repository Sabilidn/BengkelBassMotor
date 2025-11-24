{{-- resources/views/welcome.blade.php --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Bengkel Bass Motor — Spesialis Perbaikan Motor</title>

  <!-- Tailwind (Play CDN) -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Fonts & Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <!-- Alpine for small interactivity -->
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <style>
    :root{
      --primary: #dc2626;
      --primary-dark: #b91c1c;
      --muted:#6b7280;
    }
    body { font-family: 'Montserrat', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; }
    /* Subtle glass hero overlay */
    .hero-bg { background-image: linear-gradient(90deg, rgba(220,38,38,0.9), rgba(185,28,28,0.9)); }
    .glass {
      background: rgba(255,255,255,0.06);
      backdrop-filter: blur(6px);
      -webkit-backdrop-filter: blur(6px);
    }
    /* service hover sheen */
    .sheen::after{
      content:'';
      position:absolute; inset:0;
      background:linear-gradient(120deg, transparent 0%, rgba(255,255,255,0.06) 50%, transparent 100%);
      transform: translateX(-120%);
      transition: transform .6s ease;
      pointer-events:none;
    }
    .sheen:hover::after{ transform: translateX(120%); }
    /* testimonial quote icon */
    .quote {
      font-size:4rem; color: rgba(220,38,38,0.06); position:absolute; left:10px; top:-20px;
      transform: rotate(-10deg);
    }
  </style>
</head>
<body class="antialiased text-gray-800">

  <!-- NAVBAR -->
  <header class="fixed top-0 left-0 right-0 z-40 bg-white/80 backdrop-blur shadow-sm">
    <div class="max-w-7xl mx-auto px-6">
      <div class="flex items-center justify-between h-16">
        <a href="#home" class="flex items-center gap-3">
          <div class="h-10 w-10 rounded-full bg-[var(--primary)] text-white flex items-center justify-center shadow">
            <i class="fas fa-tools"></i>
          </div>
          <span class="font-semibold text-lg text-[var(--primary)]">Bengkel Bass Motor</span>
        </a>

        <nav class="hidden md:flex items-center gap-6">
          <a href="#home" class="text-sm font-medium hover:text-[var(--primary)] transition">Beranda</a>
          <a href="#services" class="text-sm font-medium hover:text-[var(--primary)] transition">Layanan</a>
          <a href="#about" class="text-sm font-medium hover:text-[var(--primary)] transition">Tentang</a>
          <a href="#testimonials" class="text-sm font-medium hover:text-[var(--primary)] transition">Testimoni</a>
          <a href="#contact" class="text-sm font-medium hover:text-[var(--primary)] transition">Kontak</a>
        </nav>

        <div class="flex items-center gap-3">
          <a href="https://wa.me/6281234567890" target="_blank" class="hidden md:inline-flex items-center gap-2 px-4 py-2 rounded-md border border-[var(--primary)] text-[var(--primary)] hover:bg-[var(--primary)] hover:text-white transition"> 
            <i class="fab fa-whatsapp"></i> Chat
          </a>

          <!-- Mobile menu button -->
          <div x-data="{open:false}" class="md:hidden">
            <button @click="open = !open" class="p-2 rounded-md hover:bg-gray-100 transition">
              <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"/>
              </svg>
              <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
              </svg>
            </button>

            <div x-show="open" x-cloak @click.outside="open=false" class="absolute right-4 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
              <a href="#home" @click="open=false" class="block px-4 py-2 text-sm hover:bg-gray-50 transition">Beranda</a>
              <a href="#services" @click="open=false" class="block px-4 py-2 text-sm hover:bg-gray-50 transition">Layanan</a>
              <a href="#about" @click="open=false" class="block px-4 py-2 text-sm hover:bg-gray-50 transition">Tentang</a>
              <a href="#testimonials" @click="open=false" class="block px-4 py-2 text-sm hover:bg-gray-50 transition">Testimoni</a>
              <a href="#contact" @click="open=false" class="block px-4 py-2 text-sm hover:bg-gray-50 transition">Kontak</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main class="pt-16">

    <!-- HERO -->
    <section id="home" class="relative hero-bg text-white">
      <div class="max-w-7xl mx-auto px-6 py-20 lg:py-28">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          <div class="space-y-6">
            <h1 class="text-4xl lg:text-5xl font-bold leading-tight">
              Spesialis <span class="text-yellow-300">Perbaikan</span> & Perawatan Motor
            </h1>
            <p class="text-lg max-w-xl text-gray-100/90">
              Teknisi bersertifikat, sparepart original, dan layanan yang cepat. Solusi terbaik untuk motor Anda sejak 2013.
            </p>

            <div class="flex flex-wrap gap-3">
              @if (Route::has('login'))
                @auth
                  {{-- Jika user sudah login --}}
                  <a href="{{ url('/dashboard') }}"
                      class="inline-flex items-center gap-3 bg-white text-[var(--primary)] px-5 py-3 rounded-md font-semibold shadow hover:scale-[1.01] transition">
                      <i class="fas fa-home"></i> Dashboard
                  </a>
                @else
                  {{-- Tombol Login --}}
                  <a href="{{ route('login') }}"
                      class="inline-flex items-center gap-3 bg-white text-[var(--primary)] px-5 py-3 rounded-md font-semibold shadow hover:scale-[1.01] transition">
                      <i class="fas fa-sign-in-alt"></i> Login
                  </a>

                  {{-- Tombol Register --}}
                  @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="inline-flex items-center gap-3 border border-white/30 text-white px-5 py-3 rounded-md hover:bg-white/10 transition">
                        <i class="fas fa-user-plus"></i> Register
                    </a>
                  @endif
                @endauth
              @endif
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-6">
              <div class="text-center">
                <div class="text-2xl font-bold text-white" x-data x-init="(()=>{const el=$el;const target=+el.dataset.count;let n=0;const inc=Math.max(1,Math.floor(target/140));const tick=()=>{n+=inc;if(n>=target){el.textContent=target}else{el.textContent=n;setTimeout(tick,14)}};tick();})()" data-count="5000">0</div>
                <div class="text-xs text-white/90">Motor Diperbaiki</div>
              </div>
              <div class="text-center">
                <div class="text-2xl font-bold text-white" x-data x-init="(()=>{const el=$el;const target=+el.dataset.count;let n=0;const inc=Math.max(1,Math.floor(target/140));const tick=()=>{n+=inc;if(n>=target){el.textContent=target}else{el.textContent=n;setTimeout(tick,20)}};tick();})()" data-count="10">0</div>
                <div class="text-xs text-white/90">Tahun Pengalaman</div>
              </div>
              <div class="text-center">
                <div class="text-2xl font-bold text-white" x-data x-init="(()=>{const el=$el;const target=+el.dataset.count;let n=0;const inc=1;const tick=()=>{n+=inc;if(n>=target){el.textContent=target}else{el.textContent=n;setTimeout(tick,40)}};tick();})()" data-count="98">0</div>
                <div class="text-xs text-white/90">% Kepuasan</div>
              </div>
              <div class="text-center">
                <div class="text-2xl font-bold text-white" x-data x-init="(()=>{const el=$el;const target=+el.dataset.count;let n=0;const inc=1;const tick=()=>{n+=inc;if(n>=target){el.textContent=target}else{el.textContent=n;setTimeout(tick,60)}};tick();})()" data-count="24">0</div>
                <div class="text-xs text-white/90">Jam Layanan</div>
              </div>
            </div>
          </div>

          <div class="flex justify-center lg:justify-end">
            <!-- simple illustrative SVG -->
            <div class="bg-white/10 p-8 rounded-2xl shadow-2xl glass">
              <svg viewBox="0 0 200 200" class="w-72 h-72">
                <path fill="#FFD700" d="M50,120 C30,100 30,70 50,50 L150,50 C170,70 170,100 150,120 L50,120 Z"/>
                <circle cx="60" cy="140" r="20" fill="#333"/>
                <circle cx="140" cy="140" r="20" fill="#333"/>
                <path fill="var(--primary)" d="M70,60 L130,60 C135,65 135,75 130,80 L70,80 C65,75 65,65 70,60 Z"/>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SERVICES -->
    <section id="services" class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-10">
          <h2 class="text-3xl font-bold">Layanan Kami</h2>
          <p class="text-gray-500 max-w-2xl mx-auto mt-2">Perbaikan, servis berkala, dan modifikasi — kami tangani semua dengan profesional.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <article class="relative p-6 bg-white rounded-xl border border-gray-100 shadow-sm sheen overflow-hidden">
            <div class="flex items-center justify-center w-16 h-16 rounded-full bg-red-50 text-[var(--primary)] mb-4">
              <i class="fas fa-oil-can text-xl"></i>
            </div>
            <h3 class="font-semibold text-lg">Servis Berkala</h3>
            <p class="mt-3 text-sm text-gray-600">Ganti oli, pengecekan rem, tune-up, dan layanan rutin agar motor selalu prima.</p>
            <div class="mt-4 font-bold text-[var(--primary)]">Mulai Rp 75.000</div>
          </article>

          <article class="relative p-6 bg-white rounded-xl border border-gray-100 shadow-sm sheen overflow-hidden">
            <div class="flex items-center justify-center w-16 h-16 rounded-full bg-red-50 text-[var(--primary)] mb-4">
              <i class="fas fa-cogs text-xl"></i>
            </div>
            <h3 class="font-semibold text-lg">Perbaikan Mesin</h3>
            <p class="mt-3 text-sm text-gray-600">Dari perbaikan ringan hingga overhaul lengkap oleh teknisi berpengalaman.</p>
            <div class="mt-4 font-bold text-[var(--primary)]">Mulai Rp 150.000</div>
          </article>

          <article class="relative p-6 bg-white rounded-xl border border-gray-100 shadow-sm sheen overflow-hidden">
            <div class="flex items-center justify-center w-16 h-16 rounded-full bg-red-50 text-[var(--primary)] mb-4">
              <i class="fas fa-paint-roller text-xl"></i>
            </div>
            <h3 class="font-semibold text-lg">Modifikasi & Custom</h3>
            <p class="mt-3 text-sm text-gray-600">Desain & modifikasi sesuai gaya Anda, dengan tetap memperhatikan keamanan.</p>
            <div class="mt-4 font-bold text-[var(--primary)]">Mulai Rp 300.000</div>
          </article>
        </div>
      </div>
    </section>

    <!-- ABOUT + PROMO -->
    <section id="about" class="py-16 bg-gray-50">
      <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
        <div class="lg:col-span-2 bg-white p-8 rounded-xl shadow">
          <h2 class="text-2xl font-bold mb-4">Mengapa Memilih Bengkel Bass Motor?</h2>
          <ul class="space-y-4">
            <li class="flex items-start gap-4">
              <div class="w-12 h-12 rounded-full bg-red-50 text-[var(--primary)] flex items-center justify-center">
                <i class="fas fa-user-check"></i>
              </div>
              <div>
                <h4 class="font-semibold">Teknisi Berpengalaman</h4>
                <p class="text-sm text-gray-600">Sertifikasi dan pengalaman puluhan ribu perbaikan.</p>
              </div>
            </li>

            <li class="flex items-start gap-4">
              <div class="w-12 h-12 rounded-full bg-red-50 text-[var(--primary)] flex items-center justify-center">
                <i class="fas fa-shield-alt"></i>
              </div>
              <div>
                <h4 class="font-semibold">Sparepart Original</h4>
                <p class="text-sm text-gray-600">Garansi resmi untuk komponen yang dipakai.</p>
              </div>
            </li>

            <li class="flex items-start gap-4">
              <div class="w-12 h-12 rounded-full bg-red-50 text-[var(--primary)] flex items-center justify-center">
                <i class="fas fa-tag"></i>
              </div>
              <div>
                <h4 class="font-semibold">Harga Transparan</h4>
                <p class="text-sm text-gray-600">Rincian biaya jelas sebelum pengerjaan dimulai.</p>
              </div>
            </li>
          </ul>
        </div>

        <aside class="bg-white p-6 rounded-xl shadow flex flex-col justify-between">
          <div>
            <h3 class="text-lg font-bold mb-2">Promo Spesial</h3>
            <p class="text-sm text-gray-600 mb-4">Diskon 15% untuk servis pertama. Gunakan kode:</p>
            <div class="bg-red-600 text-white text-center py-3 rounded font-bold text-xl">BBM15</div>
            <p class="text-xs text-gray-500 mt-3">*Promo berlaku hingga 30 November 2023</p>
          </div>
          <a href="https://wa.me/6281234567890" target="_blank" class="mt-6 inline-flex items-center justify-center gap-3 px-4 py-3 rounded-md bg-[var(--primary)] text-white font-semibold hover:bg-[var(--primary-dark)] transition">
            <i class="fab fa-whatsapp"></i> Klaim Promo Sekarang
          </a>
        </aside>
      </div>
    </section>

    <!-- TESTIMONIALS -->
    <section id="testimonials" class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-8">
          <h2 class="text-3xl font-bold">Apa Kata Pelanggan Kami</h2>
          <p class="text-gray-500 mt-2">Pengalaman nyata pelanggan setelah menggunakan layanan kami.</p>
        </div>

        <div x-data="testimonial()" class="relative">
          <div class="overflow-hidden">
            <template x-for="(t,i) in items" :key="i">
              <div x-show="active === i" x-transition:enter="transition ease-out duration-300" 
                   x-transition:enter-start="opacity-0 transform translate-x-full" 
                   x-transition:enter-end="opacity-100 transform translate-x-0"
                   x-transition:leave="transition ease-in duration-300" 
                   x-transition:leave-start="opacity-100 transform translate-x-0" 
                   x-transition:leave-end="opacity-0 transform -translate-x-full"
                   class="p-6 bg-white rounded-xl shadow text-gray-700">
                <div class="relative">
                  <div class="quote"><i class="fas fa-quote-left"></i></div>
                  <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 rounded-full bg-red-50 text-[var(--primary)] flex items-center justify-center font-bold" x-text="t.name.charAt(0)"></div>
                    <div>
                      <div class="font-semibold" x-text="t.name"></div>
                      <div class="flex text-yellow-400 mt-1" x-html="t.stars"></div>
                    </div>
                  </div>
                  <p class="italic text-gray-600" x-text="t.text"></p>
                </div>
              </div>
            </template>
          </div>

          <div class="flex justify-center gap-3 mt-6">
            <button @click="prev" class="px-3 py-1 rounded bg-gray-100 hover:bg-gray-200 transition">
              <i class="fas fa-chevron-left"></i>
            </button>
            <button @click="next" class="px-3 py-1 rounded bg-gray-100 hover:bg-gray-200 transition">
              <i class="fas fa-chevron-right"></i>
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA -->
    <section class="py-12 bg-[var(--primary)] text-white">
      <div class="max-w-4xl mx-auto px-6 text-center">
        <h3 class="text-2xl font-bold">Siap Memperbaiki Motor Anda?</h3>
        <p class="mt-2 text-gray-100/90">Hubungi kami sekarang untuk konsultasi gratis dan estimasi cepat.</p>
        <div class="mt-6 flex flex-col sm:flex-row justify-center gap-4">
          <a href="tel:02112345678" class="inline-flex items-center gap-3 px-6 py-3 rounded-md border border-white/20 hover:bg-white/10 transition"> 
            <i class="fas fa-phone"></i> (021) 1234-5678
          </a>
          <a href="https://wa.me/6281234567890" class="inline-flex items-center gap-3 px-6 py-3 rounded-md bg-white text-[var(--primary)] font-semibold hover:bg-gray-100 transition">
            <i class="fab fa-whatsapp"></i> Chat WhatsApp
          </a>
        </div>
      </div>
    </section>

    <!-- CONTACT -->
    <section id="contact" class="py-16 bg-gray-50">
      <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-white p-8 rounded-xl shadow">
          <h3 class="text-xl font-bold mb-4">Informasi Kontak</h3>
          <div class="space-y-4">
            <div class="flex items-start gap-4">
              <div class="w-12 h-12 rounded-full bg-red-50 text-[var(--primary)] flex items-center justify-center">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <div>
                <div class="font-semibold">Alamat</div>
                <div class="text-sm text-gray-600">Jl. Perbaikan No. 123, Jakarta Selatan</div>
              </div>
            </div>

            <div class="flex items-start gap-4">
              <div class="w-12 h-12 rounded-full bg-red-50 text-[var(--primary)] flex items-center justify-center">
                <i class="fas fa-phone"></i>
              </div>
              <div>
                <div class="font-semibold">Telepon</div>
                <div class="text-sm text-gray-600">(021) 1234-5678</div>
              </div>
            </div>

            <div class="flex items-start gap-4">
              <div class="w-12 h-12 rounded-full bg-red-50 text-[var(--primary)] flex items-center justify-center">
                <i class="fas fa-clock"></i>
              </div>
              <div>
                <div class="font-semibold">Jam Operasional</div>
                <div class="text-sm text-gray-600">Senin-Sabtu: 08.00 - 17.00 WIB</div>
              </div>
            </div>
          </div>

          <div class="mt-6">
            <h4 class="font-semibold mb-2">Follow Kami</h4>
            <div class="flex gap-3">
              <a class="w-10 h-10 rounded-full bg-[var(--primary)] text-white flex items-center justify-center hover:bg-[var(--primary-dark)] transition" href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a class="w-10 h-10 rounded-full bg-[var(--primary)] text-white flex items-center justify-center hover:bg-[var(--primary-dark)] transition" href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a class="w-10 h-10 rounded-full bg-[var(--primary)] text-white flex items-center justify-center hover:bg-[var(--primary-dark)] transition" href="#">
                <i class="fab fa-youtube"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="bg-white p-8 rounded-xl shadow">
          <h3 class="text-xl font-bold mb-4">Kirim Pesan</h3>
          <form method="POST" action="#" class="space-y-4">
            @csrf
            <div>
              <label class="block text-sm font-medium mb-1">Nama</label>
              <input name="name" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[var(--primary)] focus:border-[var(--primary)] transition" />
            </div>
            <div>
              <label class="block text-sm font-medium mb-1">Email</label>
              <input name="email" type="email" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[var(--primary)] focus:border-[var(--primary)] transition" />
            </div>
            <div>
              <label class="block text-sm font-medium mb-1">Pesan</label>
              <textarea name="message" rows="4" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[var(--primary)] focus:border-[var(--primary)] transition"></textarea>
            </div>
            <button type="submit" class="w-full inline-flex items-center justify-center gap-3 px-4 py-3 rounded-md bg-[var(--primary)] text-white font-semibold hover:bg-[var(--primary-dark)] transition">
              <i class="fas fa-paper-plane"></i> Kirim Pesan
            </button>
          </form>
        </div>
      </div>
    </section>

  </main>

  <!-- FLOATING WHATSAPP -->
  <a href="https://wa.me/6281234567890" target="_blank" class="fixed right-6 bottom-6 bg-[#25D366] text-white w-14 h-14 rounded-full flex items-center justify-center shadow-xl hover:scale-105 transition z-50">
    <i class="fab fa-whatsapp text-lg"></i>
  </a>

  <!-- FOOTER -->
  <footer class="bg-gray-900 text-gray-200">
    <div class="max-w-7xl mx-auto px-6 py-8 flex flex-col md:flex-row justify-between items-center gap-4">
      <div class="flex items-center gap-3">
        <div class="h-10 w-10 rounded-full bg-white text-[var(--primary)] flex items-center justify-center">
          <i class="fas fa-tools"></i>
        </div>
        <div>
          <div class="font-semibold">Bengkel Bass Motor</div>
          <div class="text-sm text-gray-400">Spesialis Perbaikan Motor Terpercaya</div>
        </div>
      </div>

      <div class="text-center text-sm text-gray-400">
        &copy; {{ date('Y') }} Bengkel Bass Motor. All rights reserved.
        <div class="mt-1 text-xs">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</div>
      </div>
    </div>
  </footer>

  <!-- Small inline scripts -->
  <script>
    // Testimonials Alpine data
    function testimonial(){
      return {
        active: 0,
        items: [
          { 
            name: 'Ahmad Santoso', 
            stars: '★★★★★', 
            text: 'Motor saya mogok di jalan, teknisi datang cepat dan memperbaikinya di tempat. Sangat memuaskan!' 
          },
          { 
            name: 'Sari Dewi', 
            stars: '★★★★★', 
            text: 'Servis berkala matic selalu di sini. Hasil rapi dan harga bersahabat.' 
          },
          { 
            name: 'Rizki Pratama', 
            stars: '★★★★☆', 
            text: 'Modifikasi hasilnya sesuai, teknisinya ramah dan profesional.' 
          },
        ],
        next(){ 
          this.active = (this.active + 1) % this.items.length 
        },
        prev(){ 
          this.active = (this.active - 1 + this.items.length) % this.items.length 
        },
        init(){ 
          setInterval(() => this.next(), 6000) 
        }
      }
    }
  </script>

</body>
</html>