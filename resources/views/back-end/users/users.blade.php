@extends('layouts.user_type.auth')

@section('content')
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
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">ระดับผู้ใช้</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>--</option>
                                                    <option value="1">ผู้ดูแลระบบ</option>
                                                    <option value="2">ผู้จัดการ</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">สถานะ</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>--</option>
                                                    <option value="1">ปิดการใช้งาน</option>
                                                    <option value="2">เปิดการใช้งาน</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">ชื่อ</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">ชื่อผู้ใช้</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">รหัสผ่าน</label>
                                                <input type="text" maxlength="4" class="form-control" id="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">ยืนยีนรหัสผ่าน</label>
                                                <input type="text" class="form-control" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal"><i
                                            class="fas fa-window-close"></i> &nbsp;&nbsp;ปิดแท็ป</button>
                                    <button type="button" class="btn bg-gradient-success"><i class="fas fa-save"></i>
                                        &nbsp;&nbsp;บันทึกข้อมูล</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end model -->
                    <!-- Modal -->
                    <div class="modal fade" id="updatedata" tabindex="-1" role="dialog" aria-labelledby="updatedataLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content shadow" style="border-radius: 20px;">
                                <div class="modal-header">
                                    <b class="mt-3"><i class="fas fa-edit text-warning"></i> แก้ไขข้อมูล
                                        {{ $name_page }}</b>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">ระดับผู้ใช้</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>--</option>
                                                    <option value="1">ผู้ดูแลระบบ</option>
                                                    <option value="2">ผู้จัดการ</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">สถานะ</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>--</option>
                                                    <option value="1">ปิดการใช้งาน</option>
                                                    <option value="2">เปิดการใช้งาน</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">ชื่อ</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">ชื่อผู้ใช้</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">รหัสผ่าน</label>
                                                <input type="text" maxlength="4" class="form-control"
                                                    id="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">ยืนยีนรหัสผ่าน</label>
                                                <input type="text" class="form-control" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal"><i
                                            class="fas fa-window-close"></i> &nbsp;&nbsp;ปิดแท็ป</button>
                                    <button type="button" class="btn bg-gradient-success"><i class="fas fa-save"></i>
                                        &nbsp;&nbsp;อัพเดท
                                        ข้อมูล</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end model -->
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <table id="myTable" class="table align-items-center mb-0">
                                <thead>
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
                                    <tr>
                                        <td>
                                            <p class="text-secondary text-xs font-weight-normal">1</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-secondary text-xs font-weight-normal">komsan</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-normal">admin@gmail.com</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-normal">ผู้ดูแลระบบ</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-normal">6/23/2022</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-normal">
                                                <small class="badge rounded-pill bg-success">เปิดการใช้งาน</small>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn bg-gradient-warning" data-bs-toggle="modal"
                                                data-bs-target="#updatedata">
                                                <i class="fa-lg fas fa-edit text-white" style="font-size: 10px;"></i>
                                            </a>
                                            <a href="#" class="btn bg-gradient-danger" data-bs-toggle="tooltip"
                                                data-bs-original-title="ลบข้อมูล">
                                                <i class="fa-lg cursor-pointer fas fa-trash text-white"
                                                    style="font-size: 10px;"></i>
                                            </a>
                                        </td>
                                    </tr>
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
</script>
