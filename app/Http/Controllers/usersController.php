<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usersController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'users';
    protected $folder = 'users';
    protected $name_page = "รายการผู้ดูแล";

    public function users(Request $request)
    {
        return view("$this->prefix.$this->folder.users", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
        ]);
    }
}
