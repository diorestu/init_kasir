<?php

namespace App\Http\Controllers\Kelola;

use DataTables;
use App\Models\Stok;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StokController extends Controller
{
   public function index(Request $request)
   {
      if ($request->ajax()) {
         $data = Stok::with(['barang'])->latest();
         return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
               return '<a href="' . route('kelola.stok.edit', $row->id) . '" class=""><i class="ti ti-edit-circle text-secondary fw-normal"></i></a>';
            })
            ->rawColumns(['action'])
            ->make(true);
      }
      return view('pages.stok.index');
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
