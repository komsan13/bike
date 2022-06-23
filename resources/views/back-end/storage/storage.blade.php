@extends('layouts.user_type.auth')

@section('content')

<div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header pb-0">
          <div class="d-flex flex-row justify-content-between">
            <div>
              <h5 class="mb-0"><i class="fas fa-align-left"></i> {{$name_page}}</h5>
            </div>
            <a href="#" class="btn bg-gradient-success btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#insertdata">+&nbsp; เพิ่มข้อมูล</a>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="insertdata" tabindex="-1" role="dialog" aria-labelledby="insertdataLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <b><i class="fas fa-solid fa-plus text-success"></i> เพิ่มข้อมูล {{$name_page}}</b> <br>
                <!-- <label for="type">รูปภาพ</label>
                <input type="file" class="form-control"> -->
                <label for="type">ประเภทรถ</label>
                <input type="text" class="form-control">
                <label for="type">รุ่น</label>
                <input type="text" class="form-control">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> &nbsp;&nbsp;ปิดแท็ป</button>
                <button type="button" class="btn bg-gradient-success"><i class="fas fa-save"></i> &nbsp;&nbsp;บันทึกข้อมูล</button>
              </div>
            </div>
          </div>
        </div>
        <!-- end model -->
        <!-- Modal -->
        <div class="modal fade" id="updatedata" tabindex="-1" role="dialog" aria-labelledby="updatedataLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <b><i class="fas fa-edit text-warning"></i> แก้ไขข้อมูล {{$name_page}}</b> <br>
                <!-- <label for="type">รูปภาพ</label>
                <input type="file" class="form-control"> -->
                <label for="type">ประเภทรถ</label>
                <input type="text" class="form-control">
                <label for="type">รุ่น</label>
                <input type="text" class="form-control">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> &nbsp;&nbsp;ปิดแท็ป</button>
                <button type="button" class="btn bg-gradient-success"><i class="fas fa-save"></i> &nbsp;&nbsp;อัพเดท
                  ข้อมูล</button>
              </div>
            </div>
          </div>
        </div>
        <!-- end model -->
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                    #
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                    สถานะรถ
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                    ข้อมูล
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                    ท้าย
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                    ซิว
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                    รูปภาพขวา/ซ้าย
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                    สำเนา
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                    สถานะการขาย
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                    จัดการ
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="ps-4">
                    <p class="text-xs font-weight-bold mb-0">1</p>
                  </td>
                  <td class="text-center">
                    <p class="text-xs font-weight-bold mb-0 badge rounded-pill bg-success">พร้อมขาย</p>
                  </td>
                  <td class="text-center">
                    <span class="text-secondary text-xs font-weight-bold">รถใหม่</span>
                  </td>
                  <td class="text-center">
                    <span class="text-secondary text-xs font-weight-bold">เดิม</span>
                  </td>
                  <td class="text-center">
                    <span class="text-secondary text-xs font-weight-bold">แต่ง</span>
                  </td>
                  <td class="text-center">
                    <div>
                      <img src="https://www.greatbiker.com/wp-content/uploads/2020/10/cbr650r.jpg" width="80px">
                    </div>
                  </td>
                  <td class="text-center">
                    <span class="text-secondary text-xs font-weight-bold">file</span>
                  </td>
                  <td class="text-center">
                    <span class="text-white text-xs font-weight-bold badge rounded-pill bg-danger">ติดจอง</span>
                  </td>
                  <td class="text-center">
                    <a href="#" class="btn bg-gradient-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updatedata">
                      <i class="fa-lg fas fa-edit text-white" style="font-size: 10px;"></i>
                    </a>
                    <a href="#" class="btn bg-gradient-danger btn-sm" data-bs-toggle="tooltip" data-bs-original-title="ลบข้อมูล">
                      <i class="fa-lg cursor-pointer fas fa-trash text-white" style="font-size: 10px;"></i>
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