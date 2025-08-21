@extends('layouts.app')

@section('content')
<div class="container-fluid vh-100">
  <div class="row h-100 g-0">  <!-- g-0 bỏ margin giữa các col -->
    
    <!-- Sidebar -->
    <aside class="col-12 col-md-3 col-lg-2 bg-info text-dark d-flex flex-column" style="min-width: 260px; padding: 20px 15px;">
      <h5 class="fw-bold mb-3">Ai-Học Lớp 2025</h5>
      
      <nav class="nav flex-column gap-2">
        <button class="btn btn-light text-start shadow-sm py-2 px-3">
          <a href="{{route('giangvienHomes.dashboard')}}">📊 Dashboard lớp học</a>
        </button>
        <button class="btn btn-light text-start shadow-sm py-2 px-3">
          <a href="{{route('giangvienHomes.danhsachsv')}}">👥 Danh sách sinh viên</a>
        </button>
        <button class="btn btn-light text-start shadow-sm py-2 px-3">
          <a href="{{route('giangvienHomes.xuatbaocao')}}">📑 Xuất báo cáo chuyên cần</a>
        </button>
      </nav>
    </aside>

    <!-- Nội dung chính -->
    <main class="col d-flex align-items-center justify-content-center p-3">
      <div class="bg-white rounded shadow p-4 text-center">
        <img src="{{ asset('storage/images/img1.jpg') }}" 
             alt="Mascot" class="img-fluid mb-3" style="max-width: 500px;">
        <p class="fs-5 fw-semibold text-secondary m-0">
        </p>
      </div>
    </main>

  </div>
</div>
@endsection
