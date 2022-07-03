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
                                <form action="{{url('storage/storage-add')}}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="" class="form-label">ประเภทรถ</label>
                                            <select class="form-select" aria-label="Default select example" name="type_id">
                                                <option selected>--</option>
                                                @foreach ($type as $types)
                                                    <option value="{{ $types->id }}">ยี่ห้อ {{ $types->type }} รุ่น
                                                        {{ $types->model }} ปี {{ $types->year }} CC {{ $types->cc }}
                                                        สีรถ
                                                        {{ $types->color }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">เลขเครื่อง</label>
                                                    <input type="text" name="model_number" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">เลขถัง</label>
                                                    <input type="text" name="tank_number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">เลขไมล์</label>
                                                    <input type="text" class="form-control" name="mile">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">ราคาขาย</label>
                                                    <input type="number" name="price" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">ราคาดาวน์</label>
                                                    <input type="number" name="down" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">ยอดจัดไฟแนนซ์</label>
                                                    <input type="number" name="finance" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">อัตตราดอกเบี้ย</label>
                                                    <input type="number" name="interest" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">ส่วนลด</label>
                                                    <input type="number" name="discount" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">วันหมดอายุภาษี</label>
                                                    <input type="text" name="expire_date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="" class="form-label">สถานะรถ</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status">
                                                        <label class="form-check-label">
                                                            พร้อมขาย
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            checked>
                                                        <label class="form-check-label">
                                                            รอเก็บงาน
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="book"
                                                            name="book" checked>
                                                        <label class="form-check-label" for="">
                                                            รถมีเล่ม
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="finance"
                                                            name="book">
                                                        <label class="form-check-label" for="">
                                                            รถปิดไฟแนนซ์
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="horizontal dark mt-0">
                                        <small>รายการของเดิม (อุปกรณ์ติดรถมา)</small>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="true"
                                                        name="pipe">
                                                    <label class="form-check-label" for="">
                                                        ท่อเดิม
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="true"
                                                        name="hand" checked>
                                                    <label class="form-check-label" for="">
                                                        ท้ายเดิม
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="true"
                                                        name="glass">
                                                    <label class="form-check-label" for="">
                                                        แฮนด์เดิม
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="true"
                                                        name="key" checked>
                                                    <label class="form-check-label" for="">
                                                        ชิวเดิม
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="true"
                                                        name="rear" checked>
                                                    <label class="form-check-label" for="">
                                                        กระจกเดิม
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="true"
                                                        name="shield">
                                                    <label class="form-check-label" for="">
                                                        เบาะเดิม
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="true"
                                                        name="seat" checked>
                                                    <label class="form-check-label" for="">
                                                        กุญแจ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2 mt-3">
                                            <label for="" class="form-label">อื่นๆ</label>
                                            <input type="text" class="form-control" name="other">
                                        </div>
                                        <hr class="horizontal dark mt-0 mt-3">
                                        <small>รูปภาพและเอกสาร</small>
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">รูปภาพรถ</label>
                                                    <input type="file" name="img" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">สำเนา</label>
                                                    <input type="file" name="transcript" class="form-control">
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
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">ตัวถัง</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">ราคาขาย</label>
                                                <input type="number" class="form-control">
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
                                                <input class="form-check-input" type="checkbox" value="">
                                                <label class="form-check-label" for="">
                                                    ท้ายเดิม
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <label class="form-check-label" for="">
                                                    ท้ายแต่ง
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <label class="form-check-label" for="">
                                                    ซิวเดิม
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <label class="form-check-label" for="">
                                                    ซิวแต่ง
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <label class="form-check-label" for="">
                                                    จองแล้ว
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
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
                                                <input type="file" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">สำเนา</label>
                                                <input type="file" class="form-control">
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
                                            <span class="text-xs font-weight-normal mb-0">2</span>
                                        </td>
                                        <td class="text-center">
                                            <div>
                                                <img src="https://www.greatbiker.com/wp-content/uploads/2020/10/cbr650r.jpg"
                                                    width="80px">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-xs font-weight-normal mb-0">
                                                Honda</span>
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
                                            <span class="text-secondary text-xs font-weight-normal">1,000,000</span>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="text-xs font-weight-normal mb-0 badge rounded-pill bg-success">จองแล้ว</span>
                                        </td>
                                        <td class="text-center">
                                            {{-- <a href="#" class="btn bg-gradient-primary" style="padding: 15px;">
                                                <i class="fa-lg fas fa-qrcode text-white" style="font-size: 10px;"></i>
                                            </a> --}}
                                            <a href="#" class="btn bg-gradient-info " style="padding: 15px;">
                                                <i class="fa-lg fas fa-list text-white" style="font-size: 10px;"></i>
                                            </a>
                                            <a href="#" class="btn bg-gradient-warning " style="padding: 15px;"
                                                data-bs-toggle="modal" data-bs-target="#updatedata">
                                                <i class="fa-lg fas fa-edit text-white" style="font-size: 10px;"></i>
                                            </a>
                                            <a href="#" class="btn bg-gradient-danger " style="padding: 15px;"
                                                data-bs-toggle="tooltip" data-bs-original-title="ลบข้อมูล">
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
