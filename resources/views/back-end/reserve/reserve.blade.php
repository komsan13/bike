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
                                        <label for="" class="form-label">ยี่ห้อรถ</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">รุ่นรถ</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">ปีรถ</label>
                                                <input type="text" maxlength="4" class="form-control" id="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">สีรถ</label>
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
                                        <label for="" class="form-label">ยี่ห้อรถ</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">รุ่นรถ</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">ปีรถ</label>
                                                <input type="number" maxlength="4" class="form-control" id="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">สีรถ</label>
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
                                <thead class="alert-dark">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">#</th>
                                        <th class="text-uppercase text-secondary text-center text-xs font-weight-bolder opacity-7">เลขใบจอง</th>
                                        <th class="text-center text-uppercase text-secondary text-center text-xs font-weight-bolder opacity-7">ยี่ห้อรถ</th>
                                        <th class="text-center text-uppercase text-secondary text-center text-xs font-weight-bolder opacity-7">รุ่นรถ</th>
                                        <th class="text-center text-uppercase text-secondary text-center text-xs font-weight-bolder opacity-7">ปีรถ</th>
                                        <th class="text-center text-uppercase text-secondary text-center text-xs font-weight-bolder opacity-7">สีรถ</th>
                                        <th class="text-center text-uppercase text-secondary text-center text-xs font-weight-bolder opacity-7">จัดการข้อมูล</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-secondary text-xs font-weight-normal">1</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-secondary text-xs font-weight-normal">20220623-0001</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-secondary text-xs font-weight-normal">Honda</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-normal">CB1000R</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-normal">2022</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-normal">สีดำ</span>
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
                                    <tr>
                                        <td>
                                            <p class="text-secondary text-xs font-weight-normal">2</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-secondary text-xs font-weight-normal">20220623-0002</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-secondary text-xs font-weight-normal">Honda</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-normal">CB300R</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-normal">2022</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-normal">สีดำแดง</span>
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
                                    {{-- @foreach ($types as $type)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $type->id }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $type->type }}</p>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $type->model }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $type->year }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $type->color }}</span>
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
                                    @endforeach --}}
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
