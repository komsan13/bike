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


    public function storage_add(Request $request)
    {
        function invoice_num ($input, $pad_len = 3, $prefix = null) {
            if ($pad_len <= strlen($input))
                trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);

            if (is_string($prefix))
                return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));

            return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
        }

        DB::beginTransaction();

        $date = date("y") . date("m");
        $chk = DB::select('select storages_id from storages where date = "'.$date.'"');
        $count = count($chk);
        // $invoice = $date."-".$chk;
        if ($chk == NULL) {
            $storages_id = 1;
        }else{
            // foreach($chk as $row){
            $storages_id = $count+1;
            // }
        }
        $parseNum = invoice_num($storages_id);
        $invoice = $date."-".$parseNum;

        $file = $request->img;
        $filename = rand(1000, 9999) . date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('public/Image'), $filename);

        $file_transcript = $request->transcript;
        $filename_transcript = rand(1000, 9999) . date('YmdHi') . $file_transcript->getClientOriginalName();
        $file_transcript->move(public_path('public/Image'), $filename_transcript);
        // foreach ($chk as $row) {
        // $nameImage['image']= $filename;
        $data = new StorageModel();
        $data->storages_id = $storages_id;
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
        $data->date = $date;
        $data->invoice = $invoice;
        $data->img = $filename;
        $data->transcript = $filename_transcript;
        // }
        if ($data->save()) {
            DB::commit();
            return redirect()->back()->with('success', 'บันทึกข้อมูลประเภทรถเรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด !');
        }
    }
}
