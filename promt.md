
## 🚀 MASTER PROMPT

```
You are a senior Laravel 12 developer. I have an existing multi-page HTML landing page for ASTAREKA — Kabinet BEM Universitas Sugeng Hartono. I will describe the exact design system and page structures below. Your job is to convert this into a full Laravel 12 application with:

- MySQL database
- Laravel Blade templating (PRESERVE EXACT HTML structure, Tailwind classes, and design tokens)
- Admin panel to manage all landing page content
- Authentication (login/logout for admin only)
- Modular and clean folder structure

---

## DESIGN SYSTEM (CRITICAL — DO NOT CHANGE)

### CSS Framework
- Tailwind CSS via CDN: `https://cdn.tailwindcss.com?plugins=forms,container-queries`
- All Tailwind config is inline via `tailwind.config = { ... }` inside a `<script>` tag — keep this approach in Blade layouts

### Fonts (Google Fonts CDN)
- Manrope (wght 200..800) — used as `font-headline`, for h1/h2/h3/h4, logo
- Inter (wght 300..700) — used as `font-body` and `font-label`, for paragraphs and UI text
- Material Symbols Outlined — for all icons via `<span class="material-symbols-outlined">`

### Color Tokens (Tailwind custom colors — must be in every blade layout's tailwind.config)
```js
colors: {
  "primary": "#001e40",
  "primary-container": "#003366",
  "primary-fixed": "#d5e3ff",
  "primary-fixed-dim": "#a7c8ff",
  "on-primary": "#ffffff",
  "on-primary-container": "#799dd6",
  "on-primary-fixed": "#001b3c",
  "on-primary-fixed-variant": "#1f477b",
  "secondary": "#755b00",
  "secondary-container": "#ffd660",
  "secondary-fixed": "#ffe08e",
  "secondary-fixed-dim": "#eac24e",
  "on-secondary": "#ffffff",
  "on-secondary-container": "#755c00",
  "on-secondary-fixed": "#241a00",
  "on-secondary-fixed-variant": "#584400",
  "tertiary": "#001e42",
  "tertiary-container": "#003368",
  "tertiary-fixed": "#d6e3ff",
  "tertiary-fixed-dim": "#a8c8ff",
  "on-tertiary": "#ffffff",
  "on-tertiary-container": "#739de0",
  "on-tertiary-fixed": "#001b3d",
  "on-tertiary-fixed-variant": "#134684",
  "surface": "#f8f9ff",
  "surface-bright": "#f8f9ff",
  "surface-dim": "#cbdbf5",
  "surface-variant": "#d3e4fe",
  "surface-container-lowest": "#ffffff",
  "surface-container-low": "#eff4ff",
  "surface-container": "#e5eeff",
  "surface-container-high": "#dce9ff",
  "surface-container-highest": "#d3e4fe",
  "surface-tint": "#3a5f94",
  "on-surface": "#0b1c30",
  "on-surface-variant": "#43474f",
  "on-background": "#0b1c30",
  "background": "#f8f9ff",
  "outline": "#737780",
  "outline-variant": "#c3c6d1",
  "inverse-surface": "#213145",
  "inverse-on-surface": "#eaf1ff",
  "inverse-primary": "#a7c8ff",
  "error": "#ba1a1a",
  "error-container": "#ffdad6",
  "on-error": "#ffffff",
  "on-error-container": "#93000a",
}
```

### Border Radius Tokens
```js
borderRadius: {
  "DEFAULT": "0.125rem",
  "lg": "0.25rem",
  "xl": "0.5rem",
  "full": "0.75rem"
}
```

### Global CSS (include in every layout `<style>` tag)
```css
.material-symbols-outlined {
  font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
}
```

### Body defaults
```html
<body class="bg-surface text-on-surface font-body selection:bg-secondary-container selection:text-on-secondary-container">
```

---

## NAVBAR (used on ALL frontend pages — identical structure)

