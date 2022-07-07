@extends('layouts.user_type.auth')

@section('content')
    @if (session('success'))
        <div class="position-absolute bottom-0 end-0 p-3" style="z-index: 11">
            <div id="liveToast" class="toast hide " role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header alert-success text-white"
                    style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <strong class="me-auto"><i class="fa-solid fa-circle-plus fa-fade"></i> Successfully</strong>
                    {{-- <small>11 mins ago</small> --}}
                    <button type="button" class="btn-sm btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
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
                    <button type="button" class="btn-sm btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
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
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0"><i class="fas fa-align-left"></i> {{ $name_page }}</h5>
                            </div>

                            <div style="float: right">
                                @foreach ($status as $role_status)
                                    @if ($role_status->status == 'on')
                                        @foreach ($menu_add as $menu_adds)
                                            @if ($menu_adds->menu_add != '' && $menu_adds->menu_add == 'on')
                                                <a href="#" class="btn btn-sm bg-gradient-warning mb-0"
                                                    type="button"><i class="fa-solid fa-file-export"
                                                        style="font-size: 11px;"></i>&nbsp; export</a>

                                                <a href="#" class="btn btn-sm bg-gradient-success mb-0" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#insertdata"><i
                                                        class="fa-solid fa-circle-plus fa-fade"
                                                        style="font-size: 11px;"></i>&nbsp; เพิ่มข้อมูล</a>
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
                                    <b class="mt-3"><i class="fas fa-solid fa-fade fa-plus text-success"></i> เพิ่มข้อมูล
                                        {{ $name_page }}</b>
                                </div>
                                <form action="{{ url('role/role-add') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="" class="form-label">ชื่อหน้าที่</label>
                                            <input type="text" class="form-control form-control-sm" name="role_name"
                                                placeholder="ชื่อหน้าที่">
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="status1"
                                                value="on">
                                            <label class="form-check-label" for="status1">
                                                สถานะการใช้งาน <b class="text-xs text-success">(เปิดการใช้งาน)</b>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="status2"
                                                value="off">
                                            <label class="form-check-label" for="status2">
                                                สถานะการใช้งาน <b class="text-xs text-danger">(ปิดการใช้งาน)</b>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn-sm btn bg-gradient-secondary"
                                            data-bs-dismiss="modal"><i class="fas fa-window-close fa-fade"
                                                style="font-size: 11px;"></i> &nbsp;&nbsp;ปิดแท็ป</button>
                                        <button type="submit" class="btn-sm btn bg-gradient-success"><i
                                                class="fas fa-save fa-fade" style="font-size: 11px;"></i>
                                            &nbsp;&nbsp;บันทึกข้อมูล</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="insertmenudata" tabindex="-1" role="dialog"
                        aria-labelledby="insertmenudataLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content shadow" style="border-radius: 20px;">
                                <div class="modal-header">
                                    <b class="mt-3"><i class="fas fa-solid fa-plus fa-fade text-success"></i>
                                        เพิ่มข้อมูลการใช้งานเมนู
                                </div>
                                <form action="{{ url('role/menu-add') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">ชื่อหน้าที่</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="menuRole_name" name="role_name" readonly
                                                        placeholder="ชื่อหน้าที่">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">ชื่อเมนู</label>
                                                <select class="form-select form-select-sm" name="menu_name"
                                                    aria-label="Default select example">
                                                    <option selected>--</option>
                                                    <option value="type">ประเภทรถ</option>
                                                    <option value="storage">สต๊อกสินค้า</option>
                                                    <option value="reserve">ใบจอง/ใบมัดจำ</option>
                                                    <option value="member">ข้อมูลสมาชิก</option>
                                                    <option value="role">บทบาทหน้าที่</option>
                                                    <option value="user">รายการผู้ดูแล</option>
                                                </select>
                                            </div>
                                        </div>
                                        <label for="" class="form-label mt-3">การเข้าถึงสิทธิ์เพิ่มข้อมูล</label>
                                        <div class="form-check">
                                            <input class="form-check-input" value="on" type="radio"
                                                name="menu_add">
                                            <label class="form-check-label" for="">
                                                อนุญาติให้เพิ่มข้อมูล
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="off" type="radio"
                                                name="menu_add">
                                            <label class="form-check-label">
                                                ไม่อนุญาติให้เพิ่มข้อมูล
                                            </label>
                                        </div>
                                        <label for="" class="form-label mt-3">การเข้าถึงสิทธิ์ลบข้อมูล</label>
                                        <div class="form-check">
                                            <input class="form-check-input" value="on" type="radio"
                                                name="menu_delete">
                                            <label class="form-check-label" for="">
                                                อนุญาติให้ลบข้อมูล
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="off" type="radio"
                                                name="menu_delete">
                                            <label class="form-check-label">
                                                ไม่อนุญาติให้ลบข้อมูล
                                            </label>
                                        </div>
                                        <label for="" class="form-label mt-3">การเข้าถึงสิทธิ์แก้ไขข้อมูล</label>
                                        <div class="form-check">
                                            <input class="form-check-input" value="on" type="radio"
                                                name="menu_edit">
                                            <label class="form-check-label" for="">
                                                อนุญาติให้แก้ไขข้อมูล
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="off" type="radio"
                                                name="menu_edit">
                                            <label class="form-check-label">
                                                ไม่อนุญาติให้แก้ไขข้อมูล
                                            </label>
                                        </div>
                                        <label for="" class="form-label mt-3">การเข้าถึงสิทธิ์ report
                                            ข้อมูล</label>
                                        <div class="form-check">
                                            <input class="form-check-input" value="on" type="radio"
                                                name="menu_report">
                                            <label class="form-check-label" for="">
                                                อนุญาติให้ report ข้อมูล
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="off" type="radio"
                                                name="menu_report">
                                            <label class="form-check-label">
                                                ไม่อนุญาติให้ report ข้อมูล
                                            </label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn-sm btn bg-gradient-secondary"
                                            data-bs-dismiss="modal"><i class="fas fa-window-close fa-fade"
                                                style="font-size: 11px;"></i>
                                            &nbsp;&nbsp;ปิดแท็ป</button>
                                        <button type="submit" class="btn-sm btn bg-gradient-success"><i
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
                                    <b class="mt-3"><i class="fas fa-edit text-warning"></i> แก้ไขข้อมูล
                                        {{ $name_page }}</b>
                                </div>
                                <form action="{{ url('role/role-update') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="" class="form-label">ชื่อหน้าที่</label>
                                            <input type="hidden" class="form-control form-control-sm" id="role_ids"
                                                name="id" placeholder="admin">
                                            <input type="text" class="form-control form-control-sm"
                                                id="edit_role_name" name="role_name" placeholder="admin">
                                        </div>
                                        <div id="statusCk"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn-sm btn bg-gradient-secondary"
                                            data-bs-dismiss="modal"><i class="fas fa-window-close fa-fade"
                                                style="font-size: 11px;"></i> &nbsp;&nbsp;ปิดแท็ป</button>
                                        <button type="submit" class="btn-sm btn bg-gradient-success"><i
                                                class="fas fa-save fa-fade" style="font-size: 11px;"></i>
                                            &nbsp;&nbsp;อัพเดท
                                            ข้อมูล</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end model -->
                    <!-- Modal -->
                    <div class="modal fade" id="menudatas" tabindex="-1" role="dialog"
                        aria-labelledby="menudatasLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content shadow" style="border-radius: 20px;">
                                <div class="modal-header">
                                    <b class="mt-3"><i class="fas fa-edit text-warning"></i> แก้ไขข้อมูล
                                        {{ $name_page }}</b>
                                </div>
                                <form action="{{ url('role/menu-update') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" id="menuIds" name="id">
                                        <div id="menu_addCk"></div>
                                        <div id="menu_deleteCk"></div>
                                        <div id="menu_editCk"></div>
                                        <div id="menu_reportCk"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn-sm btn bg-gradient-secondary"
                                            data-bs-dismiss="modal"><i class="fas fa-window-close fa-fade"
                                                style="font-size: 11px;"></i> &nbsp;&nbsp;ปิดแท็ป</button>
                                        <button type="submit" class="btn-sm btn bg-gradient-success"><i
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
                            <table id="myTable" class="table table-hover align-items-center mb-0">
                                <thead class="alert-dark">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            #
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            ชื่อบทบาทหน้าที่
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
                                            จัดการข้อมูล
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($role as $row)
                                        <tr>
                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-normal">{{ $i++ }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-normal">{{ $row->role_name }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-normal">{{ $row->created_at }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-secondary text-xs font-weight-normal">
                                                    @if ($row->status == 'on')
                                                        <small class="badge rounded-pill bg-success">เปิดการใช้งาน</small>
                                                    @elseif ($row->status == 'off')
                                                        <small class="badge rounded-pill bg-danger">ปิดการใช้งาน</small>
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                @foreach ($status as $role_status)
                                                    @if ($role_status->status == 'on')
                                                        @foreach ($menu_add as $menu_adds)
                                                            @if ($menu_adds->menu_add != '' && $menu_adds->menu_add == 'on')
                                                                <a href="#" class="btn-sm btn bg-gradient-info"
                                                                    data-bs-toggle="modal"
                                                                    onclick="get_data('{{ $row->id }}')"
                                                                    style="padding: 15px;"
                                                                    data-bs-target="#insertmenudata">
                                                                    <i class="fa-lg fas fa-plus fa-fade text-white"
                                                                        style="font-size: 10px;"></i>
                                                                </a>
                                                            @elseif ($menu_adds->menu_add != '' && $menu_adds->menu_add == 'off')
                                                                {{-- off --}}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach

                                                @foreach ($status as $role_status)
                                                    @if ($role_status->status == 'on')
                                                        @foreach ($menu_edit as $menu_edits)
                                                            @if ($menu_edits->menu_edit != '' && $menu_edits->menu_edit == 'on')
                                                                <a href="#" class="btn-sm btn bg-gradient-warning"
                                                                    data-bs-toggle="modal"
                                                                    onclick="get_data_edit('{{ $row->id }}','{{ $row->role_name }}')"
                                                                    style="padding: 15px;" data-bs-target="#updatedata">
                                                                    <i class="fa-lg fas fa-edit fa-fade text-white"
                                                                        style="font-size: 10px;"></i>
                                                                </a>
                                                            @elseif ($menu_edit->menu_edit != '' && $menu_edit->menu_edit == 'off')
                                                                {{-- off --}}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach

                                                @foreach ($status as $role_status)
                                                    @if ($role_status->status == 'on')
                                                        @foreach ($menu_delete as $menu_deletes)
                                                            @if ($menu_deletes->menu_delete != '' && $menu_deletes->menu_delete == 'on')
                                                                <a href="{{ url('role/role-delete/' . $row->id) }}"
                                                                    onclick="return confirm('ต้องการลบข้อมูลหรือไม่ !')"
                                                                    class="btn-sm btn bg-gradient-danger"
                                                                    data-bs-toggle="tooltip" style="padding: 15px;"
                                                                    data-bs-original-title="ลบข้อมูล">
                                                                    <i class="fa-lg cursor-pointer fas fa-trash fa-fade text-white"
                                                                        style="font-size: 10px;"></i>
                                                                </a>
                                                            @elseif ($menu_delete->menu_delete != '' && $menu_delete->menu_delete == 'off')
                                                                {{-- off --}}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach

                                                @foreach ($status as $role_status)
                                                    @if ($role_status->status == 'on')
                                                        @foreach ($menu_edit as $menu_edits)
                                                            @if ($menu_edits->menu_edit != '' && $menu_edits->menu_edit == 'on')
                                                                <a class="btn-sm btn bg-gradient-warning"
                                                                    style="padding: 15px;" data-bs-toggle="collapse"
                                                                    href="#collapseExample{{ $i }}"
                                                                    role="button" aria-expanded="false"
                                                                    aria-controls="collapseExample">
                                                                    <i class="fa-lg fas fa-solid fa-address-card fa-fade text-white"
                                                                        style="font-size: 10px;"></i>
                                                                </a>
                                                            @elseif ($menu_edit->menu_edit != '' && $menu_edit->menu_edit == 'off')
                                                                {{-- off --}}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach

                                                <div class="collapse" id="collapseExample{{ $i }}">
                                                    <div class="mt-2">
                                                        @php
                                                            $servername = 'localhost';
                                                            $username = 'root';
                                                            $password = '';
                                                            $dbname = 'db_thunder';

                                                            $conn = mysqli_connect($servername, $username, $password, $dbname);
                                                            if (!$conn) {
                                                                die('Connection failed: ' . mysqli_connect_error());
                                                            }

                                                            $sql = 'select * from menu where role_name = "' . $row->role_name . '"';
                                                            $result = mysqli_query($conn, $sql);
                                                        @endphp
                                                        <table class="table alert-dark table-hover text-white">
                                                            <thead class="alert-dark">
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    ชื่อเมนู
                                                                </th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    เพิ่ม
                                                                </th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    ลบ
                                                                </th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    แก้ไข
                                                                </th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    report
                                                                </th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    จัดการ
                                                                </th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($result as $results)
                                                                    <tr>
                                                                        <td><small
                                                                                class="text-xs">{{ $results['menu_name'] }}</small>
                                                                        </td>
                                                                        <td><small
                                                                                class="text-xs">{{ $results['menu_add'] }}</small>
                                                                        </td>
                                                                        <td><small
                                                                                class="text-xs">{{ $results['menu_delete'] }}</small>
                                                                        </td>
                                                                        <td><small
                                                                                class="text-xs">{{ $results['menu_edit'] }}</small>
                                                                        </td>
                                                                        <td><small
                                                                                class="text-xs">{{ $results['menu_report'] }}</small>
                                                                        </td>
                                                                        <td>
                                                                            <a href="#"
                                                                                class="btn-sm btn bg-gradient-warning"
                                                                                data-bs-toggle="modal"
                                                                                onclick="menu_data('{{ $results['id'] }}')"
                                                                                style="padding: 10px;"
                                                                                data-bs-target="#menudatas">
                                                                                <i class="fa-lg fas fa-edit text-white fa-fade"
                                                                                    style="font-size: 7px;"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
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
            url: 'role/role-select/' + id,
            data: {
                "_token": "{{ csrf_token() }}",
                'id': id,
            },
            success: function(res) {
                document.getElementById("menuRole_name").value = res[0].role_name;
            }
        });
    }

    function menu_data(id) {
        $.ajax({
            type: 'post',
            url: 'role/menu-select/' + id,
            data: {
                "_token": "{{ csrf_token() }}",
                'id': id,
            },
            success: function(res) {
                console.log(res);
                for (var i = 0; i < res.length; i++) {
                    document.getElementById("menuIds").value = res[i].id;

                    var add_on =
                        '<div class="form-check mt-3"><input class="form-check-input" type="radio" name="menu_add" checked value="on"><label class="form-check-label">อนุญาติให้เพิ่มข้อมูล</label></div><div class="form-check"><input class="form-check-input" type="radio" name="menu_add" value="off"><label class="form-check-label">ไม่อนุญาติให้เพิ่มข้อมูล</label></div>';
                    var add_off =
                        '<div class="form-check mt-3"><input class="form-check-input" type="radio" name="menu_add" value="on"><label class="form-check-label">อนุญาติให้เพิ่มข้อมูล</label></div><div class="form-check"><input class="form-check-input" type="radio" name="menu_add" checked value="off"><label class="form-check-label">ไม่อนุญาติให้เพิ่มข้อมูล</label></div>';

                    var delete_on =
                        '<div class="form-check mt-3"><input class="form-check-input" type="radio" name="menu_delete" checked value="on"><label class="form-check-label">อนุญาติให้ลบข้อมูล</label></div><div class="form-check"><input class="form-check-input" type="radio" name="menu_delete" value="off"><label class="form-check-label">ไม่อนุญาติให้ลบข้อมูล</label></div>';
                    var delete_off =
                        '<div class="form-check mt-3"><input class="form-check-input" type="radio" name="menu_delete" value="on"><label class="form-check-label">อนุญาติให้ลบข้อมูล</label></div><div class="form-check"><input class="form-check-input" type="radio" name="menu_delete" checked value="off"><label class="form-check-label">ไม่อนุญาติให้ลบข้อมูล</label></div>';

                    var edit_on =
                        '<div class="form-check mt-3"><input class="form-check-input" type="radio" name="menu_edit" checked value="on"><label class="form-check-label">อนุญาติให้แก้ไขข้อมูล</label></div><div class="form-check"><input class="form-check-input" type="radio" name="menu_edit" value="off"><label class="form-check-label">ไม่อนุญาติให้แก้ไขข้อมูล</label></div>';
                    var edit_off =
                        '<div class="form-check mt-3"><input class="form-check-input" type="radio" name="menu_edit" value="on"><label class="form-check-label">อนุญาติให้แก้ไขข้อมูล</label></div><div class="form-check"><input class="form-check-input" type="radio" name="menu_edit" checked value="off"><label class="form-check-label">ไม่อนุญาติให้แก้ไขข้อมูล</label></div>';

                    var report_on =
                        '<div class="form-check mt-3"><input class="form-check-input" type="radio" name="menu_report" checked value="on"><label class="form-check-label">อนุญาติให้ report ข้อมูล</label></div><div class="form-check"><input class="form-check-input" type="radio" name="menu_report" value="off"><label class="form-check-label">ไม่อนุญาติให้ report ข้อมูล</label></div>';
                    var report_off =
                        '<div class="form-check mt-3"><input class="form-check-input" type="radio" name="menu_report" value="on"><label class="form-check-label">อนุญาติให้ report ข้อมูล</label></div><div class="form-check"><input class="form-check-input" type="radio" name="menu_report" checked value="off"><label class="form-check-label">ไม่อนุญาติให้ report ข้อมูล</label></div>';

                    if (res[i].menu_add == 'on' && res[i].menu_add != '') {
                        document.getElementById("menu_addCk").innerHTML = add_on;
                    } else if (res[i].menu_add == 'off' && res[i].menu_add != '') {
                        document.getElementById("menu_addCk").innerHTML = add_off;
                    }

                    if (res[i].menu_delete == 'on' && res[i].menu_delete != '') {
                        document.getElementById("menu_deleteCk").innerHTML = delete_on;
                    } else if (res[i].menu_delete == 'off' && res[i].menu_delete != '') {
                        document.getElementById("menu_deleteCk").innerHTML = delete_off;
                    }

                    if (res[i].menu_edit == 'on' && res[i].menu_edit != '') {
                        document.getElementById("menu_editCk").innerHTML = edit_on;
                    } else if (res[i].menu_edit == 'off' && res[i].menu_edit != '') {
                        document.getElementById("menu_editCk").innerHTML = edit_off;
                    }

                    if (res[i].menu_report == 'on' && res[i].menu_report != '') {
                        document.getElementById("menu_reportCk").innerHTML = report_on;
                    } else if (res[i].menu_report == 'off' && res[i].menu_report != '') {
                        document.getElementById("menu_reportCk").innerHTML = report_off;
                    }
                }
            }
        });
    }

    function get_data_edit(id, role_name) {
        $.ajax({
            type: 'post',
            url: 'role/role-edit/' + id,
            data: {
                "_token": "{{ csrf_token() }}",
                'id': id,
                'role_name': role_name,
            },
            success: function(res) {
                document.getElementById("edit_role_name").value = res.role_name;
                document.getElementById("role_ids").value = res.id;

                var status = res.status;
                for (var i = 0; i < status.length; i++) {
                    var html_on =
                        '<div class="form-check"><input class="form-check-input" type="radio" name="status" id="status1" checked value="on"><label class="form-check-label" for="status1">สถานะการใช้งาน <b class="text-xs text-success">(เปิดการใช้งาน)</b></label></div><div class="form-check"><input class="form-check-input" type="radio" name="status" id="status2" value="off"><label class="form-check-label" for="status2">สถานะการใช้งาน <b class="text-xs text-danger">(ปิดการใช้งาน)</b></label></div>';
                    var html_off =
                        '<div class="form-check"><input class="form-check-input" type="radio" name="status" id="status1" value="on"><label class="form-check-label" for="status1">สถานะการใช้งาน <b class="text-xs text-success">(เปิดการใช้งาน)</b></label></div><div class="form-check"><input class="form-check-input" type="radio" name="status" id="status2" checked value="off"><label class="form-check-label" for="status2">สถานะการใช้งาน <b class="text-xs text-danger">(ปิดการใช้งาน)</b></label></div>';

                    if (status[i].status == 'on') {
                        document.getElementById("statusCk").innerHTML = html_on;
                    } else {
                        document.getElementById("statusCk").innerHTML = html_off;
                    }
                }

            }
        });
    }

    $(document).ready(function() {
        $('.toast').toast('show');
    });
</script>
