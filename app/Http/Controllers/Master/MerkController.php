<?php

namespace App\Http\Controllers\Master;

use DataTables;
use App\Models\Merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class MerkController extends Controller
{
   public function index(Request $request)
   {
      if ($request->ajax()) {
         $data = Merk::query();
         return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
               return '<form action="' . route('master.merk.destroy', $row->id) . '" class="d-flex justify-content-center align-items-center" method="post">
               ' . csrf_field() . '
               ' . method_field("DELETE") . '
                  <a href="' . route('master.merk.edit', $row->id) . '" class="btn btn-xs px-1">
                     <i class="ti ti-edit-circle text-secondary fw-normal"></i>
                  </a>
                  <button type="submit" class="btn btn-xs px-1"><i class="ti ti-trash-x text-danger fw-normal"></i></button>
               </form>';
            })
            ->rawColumns(['action'])
            ->make(true);
      }
      return view('pages.merk.index');
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   public function store(Request $request)
   {
      try {
         DB::beginTransaction();
         $validator = Validator::make($request->all(), [
            'kategori'   => 'required|max:120',
            'keterangan' => 'max:250',
         ]);

         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
         }

         $input = $validator->validated();
         $input['user_id'] = Auth::user()->id;
         Merk::create($input);
         DB::commit();
         return redirect()->route('master.merk.index')->with('success', 'Berhasil Tambah Kategori!');
      } catch (\Throwable $th) {
         DB::rollback();
         Log::debug(Auth::user()->name . ' at KategoriController store() ' . $th->getMessage());
         return redirect()->route('master.merk.index')->with('error', 'Gagal: ' . $th->getMessage());
      }
   }

   public function show($id)
   {
      //
   }

   public function edit($id)
   {
      $data = Merk::findOrFail($id);
      return view('pages.merk.edit', compact('data'));
   }

   public function update(Request $request, $id)
   {
      try {
         DB::beginTransaction();
         $validator = Validator::make($request->all(), [
            'kategori'   => 'required|max:120',
            'keterangan' => 'max:250',
         ]);

         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
         }
         $data = $validator->validated();
         Merk::find($id)->update($data);
         DB::commit();
         return redirect()->route('master.merk.index')->with('success', 'Data Berhasil Diedit');
      } catch (Throwable $e) {
         DB::rollback();
         Log::debug(Auth::user()->name . ' at KategoriController update() ' . $e->getMessage());
         return redirect()->route('master.merk.index')->with('error', $e->getMessage());
      }
   }

   public function destroy($id)
   {
      try {
         DB::beginTransaction();
         Barang::findOrFail($id)->delete();
         DB::commit();
         return redirect()->route('master.merk.index')->with('success', 'Berhasil Hapus Kategori!');
      } catch (\Throwable $e) {
         DB::rollback();
         Log::debug('KategoriController destroy() ' . $e->getMessage());
         return redirect()->route('master.merk.index')->with('error', 'Gagal: ' . $e->getMessage());
      }
   }
}
