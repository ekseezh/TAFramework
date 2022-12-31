<?php
  
namespace App\Http\Controllers;
  
use App\Models\Minuman;
use Illuminate\Http\Request;
  
class MinumanController extends Controller
{

    public function index()
    {
        $minuman = Minuman::latest()->paginate(5);
      
        return view('minuman.index',compact('minuman'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    public function create()
    {
        return view('minuman.create');
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'nama_minum' => 'required',
            'kode_minum' => 'required',
            'harga_minum' => 'required',
            'jumlah_minum' => 'required',
        ]);
      
        Minuman::create($request->all());
       
        return redirect()->route('minuman.index')
                        ->with('success','Minuman telah dibuat.');
    }
  
    public function show(Minuman $minuman)
    {
        return view('minuman.show',compact('minuman'));
    }
  
    public function edit(Minuman $minuman)
    {
        return view('minuman.edit',compact('minuman'));
    }

    public function update(Request $request, Minuman $minuman)
    {
        $request->validate([
            'nama_minum' => 'required',
            'kode_minum' => 'required',
            'harga_minum' => 'required',
            'jumlah_minum' => 'required',
        ]);
      
        $minuman->update($request->all());
      
        return redirect()->route('minuman.index')
                        ->with('success','Minuman telah diupdate');
    }

    public function destroy(Minuman $minuman)
    {
        $minuman->delete();
       
        return redirect()->route('minuman.index')
                        ->with('success','Minuman telah dihapus');
    }
}