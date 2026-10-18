@extends('layouts.app')

@section('title', 'หน้าแรก')

@push('styles')
<style>
    .hero { text-align: center; padding: 50px 0 30px; }
    .hero .avatar { width: 120px; height: 120px; border-radius: 50%; background: #2563eb; color: #fff;
        display: flex; align-items: center; justify-content: center; font-size: 48px; margin: 0 auto 20px; }
    .hero p { color: #4b5563; max-width: 600px; margin: 0 auto 22px; }
    .hero .actions { display: flex; gap: 12px; justify-content: center; }
    .project h3 { margin-bottom: 6px; }
    .project p { color: #4b5563; margin-bottom: 10px; }
</style>
@endpush

@section('content')
    {{-- ส่วน Hero --}}
    <section class="hero">
        <div class="avatar">Y</div>
        <h1>สวัสดีครับ ผมชื่อ Your Name</h1>
        <p>นักศึกษาด้านพัฒนาซอฟต์แวร์ สนใจการสร้างเว็บแอปพลิเคชันด้วย Laravel
           และแอปมือถือด้วย Flutter</p>
        <div class="actions">
            <a href="{{ route('about') }}" class="btn">เกี่ยวกับฉัน</a>
            <a href="{{ route('contact') }}" class="btn outline">ติดต่อฉัน</a>
        </div>
    </section>

    {{-- ทักษะ --}}
    <h2>ทักษะของฉัน</h2>
    <div>
        @foreach ($skills as $skill)
            <span class="tag">{{ $skill }}</span>
        @endforeach
    </div>

    {{-- ผลงาน --}}
    <h2>ผลงานล่าสุด</h2>
    <div class="grid">
        @forelse ($projects as $project)
            <div class="card project">
                <h3>{{ $project['name'] }}</h3>
                <p>{{ $project['desc'] }}</p>
                @foreach ($project['tags'] as $tag)
                    <span class="tag">{{ $tag }}</span>
                @endforeach
            </div>
        @empty
            <p>ยังไม่มีผลงาน</p>
        @endforelse
    </div>

    {{-- สถิติ --}}
    <h2>ตัวเลขน่ารู้</h2>
    <div class="grid">
        <div class="card"><h3>{{ count($projects) }}</h3><p>โปรเจกต์ที่แสดง</p></div>
        <div class="card"><h3>{{ count($skills) }}</h3><p>ทักษะที่มี</p></div>
        <div class="card"><h3>{{ date('Y') }}</h3><p>ปีที่กำลังเรียน</p></div>
    </div>
@endsection