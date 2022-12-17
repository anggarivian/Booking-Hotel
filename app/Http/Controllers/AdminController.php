<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Models\User;
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

    public function reservation()
    {
        $user = Auth::user();
        $user = User::all();
        return view('reservation', compact('user'));
    }

    public function user()
      {
        $user = Auth::user();
        return view('user', compact('user'));
      }

    public function submit_user(Request $req){

        $validate = $req->validate([
            'name' => 'required|max:255',
            'email' =>'required',
            'phone' =>'required',
            'address' =>'required',
        ]);

        $user = new User;

        $user->name = $req->get('name');
        $user->email = $req->get('email');
        $user->phone = $req->get('phone');
        $user->address = $req->get('address');

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

    // public function getDataUser($id){

    //     $user = User::find($id);
        
    //     return response()->json($user);
    // }

    // public function update_book(Request $req) { 

    //     $book = Book::find($req->get('id'));

    //     $validate = $req->validate([
    //         'judul' => 'required|max:255', 
    //         'penulis' => 'required', 
    //         'tahun' => 'required', 
    //         'penerbit' => 'required', 
    //     ]);

    //     $book->judul = $req->get('judul'); 
    //     $book->penulis = $req->get('penulis'); 
    //     $book->tahun = $req->get('tahun'); 
    //     $book->penerbit = $req->get('penerbit'); 

    //     if ($req->hasFile('cover')) {
    //         $extension = $req->file('cover')->extension(); 
    //         $filename = 'cover_buku_'.time().'.'.$extension;
    //         $req->file('cover')->storeAs('public/cover_buku', $filename ); 
            
    //         Storage::delete('public/cover_buku/'.$req->get('old_cover')); 
    //         $book->cover = $filename; 
    //     } 
        
    //     $book->save(); 

    //     $notification = array( 
    //         'message' => 'Data buku berhasil diubah', 
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('admin.books')->with($notification);
    // }


    // public function delete_book($id) { 

    //     $book = Book::find($id); 

    //     Storage::delete('public/cover_buku/'.$book->cover);
        
    //     $book->delete(); 
        
    //     $success = true; 
    //     $message = "Data buku berhasil dihapus"; 
        
    //     return response()->json([ 
    //         'success' => $success, 
    //         'message' => $message, 
    //     ]); 
    // }

    // public function print_books(){
        
    //     $books = Book::all();

    //     $pdf = PDF::loadview('print_books',['books'=> $books]);

    //     return $pdf->download('data-buku.pdf');
    // }
}