<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StorageModel;
use App\Models\typesModel;

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
}