```html
<nav class="fixed top-0 w-full z-50 bg-[#f8f9ff]/80 dark:bg-[#0b1c30]/80 backdrop-blur-xl bg-[#eff4ff]/50 dark:bg-[#003366]/20">
  <div class="flex justify-between items-center px-8 py-4 max-w-7xl mx-auto">
    <span class="text-xl font-black text-[#001e40] dark:text-white tracking-tighter font-headline">ASTAREKA</span>
    <div class="hidden md:flex items-center gap-8">
      <!-- Nav links: active state = text-[#755b00] border-b-2 border-[#755b00] pb-1 -->
      <!-- inactive state = text-[#001e40] dark:text-[#eff4ff] opacity-70 hover:opacity-100 transition-all font-bold tracking-tight -->
      <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'text-[#755b00] border-b-2 border-[#755b00] pb-1' : 'text-[#001e40] opacity-70 hover:opacity-100 transition-all' }} font-bold tracking-tight">Beranda</a>
      <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'text-[#755b00] border-b-2 border-[#755b00] pb-1' : 'text-[#001e40] opacity-70 hover:opacity-100 transition-all' }} font-bold tracking-tight">Tentang Kami</a>
      <a href="{{ route('berita.index') }}" class="{{ request()->routeIs('berita.*') ? 'text-[#755b00] border-b-2 border-[#755b00] pb-1' : 'text-[#001e40] opacity-70 hover:opacity-100 transition-all' }} font-bold tracking-tight">Berita &amp; Event</a>
      <a href="{{ route('aspirasi.index') }}" class="{{ request()->routeIs('aspirasi.*') ? 'text-[#755b00] border-b-2 border-[#755b00] pb-1' : 'text-[#001e40] opacity-70 hover:opacity-100 transition-all' }} font-bold tracking-tight">Aspirasi</a>
    </div>
    @auth
      <a href="{{ route('admin.dashboard') }}" class="bg-primary text-on-primary px-6 py-2.5 rounded-xl font-headline font-bold text-sm tracking-wide active:scale-95 duration-200">Dashboard</a>
    @else
      <a href="{{ route('login') }}" class="bg-primary text-on-primary px-6 py-2.5 rounded-xl font-headline font-bold text-sm tracking-wide active:scale-95 duration-200">Login</a>
    @endauth
  </div>
</nav>
```

---

## FOOTER (used on ALL frontend pages — identical structure)

```html
<footer class="w-full mt-20 bg-[#eff4ff] dark:bg-[#001e40] font-inter text-sm tracking-wide">
  <div class="flex flex-col md:flex-row justify-between items-start px-12 py-16 gap-8 w-full max-w-7xl mx-auto">
    <div class="space-y-4 max-w-sm">
      <div class="text-lg font-bold text-[#001e40] dark:text-white font-headline">ASTAREKA</div>
      <p class="text-[#0b1c30] dark:text-[#c3c6d1] opacity-80 leading-relaxed">
        Badan Eksekutif Mahasiswa Universitas Sugeng Hartono. Menjadi garda terdepan dalam pelayanan dan advokasi mahasiswa.
      </p>
      <div class="flex gap-4">
        <a href="#" class="hover:text-[#755b00] transition-colors text-[#0b1c30]"><span class="material-symbols-outlined">share</span></a>
        <a href="#" class="hover:text-[#755b00] transition-colors text-[#0b1c30]"><span class="material-symbols-outlined">alternate_email</span></a>
      </div>
    </div>
    <div class="grid grid-cols-2 gap-12">
      <div class="space-y-4">
        <h4 class="font-bold text-[#003366] dark:text-[#eff4ff] text-xs uppercase tracking-widest">Navigasi</h4>
        <ul class="space-y-2 text-[#0b1c30] dark:text-[#c3c6d1] opacity-80">
          <li><a href="{{ route('beranda') }}" class="hover:text-[#755b00] transition-colors">Beranda</a></li>
          <li><a href="{{ route('berita.index') }}" class="hover:text-[#755b00] transition-colors">Berita &amp; Event</a></li>
          <li><a href="{{ route('aspirasi.index') }}" class="hover:text-[#755b00] transition-colors">Aspirasi</a></li>
          <li><a href="{{ route('tentang') }}" class="hover:text-[#755b00] transition-colors">Tentang Kami</a></li>
        </ul>
      </div>
      <div class="space-y-4">
        <h4 class="font-bold text-[#003366] dark:text-[#eff4ff] text-xs uppercase tracking-widest">Hubungi Kami</h4>
        <ul class="space-y-2 text-[#0b1c30] dark:text-[#c3c6d1] opacity-80">
          <li><a href="#" class="hover:text-[#755b00] transition-colors">Instagram</a></li>
          <li><a href="#" class="hover:text-[#755b00] transition-colors">LinkedIn</a></li>
          <li><a href="#" class="hover:text-[#755b00] transition-colors">YouTube</a></li>
          <li><a href="#" class="hover:text-[#755b00] transition-colors">Contact</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="px-12 py-8 border-t border-outline-variant/10 text-center md:text-left text-[#0b1c30] dark:text-[#c3c6d1] opacity-70 max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
    <p>© 2024 BEM Universitas Sugeng Hartono Kabinet Astareka. The Digital Curator.</p>
    <p class="opacity-50">Designed for Excellence.</p>
  </div>
</footer>
```

---

## PAGE STRUCTURES

### PAGE 1: Beranda (beranda.blade.php) — extends layouts.app
Content sections pulled from DB, all inside `<main class="pt-32 pb-24 overflow-hidden">`:

