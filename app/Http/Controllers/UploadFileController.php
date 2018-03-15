<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileList;

class UploadFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function fileList()
    {
        if(isset(auth()->user()->creator_id) && ! auth()->user()->permissions->contains('name', 'view')) {
            return redirect('home');
        }

        $files = FileList::all();

        return view('file_list/home', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload_file.home', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png'
        ]);
        
        $path = $request->file('file')->store(
            'upload_files', 'b2'
        );
        
        FileList::create([
            'user_id' => auth()->user()->id, 'file_name' => $path
        ]);

        return redirect('file-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FileList $upload_file)
    {
        if(isset(auth()->user()->creator_id) && ! auth()->user()->permissions->contains('name', 'update')) {
            return redirect('home');
        }

        return view('upload_file.home', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileList $upload_file)
    {
        if(isset(auth()->user()->creator_id) && ! auth()->user()->permissions->contains('name', 'update')) {
            return redirect('home');
        }

        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png'
        ]);

        $path = $request->file('file')->store(
            'upload_files', 'b2'
        );
        
        $upload_file->update(['file_name' => $path]);

        return redirect('file-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(FileList $upload_file)
    {
        if(isset(auth()->user()->creator_id) && ! auth()->user()->permissions->contains('name', 'delete')) {
            return redirect('home');
        }

        $upload_file->delete();

        return redirect('file-list');
    }
}
