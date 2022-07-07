@extends('layouts.user_type.auth')

@section('content')
    @if (session('success'))
        <div class="position-absolute bottom-0 end-0 p-3" style="z-index: 11">
            <div id="liveToast" class="toast hide " role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header alert-success text-white"
                    style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <strong class="me-auto"><i class="fa-solid fa-circle-plus fa-fade"></i> Successfully</strong>
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
                    <strong class="me-auto"><i class="fas fa-exclamation-triangle fa-fade"></i> Warning</strong>
                    {{-- <small>11 mins ago</small> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body alert-warning text-white"
                    style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                    {{ session('error') }}
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
                        <div class="d-flex text-justify flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0"><i class="fas fa-align-left"></i> {{ $name_page }}</h5>
                            </div>
                            <div style="float: right">
                                @foreach ($status as $role_status)
                                    @if ($role_status->status == 'on')
                                        @foreach ($menu_add as $menu_adds)
                                            @if ($menu_adds->menu_add != '' && $menu_adds->menu_add == 'on')
                                                <a href="#" class="btn btn-sm bg-gradient-warning mb-0" type="button"><i
                                                        class="fa-solid fa-file-export" style="font-size: 11px;"></i>&nbsp; export</a>

                                                <a href="#" class="btn btn-sm bg-gradient-success mb-0" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#insertdata"><i
                                                        class="fa-solid fa-circle-plus fa-fade" style="font-size: 11px;"></i>&nbsp; เพิ่มข้อมูล</a>
                                            @elseif ($menu_adds->menu_add != '' && $menu_adds->menu_add == 'off')
                                                {{-- off --}}
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
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
                                <form action="{{ url('users/users-add') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">ระดับผู้ใช้</label>
                                                    <select class="form-select form-select-sm" aria-label="Default select example"
                                                        name="lavel">
                                                        @foreach ($role as $row)
                                                            <option value="{{ $row->role_name }}">{{ $row->role_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">สถานะ</label>
                                                    <select class="form-select form-select-sm" aria-label="Default select example"
                                                        name="status">
                                                        <option value="on">เปิดการใช้งาน</option>
                                                        <option value="off">ปิดการใช้งาน</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">ชื่อ</label>
                                            <input type="text" class="form-control form-control-sm" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">ชื่อผู้ใช้</label>
                                            <input type="email" class="form-control form-control-sm" name="email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">รหัสผ่าน</label>
                                            <input type="password" class="form-control form-control-sm" name="password">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm bg-gradient-secondary"
                                            data-bs-dismiss="modal"><i class="fas fa-window-close fa-fade" style="font-size: 11px;"></i>
                                            &nbsp;&nbsp;ปิดแท็ป</button>
                                        <button type="submit" class="btn btn-sm bg-gradient-success"><i
                                                class="fas fa-save fa-fade" style="font-size: 11px;"></i>
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
                                    <b class="mt-3"><i class="fas fa-edit fa-fade text-warning"></i> แก้ไขข้อมูล
                                        {{ $name_page }}</b>
                                </div>
                                <form action="{{ url('users/users-update') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <input type="hidden" id="edit_id" name="id">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">ระดับผู้ใช้</label>
                                                    <select class="form-select form-select-sm" aria-label="Default select example"
                                                        name="lavel">
                                                        <option id="edit_lavel"></option>
                                                        <option>----</option>
                                                        @foreach ($role as $row)
                                                            <option value="{{ $row->role_name }}">
                                                                {{ $row->role_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">สถานะ</label>
                                                    <select class="form-select form-select-sm" aria-label="Default select example"
                                                        name="status">
                                                        <option id="edit_status"></option>
                                                        <option>----</option>
                                                        <option value="on">on</option>
                                                        <option value="off">off</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">ชื่อ</label>
                                            <input type="text" class="form-control form-control-sm" id="edit_name" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">ชื่อผู้ใช้</label>
                                            <input type="text" class="form-control form-control-sm" id="edit_email" name="email">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <p>
                                                <a class="" data-bs-toggle="collapse" href="#collapseExample"
                                                    role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    <small><i class="fa fa-key" aria-hidden="true"></i>
                                                        แก้ไขรหัสผ่าน</small>
                                                </a>
                                            </p>
                                            <div class="collapse" id="collapseExample">
                                                <label for="" class="form-label">รหัสผ่าน</label>
                                                <input type="password" class="form-control form-control-sm" name="edit_pass">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm bg-gradient-secondary"
                                            data-bs-dismiss="modal"><i class="fas fa-window-close fa-fade" style="font-size: 11px;"></i>
                                            &nbsp;&nbsp;ปิดแท็ป</button>
                                        <button type="submit" class="btn btn-sm bg-gradient-success"><i
                                                class="fas fa-save fa-fade" style="font-size: 11px;"></i>
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
                                            ชื่อ
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            ชื่อผู้ใช้
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            บทบาทหน้า
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            วันที่สร้าง
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            สถานะ
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            จัดการ
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($users as $row)
                                        <tr>
                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-normal">{{ $i++ }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-normal">{{ $row->name }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-normal">{{ $row->email }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-normal">{{ $row->lavel }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-normal">{{ $row->created_at }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-secondary text-xs font-weight-normal">
                                                    @if ($row->status == 'on')
                                                        <small
                                                            class="badge rounded-pill bg-success">{{ $row->status }}</small>
                                                    @else
                                                        <small
                                                            class="badge rounded-pill bg-danger">{{ $row->status }}</small>
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                @foreach ($status as $role_status)
                                                    @if ($role_status->status == 'on')
                                                        @foreach ($menu_edit as $menu_edits)
                                                            @if ($menu_edits->menu_edit != '' && $menu_edits->menu_edit == 'on')
                                                                <a href="#"
                                                                    onclick="get_data('{{ $row->id }}')"
                                                                    class="btn bg-gradient-warning" data-bs-toggle="modal"
                                                                    style="padding: 15px;" data-bs-target="#updatedata">
                                                                    <i class="fa-lg fas fa-edit fa-fade text-white"
                                                                        style="font-size: 10px;"></i>
                                                                </a>
                                                            @elseif ($menu_edits->menu_edit != '' && $menu_edits->menu_edit == 'off')
                                                                {{-- off --}}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach

                                                @foreach ($status as $role_status)
                                                    @if ($role_status->status == 'on')
                                                        @foreach ($menu_delete as $menu_deletes)
                                                            @if ($menu_deletes->menu_delete != '' && $menu_deletes->menu_delete == 'on')
                                                                <a href="{{ url('users/users-delete/' . $row->id) }}"
                                                                    onclick="return confirm('ต้องการลบข้อมูลหรือไม่ !')"
                                                                    class="btn bg-gradient-danger"
                                                                    data-bs-toggle="tooltip" style="padding: 15px;"
                                                                    data-bs-original-title="ลบข้อมูล">
                                                                    <i class="fa-lg cursor-pointer fas fa-trash fa-fade text-white"
                                                                        style="font-size: 10px;"></i>
                                                                </a>
                                                            @elseif ($menu_deletes->menu_delete != '' && $menu_deletes->menu_delete == 'off')
                                                                {{-- off --}}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
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

    $(document).ready(function() {
        $('.toast').toast('show');
    });

    function get_data(id) {
        $.ajax({
            type: 'post',
            url: 'users/users-edit/' + id,
            data: {
                "_token": "{{ csrf_token() }}",
                'id': id,
            },
            success: function(res) {
                document.getElementById("edit_id").value = res[0].id;
                document.getElementById("edit_lavel").innerHTML = '<option value="' + res[0].lavel + '">' +
                    res[0].lavel + '</option>';
                document.getElementById("edit_status").innerHTML = '<option value="' + res[0].status +
                    '">' + res[0].status + '</option>';
                document.getElementById("edit_name").value = res[0].name;
                document.getElementById("edit_email").value = res[0].email;
            }
        });
    }
</script>