**Section 1 — Hero** (data from `heroes` table):
```html
<header class="relative pt-32 pb-24 overflow-hidden">
  <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
    <div class="lg:col-span-7 space-y-8">
      <div class="inline-block px-4 py-1.5 bg-surface-container-high rounded-full">
        <span class="text-xs font-bold uppercase tracking-[0.15em] text-primary font-label">{{ $hero->tagline }}</span>
      </div>
      <h1 class="text-5xl md:text-7xl font-headline font-extrabold text-primary leading-[1.05] tracking-tighter">
        {!! $hero->judul_html !!} <!-- supports <span class="text-secondary"> for colored word -->
      </h1>
      <p class="text-lg text-on-surface-variant max-w-xl leading-relaxed font-body">{{ $hero->deskripsi }}</p>
      <div class="flex items-center gap-6 pt-4">
        <a href="{{ route('tentang') }}" class="bg-primary text-on-primary px-8 py-4 rounded-xl font-headline font-bold text-base hover:bg-primary-container transition-all active:scale-95">Learn More</a>
        <a href="{{ route('berita.index') }}" class="flex items-center gap-2 text-primary font-headline font-bold text-base group">
          See Our Programs
          <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
        </a>
      </div>
    </div>
    <div class="lg:col-span-5 relative">
      <div class="relative rounded-2xl overflow-hidden h-[500px]" style="box-shadow: 0 20px 40px rgba(11,28,48,0.06)">
        @if($hero->gambar)
          <img src="{{ Storage::url($hero->gambar) }}" class="w-full h-full object-cover" alt="Hero Image"/>
        @endif
      </div>
      @if($nextEvent)
      <div class="absolute -bottom-6 -left-6 bg-surface-container-lowest p-6 rounded-xl max-w-[200px]" style="box-shadow: 0 20px 40px rgba(11,28,48,0.06)">
        <p class="text-xs font-label uppercase tracking-widest text-outline mb-2">Next Event</p>
        <p class="text-sm font-bold text-primary">{{ $nextEvent->judul }}</p>
      </div>
      @endif
    </div>
  </div>
</header>
```

**Section 2 — Tentang Singkat** (data from `profile_bem` key='visi' and key='misi'):
```html
<section class="py-24 bg-surface-container-low">
  <div class="max-w-7xl mx-auto px-8">
    <div class="flex flex-col lg:flex-row gap-16 items-start">
      <div class="lg:w-1/3">
        <h2 class="text-sm font-label uppercase tracking-[0.2em] text-secondary mb-4">Discovery</h2>
        <h3 class="text-4xl font-headline font-extrabold text-primary tracking-tight">Tentang Kabinet Astareka</h3>
        <div class="w-16 h-1 bg-secondary mt-6"></div>
      </div>
      <div class="lg:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-12">
        <div class="space-y-6">
          <div class="w-12 h-12 rounded-xl bg-primary flex items-center justify-center text-on-primary">
            <span class="material-symbols-outlined">visibility</span>
          </div>
          <h4 class="text-2xl font-headline font-bold text-primary">Visi</h4>
          <p class="text-on-surface-variant leading-relaxed">{{ $visi }}</p>
        </div>
        <div class="space-y-6">
          <div class="w-12 h-12 rounded-xl bg-secondary flex items-center justify-center text-on-secondary">
            <span class="material-symbols-outlined">rocket_launch</span>
          </div>
          <h4 class="text-2xl font-headline font-bold text-primary">Misi</h4>
          <p class="text-on-surface-variant leading-relaxed">{{ $misi }}</p>
        </div>
      </div>
    </div>
  </div>
</section>
```

**Section 3 — Program Unggulan** (Bento Grid, data from `program_kerja` table, is_active=true, ordered by urutan, limit 4):
- First card `md:col-span-2 md:row-span-2` with `bg-primary` dark style (featured program)
- Remaining cards smaller with `bg-surface-container-low` or `bg-secondary-container` or `bg-surface-container-highest`
- Grid: `grid grid-cols-1 md:grid-cols-4 gap-6 h-auto md:h-[600px]`
- Each card has: icon (material-symbols-outlined), nama, deskripsi, north_east arrow icon

**Section 4 — Berita Terkini** (data from `berita` table, is_published=true, latest 3, ordered by published_at desc):
```html
<section class="py-24 bg-surface-container-low/30">
  <div class="max-w-7xl mx-auto px-8">
    <div class="flex justify-between items-end mb-12">
      <div class="space-y-4">
        <h2 class="text-sm font-label uppercase tracking-widest text-outline">Editorial</h2>
        <h3 class="text-4xl font-headline font-extrabold text-primary tracking-tight">Berita &amp; Event Terkini</h3>
      </div>
      <a href="{{ route('berita.index') }}" class="text-primary font-bold border-b border-primary/20 pb-1 hover:border-primary transition-all">Lihat Semua Berita</a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @foreach($beritaTerkini as $berita)
      <div class="bg-surface-container-lowest rounded-2xl overflow-hidden group cursor-pointer" style="box-shadow: 0 20px 40px rgba(11,28,48,0.06)">
        <div class="h-56 overflow-hidden">
          @if($berita->gambar)
            <img src="{{ Storage::url($berita->gambar) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $berita->judul }}"/>
          @endif
        </div>
        <div class="p-8 space-y-4">
          <span class="text-xs font-bold text-secondary uppercase tracking-tighter">{{ $berita->kategori }} • {{ $berita->published_at?->format('d M Y') }}</span>
          <h5 class="text-xl font-headline font-bold text-primary leading-snug">{{ $berita->judul }}</h5>
          <p class="text-sm text-on-surface-variant line-clamp-2">{{ $berita->excerpt }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
```

