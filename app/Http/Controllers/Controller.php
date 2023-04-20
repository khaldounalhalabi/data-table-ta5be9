<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function test(): int
    {
        Session::flush();
        return 1 ;
    }
}
