<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        ]);
    }
}