---

### PAGE 2: Berita Index (berita/index.blade.php) — extends layouts.app
Replicate the exact structure from `berita.html`:

- **Hero Banner** (featured event): Big rounded card with gradient overlay, image background, event title, description, Register button, "Event Details" button. Data from `berita` where `kategori='Event'` and is_published=true, latest 1.
- **Search & Filter Bar**: Text search input + filter buttons (All Items, News, Events, Announcements) — use GET params `?search=&kategori=`
- **Main Grid 12-col**: Left `lg:col-span-8` feed, Right `lg:col-span-4` sidebar
  - Feed: First card `col-span-2` featured (large image 300px tall, full title), then 2-col grid cards (200px image, category badge pill top-left with `bg-white glass-effect`, date, title)
  - Sidebar: Calendar widget (static display OK, or dynamic), Popular Articles (3 items with thumbnail), Newsletter email subscribe card (`bg-primary` dark style)
- **Pagination**: Bootstrap pagination style via `$berita->links('pagination::tailwind')`
- Filter by kategori via query string, search by judul

---

### PAGE 3: Berita Show (berita/show.blade.php) — extends layouts.app
- Full article view: big header image, judul, date, kategori, penulis, full `konten` rendered as HTML (`{!! $berita->konten !!}`)
- Back button to index

---

### PAGE 4: Aspirasi (aspirasi.blade.php) — extends layouts.app
Replicate EXACT structure from `aspirasi.html`:

**Hero section**:
```html
<section class="max-w-7xl mx-auto px-8 mb-24">
  <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-end">
    <div class="md:col-span-8">
      <span class="text-secondary font-semibold mb-4 block uppercase tracking-[0.2em] text-sm">Suara Mahasiswa</span>
      <h1 class="text-5xl md:text-7xl font-headline font-extrabold text-primary tracking-tighter leading-[1.1] mb-8">
        Setiap Aspirasi <br/>Adalah <span class="text-secondary-fixed-dim">Inovasi.</span>
      </h1>
    </div>
    <div class="md:col-span-4 pb-4">
      <p class="text-lg text-on-surface-variant leading-relaxed">{{ $profileBem['tentang_singkat'] ?? 'BEM Universitas Sugeng Hartono berkomitmen untuk menjadi wadah transformatif...' }}</p>
    </div>
  </div>
</section>
```

**Main 12-col grid**:
- Left `lg:col-span-7`: Form card with `bg-surface-container-lowest rounded-full p-10 border border-outline-variant/10`
  - Form fields: Nama Lengkap (optional), NIM (optional), Program Studi (select: Informatika, Sistem Informasi, Bisnis Digital, Gizi), Kategori (select: Pengaduan, Saran, Kolaborasi), Pesan Aspirasi (textarea rows=6)
  - Input style: `bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg`
  - Label style: `text-xs font-semibold uppercase tracking-widest text-outline`
  - Submit button: `w-full py-4 bg-primary text-on-primary rounded-xl font-headline font-bold text-lg`
  - POST to `route('aspirasi.store')` with CSRF
  - Show success flash: `@if(session('success'))<div class="...">{{ session('success') }}</div>@endif`

- Right `lg:col-span-5 space-y-12`:
  - Status Tracker card (`bg-surface-container-low rounded-full p-8`) — data from `aspirasi` table where status != 'baru', latest 3, show judul + status badge
  - Decorative image div `rounded-full aspect-video` with gradient overlay and quote text (static from profile_bem key='quote_inspirasi')

**FAQ Section**: 4-card 2-col grid, data from `profile_bem` keys: `faq_1_q`, `faq_1_a`, `faq_2_q`, `faq_2_a`, `faq_3_q`, `faq_3_a`, `faq_4_q`, `faq_4_a`. Card style: `p-8 bg-surface-container rounded-xl hover:bg-surface-container-high transition-colors`

---

### PAGE 5: Tentang (tentang.blade.php) — extends layouts.app
Replicate EXACT structure from `tentang.html` (struktur organisasi page):

**Hero header**: `mb-24 flex flex-col md:flex-row md:items-end justify-between gap-8`
- Label: "Eksistensi Digital" uppercase tracking
- H1: "Struktur Organisasi" text-7xl font-extrabold text-primary tracking-tighter
- Gold line `h-1 w-24 bg-secondary`

**Board Executive section** (2-col grid):
- Left col: Ketua BEM + Wakil Ketua — large `aspect-[4/5]` photos with grayscale effect, gradient overlay, name, jabatan, quote. Data from `struktur_organisasi` where jabatan IN ('Ketua BEM', 'Wakil Ketua BEM')
- Right col: Sekretaris + Bendahara as compact cards `bg-surface-container-low p-10 rounded-xl` with circular photo (w-16 h-16 rounded-full). Plus the blue visi quote card `border-l-4 border-secondary bg-primary-container text-white rounded-r-xl`

