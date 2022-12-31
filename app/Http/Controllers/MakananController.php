<?php
  
namespace App\Http\Controllers;
  
use App\Models\Makanan;
use Illuminate\Http\Request;
  
class MakananController extends Controller
{

    public function index()
    {
        $makanan = Makanan::latest()->paginate(5);
      
        return view('makanan.index',compact('makanan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    public function create()
    {
        return view('makanan.create');
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'nama_makan' => 'required',
            'kode_makan' => 'required',
            'harga_makan' => 'required',
            'jumlah_makan' => 'required',
        ]);
      
        Makanan::create($request->all());
       
        return redirect()->route('makanan.index')
                        ->with('success','Makanan telah dibuat.');
    }
  
    public function show(Makanan $makanan)
    {
        return view('makanan.show',compact('makanan'));
    }
  
    public function edit(Makanan $makanan)
    {
        return view('makanan.edit',compact('makanan'));
    }

    public function update(Request $request, Makanan $makanan)
    {
        $request->validate([
            'nama_makan' => 'required',
            'kode_makan' => 'required',
            'harga_makan' => 'required',
            'jumlah_makan' => 'required',
        ]);
      
        $makanan->update($request->all());
      
        return redirect()->route('makanan.index')
                        ->with('success','Makanan telah diupdate');
    }

    public function destroy(Makanan $makanan)
    {
        $makanan->delete();
       
        return redirect()->route('makanan.index')
                        ->with('success','Makanan telah dihapus');
    }
}