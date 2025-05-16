<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::with('category')->latest()->get();
        return view('contents', compact('contents'));
    }
    public function create()
    {
        $categories = Category::all();
        $genres = Genre::all();
        $authors = Author::all();

        return view('contents.create', compact('categories', 'genres', 'authors'));
    }



    public function contents()
    {
        return $this->index();
    }


    public function store(Request $request)
    {
        (new ContentService())->store($request);
        return redirect('/contents')->with('success','Content created successfully');
    }


//    public function show($id)
//    {
//        $content = (new ContentService())->show((int)$id);
//        return view('contents.show', compact('content'));
//    }

    public function edit(Content $content)
    {
        $categories = Category::all();
        return view('contents.edit', compact('content', 'categories'));
    }


//    public function update(Request $request, Content $content)
//    {
//        $validated = $request->validate([
//            'title' => 'required|string|max:255',
//            'description' => 'required|string',
//            'url' => 'nullable|url',
//            'category_id' => 'required|exists:categories,id',
//            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar|max:10240',
//        ]);
//
//        $path = $content->path_file;
//        if ($request->hasFile('file') && $request->file('file')->isValid()) {
//            // Delete old file if exists
//            if ($content->path_file && file_exists(public_path('storage/' . $content->path_file))) {
//                unlink(public_path('storage/' . $content->path_file));
//            }
//
//            // Store new file
//            $file = $request->file('file');
//            $fileName = time() . '_' . $file->getClientOriginalName();
//            $path = $file->storeAs('content_files', $fileName, 'public');
//        }
//
//        $content->update([
//            'title' => $validated['title'],
//            'description' => $validated['description'],
//            'url' => $validated['url'] ?? null,
//            'category_id' => $validated['category_id'],
//            'path_file' => $path,
//        ]);
//
//        return redirect()->route('contents.show', $content)->with('success', 'Content updated successfully');
//    }

//    public function destroy(Content $content)
//    {
//        // Delete file if exists
//        if ($content->path_file && file_exists(public_path('storage/' . $content->path_file))) {
//            unlink(public_path('storage/' . $content->path_file));
//        }
//
//        $content->delete();
//
//        return redirect()->route('contents.index')->with('success', 'Content deleted successfully');
//    }
}
