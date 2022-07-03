<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StorageModel;
use App\Models\typesModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class storageController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'storage';
    protected $folder = 'storage';
    protected $name_page = "รายการสต๊อกสินค้า";


    public function storage(Request $request)
    {
        return view("$this->prefix.$this->folder.storage", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'storages' => StorageModel::all(),
            'type' => typesModel::all(),
        ]);
    }

    // public function save(Request $request)
    // {

    //     $validatedData = $request->validate([
    //      'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

    //     ]);

    //     $name = $request->file('image')->getClientOriginalName();

    //     $path = $request->file('image')->store('public/images');


    //     $save = new Photo;

    //     $save->name = $name;
    //     $save->path = $path;

    //     $save->save();

    //     return redirect('upload-image')->with('status', 'Image Has been uploaded');

    // }


    public function storage_add(Request $request){
        DB::beginTransaction();
        $generate_id = date("y").date("m")."-"."001";
        $data = new StorageModel();
        $data->storages_id = $generate_id;
        $data->type_id = $request->type_id;
        $data->model_number = $request->model_number;
        $data->tank_number = $request->tank_number;
        $data->mile = $request->mile;
        $data->price = $request->price;
        $data->down = $request->down;
        $data->finance = $request->finance;
        $data->interest = $request->interest;
        $data->discount = $request->discount;
        $data->status = $request->status;
        $data->accessories_id = $request->accessories_id;
        $data->expire_date = $request->expire_date;
        $data->transcript = $request->transcript;
        if ($data->save()) {
            DB::commit();
            return redirect()->back()->with('success', 'บันทึกข้อมูลประเภทรถเรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด !');
        }




        // $file= $request->file('img');
        // $filename= date('YmdHi').$file->getClientOriginalName();
        // $file-> move(public_path('/Image'), $filename);
        // $data['img']= $filename;
        // dd($request->price());
    }
}