**Departemen Grid**: `grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8` — data from `departemen` (or use program_kerja grouped by departemen). Each card: `bg-surface-container-lowest p-8 rounded-xl border-b-4 border-transparent hover:border-secondary transition-all`. Has icon div, h3 nama, p deskripsi, "Program Unggulan" list.

**CTA Section**: `bg-primary p-12 md:p-20 rounded-xl text-white` with decorative blur circles, h2, p, button to aspirasi.

---

## PROJECT STRUCTURE

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Frontend/
│   │   │   ├── BerandaController.php
│   │   │   ├── BeritaController.php
│   │   │   ├── AspirasiController.php
│   │   │   └── TentangController.php
│   │   └── Admin/
│   │       ├── DashboardController.php
│   │       ├── BeritaController.php
│   │       ├── AspirasiController.php
│   │       ├── HeroController.php
│   │       ├── ProgramKerjaController.php
│   │       ├── StrukturController.php
│   │       └── ProfileController.php
├── Models/
│   ├── Berita.php
│   ├── Aspirasi.php
│   ├── Hero.php
│   ├── ProgramKerja.php
│   ├── StrukturOrganisasi.php
│   └── ProfileBem.php
├── Http/Requests/
│   ├── StoreAspirasiRequest.php
│   ├── StoreBeritaRequest.php
│   ├── UpdateBeritaRequest.php
│   └── UpdateProfileRequest.php

resources/views/
├── layouts/
│   ├── app.blade.php
│   └── admin.blade.php
├── frontend/
│   ├── beranda.blade.php
│   ├── berita/
│   │   ├── index.blade.php
│   │   └── show.blade.php
│   ├── aspirasi.blade.php
│   └── tentang.blade.php
├── admin/
│   ├── dashboard.blade.php
│   ├── berita/
│   │   ├── index.blade.php
│   │   ├── create.blade.php
│   │   └── edit.blade.php
│   ├── aspirasi/
│   │   ├── index.blade.php
│   │   └── show.blade.php
│   ├── hero/
│   │   └── edit.blade.php
│   ├── program-kerja/
│   │   ├── index.blade.php
│   │   ├── create.blade.php
│   │   └── edit.blade.php
│   ├── struktur/
│   │   ├── index.blade.php
│   │   ├── create.blade.php
│   │   └── edit.blade.php
│   └── profile/
│       └── edit.blade.php
└── auth/
    └── login.blade.php

routes/
└── web.php

database/
├── migrations/
└── seeders/

public/css/
└── astareka-custom.css

