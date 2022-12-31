<?php
  
namespace App\Http\Controllers;
  
use App\Models\Lain;
use Illuminate\Http\Request;
  
class LainController extends Controller
{

    public function index()
    {
        $lain = Lain::latest()->paginate(5);
      
        return view('lain.index',compact('lain'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    public function create()
    {
        return view('lain.create');
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'nama_lain' => 'required',
            'kode_lain' => 'required',
            'harga_lain' => 'required',
            'jumlah_lain' => 'required',
        ]);
      
        Lain::create($request->all());
       
        return redirect()->route('lain.index')
                        ->with('success','Lain telah dibuat.');
    }
  
    public function show(Lain $lain)
    {
        return view('lain.show',compact('lain'));
    }
  
    public function edit(Lain $lain)
    {
        return view('lain.edit',compact('lain'));
    }

    public function update(Request $request, Lain $lain)
    {
        $request->validate([
            'nama_lain' => 'required',
            'kode_lain' => 'required',
            'harga_lain' => 'required',
            'jumlah_lain' => 'required',
        ]);
      
        $lain->update($request->all());
      
        return redirect()->route('lain.index')
                        ->with('success','Lain telah diupdate');
    }

    public function destroy(Lain $lain)
    {
        $lain->delete();
       
        return redirect()->route('lain.index')
                        ->with('success','Lain telah dihapus');
    }
}