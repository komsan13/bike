<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usersModel;
use App\Models\roleModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class usersController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'users';
    protected $folder = 'users';
    protected $name_page = "รายการผู้ดูแล";

    public function users(Request $request)
    {
        $role = DB::select('select * from roles where status = "on"');
        $menu_add = DB::select('select menu_add from menu where role_name = "' . Auth::user()->lavel . '" and menu_name = "user"'); // สิทการเพิ่มข้อมูล
        $menu_delete = DB::select('select menu_delete from menu where role_name = "' . Auth::user()->lavel . '" and menu_name = "user"'); // สิทการเพิ่มข้อมูล
        $menu_edit = DB::select('select menu_edit from menu where role_name = "' . Auth::user()->lavel . '" and menu_name = "user"'); // สิทการเพิ่มข้อมูล
        $users = DB::select('select status from users where email = "' . Auth::user()->email . '"');
        return view("$this->prefix.$this->folder.users", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
            'role' => $role,
            'users' => usersModel::all(),
            'menu_add' => $menu_add,
            'menu_delete' => $menu_delete,
            'menu_edit' => $menu_edit,
            'status' => $users,
        ]);
    }

    public function users_add(Request $request)
    {
        // dd($request->all());
        $chk = DB::select('select * from users where email = "' . $request->email . '" || name = "' . $request->name . '"');
        if ($chk) {
            return redirect()->back()->with('error', 'ข้อมูลดังกล่าวถูกเพิ่มแล้ว !');
        } else {
            DB::beginTransaction();
            $data = new usersModel();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request['password']);
            $data->lavel = $request->lavel;
            $data->status = $request->status;
            if ($data->save()) {
                DB::commit();
                return redirect()->back()->with('success', 'บันทึกข้อมูลผู้ดูแลเรียบร้อยแล้ว');
            } else {
                return redirect()->back()->with('error', 'เกิดข้อผิดพลาด !');
            }
        }
    }

    public function users_delete(Request $request)
    {
        $query = usersModel::destroy($request->id);

        if (@$query) {
            return redirect()->back()->with('success', 'ลบมูลเรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด !');
        }
    }

    public function users_edit($id)
    {
        return usersModel::where(['id' => $id])->get();
    }

    public function users_update(Request $request)
    {
        $chk = DB::select('select * from users where email = "' . $request->email . '" and id != "' . $request->id . '"');
        if ($chk) {
            return redirect()->back()->with('error', 'ข้อมูลดังกล่าวถูกเพิ่มแล้ว !');
        } else {
            $data = usersModel::find($request->id);

            if ($request->lavel != 'admin') {
                $data->name = $request->name;
                $data->email = $request->email;
                $data->lavel = $request->lavel;
                $data->status = $request->status;

                if ($request->edit_pass != "") {
                    $data->password = bcrypt($request['edit_pass']);
                }
                if ($data->save()) {
                    DB::commit();
                    return redirect()->back()->with('success', 'อัพเดทข้อมูลรียบร้อยแล้ว');
                } else {
                    return redirect()->back()->with('error', 'เกิดข้อผิดพลาด !');
                }
            } else {
                return redirect()->back()->with('error', 'ไม่สามารถปิด status ระดับผู้ใช้ admin ได้ !');
            }
        }
    }
}
