<?php
  
namespace App\Http\Controllers;
  
use App\Models\Article;
use App\Models\Author;
use App\Models\User;
use App\Models\Jurusan;
use App\Models\Bidang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
  
class JurusanController extends Controller
{
    public function index(Request $request): View
    {
        $jurusan = Jurusan::with('bidang')->get();
        // $jurusan = Jurusan::all();
        $bidang = Bidang::all();
        return view('admin.jurusan', compact('jurusan'), compact('bidang'));
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_jurusan'     => 'required',
            'id_bidang'   => 'required'
        ]);

        //create post
        Jurusan::create([
            'nama_jurusan'     => $request->nama_jurusan,
            'id_bidang' => $request->id_bidang
        ]);

        return redirect()->route('jurusan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id)
    {

        $jurusan = Jurusan::findOrFail($id);
        return response()->json($jurusan);
    }

    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->nama_jurusan = $request->input('nama_jurusan');
        $jurusan->id_bidang = $request->input('id_bidang');
        $jurusan->save();

        return response()->json(['success' => 'Data Jurusan berhasil diupdate']);
    }
}