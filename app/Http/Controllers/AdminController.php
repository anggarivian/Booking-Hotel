<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Kamar;
use PDF;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home', compact('user'));
    }

    // CRUD User ---------------------------------------------------------------------------------------------------------------
    public function user(){
        $user = Auth::user();
        $user = User::all();
        return view('user', compact('user'));
    }

      public function submit_user(Request $req){

        $user = new User;

        $user->name = $req->get('name');
        $user->email = $req->get('email');
        $user->phone = $req->get('phone');
        $user->address = $req->get('address');
        $user->password = bcrypt('12345') ;
        $user->roles_id = 2 ;
        
        if($req->hasFile('picture')){
            $extension = $req->file('picture')->extension();

            $filename = 'picture_user'.time().'.'. $extension;

            $req->file('picture')->storeAs('public/picture_user', $filename);

            $user->picture = $filename;
        }

        $user->save();

        $notification = array(
            'message' =>'Data User berhasil ditambahkan', 'alert-type' =>'success'
        );

        return redirect()->route('admin.user')->with($notification);
    }

    public function getDataUser($id){

        $user = User::find($id);
        
        return response()->json($user);
    }

    public function update_user(Request $req) { 

        $user = User::find($req->get('id'));

        $user->name = $req->get('name');
        $user->email = $req->get('email');
        $user->phone = $req->get('phone');
        $user->address = $req->get('address');
        $user->password = bcrypt('12345') ;
        $user->roles_id = 2 ;

        if ($req->hasFile('picture')) {
            $extension = $req->file('picture')->extension(); 
            $filename = 'picture_user_'.time().'.'.$extension;
            $req->file('picture')->storeAs('public/picture_user', $filename ); 
            
            Storage::delete('public/picture_user/'.$req->get('old_picture')); 
            $user->picture = $filename; 
        } 
        
        $user->save(); 

        $notification = array( 
            'message' => 'Data User berhasil diubah', 
            'alert-type' => 'success'
        );

        return redirect()->route('admin.user')->with($notification);
    }

    public function delete_user($id) { 

        $user = User::find($id); 

        Storage::delete('public/picture_user/'.$user->cover);
        
        $user->delete(); 
        
        $success = true; 
        $message = "Data buku berhasil dihapus"; 
        
        return response()->json([ 
            'success' => $success, 
            'message' => $message, 
        ]); 
    }

    // CRUD Kamar ---------------------------------------------------------------------------------------------------------------
    public function kamar(){
        $user = Auth::user();
        $kamar = Kamar::all();
        return view('kamar', compact('user','kamar'));
    }

    public function submit_kamar(Request $req){

        $kamar = new Kamar;

        $kamar->kelas = $req->get('kelas');
        $kamar->status = 'Kosong';
        $kamar->harga = $req->get('harga');
        $kamar->fasilitas = $req->get('fasilitas');
        
        if($req->hasFile('picture')){
            $extension = $req->file('picture')->extension();

            $filename = 'picture_kamar'.time().'.'. $extension;

            $req->file('picture')->storeAs('public/picture_kamar', $filename);

            $kamar->picture = $filename;
        }

        $kamar->save();

        $notification = array(
            'message' =>'Data Kamar berhasil ditambahkan', 'alert-type' =>'success'
        );

        return redirect()->route('admin.kamar')->with($notification);
    }

    public function getDataKamar($id){

        $kamar = Kamar::find($id);
        
        return response()->json($kamar);
    }

    public function update_kamar(Request $req) { 

        $kamar = Kamar::find($req->get('id'));

        $kamar->kelas = $req->get('kelas');
        $kamar->status = 'Kosong';
        $kamar->harga = $req->get('harga');
        $kamar->fasilitas = $req->get('fasilitas');

        if ($req->hasFile('picture')) {
            $extension = $req->file('picture')->extension(); 
            $filename = 'picture_kamar_'.time().'.'.$extension;
            $req->file('picture')->storeAs('public/picture_kamar', $filename ); 
            
            Storage::delete('public/picture_kamar/'.$req->get('old_picture')); 
            $kamar->picture = $filename; 
        } 
        
        $kamar->save(); 

        $notification = array( 
            'message' => 'Data Kamar berhasil diubah', 
            'alert-type' => 'success'
        );

        return redirect()->route('admin.kamar')->with($notification);
    }

}