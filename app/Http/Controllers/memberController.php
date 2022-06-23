<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        ]);
    }
}
