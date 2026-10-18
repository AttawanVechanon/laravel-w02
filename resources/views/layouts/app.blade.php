<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Portfolio') | Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Sarabun', sans-serif; line-height: 1.7; color: #1f2937; background: #f9fafb; }
        a { text-decoration: none; color: inherit; }
        .container { max-width: 1000px; margin: 0 auto; padding: 0 20px; }

        /* Navbar */
        .navbar { background: #111827; position: sticky; top: 0; z-index: 10; }
        .navbar .container { display: flex; justify-content: space-between; align-items: center; height: 60px; }
        .brand { color: #fff; font-weight: 700; font-size: 20px; }
        .menu { display: flex; gap: 8px; }
        .menu a { color: #d1d5db; padding: 8px 14px; border-radius: 6px; }
        .menu a:hover { background: #1f2937; color: #fff; }
        .menu a.active { background: #2563eb; color: #fff; }

        /* Shared components */
        main { min-height: calc(100vh - 60px - 90px); padding: 40px 0; }
        .btn { display: inline-block; background: #2563eb; color: #fff; padding: 10px 22px; border: 0; border-radius: 8px; font-family: inherit; font-size: 16px; cursor: pointer; }
        .btn:hover { background: #1d4ed8; }
        .btn.outline { background: transparent; border: 2px solid #2563eb; color: #2563eb; }
        .card { background: #fff; border-radius: 12px; padding: 22px; box-shadow: 0 1px 4px rgba(0,0,0,.08); }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px; }
        h1 { font-size: 36px; margin-bottom: 10px; }
        h2 { font-size: 26px; margin: 30px 0 14px; }
        .tag { display: inline-block; background: #dbeafe; color: #1e40af; padding: 2px 12px; border-radius: 99px; font-size: 14px; margin: 0 6px 6px 0; }
        .alert { padding: 12px 16px; border-radius: 8px; margin-bottom: 18px; }
        .alert.success { background: #dcfce7; color: #166534; }
        .alert.error { background: #fee2e2; color: #991b1b; }

        /* Footer */
        footer { background: #111827; color: #9ca3af; text-align: center; padding: 30px 0; }
    </style>
    @stack('styles')
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('home') }}" class="brand">&lt;MyPortfolio /&gt;</a>
            <div class="menu">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">หน้าแรก</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">เกี่ยวกับฉัน</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">ติดต่อ</a>
            </div>
        </div>
    </nav>

    {{-- เนื้อหาของแต่ละหน้าจะมาแทนที่ตรงนี้ --}}
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} My Portfolio. สร้างด้วย Laravel Blade Template</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>