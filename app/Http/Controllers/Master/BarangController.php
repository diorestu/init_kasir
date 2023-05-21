<?php

namespace App\Http\Controllers\Master;

use DataTables;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
   public function index(Request $request)
   {
      if ($request->ajax()) {
         $data = Barang::with(['kategori', 'merk'])->orderBy('nama', 'ASC');
         return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
               return '<form action="' . route('master.barang.destroy', $row->id) . '" class="d-flex justify-content-center align-items-center" method="post">
               ' . csrf_field() . '
               ' . method_field("DELETE") . '
                  <a href="' . route('master.barang.edit', $row->id) . '" class="btn btn-xs">
                     <i class="ti ti-edit-circle text-secondary fw-normal"></i>
                  </a>
                  <button type="submit" class="btn btn-xs"><i class="ti ti-trash-x text-danger fw-normal"></i></button>
               </form>';
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
      try {
         DB::beginTransaction();
         $validator = Validator::make($request->all(), [
            'nama'        => 'required|max:100',
            'deskripsi'   => 'max:160',
            'kategori_id' => 'numeric',
            'merek_id'    => 'numeric',
         ]);

         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
         }
         $input = $validator->validated();
         $input['user_id'] = Auth::user()->id;
         Barang::create($input);
         DB::commit();
         return redirect()->route('master.barang.index')->with('success', 'Berhasil Tambah Barang!');
      } catch (\Throwable $th) {
         DB::rollback();
         Log::debug(Auth::user()->name . ' at BarangController store() ' . $th->getMessage());
         return redirect()->route('master.barang.index')->with('error', 'Gagal: ' . $th->getMessage());
      }
   }

   public function show($id)
   {
      //
   }

   public function edit($id)
   {
      $data = Barang::findOrFail($id);
      return view('pages.barang.edit', compact('data'));
   }

   public function update(Request $request, $id)
   {
      try {
         DB::beginTransaction();
         $validator = Validator::make($request->all(), [
            'nama'        => 'required|max:100',
            'deskripsi'   => 'max:160',
            'kategori_id' => 'numeric',
            'merek_id'    => 'numeric',
         ]);

         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
         }
         $data = $validator->validated();
         Barang::find($id)->update($data);
         DB::commit();
         return redirect()->route('master.barang.index')->with('success', 'Data Berhasil Diedit');
      } catch (Throwable $e) {
         DB::rollback();
         Log::debug(Auth::user()->name . ' at BarangController update() ' . $e->getMessage());
         return redirect()->route('master.barang.index')->with('error', $e->getMessage());
      }
   }

   public function destroy($id)
   {
      try {
         DB::beginTransaction();
         Barang::findOrFail($id)->delete();
         DB::commit();
         return redirect()->route('master.barang.index')->with('success', 'Berhasil Hapus Barang!');
      } catch (\Throwable $e) {
         DB::rollback();
         Log::debug('BarangController destroy() ' . $e->getMessage());
         return redirect()->route('master.barang.index')->with('error', 'Gagal: ' . $e->getMessage());
      }
   }
}
