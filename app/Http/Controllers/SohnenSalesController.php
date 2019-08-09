<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SohnenSalesController extends Controller
{

    public function index(Request $request)
    {
       if ($request->ajax()) {

        $data = DB::select('exec [MiTech].[mi].[sp_SohnenSalesReport] ?,?',['2019-07-01','2019-09-01']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->setRowId(function ($data) {
                    return $data->MITProductSKU;
                })->make(true);
       }
    }
}
