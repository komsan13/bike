<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\typesModel;
use App\Models\menuModel;
use App\Models\usersModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class typeController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'type';
    protected $folder = 'type';
    protected $name_page = "รายการประเภทรถ";

    public function type(Request $request)
    {
        $types = typesModel::all();
        $menu_add = DB::select('select menu_add from menu where role_name = "'.Auth::user()->lavel.'" and menu_name = "type"'); // สิทการเพิ่มข้อมูล
        $menu_delete = DB::select('select menu_delete from menu where role_name = "'.Auth::user()->lavel.'" and menu_name = "type"'); // สิทการเพิ่มข้อมูล
        $menu_edit = DB::select('select menu_edit from menu where role_name = "'.Auth::user()->lavel.'" and menu_name = "type"'); // สิทการเพิ่มข้อมูล
        $users = DB::select('select status from users where email = "'. Auth::user()->email .'"');
        return view("$this->prefix.$this->folder.type", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'types' => $types,
            'menu_add' => $menu_add,
            'menu_delete' => $menu_delete,
            'menu_edit' => $menu_edit,
            'status' => $users,
        ]);
    }

    public function type_add(Request $request)
    {
        DB::beginTransaction();
        $data = new typesModel();
        $data->type = $request->type;
        $data->model = $request->model;
        $data->year = $request->year;
        $data->color = $request->color;
        $data->cc = $request->cc;
        if ($data->save()) {
            DB::commit();
            return redirect()->back()->with('success', 'บันทึกข้อมูลประเภทรถเรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด !');
        }
    }

    public function type_delete(Request $request)
    {
        $query = typesModel::destroy($request->id);

        if (@$query) {
            return redirect()->back()->with('success', 'ลบมูลประเภทรถเรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด !');
        }
    }

    public function type_edit(Request $request, $id)
    {
        return typesModel::where(['id' => $id])->get();
    }

    public function type_update(Request $request)
    {
        $data = typesModel::find($request->id);
        $data->type = $request->type;
        $data->model = $request->model;
        $data->year = $request->year;
        $data->color = $request->color;
        $data->cc = $request->cc;
        if ($data->save()) {
            DB::commit();
            return redirect()->back()->with('success', 'อัพเดทข้อมูลประเภทรถเรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด !');
        }
    }
}
