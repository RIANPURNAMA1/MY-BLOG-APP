<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Blog::all();
       return view('Website.Page.Blogs', compact('data')); 
    }

    public function tentang(){
        return view('Website.Page.Blogs-Tentang');
    }
    public function search(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');
    
        // Query the Blog model, filtering by the search term if provided
        $data = Blog::when($search, function ($query) use ($search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })->get();
    
        // Return the view with the filtered data
        return view('Website.Page.Blogs-search', compact('data', 'search'));
    }
    public function filterByCategory($category)
    {
        // Validasi kategori untuk memastikan hanya nilai yang diizinkan
        if (!in_array($category, ['general', 'entertainment', 'health', 'science', 'sports', 'technology'])) {
            abort(404); // Kategori tidak valid, tampilkan halaman 404
        }

        $data = Blog::where('category', $category)->get();
        return view('Website.Page.Blogs-category', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Blog::with('comments.user')->findOrFail($id);
        
        // Paginate comments
        $comments = $data->comments()->with('user')->latest()->paginate(5); // Adjust the number of comments per page as needed
    
        return view('Website.Page.Blogs-detail', compact('data', 'comments')); // Pass the paginated comments
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
