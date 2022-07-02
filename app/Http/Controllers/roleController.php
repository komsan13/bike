<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\roleModel;
use App\Models\menuModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class roleController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'role';
    protected $folder = 'role';
    protected $name_page = "รายการบทบามหน้าที่";

    public function role(Request $request)
    {
        $menu_add = DB::select('select menu_add from menu where role_name = "' . Auth::user()->lavel . '" and menu_name = "role"'); // สิทการเพิ่มข้อมูล
        $menu_delete = DB::select('select menu_delete from menu where role_name = "' . Auth::user()->lavel . '" and menu_name = "role"'); // สิทการเพิ่มข้อมูล
        $menu_edit = DB::select('select menu_edit from menu where role_name = "' . Auth::user()->lavel . '" and menu_name = "role"'); // สิทการเพิ่มข้อมูล
        $users = DB::select('select status from users where email = "' . Auth::user()->email . '"');
        return view("$this->prefix.$this->folder.role", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'role' => roleModel::all(),
            'menu_add' => $menu_add,
            'menu_delete' => $menu_delete,
            'menu_edit' => $menu_edit,
            'status' => $users,
        ]);
    }

    public function role_add(Request $request)
    {
        $check = DB::select('select * from roles where role_name = "' . $request->role_name . '"');
        if ($check) {
            return redirect()->back()->with('error', 'ข้อมูลดังกล่าวถูกเพิ่มแล้ว !');
        } else {
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
    }

    public function role_select($id)
    {
        return roleModel::where(['id' => $id])->get();
    }

    public function menu_select($id)
    {
        return menuModel::where(['id' => $id])->get();
    }

    public function menu_add(Request $request)
    {
        $check = DB::select('select * from menu where role_name = "' . $request->role_name . '" and menu_name = "' . $request->menu_name . '"');
        if ($check) {
            return redirect()->back()->with('error', 'ข้อมูลดังกล่าวถูกเพิ่มแล้ว !');
        } else {
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
            'id' => $request->id,
            'status' => roleModel::where(['role_name' => $request->role_name])->get(),
        ]);
    }

    public function role_update(Request $request){
        $data = roleModel::find($request->id);
        $data->role_name = $request->role_name;
        $data->status = $request->status;
        if ($data->save()) {
            DB::commit();
            return redirect()->back()->with('success', 'อัพเดทข้อมูลบาทหน้าที่เรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด !');
        }
    }

    public function menu_update(Request $request){
        $data = menuModel::find($request->id);
        $data->menu_add = $request->menu_add;
        $data->menu_delete = $request->menu_delete;
        $data->menu_edit = $request->menu_edit;
        $data->menu_report= $request->menu_report;
        if ($data->save()) {
            DB::commit();
            return redirect()->back()->with('success', 'อัพเดทข้อมูลบาทหน้าที่เรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด !');
        }
    }
}
