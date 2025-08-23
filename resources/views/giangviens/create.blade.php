<x-app-layout>
<x-slot name="header">

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm" style="background-color: #ccf5f5; border-radius:10px;">
                <div class="card-body">
                    <h4 class="text-center mb-4 fw-bold">Thêm tài khoản giảng viên</h4>
                    
                    <form action="{{ route('giangviens.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Mã giảng viên</label>
                                <input type="text" name="masv" class="form-control" placeholder="Mã GV" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Khoa</label>
                                <input type="text" name="khoa" class="form-control" placeholder="Khoa" required>
                            </div>
                        </div>
                        {{-- id mon hoc --}}
                        <div class="mb-3">
                            <label class="form-label">Môn học phụ trách</label>
                            <select name="monhoc_id" class="form-select" required>
                                <option value="" disabled selected>Chọn môn học</option>
                                @foreach($monhocs as $monhoc)
                                    <option value="{{ $monhoc->id }}">{{ $monhoc->tenmon }}</option>
                                @endforeach
                            </select>
                        </div>


                            
                
                        
                        <div class="mb-3">
                            <label class="form-label">Họ và tên</label>
                            <input type="text" name="name" class="form-control" placeholder="Họ tên" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="tài khoản" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" placeholder="mật khẩu" required>
                        </div>

                        <div class="mb-3">
                             <label class="form-label">Xác nhận mật khẩu</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu" required>
                         </div>


                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success me-2">Tạo tài khoản</button>
                            <a href="{{ route('adminhomes.taikhoangv') }}" class="btn btn-outline-secondary">Huỷ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </x-slot>
</x-app-layout>
