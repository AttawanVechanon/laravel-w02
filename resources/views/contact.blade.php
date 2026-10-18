@extends('layouts.app')

@section('title', 'ติดต่อ')

@push('styles')
<style>
    .contact-wrap { display: grid; grid-template-columns: 1fr 300px; gap: 24px; }
    label { display: block; font-weight: 600; margin: 14px 0 4px; }
    input, textarea { width: 100%; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px;
        font-family: inherit; font-size: 16px; }
    input:focus, textarea:focus { outline: 2px solid #93c5fd; border-color: #2563eb; }
    .field-error { color: #dc2626; font-size: 14px; margin-top: 3px; }
    .info p { margin-bottom: 12px; }
    @media (max-width: 720px) { .contact-wrap { grid-template-columns: 1fr; } }
</style>
@endpush

@section('content')
    <h1>ติดต่อฉัน</h1>
    <p>ส่งข้อความถึงฉันผ่านแบบฟอร์มด้านล่าง หรือใช้ช่องทางติดต่อด้านข้าง</p>

    {{-- ข้อความแจ้งผลหลังส่งฟอร์ม --}}
    @if (session('success'))
        <div class="alert success" style="margin-top:16px">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert error" style="margin-top:16px">
            กรุณาแก้ไขข้อมูลให้ถูกต้อง ({{ $errors->count() }} รายการ)
        </div>
    @endif

    <div class="contact-wrap" style="margin-top:16px">
        <form class="card" action="{{ route('contact.send') }}" method="POST">
            @csrf

            <label for="name">ชื่อ</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="ชื่อของคุณ">
            @error('name') <div class="field-error">{{ $message }}</div> @enderror

            <label for="email">อีเมล</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com">
            @error('email') <div class="field-error">{{ $message }}</div> @enderror

            <label for="message">ข้อความ</label>
            <textarea id="message" name="message" rows="5" placeholder="พิมพ์ข้อความที่นี่">{{ old('message') }}</textarea>
            @error('message') <div class="field-error">{{ $message }}</div> @enderror

            <div style="margin-top:18px">
                <button type="submit" class="btn">ส่งข้อความ</button>
            </div>
        </form>

        <aside class="card info">
            <h3>ช่องทางติดต่อ</h3>
            @foreach ($channels as $label => $value)
                <p><strong>{{ $label }}</strong><br>{{ $value }}</p>
            @endforeach
        </aside>
    </div>
@endsection