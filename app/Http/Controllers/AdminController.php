<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Pesan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get(); 
        $users = User::all();
        $pesan = Pesan::all();
        return view('Admin.page.DataPost', compact('blogs', 'users', 'pesan'));
    }

 

    public function store(Request $request)
{
    $request->validate([
        "title" => "required|string|max:255",
        "category" => "required|in:general,entertainment,health,science,sports,technology",
        "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:3048",
        "description" => "required|string",
        "tanggal" => "required|date"
    ]);

    // Upload dan simpan gambar
    $image = $request->file('image');
    $new_name = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('images'), $new_name);

    // Simpan data ke dalam database
    Blog::create([
        'title' => $request->title,
        'category' => $request->category,  // Menambahkan category
        'image' => $new_name,
        'description' => $request->description,
        'tanggal' => $request->tanggal,
        'user_id' => auth()->id(), // Tambahkan user_id dari pengguna yang sedang login
    ]);

    return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
}

public function showPesan(){
    $pesan = Pesan::all();
    return view('Admin.page.Pesan', compact('pesan'));
}

    public function show($id)
    {
        $blog = Blog::find($id);
        return view('Admin.page.Show-Post', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('Admin.page.Edit-Post', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required|in:general,entertainment,health,science,sports,technology',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'tanggal' => 'required|date'
        ]);

        $blog = Blog::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $blog->image = $new_name;
        }
      
        $blog->title = $request->title;
        $blog->category = $request->category;  // Mengupdate category
        $blog->description = $request->description;
        $blog->tanggal = $request->tanggal;
        $blog->save();

        return redirect()->back()->with('success', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return response()->json(['success' => true]);
    }
}

