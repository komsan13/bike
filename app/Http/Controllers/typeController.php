<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\typesModel;
use Illuminate\Support\Facades\DB;

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
        return view("$this->prefix.$this->folder.type", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'types' => $types,
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
