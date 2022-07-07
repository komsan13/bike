@extends('layouts.user_type.auth')

@section('content')
    @if (session('success'))
        <div class="position-absolute bottom-0 end-0 p-3" style="z-index: 11">
            <div id="liveToast" class="toast hide " role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header alert-success text-white"
                    style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <strong class="me-auto"><i class="fas fa-check-circle fa-fade"></i> Successfully</strong>
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
                    <strong class="me-auto"><i class="fa-solid fa-triangle-exclamation fa-fade"></i> Warning</strong>
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
                                                <a href="#" class="btn-sm btn bg-gradient-warning mb-0"
                                                    type="button"><i class="fa-solid fa-file-export"
                                                        style="font-size: 11px;"></i>&nbsp; export</a>

                                                <a href="#" class="btn-sm btn bg-gradient-success mb-0" type="button"
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
                            <div class="modal-content shadow" style="border-radius: 20px">
                                <div class="modal-header">
                                    <b><i class="fa-solid fa-circle-plus fa-fade"></i> เพิ่มข้อมูล {{ $name_page }}</b>
                                </div>
                                <form action="{{ url('storage/storage-add') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="" class="form-label">ประเภทรถ</label>
                                            <select class="form-select form-select-sm" aria-label="Default select example"
                                                name="type_id">
                                                {{-- <option selected>--</option> --}}
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
                                                    <input type="text" name="model_number"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">เลขถัง</label>
                                                    <input type="text" name="tank_number"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">เลขไมล์</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="mile">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">ราคาขาย</label>
                                                    <input type="number" name="price"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">ราคาดาวน์</label>
                                                    <input type="number" name="down"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">ยอดจัดไฟแนนซ์</label>
                                                    <input type="number" name="finance"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">อัตตราดอกเบี้ย</label>
                                                    <input type="number" name="interest"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">ส่วนลด</label>
                                                    <input type="number" name="discount"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">วันหมดอายุภาษี</label>
                                                    <input type="text" name="expire_date"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="" class="form-label">สถานะรถ</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="1"
                                                            name="status">
                                                        <label class="form-check-label">
                                                            พร้อมขาย
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="2"
                                                            name="status">
                                                        <label class="form-check-label">
                                                            รอเก็บงาน
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="book"
                                                            name="book">
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
                                                    <input class="form-check-input" type="checkbox" value="ท่อเดิม"
                                                        name="pipe">
                                                    <label class="form-check-label" for="">
                                                        ท่อเดิม
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="ท้ายเดิม"
                                                        name="hand">
                                                    <label class="form-check-label" for="">
                                                        ท้ายเดิม
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="แฮนด์เดิม"
                                                        name="glass">
                                                    <label class="form-check-label" for="">
                                                        แฮนด์เดิม
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="ชิวเดิม"
                                                        name="acc_keys">
                                                    <label class="form-check-label" for="">
                                                        ชิวเดิม
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="กระจกเดิม"
                                                        name="rear">
                                                    <label class="form-check-label" for="">
                                                        กระจกเดิม
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="เบาะเดิม"
                                                        name="shield">
                                                    <label class="form-check-label" for="">
                                                        เบาะเดิม
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="กุญแจ"
                                                        name="seat">
                                                    <label class="form-check-label" for="">
                                                        กุญแจ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2 mt-3">
                                            <label for="" class="form-label">อื่นๆ</label>
                                            <input type="text" class="form-control form-control-sm" value="อื่นๆ"
                                                name="other">
                                        </div>
                                        <hr class="horizontal dark mt-0 mt-3">
                                        <small>รูปภาพและเอกสาร</small>
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">รูปภาพรถ</label>
                                                    <input type="file" name="img"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">สำเนา</label>
                                                    <input type="file" name="transcript"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn-sm btn bg-gradient-secondary"
                                            data-bs-dismiss="modal"><i class="fas fa-window-close fa-fade"></i>
                                            &nbsp;&nbsp;ปิดแท็ป</button>
                                        <button type="submit" class="btn-sm btn bg-gradient-success"><i
                                                class="fas fa-save fa-fade"></i>
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
                                    <b><i class="fas fa-solid fa-edit fa-fade text-warning"></i> แก้ไขข้อมูล
                                        {{ $name_page }}</b>
                                </div>
                                <form action="{{ url('storage/storage-update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="" class="form-label">#invoice</label>
                                            <input type="text" id="invoice" name="invoice"
                                                class="form-control form-control-sm" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">ประเภทรถ</label>
                                            <select class="form-select form-select-sm" aria-label="Default select example"
                                                name="type_id" id="selected">
                                                <option id="type_edit"><span id="type_edit1"></span></option>
                                                <option disabled>--</option>
                                                @foreach ($type as $types)
                                                    <option value="{{ $types->id }}">ยี่ห้อ {{ $types->type }} รุ่น
                                                        {{ $types->model }} ปี {{ $types->year }} CC
                                                        {{ $types->cc }}
                                                        สีรถ
                                                        {{ $types->color }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">เลขเครื่อง</label>
                                                    <input type="text" id="e_model_number" name="model_number"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">เลขถัง</label>
                                                    <input type="text" id="e_tank_number" name="tank_number"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">เลขไมล์</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="e_mile" name="mile">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">ราคาขาย</label>
                                                    <input type="number" id="e_price" name="price"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">ราคาดาวน์</label>
                                                    <input type="number" id="e_down" name="down"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">ยอดจัดไฟแนนซ์</label>
                                                    <input type="number" id="e_finance" name="finance"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">อัตตราดอกเบี้ย</label>
                                                    <input type="number" id="e_interest" name="interest"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">ส่วนลด</label>
                                                    <input type="number" id="e_discount" name="discount"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">วันหมดอายุภาษี</label>
                                                    <input type="text" id="e_expire_date" name="expire_date"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="" class="form-label">สถานะรถ</label>
                                                    <div class="form-check">
                                                        <div id="status_1"></div>
                                                        <label class="form-check-label">
                                                            พร้อมขาย
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <div id="status_2"></div>
                                                        <label class="form-check-label">
                                                            รอเก็บงาน
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-4">
                                                    <div class="form-check">
                                                        <div id="book_1"></div>
                                                        <label class="form-check-label" for="">
                                                            รถมีเล่ม
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <div id="book_2"></div>
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
                                                    <div id="pipe"></div>
                                                    <label class="form-check-label" for="">
                                                        ท่อเดิม
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <div id="hand"></div>
                                                    <label class="form-check-label" for="">
                                                        ท้ายเดิม
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <div id="glass"></div>
                                                    <label class="form-check-label" for="">
                                                        แฮนด์เดิม
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <div id="acc_keys"></div>
                                                    <label class="form-check-label" for="">
                                                        ชิวเดิม
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <div id="rear"></div>
                                                    <label class="form-check-label" for="">
                                                        กระจกเดิม
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <div id="shield"></div>
                                                    <label class="form-check-label" for="">
                                                        เบาะเดิม
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <div id="seat"></div>
                                                    <label class="form-check-label" for="">
                                                        กุญแจ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2 mt-3">
                                            <label for="" class="form-label">อื่นๆ</label>
                                            <input type="text" class="form-control form-control-sm" id="e_other"
                                                name="other">
                                        </div>
                                        <hr class="horizontal dark mt-0 mt-3">
                                        <small>รูปภาพและเอกสาร</small>
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">รูปภาพรถ</label>
                                                    <input type="hidden" id="e_img" name="e_img"
                                                        class="form-control form-control-sm">
                                                    <input type="file" name="img"
                                                        class="form-control form-control-sm">
                                                    <div id="img"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">สำเนา</label>
                                                    <input type="hidden" id="e_transcript" name="e_transcript"
                                                        class="form-control form-control-sm">
                                                    <input type="file" name="transcript"
                                                        class="form-control form-control-sm">
                                                    <div id="transcript" class="mt-3"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn-sm btn bg-gradient-secondary"
                                            data-bs-dismiss="modal"><i class="fas fa-window-close fa-fade"></i>
                                            &nbsp;&nbsp;ปิดแท็ป</button>
                                        <button type="submit" class="btn-sm btn bg-gradient-success"><i
                                                class="fas fa-save fa-fade"></i>
                                            &nbsp;&nbsp;บันทึกข้อมูล</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="modelQr" tabindex="-1" role="dialog"
                        aria-labelledby="modelQrLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content shadow" style="border-radius: 20px;">
                                <div class="modal-header">

                                </div>
                                <div class="modal-body"></div>
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
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            #invoice
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
                                            วันที่สร้าง
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
                                    @foreach ($storages as $row)
                                        @if ($row->status != '0')
                                            <tr>
                                                <td class="ps-4">
                                                    <span
                                                        class="text-xs font-weight-normal mb-0">{{ $i++ }}</span>
                                                </td>
                                                <td class="ps-4">
                                                    <span
                                                        class="text-xs font-weight-normal mb-0">S{{ $row->invoice }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <div>
                                                        <img src="{{ asset('public/Image/' . $row->img) }}"
                                                            width="80px">
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-xs font-weight-normal mb-0">
                                                        {{ $row->type }}</span>
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
                                                        class="text-secondary text-xs font-weight-normal">{{ number_format($row->price, 2) }}</span>
                                                </td>
                                                <td class="text-center">
                                                    @if ($row->status == '1')
                                                        <b
                                                            class="text-xs font-weight-normal mb-0 badge rounded-pill bg-success"><i
                                                                class="fas fa-check-circle fa-fade"></i> พน้อมขาย</b>
                                                    @else
                                                        <b
                                                            class="text-xs font-weight-normal mb-0 badge rounded-pill bg-warning"><i
                                                                class="fa-solid fa-triangle-exclamation fa-fade"></i>
                                                            รอเก็บงาน</b>
                                                    @endif
                                                </td>
                                                <td class="text-center"><span
                                                        class="text-secondary text-xs font-weight-normal">{{ $row->created_at }}</span>
                                                </td>
                                                <td class="text-center">
                                                    {{-- <a href="#" class="btn-sm btn bg-gradient-primary" style="padding: 15px;">
                                                <i class="fa-lg fas fa-qrcode text-white" style="font-size: 10px;"></i>
                                            </a> --}}
                                                    <a href="#" class="btn-sm btn bg-gradient-info " type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modelQr"
                                                        style="padding: 15px;">
                                                        <i class="fa-lg fas fa-list fa-fade text-white"
                                                            style="font-size: 10px;"></i>
                                                    </a>
                                                    <a href="#" class="btn-sm btn bg-gradient-warning "
                                                        onclick="storage_data('{{ $row->id }}')"
                                                        style="padding: 15px;" data-bs-toggle="modal"
                                                        data-bs-target="#updatedata">
                                                        <i class="fa-lg fas fa-edit fa-fade text-white"
                                                            style="font-size: 10px;"></i>
                                                    </a>
                                                    <a href="{{ url('storage/storage-delete/' . $row->id) }}"
                                                        onclick="return confirm('ต้องการลบข้อมูลหรือไม่ !')"
                                                        class="btn-sm btn bg-gradient-danger " style="padding: 15px;"
                                                        data-bs-toggle="tooltip" data-bs-original-title="ลบข้อมูล">
                                                        <i class="fa-lg cursor-pointer fas fa-trash fa-fade text-white"
                                                            style="font-size: 10px;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
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

    function storage_data(id) {
        $.ajax({
            type: 'post',
            url: 'storage/storage-edit/' + id,
            data: {
                "_token": "{{ csrf_token() }}",
                'id': id,
            },
            success: function(res) {
                document.getElementById("invoice").value = res[0].invoice;

                document.getElementById("type_edit").value = res[0].type_id;
                document.getElementById("type_edit").innerHTML = "ยี่ห้อ " + res[0].type + " รุ่น " + res[0]
                    .model + " ปี " + res[0].year + " CC " + res[0].cc + " สีรถ " + res[0].color;
                document.getElementById("e_model_number").value = res[0].model_number;
                document.getElementById("e_model_number").value = res[0].model_number;
                document.getElementById("e_tank_number").value = res[0].tank_number;
                document.getElementById("e_mile").value = res[0].mile;
                document.getElementById("e_price").value = res[0].price;
                document.getElementById("e_down").value = res[0].down;
                document.getElementById("e_finance").value = res[0].finance;
                document.getElementById("e_interest").value = res[0].interest;
                document.getElementById("e_discount").value = res[0].discount;
                document.getElementById("e_expire_date").value = res[0].expire_date;

                if (res[0].status == '1') {
                    document.getElementById("status_1").innerHTML =
                        '<input class="form-check-input" type="radio" value="1" name = "status" checked>';
                    document.getElementById("status_2").innerHTML =
                        '<input class="form-check-input" type="radio" value="2" name = "status" >';
                } else if (res[0].status == '2') {
                    document.getElementById("status_1").innerHTML =
                        '<input class="form-check-input" type="radio" value="1" name = "status" >';
                    document.getElementById("status_2").innerHTML =
                        '<input class="form-check-input" type="radio" value="2" name = "status" checked>';
                }

                if (res[0].book == 'book') {
                    document.getElementById("book_1").innerHTML =
                        '<input class="form-check-input" type="radio" value="book" name = "book" checked>';
                    document.getElementById("book_2").innerHTML =
                        '<input class="form-check-input" type="radio" value="finance" name = "book" >';
                } else if (res[0].book == 'finance') {
                    document.getElementById("book_1").innerHTML =
                        '<input class="form-check-input" type="radio" value="book" name = "book" >';
                    document.getElementById("book_2").innerHTML =
                        '<input class="form-check-input" type="radio" value="finance" name = "book" checked>';
                }

                if (res[0].pipe != null && res[0].pipe != "") {
                    var pipe =
                        '<input class="form-check-input" type="checkbox" value="ท่อเดิม" name="pipe" checked>';
                } else {
                    var pipe =
                        '<input class="form-check-input" type="checkbox" value="ท่อเดิม" name="pipe">';
                }
                document.getElementById("pipe").innerHTML = pipe;

                if (res[0].hand != null && res[0].hand != "") {
                    var hand =
                        '<input class="form-check-input" type="checkbox" value="ท้ายเดิม" name="hand" checked>';
                } else {
                    var hand =
                        '<input class="form-check-input" type="checkbox" value="ท้ายเดิม" name="hand">';
                }
                document.getElementById("hand").innerHTML = hand;

                if (res[0].glass != null && res[0].glass != "") {
                    var glass =
                        '<input class="form-check-input" type="checkbox" value="แฮนด์เดิม" name="glass" checked>';
                } else {
                    var glass =
                        '<input class="form-check-input" type="checkbox" value="แฮนด์เดิม" name="glass">';
                }
                document.getElementById("glass").innerHTML = glass;

                if (res[0].acc_keys != null && res[0].acc_keys != "") {
                    var acc_keys =
                        '<input class="form-check-input" type="checkbox" value="ชิวเดิม" name="acc_keys" checked>';
                } else {
                    var acc_keys =
                        '<input class="form-check-input" type="checkbox" value="ชิวเดิม" name="acc_keys">';
                }
                document.getElementById("acc_keys").innerHTML = acc_keys;

                if (res[0].rear != null && res[0].rear != "") {
                    var rear =
                        '<input class="form-check-input" type="checkbox" value="กระจกเดิม" name="rear" checked>';
                } else {
                    var rear =
                        '<input class="form-check-input" type="checkbox" value="กระจกเดิม" name="rear">';
                }
                document.getElementById("rear").innerHTML = rear;

                if (res[0].shield != null && res[0].shield != "") {
                    var shield =
                        '<input class="form-check-input" type="checkbox" value="เบาะเดิม" name="shield" checked>';
                } else {
                    var shield =
                        '<input class="form-check-input" type="checkbox" value="เบาะเดิม" name="shield">';
                }
                document.getElementById("shield").innerHTML = shield;

                if (res[0].seat != null && res[0].seat != "") {
                    var seat =
                        '<input class="form-check-input" type="checkbox" value="กุญแจ" name="seat" checked>';
                } else {
                    var seat = '<input class="form-check-input" type="checkbox" value="กุญแจ" name="seat">';
                }
                document.getElementById("seat").innerHTML = seat;

                document.getElementById("e_other").value = res[0].other;
                document.getElementById("e_img").value = res[0].img;
                document.getElementById("e_transcript").value = res[0].transcript;
                document.getElementById("img").innerHTML = '<img class="mt-3 shadow" src="public/Image/' +
                    res[0].img + '" alt="" width="100%" style="border-radius: 25px;">';
                document.getElementById("transcript").innerHTML = '<span class="text-xs">' + res[0]
                    .transcript + '</span>';
            }
        });
    }

    function getselect() {
        var gets = document.getElementById('selected').value;
        console.log(gets);
    }
</script>
