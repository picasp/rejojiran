<?php
  
namespace App\Http\Controllers;
  
use App\Models\Article;
use App\Models\Author;
use App\Models\User;
use App\Models\Bidang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
  
class BidangController extends Controller
{
    public function index(Request $request): View
    {
        $bidang = Bidang::all();
        return view('admin.bidang', compact('bidang'));
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_bidang'     => 'required'
        ]);

        //create post
        Bidang::create([
            'nama_bidang'     => $request->nama_bidang
        ]);

        return redirect()->route('bidang.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id)
    {

        $bidang = Bidang::findOrFail($id);
        return response()->json($bidang);
    }

    public function update(Request $request, $id)
    {
        $bidang = Bidang::findOrFail($id);
        $bidang->nama_bidang = $request->input('nama_bidang');
        $bidang->save();

        return response()->json(['success' => 'Data bidang berhasil diupdate']);
    }
}