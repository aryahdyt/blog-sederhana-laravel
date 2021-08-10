<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // memanggil Model Blog kemudian 
        // mengurutkan datanya berdasarkan terbaru dengan method latest() dan 
        // membatasi data yang ditampilkan sejumlah 10 data perhalaman
        $blogs = Blog::latest()->paginate(10);

        // memanggil sebuah view dengan nama index.blade.php di dalam folder blog
        // yang mana folder tersebut berada di dalam folder resources/views/.
        // Dan kita mengoper data tersebut ke dalam view menggunakan helper compact
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            // 'image' => 'mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|max:100',
            'content' => 'required',
        ];

        $messages = [
            'title.required' => 'Judul wajib diisi.',
            'title.max' => 'Judul Maksimal 100 Karakter.',
            'content.required' => 'Content wajib diisi.',
            // 'image.mimes' => 'Masukan Gambar Dengan Format Yang Benar.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        } else {
            $imageName = time() . '.' . $request->image->extension();
            $path = Storage::putFileAs('public/photoblogs', $request->image, $imageName);

            $blog = Blog::create([
                'image' => $imageName,
                'title' => $request->title,
                'content' => $request->content,
            ]);

            $request->image->move($path, $imageName);

            return redirect()->route('blog.index')->with('success', 'Blogs created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ($request->image) {
            $blog = Blog::find($id);
            // membuat nama file
            $imageName = time() . '.' . $request->image->extension();
            // menentukan path
            $path = Storage::path('public/photoblogs');
            // kondisi jika imgae sudah ada maka hapus image tersebut
            if (!empty($blog->image) && file_exists($path . '/' . $blog->image)) {
                unlink($path . '/' . $blog->image);
            };
            // update
            $blog = Blog::where('id', $id)->update([
                'image' => $imageName,
                'title' => $request->title,
                'content' => $request->content,
            ]);
            // pindah image ke path
            $request->image->move($path, $imageName);
        } else {
            $blog = Blog::where('id', $id)->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }

        return redirect()->route('blog.index')->with('success', 'Data berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        $path = Storage::path('public/photoblogs');
        unlink($path . '/' . $blog->image);

        return redirect()->route('blog.index')->with('success', 'Data berhasil Di Dihapus');
    }
}
