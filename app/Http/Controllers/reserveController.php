<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reserveController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'reserve';
    protected $folder = 'reserve';
    protected $name_page = "รายการใบจอง/มัดจำ";

    public function reserve(Request $request)
    {
        return view("$this->prefix.$this->folder.reserve", [
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'name_page' => $this->name_page,
        ]);
    }
}
