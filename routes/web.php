<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'skills' => ['PHP', 'Laravel', 'Blade', 'Flutter', 'Dart', 'Firebase', 'SQLite', 'MySQL', 'Git'],
        'projects' => [
            ['name' => 'Tasks List App', 'desc' => 'แอปจดรายการงานด้วย Flutter และ SQLite',
             'tags' => ['Flutter', 'SQLite']],
            ['name' => 'Product API Viewer', 'desc' => 'แอปดึงข้อมูลสินค้าจาก DummyJSON API',
             'tags' => ['Flutter', 'REST API']],
            ['name' => 'Firebase Test', 'desc' => 'แอปทดสอบการเชื่อมต่อ Firebase และ Analytics',
             'tags' => ['Firebase', 'Analytics']],
        ],
    ]);
})->name('home');

Route::get('/about', function () {
    return view('about', [
        'timeline' => [
            ['year' => '2024', 'title' => 'เริ่มเรียนด้านการพัฒนาซอฟต์แวร์', 'detail' => 'เรียนพื้นฐานการเขียนโปรแกรมและฐานข้อมูล'],
            ['year' => '2025', 'title' => 'ทำโปรเจกต์เว็บและมือถือ', 'detail' => 'เริ่มใช้ Flutter, Firebase และ Laravel'],
            ['year' => '2026', 'title' => 'พัฒนาแอปเชื่อมต่อ API และคลาวด์', 'detail' => 'ทำโปรเจกต์ที่ใช้ API, SQLite และ Firebase Analytics'],
        ],
        'levels' => ['PHP / Laravel' => 70, 'Flutter / Dart' => 75, 'Firebase' => 60, 'SQL' => 65],
    ]);
})->name('about');

Route::get('/contact', function () {
    return view('contact', [
        'channels' => [
            'อีเมล' => 'you@example.com',
            'โทรศัพท์' => '08x-xxx-xxxx',
            'GitHub' => 'github.com/your-username',
        ],
    ]);
})->name('contact');

Route::post('/contact', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email',
        'message' => 'required|string|min:10',
    ], [
        'name.required' => 'กรุณากรอกชื่อ',
        'email.required' => 'กรุณากรอกอีเมล',
        'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
        'message.required' => 'กรุณากรอกข้อความ',
        'message.min' => 'ข้อความต้องมีอย่างน้อย 10 ตัวอักษร',
    ]);

    return redirect()->route('contact')->with('success', 'ส่งข้อความเรียบร้อยแล้ว ขอบคุณครับ');
})->name('contact.send');