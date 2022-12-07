<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Role;
use App\Models\Element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class HeroController extends Controller
{
    public function index()
    {
        $datas = DB::select('select * from heroview where deleted_at is null');
        return view('hero.index',['datas'=>$datas]);
    }

    public function create()
    {
        $heros = DB::select('select * from hero');
        $roles = DB::select('select * from role');
        $elements = DB::select('select * from element');
        return view('hero.add',['heros'=>$heros, 'roles'=>$roles, 'elements'=>$elements]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_hero' => 'required', 
            'nama_hero' => 'required', 
            'id_role' => 'required',
            'id_element' => 'required', 
        ]);
        DB::insert('INSERT INTO hero(id_hero, nama_hero, id_role, id_element) VALUES (:id_hero, :nama_hero, :id_role, :id_element)', 
        [ 
            'id_hero' => $request->id_hero, 
            'nama_hero' => $request->nama_hero,
            'id_role' => $request->id_role,
            'id_element' => $request->id_element,
        ]); 
        return redirect('/');
    }

    public function edit($id)
    {
        $heros = DB::select('select * from hero where id_hero = ?',[$id]);
        $roles = DB::select('select * from role');
        $elements = DB::select('select * from element');
        return view('hero.edit',['heros'=>$heros, 'roles'=>$roles, 'elements'=>$elements]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_hero' => 'required', 
            'nama_hero' => 'required', 
            'id_role' => 'required',
            'id_element' => 'required', 
        ]);

        DB::update('UPDATE hero SET id_hero =  :id_hero, nama_hero = :nama_hero, id_role = :id_role,  id_element = :id_element WHERE id_hero = :id', 
        [
            'id' => $request->id,
            'id_hero' => $request->id_hero, 
            'nama_hero' => $request->nama_hero,
            'id_role' => $request->id_role,
            'id_element' => $request->id_element,
        ]);
        return redirect()->route('index');
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM hero WHERE id_hero = :id_hero', ['id_hero' => $id]);
        return redirect()->route('removed');
    }

    public function softDelete($id) {
        DB::update('UPDATE heroview SET deleted_at = now() WHERE id_hero = :id_hero', ['id_hero' => $id]);
        return redirect()->route('index');
    }

    public function restore($id){
        DB::update('UPDATE hero SET deleted_at = null WHERE id_hero = :id_hero', ['id_hero' => $id]);
        return redirect()->route('index');
    }

    public function removeIndex() {
        $datas = DB::select('SELECT * FROM heroview where deleted_at is not null');
        return view('hero.deleted')->with('datas', $datas);
    }

    public function search(Request $request) {
        $search = $request->search;

        $datas = DB::table('heroview')
        ->where('id_hero', 'like', "%$search%")
        ->orWhere('nama_hero', 'like', "%$search%")
        ->orWhere('nama_role', 'like', "%$search%")
        ->orWhere('nama_element', 'like', "%$search%")
        ->get();

        return view('hero.index')->with('datas', $datas);
    }
}
