<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\membersModel;
use Illuminate\Support\Facades\DB;

class memberController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'member';
    protected $folder = 'member';
    protected $name_page = "รายการข้อมูลลูกค้า";

    public function member(Request $request)
    {
        return view("$this->prefix.$this->folder.member", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'members' => membersModel::all(),
        ]);
    }

    public function member_add(Request $request)
    {
        DB::beginTransaction();
        $data = new membersModel();
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->personal = $request->personal;
        if ($data->save()) {
            DB::commit();
            return redirect()->back()->with('success', 'บันทึกข้อมูลลูกค้าเรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด !');
        }
    }

    public function member_delete($id){
        $query = membersModel::destroy($id);

        if (@$query) {
            return redirect()->back()->with('success', 'ลบมูลลูกค้าเรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด !');
        }
    }

    public function member_edit($id){
        return membersModel::where(['id' => $id])->get();
    }

    public function member_update(Request $request){
        $data = membersModel::find($request->id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->personal = $request->personal;
        if ($data->save()) {
            DB::commit();
            return redirect()->back()->with('success', 'อัพเดทข้อมูลลูกค้าเรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด !');
        }
    }
}
