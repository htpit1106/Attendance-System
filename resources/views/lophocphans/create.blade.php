<x-app-layout>
    <x-slot name="header">
        <div class="container mt-4">
            <div class="card shadow rounded-3">
                <div class="card-body" style="background-color: #d4f8f8;">
                    <h4 class="text-center fw-bold mb-4">Tạo lớp học phần</h4>

                    <form action="{{ route('lophocphans.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Cột trái -->
                            <div class="col-md-6">
                                <!-- Mã lớp học phần -->
                                <div class="mb-3">
                                    <label class="form-label">Mã lớp học phần</label>
                                    <input type="text" name="malophp" class="form-control" placeholder="Nhập mã lớp học phần">
                                </div>

                                <!-- Môn học -->
                                <div class="mb-3">
                                    <label class="form-label">Môn học</label>
                                    <select id= "monhoc" name="monhoc_id" class="form-select">
                                        <option selected disabled>Chọn môn học</option>
                                        @foreach($monhocs as $mh)
                                            <option value="{{ $mh->id }}">{{ $mh->tenmon }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Giảng viên -->
                                <div class="mb-3">
                                    <label class="form-label">Giảng viên phụ trách</label>
                
                                    <select id="giangvien" name="giangvien_id" class="form-select">
                                        <option selected disabled>Chọn giảng viên</option>

                                    </select>
                                </div>
                            </div>

                            <!-- Cột phải -->
                            <div class="col-md-6">
                                <!-- Tên lớp học phần -->
                                <div class="mb-3">
                                    <label class="form-label">Tên lớp học phần</label>
                                    <input type="text" name="tenlophp" class="form-control" placeholder="Nhập tên lớp học phần">
                                </div>
                                
                                                            <!-- Ngày bắt đầu -->
                            <div class="mb-3">
                                <label class="form-label">Ngày bắt đầu</label>
                                <input type="date" id="ngaybatdau" name="ngaybatdau" class="form-control" required>
                            </div>

                            <!-- Ngày kết thúc -->
                            <div class="mb-3">
                                <label class="form-label">Ngày kết thúc</label>
                                <input type="date" id="ngayketthuc" name="ngayketthuc" class="form-control" required>
                                <div id="error-ngay" class="text-danger mt-1" style="display:none;">
                                    Ngày kết thúc phải lớn hơn ngày bắt đầu
                                </div>
                            </div>

                            <script>
                                const ngayBatDau = document.getElementById('ngaybatdau');
                                const ngayKetThuc = document.getElementById('ngayketthuc');
                                const errorNgay = document.getElementById('error-ngay');

                                // Khi thay đổi ngày bắt đầu -> set min cho ngày kết thúc
                                ngayBatDau.addEventListener('change', function() {
                                    ngayKetThuc.min = this.value;
                                });

                                // Khi thay đổi ngày kết thúc -> kiểm tra hợp lệ
                                ngayKetThuc.addEventListener('change', function() {
                                    if (this.value <= ngayBatDau.value) {
                                        errorNgay.style.display = 'block';
                                        this.value = ""; // reset nếu chọn sai
                                    } else {
                                        errorNgay.style.display = 'none';
                                    }
                                });
                            </script>


                                <!-- Mô tả -->
                                <div class="mb-3">
                                    <label class="form-label">Mô tả</label>
                                    <textarea name="mota" class="form-control" rows="3" placeholder="Nhập mô tả lớp học phần"></textarea>
                                </div>
                                

                                <!-- Số tín chỉ -->
                                <div class="mb-3">
                                    <label class="form-label">Số tín chỉ</label>
                                    <input type="number" name="sotinchi" class="form-control" value="3" min="1">
                                </div>
                            </div>
                        </div>

                        <!-- Nút -->
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-success">Tạo lớp học</button>
                            <a href="{{ route('adminhomes.monhoc_lophp') }}" class="btn btn-secondary">Hủy</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

<script>
    document.getElementById('monhoc').addEventListener('change', function() {
        let monhocId = this.value;
        let giangvienSelect = document.getElementById('giangvien');

        // reset dropdown giảng viên
        giangvienSelect.innerHTML = '<option selected disabled>Đang tải...</option>';

        fetch(`/giangviens-by-monhoc/${monhocId}`)
            .then(response => response.json())
            .then(data => {
                giangvienSelect.innerHTML = '<option selected disabled>Chọn giảng viên</option>';
                data.forEach(gv => {
                    giangvienSelect.innerHTML += `<option value="${gv.id}">${gv.name}</option>`;
                });
            })
            .catch(error => {
                console.error(error);
                giangvienSelect.innerHTML = '<option selected disabled>Lỗi tải dữ liệu</option>';
            });
    });
</script>
