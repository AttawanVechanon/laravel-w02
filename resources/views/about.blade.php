@extends('layouts.app')

@section('title', 'เกี่ยวกับฉัน')

@push('styles')
<style>
    .about-top { display: grid; grid-template-columns: 220px 1fr; gap: 28px; align-items: start; }
    .photo { width: 220px; height: 220px; border-radius: 16px; background: #dbeafe; color: #1e40af;
        display: flex; align-items: center; justify-content: center; font-size: 70px; }
    .timeline { border-left: 3px solid #2563eb; padding-left: 20px; }
    .timeline .item { margin-bottom: 20px; position: relative; }
    .timeline .item::before { content: ''; position: absolute; left: -29px; top: 8px;
        width: 14px; height: 14px; background: #2563eb; border-radius: 50%; }
    .timeline .year { color: #2563eb; font-weight: 700; }
    .bar { background: #e5e7eb; border-radius: 99px; height: 10px; margin: 4px 0 14px; overflow: hidden; }
    .bar span { display: block; height: 100%; background: #2563eb; }
    @media (max-width: 640px) { .about-top { grid-template-columns: 1fr; } }
</style>
@endpush

@section('content')
    <h1>เกี่ยวกับฉัน</h1>

    <div class="about-top">
        <div class="photo">👨‍💻</div>
        <div class="card">
            <h3>Your Name</h3>
            <p>ปัจจุบันศึกษาอยู่ในสาขาที่เกี่ยวกับการพัฒนาซอฟต์แวร์
               ชอบเรียนรู้เทคโนโลยีใหม่ ๆ และลงมือทำโปรเจกต์จริง
               ตั้งแต่เว็บไซต์ด้วย Laravel ไปจนถึงแอปมือถือด้วย Flutter และ Firebase</p>
            <p style="margin-top:10px">สิ่งที่สนใจ: การออกแบบ UI, ฐานข้อมูล, API และการทำงานเป็นทีม</p>
        </div>
    </div>

    <h2>เส้นทางการเรียนรู้</h2>
    <div class="timeline">
        @foreach ($timeline as $item)
            <div class="item">
                <div class="year">{{ $item['year'] }}</div>
                <strong>{{ $item['title'] }}</strong>
                <p>{{ $item['detail'] }}</p>
            </div>
        @endforeach
    </div>

    <h2>ระดับความชำนาญ</h2>
    <div class="card">
        @foreach ($levels as $name => $percent)
            <div>
                <div style="display:flex; justify-content:space-between">
                    <span>{{ $name }}</span><span>{{ $percent }}%</span>
                </div>
                <div class="bar"><span style="width: {{ $percent }}%"></span></div>
            </div>
        @endforeach
    </div>

    <p style="margin-top:24px">
        สนใจร่วมงานหรือมีคำถาม? <a href="{{ route('contact') }}" style="color:#2563eb">ติดต่อฉันได้ที่นี่</a>
    </p>
@endsection