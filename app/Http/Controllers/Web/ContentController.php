<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::with('category')->latest()->get();
        return view('contents', compact('contents'));
    }

    /**
     * Alias for index method to match route definition
     */
    public function contents()
    {
        return $this->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('contents.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'nullable|url',
            'category_id' => 'required|exists:categories,id',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar|max:10240',
        ]);

        $path = null;
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('content_files', $fileName, 'public');
        }

        $content = Content::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'url' => $validated['url'] ?? null,
            'category_id' => $validated['category_id'],
            'path_file' => $path,
        ]);

        return redirect()->route('contents.show', $content)->with('success', 'Content created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        return view('contents.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        $categories = Category::all();
        return view('contents.edit', compact('content', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'nullable|url',
            'category_id' => 'required|exists:categories,id',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar|max:10240',
        ]);

        $path = $content->path_file;
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // Delete old file if exists
            if ($content->path_file && file_exists(public_path('storage/' . $content->path_file))) {
                unlink(public_path('storage/' . $content->path_file));
            }
            
            // Store new file
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('content_files', $fileName, 'public');
        }

        $content->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'url' => $validated['url'] ?? null,
            'category_id' => $validated['category_id'],
            'path_file' => $path,
        ]);

        return redirect()->route('contents.show', $content)->with('success', 'Content updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        // Delete file if exists
        if ($content->path_file && file_exists(public_path('storage/' . $content->path_file))) {
            unlink(public_path('storage/' . $content->path_file));
        }
        
        $content->delete();
        
        return redirect()->route('contents.index')->with('success', 'Content deleted successfully');
    }
}
