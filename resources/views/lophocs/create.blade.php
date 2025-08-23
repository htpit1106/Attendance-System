<x-app-layout>
    <x-slot name="header">
<div class="container">
    <h2>Tạo lớp học mới</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('lophocs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="ten_lop" class="form-label">Tên lớp</label>
            <input type="text" name="ten_lop" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="mota" class="form-label">Mô tả</label>
            <textarea name="mota" class="form-control"></textarea>
        </div>

    

        <button type="submit" class="btn btn-primary">Tạo lớp học</button>
    </form>
</div>
    </x-slot>
</x-app-layout>