config/
└── bem.php
```

---

## DATABASE MIGRATIONS

Generate ALL these migrations:

### 1. users (modify default)
```php
$table->enum('role', ['admin', 'superadmin'])->default('admin')->after('email');
```

### 2. heroes
```php
Schema::create('heroes', function (Blueprint $table) {
    $table->id();
    $table->string('tagline')->default('The Digital Curator');
    $table->string('judul')->default('The Academic Vanguard');
    $table->string('judul_aksen')->nullable()->comment('kata yang diberi warna secondary, e.g. Vanguard');
    $table->text('deskripsi');
    $table->string('gambar')->nullable();
    $table->string('cta_text_1')->default('Learn More');
    $table->string('cta_text_2')->default('See Our Programs');
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

### 3. berita
```php
Schema::create('berita', function (Blueprint $table) {
    $table->id();
    $table->string('judul');
    $table->string('slug')->unique();
    $table->longText('konten');
    $table->text('excerpt')->nullable();
    $table->string('gambar')->nullable();
    $table->string('kategori')->nullable()->comment('News, Event, Announcement, Workshop, Internal, Achievement');
    $table->boolean('is_published')->default(false);
    $table->timestamp('published_at')->nullable();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->timestamps();
});
```

### 4. program_kerja
```php
Schema::create('program_kerja', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->text('deskripsi');
    $table->string('departemen')->nullable();
    $table->string('icon')->default('hub')->comment('Material Symbols icon name');
    $table->string('bg_style')->default('surface')->comment('Options: primary, secondary-container, surface-container-low, surface-container-highest');
    $table->boolean('is_featured')->default(false)->comment('Featured = big bento card');
    $table->integer('urutan')->default(0);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

### 5. struktur_organisasi
```php
Schema::create('struktur_organisasi', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->string('jabatan');
    $table->string('departemen')->nullable();
    $table->string('foto')->nullable();
    $table->text('quote')->nullable();
    $table->integer('urutan')->default(0);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

### 6. aspirasi
```php
Schema::create('aspirasi', function (Blueprint $table) {
    $table->id();
    $table->string('nama')->nullable();
    $table->string('nim')->nullable();
    $table->string('prodi')->nullable();
    $table->string('kategori')->nullable()->comment('Pengaduan, Saran, Kolaborasi');
    $table->text('pesan');
    $table->enum('status', ['baru', 'dibaca', 'diproses', 'selesai'])->default('baru');
    $table->text('catatan_admin')->nullable();
    $table->timestamps();
});
```

### 7. profile_bem
```php
Schema::create('profile_bem', function (Blueprint $table) {
    $table->id();
    $table->string('key')->unique();
    $table->longText('value');
    $table->timestamps();
});
```

---

## MODELS

### Berita.php
```php
class Berita extends Model {
    protected $fillable = ['judul','slug','konten','excerpt','gambar','kategori','is_published','published_at','user_id'];
    protected $casts = ['is_published' => 'boolean', 'published_at' => 'datetime'];

    public function user() { return $this->belongsTo(User::class); }

    // Auto-generate slug
    protected static function boot() {
        parent::boot();
        static::creating(function ($model) {
            $model->slug = Str::slug($model->judul) . '-' . substr(uniqid(), -4);
        });
    }

    // Scope
    public function scopePublished($q) { return $q->where('is_published', true)->whereNotNull('published_at'); }
}
```

### ProfileBem.php
```php
class ProfileBem extends Model {
    protected $table = 'profile_bem';
    protected $fillable = ['key', 'value'];

    // Helper static method
    public static function getValue(string $key, string $default = ''): string {
        return static::where('key', $key)->value('value') ?? $default;
    }
}
```

### StrukturOrganisasi.php
```php
class StrukturOrganisasi extends Model {
    protected $fillable = ['nama','jabatan','departemen','foto','quote','urutan','is_active'];
    protected $casts = ['is_active' => 'boolean'];
    protected $table = 'struktur_organisasi';
}
```

---

## CONTROLLERS

### Frontend/BerandaController.php
```php
public function index() {
    $hero = Hero::where('is_active', true)->first();
    $programKerja = ProgramKerja::where('is_active', true)->orderBy('urutan')->get();
    $beritaTerkini = Berita::published()->latest('published_at')->take(3)->get();
    $nextEvent = Berita::published()->where('kategori', 'Event')->latest('published_at')->first();
    $visi = ProfileBem::getValue('visi');
    $misi = ProfileBem::getValue('misi');

    return view('frontend.beranda', compact('hero','programKerja','beritaTerkini','nextEvent','visi','misi'));
}
```

### Frontend/BeritaController.php
```php
public function index(Request $request) {
    $query = Berita::published()->latest('published_at');

    if ($request->search) {
        $query->where('judul', 'like', '%'.$request->search.'%');
    }
    if ($request->kategori && $request->kategori !== 'All Items') {
        $query->where('kategori', $request->kategori);
    }

    $berita = $query->paginate(9)->withQueryString();
    $featured = Berita::published()->where('kategori', 'Event')->latest('published_at')->first();
    $popular = Berita::published()->latest()->take(3)->get(); // In real app, add views count

    return view('frontend.berita.index', compact('berita','featured','popular'));
}

public function show($slug) {
    $berita = Berita::where('slug', $slug)->published()->firstOrFail();
    return view('frontend.berita.show', compact('berita'));
}
```

### Frontend/AspirasiController.php
```php
public function index() {
    $statusTerkini = Aspirasi::whereIn('status', ['diproses','selesai'])->latest()->take(3)->get();
    $profileBem = ProfileBem::pluck('value', 'key');
    return view('frontend.aspirasi', compact('statusTerkini','profileBem'));
}

public function store(StoreAspirasiRequest $request) {
    Aspirasi::create($request->validated());
    return back()->with('success', 'Aspirasi Anda berhasil terkirim! Tim BEM akan meninjau dalam 3x24 jam.');
}
```

### Frontend/TentangController.php
```php
public function index() {
    $strukturUtama = StrukturOrganisasi::whereIn('jabatan', ['Ketua BEM','Wakil Ketua BEM'])
        ->where('is_active', true)->orderBy('urutan')->get();
    $strukturPendukung = StrukturOrganisasi::whereIn('jabatan', ['Sekretaris','Bendahara'])
        ->where('is_active', true)->orderBy('urutan')->get();
    $departemen = ProgramKerja::where('is_active', true)->orderBy('urutan')->get();
    $profileBem = ProfileBem::pluck('value', 'key');

    return view('frontend.tentang', compact('strukturUtama','strukturPendukung','departemen','profileBem'));
}
```

### Admin/DashboardController.php
```php
public function index() {
    $stats = [
        'total_berita' => Berita::published()->count(),
        'aspirasi_baru' => Aspirasi::where('status', 'baru')->count(),
        'total_struktur' => StrukturOrganisasi::where('is_active', true)->count(),
        'total_program' => ProgramKerja::where('is_active', true)->count(),
    ];
    $aspirasiTerbaru = Aspirasi::latest()->take(5)->get();
    return view('admin.dashboard', compact('stats','aspirasiTerbaru'));
}
```

### Admin/BeritaController.php (full resource)
```php
// index: paginate 10, search, filter
// create/store: upload gambar to storage/public/berita, auto slug
// edit/update: handle new image upload, delete old
// destroy: delete image from storage, delete record
// publish toggle: PATCH route to toggle is_published + set published_at
```

### Admin/AspirasiController.php
```php
// index: paginate 15, filter by status
// show: detail aspirasi
// updateStatus: PATCH, update status + catatan_admin
```

### Admin/ProfileController.php
```php
public function edit() {
    $keys = ['visi','misi','sejarah','tentang_singkat','quote_inspirasi',
             'kontak_email','kontak_wa','alamat','sosmed_instagram','sosmed_linkedin',
             'faq_1_q','faq_1_a','faq_2_q','faq_2_a','faq_3_q','faq_3_a','faq_4_q','faq_4_a'];
    $profile = ProfileBem::whereIn('key', $keys)->pluck('value', 'key');
    return view('admin.profile.edit', compact('profile','keys'));
}

public function update(Request $request) {
    foreach ($request->except('_token','_method') as $key => $value) {
        ProfileBem::updateOrCreate(['key' => $key], ['value' => $value]);
    }
    return back()->with('success', 'Profil BEM berhasil diperbarui.');
}
```

---

## ROUTES (routes/web.php)

```php
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{BerandaController, BeritaController, AspirasiController, TentangController};
use App\Http\Controllers\Admin;

// Frontend
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.index');
Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');

// Admin
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

    // Berita
    Route::resource('berita', Admin\BeritaController::class);
    Route::patch('berita/{berita}/publish', [Admin\BeritaController::class, 'togglePublish'])->name('berita.publish');

    // Aspirasi
    Route::get('aspirasi', [Admin\AspirasiController::class, 'index'])->name('aspirasi.index');
    Route::get('aspirasi/{id}', [Admin\AspirasiController::class, 'show'])->name('aspirasi.show');
    Route::patch('aspirasi/{id}/status', [Admin\AspirasiController::class, 'updateStatus'])->name('aspirasi.updateStatus');

    // Hero
    Route::get('hero', [Admin\HeroController::class, 'edit'])->name('hero.edit');
    Route::put('hero', [Admin\HeroController::class, 'update'])->name('hero.update');

    // Program Kerja
    Route::resource('program-kerja', Admin\ProgramKerjaController::class);

    // Struktur
    Route::resource('struktur', Admin\StrukturController::class);

    // Profile BEM
    Route::get('profile', [Admin\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [Admin\ProfileController::class, 'update'])->name('profile.update');
});

// Auth routes (from Breeze)
require __DIR__.'/auth.php';
```

---

## ADMIN LAYOUT (layouts/admin.blade.php)

Use SAME Tailwind config and fonts as frontend. Design:
- `bg-surface` body
- Left sidebar `w-64` with `bg-primary text-on-primary` dark style
- Logo "ASTAREKA" at top of sidebar in white
- Navigation items with `material-symbols-outlined` icons, active state `bg-primary-container`
- Main content area right side
- Top bar with current page title + user name + logout button
- Flash message component (success/error) with Tailwind alert styling

Sidebar menu items:
- Dashboard → `home`
- Berita → `newspaper`
- Aspirasi → `campaign` + badge count of 'baru' aspirasi
- Hero/Banner → `image`
- Program Kerja → `hub`
- Struktur Organisasi → `groups`
- Profil BEM → `info`

---

## AUTH

- Install Laravel Breeze Blade: generate standard login form
- Override login view to match ASTAREKA design:
  - Full page center layout
  - `bg-surface` background
  - Card: `bg-surface-container-lowest rounded-2xl p-12 shadow-xl max-w-md mx-auto`
  - Title: "ASTAREKA" in `text-primary font-headline font-black text-3xl`
  - Subtitle: "Admin Panel Login"
  - Email input: same style as aspirasi form (`bg-surface-container-low border-b-2 border-transparent focus:border-primary`)
  - Submit button: `w-full py-4 bg-primary text-on-primary rounded-xl font-headline font-bold`
- After login → redirect to `admin.dashboard`
- After logout → redirect to `login`

---

## SEEDERS

### DatabaseSeeder.php
```php
$this->call([
    UserSeeder::class,
    HeroSeeder::class,
    ProfileBemSeeder::class,
    ProgramKerjaSeeder::class,
    StrukturOrganisasiSeeder::class,
    BeritaSeeder::class,
]);
```

### UserSeeder.php
```php
User::create([
    'name' => 'Admin ASTAREKA',
    'email' => 'admin@astareka-ush.ac.id',
    'password' => Hash::make('password123'),
    'role' => 'superadmin',
]);
```

### ProfileBemSeeder.php — seed these keys with meaningful dummy data:
visi, misi, sejarah, tentang_singkat, quote_inspirasi, kontak_email, kontak_wa, alamat, sosmed_instagram, sosmed_linkedin, faq_1_q, faq_1_a, faq_2_q, faq_2_a, faq_3_q, faq_3_a, faq_4_q, faq_4_a

### HeroSeeder.php
```php
Hero::create([
    'tagline' => 'The Digital Curator',
    'judul' => 'The Academic Vanguard of Sugeng Hartono.',
    'judul_aksen' => 'Vanguard',
    'deskripsi' => 'Empowering the student body through visionary leadership, innovative collaboration, and an unwavering commitment to excellence.',
    'is_active' => true,
]);
```

### ProgramKerjaSeeder.php — 4 program kerja, first one `is_featured=true` with bg_style='primary':
1. ASTA Connect (hub icon, featured, bg=primary)
2. Sugeng Hartono Cup (trophy, bg=surface-container-low)
3. Digital Academy (school, bg=secondary-container)
4. Aspirasi Rakyat (chat_bubble, bg=surface-container-highest)

### StrukturOrganisasiSeeder.php — seed: Ketua BEM, Wakil Ketua BEM, Sekretaris, Bendahara + 6 departemen heads

### BeritaSeeder.php — 6 berita (mix of News, Event, Achievement, Workshop), all is_published=true

---

## config/bem.php
```php
return [
    'nama_organisasi' => 'BEM Universitas Sugeng Hartono',
    'kabinet' => 'Kabinet Astareka',
    'tagline' => 'The Digital Curator',
    'tahun' => '2024',
    'logo_text' => 'ASTAREKA',
];
```

---

## AppServiceProvider.php additions
```php
use Illuminate\Pagination\Paginator;

public function boot(): void {
    Paginator::useBootstrapFive();
    // OR: Paginator::defaultView('pagination::tailwind');
}
```

---

## ADDITIONAL REQUIREMENTS

1. All image uploads: `Storage::disk('public')`. Run `php artisan storage:link`.
2. All forms: CSRF `@csrf` token.
3. Flash messages: `session('success')` and `session('error')` displayed in layout with dismissible alert.
4. File `public/css/astareka-custom.css` with:
   ```css
   .glass-effect { backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); }
   .editorial-shadow { box-shadow: 0 20px 40px rgba(11,28,48,0.06); }
   .no-scrollbar::-webkit-scrollbar { display: none; }
   .line-clamp-2 { overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; }
   ```
5. Link this CSS in `layouts/app.blade.php` `<head>`.
6. Admin WYSIWYG for berita konten: use SimpleMDE or Quill via CDN for textarea — render as HTML in frontend using `{!! $berita->konten !!}`.

---

Now generate ALL files in this exact order:
1. config/bem.php
2. All migration files
3. All model files
4. All FormRequest files
5. All controller files (Frontend + Admin)
6. routes/web.php
7. All seeder files
8. resources/views/layouts/app.blade.php (with full Tailwind config inline, navbar, footer)
9. resources/views/layouts/admin.blade.php (sidebar + topbar)
10. resources/views/auth/login.blade.php (redesigned to match ASTAREKA style)
11. resources/views/frontend/beranda.blade.php
12. resources/views/frontend/berita/index.blade.php
13. resources/views/frontend/berita/show.blade.php
14. resources/views/frontend/aspirasi.blade.php
15. resources/views/frontend/tentang.blade.php
16. All admin views (dashboard, berita CRUD, aspirasi, hero, program-kerja, struktur, profile)
17. public/css/astareka-custom.css
18. AppServiceProvider.php update

Make sure all files are production-ready, properly connected, and immediately runnable.
```

---

## 📋 CARA PAKAI PROMPT INI

### Langkah 1 — Setup project
```bash
composer create-project laravel/laravel astareka-bem
cd astareka-bem

# Setup .env
DB_DATABASE=astareka_bem
DB_USERNAME=root
DB_PASSWORD=
```

### Langkah 2 — Install Breeze dulu sebelum generate
```bash
composer require laravel/breeze --dev
php artisan breeze:install blade
```

### Langkah 3 — Paste prompt ke Gemini CLI

Jalankan Gemini CLI dan paste seluruh isi blok prompt di atas.

Jika output terpotong, lanjutkan dengan:
```
Lanjutkan generate file berikutnya sesuai urutan yang sudah ditentukan.
```

### Langkah 4 — Jalankan setelah semua file di-generate
```bash
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```

### Langkah 5 — Login admin
- URL: `http://localhost:8000/login`
- Email: `admin@astareka-ush.ac.id`
- Password: `password123`

---

## ⚠️ TIPS KHUSUS GEMINI CLI

- **Jika Gemini skip beberapa file**: Sebutkan nama file spesifik, contoh: *"Generate file `resources/views/frontend/aspirasi.blade.php` dengan detail yang sudah ditentukan di prompt"*
- **Untuk blade views**: Ingatkan Gemini: *"Gunakan persis Tailwind classes dari design system, jangan ganti dengan Bootstrap atau class lain"*
- **Jika ada error setelah generate**: Tempel pesan error ke Gemini dan minta fix
- **Generate per-batch** jika terlalu panjang:
  - Batch 1: Migrations + Models + Routes
  - Batch 2: Controllers
  - Batch 3: Frontend Views
  - Batch 4: Admin Views + Seeders

---

*Prompt ini dibuat spesifik untuk project ASTAREKA BEM-USH*
*Design System: Tailwind CSS + Material Symbols + Manrope/Inter fonts*
*Stack: Laravel 11 + MySQL + Blade + Laravel Breeze*