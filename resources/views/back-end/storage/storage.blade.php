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
                            <a href="#" class="btn bg-gradient-success  mb-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#insertdata">+&nbsp; เพิ่มข้อมูล</a>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="insertdata" tabindex="-1" role="dialog" aria-labelledby="insertdataLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content shadow" style="border-radius: 20px">
                                <div class="modal-header">
                                    <b><i class="fas fa-solid fa-plus text-success"></i> เพิ่มข้อมูล {{ $name_page }}</b>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="" class="form-label">ประเภทรถ</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>--</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">เลขตัวเครื่อง</label>
                                                <input type="text" class="form-control" id="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">ตัวถัง</label>
                                                <input type="text" class="form-control" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">ราคาขาย</label>
                                                <input type="number" class="form-control" id="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">สถานะรถ</label>
                                                <div class="form-check" style="margin-top: -5;">
                                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                                        id="exampleRadios1" value="option1" checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        สถานะพร้อมขาย
                                                    </label>
                                                </div>
                                                <div class="form-check" style="margin-top: -6;">
                                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                                        id="exampleRadios2" value="option2">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        สถานะรอเก็บงาน
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="">
                                                <label class="form-check-label" for="">
                                                    ท้ายเดิม
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="" checked>
                                                <label class="form-check-label" for="">
                                                    ท้ายแต่ง
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="">
                                                <label class="form-check-label" for="">
                                                    ซิวเดิม
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="" checked>
                                                <label class="form-check-label" for="">
                                                    ซิวแต่ง
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="" checked>
                                                <label class="form-check-label" for="">
                                                    จองแล้ว
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="">
                                                <label class="form-check-label" for="">
                                                    ขายแล้ว
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 mt-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">รูปภาพรถ</label>
                                                <input type="file" class="form-control" id="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">สำเนา</label>
                                                <input type="file" class="form-control" id="">
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
                    <div class="modal fade" id="updatedata" tabindex="-1" role="dialog"
                        aria-labelledby="updatedataLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content shadow" style="border-radius: 20px;">
                                <div class="modal-header">
                                    <b><i class="fas fa-solid fa-edit text-warning"></i> แก้ไขข้อมูล
                                        {{ $name_page }}</b>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="" class="form-label">ประเภทรถ</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>--</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">เลขตัวเครื่อง</label>
                                                <input type="text" class="form-control" id="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">ตัวถัง</label>
                                                <input type="text" class="form-control" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">ราคาขาย</label>
                                                <input type="number" class="form-control" id="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">สถานะรถ</label>
                                                <div class="form-check" style="margin-top: -5;">
                                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                                        id="exampleRadios1" value="option1" checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        สถานะพร้อมขาย
                                                    </label>
                                                </div>
                                                <div class="form-check" style="margin-top: -6;">
                                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                                        id="exampleRadios2" value="option2">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        สถานะรอเก็บงาน
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="">
                                                <label class="form-check-label" for="">
                                                    ท้ายเดิม
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="" checked>
                                                <label class="form-check-label" for="">
                                                    ท้ายแต่ง
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="">
                                                <label class="form-check-label" for="">
                                                    ซิวเดิม
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="" checked>
                                                <label class="form-check-label" for="">
                                                    ซิวแต่ง
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="" checked>
                                                <label class="form-check-label" for="">
                                                    จองแล้ว
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="">
                                                <label class="form-check-label" for="">
                                                    ขายแล้ว
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 mt-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">รูปภาพรถ</label>
                                                <input type="file" class="form-control" id="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">สำเนา</label>
                                                <input type="file" class="form-control" id="">
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
                                            รูปภาพ
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            ยี้ห้อ
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            รุ่น
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            ปี
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            สี
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            ราคา
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            สถานะการขาย
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            จัดการ
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">2</p>
                                        </td>
                                        <td class="text-center">
                                            <div>
                                                <img src="https://www.greatbiker.com/wp-content/uploads/2020/10/cbr650r.jpg"
                                                    width="80px">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">
                                                Honda</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">CB1000R</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">2022</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">สีดำ</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">1,000,000</span>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="text-xs font-weight-bold mb-0 badge rounded-pill bg-success">จองแล้ว</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn bg-gradient-primary ">
                                                <i class="fas fa-solid fa-qrcode text-white" style="font-size: 10px;"></i>
                                            </a>
                                            <a href="#" class="btn bg-gradient-info ">
                                                <i class="fas fa-solid fa-list text-white" style="font-size: 10px;"></i>
                                            </a>
                                            <a href="#" class="btn bg-gradient-warning " data-bs-toggle="modal"
                                                data-bs-target="#updatedata">
                                                <i class="fa-lg fas fa-edit text-white" style="font-size: 10px;"></i>
                                            </a>
                                            <a href="#" class="btn bg-gradient-danger " data-bs-toggle="tooltip"
                                                data-bs-original-title="ลบข้อมูล">
                                                <i class="fa-lg cursor-pointer fas fa-trash text-white"
                                                    style="font-size: 10px;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">1</p>
                                        </td>
                                        <td class="text-center">
                                            <div>
                                                <img src="data:image/jpeg;base64,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"
                                                    width="80px">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">
                                                Honda</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">CB300R</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">2022</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">สีดำแดง</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">1,000,000</span>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="text-xs font-weight-bold mb-0 badge rounded-pill bg-success">จองแล้ว</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn bg-gradient-primary ">
                                                <i class="fas fa-solid fa-qrcode text-white" style="font-size: 10px;"></i>
                                            </a>
                                            <a href="#" class="btn bg-gradient-info ">
                                                <i class="fas fa-solid fa-list text-white" style="font-size: 10px;"></i>
                                            </a>
                                            <a href="#" class="btn bg-gradient-warning " data-bs-toggle="modal"
                                                data-bs-target="#updatedata">
                                                <i class="fa-lg fas fa-edit text-white" style="font-size: 10px;"></i>
                                            </a>
                                            <a href="#" class="btn bg-gradient-danger " data-bs-toggle="tooltip"
                                                data-bs-original-title="ลบข้อมูล">
                                                <i class="fa-lg cursor-pointer fas fa-trash text-white"
                                                    style="font-size: 10px;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    {{-- @foreach ($storages as $storage)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $storage->id }}</p>
                                            </td>
                                            <td class="text-center">
                                                <div>
                                                    <img src="https://www.greatbiker.com/wp-content/uploads/2020/10/cbr650r.jpg"
                                                        width="80px">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0 badge rounded-pill bg-success">
                                                    {{ $storage->id_type }}</p>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $storage->id_type }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $storage->id_type }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $storage->id_type }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $storage->price }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-xs font-weight-bold mb-0 badge rounded-pill bg-success">{{ $storage->status }}</span>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="btn bg-gradient-warning " data-bs-toggle="modal"
                                                    data-bs-target="#updatedata">
                                                    <i class="fa-lg fas fa-edit text-white" style="font-size: 10px;"></i>
                                                </a>
                                                <a href="#" class="btn bg-gradient-danger "
                                                    data-bs-toggle="tooltip" data-bs-original-title="ลบข้อมูล">
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
