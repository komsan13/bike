<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}
