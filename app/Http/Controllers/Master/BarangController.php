<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use DataTables;

class BarangController extends Controller
{
   public function index(Request $request)
   {
      if ($request->ajax()) {
         $data = Barang::query();
         return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
               return '<a href="' . route('master.barang.edit', $row->id) . '" class=""><i class="bx bx-dots-vertical-rounded text-reset bx-md"></i></a>';
            })
            ->rawColumns(['action'])
            ->make(true);
      }
      return view('pages.barang.index');
   }

   public function create()
   {
      //
   }


   public function store(Request $request)
   {
      //
   }

   public function show($id)
   {
      //
   }

   public function edit($id)
   {
      //
   }

   public function update(Request $request, $id)
   {
      //
   }

   public function destroy($id)
   {
      //
   }
}
