<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\roleModel;
use App\Models\menuModel;
use Illuminate\Support\Facades\DB;

class roleController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'role';
    protected $folder = 'role';
    protected $name_page = "รายการบทบามหน้าที่";

    public function role(Request $request)
    {
        return view("$this->prefix.$this->folder.role", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'role' => roleModel::all(),
        ]);
    }

    public function role_add(Request $request)
    {
        DB::beginTransaction();
        $data = new roleModel();
        $data->role_name = $request->role_name;
        $data->status = $request->status;
        if ($data->save()) {
            DB::commit();
            return redirect()->back()->with('success', 'บันทึกข้อมูลประเภทรถเรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด !');
        }
    }

    public function role_select($id)
    {
        return roleModel::where(['id' => $id])->get();
    }

    public function menu_add(Request $request)
    {
        DB::beginTransaction();
        $data = new menuModel();
        $data->role_name = $request->role_name;
        $data->menu_name = $request->menu_name;
        $data->menu_add = $request->menu_add;
        $data->menu_delete = $request->menu_delete;
        $data->menu_edit = $request->menu_edit;
        $data->menu_report = $request->menu_report;
        $data->status = "on";
        if ($data->save()) {
            DB::commit();
            return redirect()->back()->with('success', 'บันทึกข้อมูลบทบาทหน้าที่เรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด !');
        }
    }

    public function role_delete($id)
    {
        $query = roleModel::destroy($id);

        if (@$query) {
            return redirect()->back()->with('success', 'ลบมูลบทบาทหน้าที่เรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด !');
        }
    }
    public function role_edit(Request $request, $id)
    {
        return ([
            'role_name' => $request->role_name,
            'menu' => menuModel::where(['role_name' => $request->role_name])->get(),
        ]);
    }
}
