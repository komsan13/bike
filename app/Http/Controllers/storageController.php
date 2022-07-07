<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StorageModel;
use App\Models\accessoriesModel;
use App\Models\typesModel;
use Illuminate\Support\Facades\Response;
// use Response;
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
        $row = DB::select('SELECT storages.id, storages.invoice, storages.img, types.type, types.model, types.year, types.color, storages.price, storages.status, storages.created_at FROM storages LEFT JOIN types ON storages.type_id = types.id');
        $menu_add = DB::select('select menu_add from menu where role_name = "' . Auth::user()->lavel . '" and menu_name = "storage"'); // สิทการเพิ่มข้อมูล
        $menu_delete = DB::select('select menu_delete from menu where role_name = "' . Auth::user()->lavel . '" and menu_name = "storage"'); // สิทการเพิ่มข้อมูล
        $menu_edit = DB::select('select menu_edit from menu where role_name = "' . Auth::user()->lavel . '" and menu_name = "storage"'); // สิทการเพิ่มข้อมูล
        $users = DB::select('select status from users where email = "' . Auth::user()->email . '"');
        return view("$this->prefix.$this->folder.storage", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'storages' => $row,
            'type' => typesModel::all(),
            'menu_add' => $menu_add,
            'menu_delete' => $menu_delete,
            'menu_edit' => $menu_edit,
            'status' => $users,
        ]);
    }


    public function storage_add(Request $request)
    {
        function invoice_num($input, $pad_len = 3, $prefix = null)
        {
            if ($pad_len <= strlen($input))
                trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);

            if (is_string($prefix))
                return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));

            return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
        }

        DB::beginTransaction();

        $date = date("y") . date("m");
        $chk = DB::select('select storages_id from storages where date = "' . $date . '"');
        $count = count($chk);
        // $invoice = $date."-".$chk;
        if ($chk == NULL) {
            $storages_id = 1;
        } else {
            // foreach($chk as $row){
            $storages_id = $count + 1;
            // }
        }
        $parseNum = invoice_num($storages_id);
        $invoice = $date . "-" . $parseNum;

        $file = $request->img;
        if ($file != "") {
            $filename = rand(1000, 9999) . date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
        }

        $file_transcript = $request->transcript;
        if ($file_transcript != "") {
            $filename_transcript = rand(1000, 9999) . date('YmdHi') . $file_transcript->getClientOriginalName();
            $file_transcript->move(public_path('public/Image'), $filename_transcript);
        }
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
        // $data->accessories_id = $invoice;
        $data->expire_date = $request->expire_date;
        $data->book = $request->book;
        $data->date = $date;
        $data->invoice = $invoice;

        if ($request->img != '') {
            $data->img = $filename;
        }
        if ($request->transcript != '') {
            $data->transcript = $filename_transcript;
        }

        $data1 = new accessoriesModel();
        $data1->invoice = $invoice;
        $data1->pipe = $request->pipe;
        $data1->hand = $request->hand;
        $data1->glass = $request->glass;
        $data1->acc_keys = $request->acc_keys;
        $data1->rear = $request->rear;
        $data1->shield = $request->shield;
        $data1->seat = $request->seat;
        $data1->other = $request->other;

        // }
        if ($data->save() && $data1->save()) {
            DB::commit();
            return redirect()->back()->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด !');
        }
    }

    public function storage_delete($id)
    {
        $data = StorageModel::find($id);
        $data->status = '0';
        if ($data->save()) {
            DB::commit();
            return redirect()->back()->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด !');
        }
    }

    public function storage_edit($id)
    {
        $arr = DB::select('SELECT * FROM storages LEFT JOIN types ON storages.type_id = types.id LEFT JOIN accessories ON storages.invoice = accessories.invoice WHERE storages.id = "' . $id . '"');
        return $arr;
    }

    public function storage_update(Request $request)
    {
        $file = $request->img;
        if ($file != "") {
            $filename = rand(1000, 9999) . date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
        } else {
            $filename = $request->e_img;
        }

        $file_transcript = $request->transcript;
        if ($file_transcript != "") {
            $filename_transcript = rand(1000, 9999) . date('YmdHi') . $file_transcript->getClientOriginalName();
            $file_transcript->move(public_path('public/Image'), $filename_transcript);
        } else {
            $filename_transcript = $request->e_transcript;
        }

        $update_str = DB::update('update storages set
        type_id = "' . $request->type_id . '",
        model_number = "' . $request->model_number . '",
        tank_number = "' . $request->tank_number . '",
        mile = "' . $request->mile . '",
        price = "' . $request->price . '",
        down = "' . $request->down . '",
        finance = "' . $request->finance . '",
        interest = "' . $request->interest . '",
        discount = "' . $request->discount . '",
        expire_date = "' . $request->expire_date . '",
        status = "' . $request->status . '",
        book = "' . $request->book . '",
        img = "' . $filename . '",
        transcript = "' . $filename_transcript . '"
        where invoice = "' . $request->invoice . '"
        ');

        $update_acc = DB::update('update accessories set
        pipe = "' . $request->pipe . '",
        hand = "' . $request->hand . '",
        glass = "' . $request->glass . '",
        acc_keys = "' . $request->acc_keys . '",
        rear = "' . $request->rear . '",
        shield = "' . $request->shield . '",
        seat = "' . $request->seat . '",
        other = "' . $request->other . '"
        where invoice = "' . $request->invoice . '"
        ');

        if ($update_str == true || $update_acc == true) {
            return redirect()->back()->with('success', 'อัพเดทข้อมูลเรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error', 'ไม่มีการเปลี่ยนแปลงข้อมูล !');
        }
    }
}
