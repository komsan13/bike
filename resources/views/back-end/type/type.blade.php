@extends('layouts.user_type.auth')

@section('content')
    @if (session('success'))
        <div class="position-absolute bottom-0 end-0 p-3" style="z-index: 11">
            <div id="liveToast" class="toast hide " role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header alert-success text-white"
                    style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <strong class="me-auto"><i class="fa-solid fa-circle-check"></i> Successfully</strong>
                    {{-- <small>11 mins ago</small> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body alert-success text-white"
                    style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                    {{ session('success') }}
                </div>
            </div>
        </div>
        <script>
            setTimeout(() => {
                $('.toast').hide('show');
            }, 10000);
        </script>
    @elseif (session('error'))
        <div class="position-absolute bottom-0 end-0 p-3" style="z-index: 11">
            <div id="liveToast" class="toast hide " role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header alert-warning text-white"
                    style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <strong class="me-auto"><i class="fas fa-exclamation-triangle"></i> Warning</strong>
                    {{-- <small>11 mins ago</small> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body alert-warning text-white"
                    style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                    {{ session('success') }}
                </div>
            </div>
        </div>
        <script>
            setTimeout(() => {
                $('.toast').hide('show');
            }, 10000);
        </script>
    @endif
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0"><i class="fas fa-align-left"></i> {{ $name_page }}</h5>
                            </div>
                            <a href="#" class="btn bg-gradient-success mb-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#insertdata">+&nbsp; เพิ่มข้อมูล</a>
                        </div>
                    </div>
                    <!-- Modal -->

                    <div class="modal fade" id="insertdata" tabindex="-1" role="dialog" aria-labelledby="insertdataLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content shadow" style="border-radius: 20px;">
                                <div class="modal-header">
                                    <b class="mt-3"><i class="fas fa-solid fa-plus text-success"></i> เพิ่มข้อมูล
                                        {{ $name_page }}</b>
                                </div>
                                <form action="{{ url('type/type-add') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="" class="form-label">ยี่ห้อรถ</label>
                                            <input type="text" class="form-control" id="type" name="type">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">รุ่นรถ</label>
                                            <input type="text" class="form-control" id="model" name="model">
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">ปีรถ</label>
                                                    <input type="text" maxlength="4" class="form-control" id="year"
                                                        name="year">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">สีรถ</label>
                                                    <input type="text" class="form-control" id="color"
                                                        name="color">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">cc รถ</label>
                                                    <input type="text" class="form-control" id="cc"
                                                        name="cc">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-gradient-secondary"
                                            data-bs-dismiss="modal"><i class="fas fa-window-close"></i>
                                            &nbsp;&nbsp;ปิดแท็ป</button>
                                        <button type="submit" class="btn bg-gradient-success"><i
                                                class="fas fa-save"></i>
                                            &nbsp;&nbsp;บันทึกข้อมูล</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- end model -->
                    <!-- Modal -->
                    <div class="modal fade" id="updatedata" tabindex="-1" role="dialog"
                        aria-labelledby="updatedataLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content shadow" style="border-radius: 20px;">
                                <div class="modal-header">
                                    <b class="mt-3"><i class="fas fa-edit text-warning"></i> แก้ไขข้อมูล
                                        {{ $name_page }}</b>
                                </div>
                                <form action="{{ url('type/type-update') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" id="edit_id" name="id">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">ยี่ห้อรถ</label>
                                            <input type="text" class="form-control" id="edit_type" name="type">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">รุ่นรถ</label>
                                            <input type="text" class="form-control" id="edit_model" name="model">
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">ปีรถ</label>
                                                    <input type="text" maxlength="4" class="form-control"
                                                        id="edit_year" name="year">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">สีรถ</label>
                                                    <input type="text" class="form-control" id="edit_color"
                                                        name="color">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">cc รถ</label>
                                                    <input type="text" class="form-control" id="edit_cc"
                                                        name="cc">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-gradient-secondary"
                                            data-bs-dismiss="modal"><i class="fas fa-window-close"></i>
                                            &nbsp;&nbsp;ปิดแท็ป</button>
                                        <button type="submit" class="btn bg-gradient-success"><i
                                                class="fas fa-save"></i>
                                            &nbsp;&nbsp;อัพเดท
                                            ข้อมูล</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end model -->
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <table id="myTable" class="table align-items-center mb-0">
                                <thead class="alert-dark">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            #
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            ยี่ห้อรถ
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            รุ่นรถ
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            ปีรถ
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            สีรถ
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            cc รถ
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            วันที่สร้าง
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            จัดการข้อมูล
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($types as $row)
                                        <tr>
                                            <td>
                                                <span class="text-secondary text-xs font-weight-normal">1</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-normal">{{ $row->type }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-normal">{{ $row->model }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-normal">{{ $row->year }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-normal">{{ $row->color }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-normal">{{ $row->cc }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-normal">{{ $row->created_at }}</span>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="btn bg-gradient-warning" style="padding: 15px;"
                                                    onclick="get_data('{{ $row->id }}')" data-bs-toggle="modal"
                                                    data-bs-target="#updatedata">
                                                    <i class="fa-lg fas fa-edit text-white" style="font-size: 10px;"></i>
                                                </a>
                                                <a href="{{ url('type/type-delete/' . $row->id) }}"
                                                    style="padding: 15px;"
                                                    onclick="return confirm('ต้องการลบข้อมูลหรือไม่ !')"
                                                    class="btn bg-gradient-danger" data-bs-toggle="tooltip"
                                                    data-bs-original-title="ลบข้อมูล">
                                                    <i class="fa-lg cursor-pointer fas fa-trash text-white"
                                                        style="font-size: 10px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    function get_data(id) {
        $.ajax({
            type: 'post',
            url: 'type/type-edit/' + id,
            data: {
                "_token": "{{ csrf_token() }}",
                'id': id,
            },
            success: function(res) {
                document.getElementById("edit_id").value = res[0].id;
                document.getElementById("edit_type").value = res[0].type;
                document.getElementById("edit_model").value = res[0].model;
                document.getElementById("edit_year").value = res[0].year;
                document.getElementById("edit_color").value = res[0].color;
                document.getElementById("edit_cc").value = res[0].cc;
            }
        });
    }

    $(document).ready(function() {
        $('.toast').toast('show');
    });
</script>
