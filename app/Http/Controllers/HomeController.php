<?php

namespace App\Http\Controllers;

use App\Models\{ Book , Category};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();
        
        // Filter by category
        if ($request->filled('category') && $request->input('category') !== 'allCategories') {
            $categoryId = Category::where('cat_title' ,$request->input('category'))->first()->id;
            $query->whereHas('category', function ($query) use ($categoryId) {
                $query->where('id', $categoryId);
            });
        }
        
        // Order by
        if ($request->filled('orderBy')) {
            $orderBy = $request->input('orderBy');
            
            if ($orderBy === 'name') {
                $query->orderBy('title');
            } elseif ($orderBy === 'latest') {
                $query->orderByDesc('created_at');
            }
        
        }
        else {
            $query->orderBy('title');
        }
        
        // Search by title or author
        if (strlen($request->input('search'))!=0) {
            $searchTerm = $request->input('search');
            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                ->orWhere('auth_namr', 'like', '%' . $searchTerm . '%');
            });
        }
        
        $data= $query->get();
        
        // Pass the filteredBooks and other data to the view
        $categories = Category::all();
        return view('home.index', compact('data' ,'categories'));
    }
}
