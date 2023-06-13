<?php

namespace App\Http\Controllers\Master;

use DataTables;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
   public function index(Request $request)
   {
      if ($request->ajax()) {
         $data = Kategori::query();
         return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
               return '<form action="' . route('master.barang.destroy', $row->id) . '" class="d-flex justify-content-center align-items-center" method="post">
               ' . csrf_field() . '
               ' . method_field("DELETE") . '
                  <a href="' . route('master.barang.edit', $row->id) . '" class="btn btn-xs px-1">
                     <i class="ti ti-edit-circle text-secondary fw-normal"></i>
                  </a>
                  <button type="submit" class="btn btn-xs px-1"><i class="ti ti-trash-x text-danger fw-normal"></i></button>
               </form>';
            })
            ->rawColumns(['action'])
            ->make(true);
      }
      return view('pages.kategori.index');
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
            'kategori'   => 'required|max:120',
            'keterangan' => 'max:250',
         ]);

         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
         }

         $input = $validator->validated();
         $input['user_id'] = Auth::user()->id;
         Kategori::create($input);
         DB::commit();
         return redirect()->route('master.kategori.index')->with('success', 'Berhasil Tambah Kategori!');
      } catch (\Throwable $th) {
         DB::rollback();
         Log::debug(Auth::user()->name . ' at KategoriController store() ' . $th->getMessage());
         return redirect()->route('master.kategori.index')->with('error', 'Gagal: ' . $th->getMessage());
      }
   }

   public function show($id)
   {
      //
   }

   public function edit($id)
   {
      $data = Kategori::findOrFail($id);
      return view('pages.kategori.edit', compact('data'));
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
         Kategori::find($id)->update($data);
         DB::commit();
         return redirect()->route('master.kategori.index')->with('success', 'Data Berhasil Diedit');
      } catch (Throwable $e) {
         DB::rollback();
         Log::debug(Auth::user()->name . ' at KategoriController update() ' . $e->getMessage());
         return redirect()->route('master.kategori.index')->with('error', $e->getMessage());
      }
   }

   public function destroy($id)
   {
      try {
         DB::beginTransaction();
         Barang::findOrFail($id)->delete();
         DB::commit();
         return redirect()->route('master.kategori.index')->with('success', 'Berhasil Hapus Kategori!');
      } catch (\Throwable $e) {
         DB::rollback();
         Log::debug('KategoriController destroy() ' . $e->getMessage());
         return redirect()->route('master.kategori.index')->with('error', 'Gagal: ' . $e->getMessage());
      }
   }
}
