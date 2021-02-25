<?php

namespace App\Http\Controllers;
use App\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('entries.create');
    }
     public function store(Request $request){
       // dd($request->all());

      $vlidateData = $request->validate([
        'title' => 'required|min:7|max:255|unique:entries',
        'content' => 'required|min:25|max:3000'
      ]);

        $entry = new Entry();
        $entry->title = $vlidateData['title'];
        $entry->content = $vlidateData['content'];
        $entry->user_id = auth()->id();
        $entry->save(); //insert
        $status = 'Your entry has been publishd successfully.';
        return back()->with(compact('status'));
    }

    public function edit(Entry $entry){
        $this->authorize('update',$entry);
        return view('entries.edit', compact('entry'));
    }



      public function update(Request $request, Entry $entry){
       $this->authorize('update',$entry);

      $vlidateData = $request->validate([
        'title' => 'required|min:7|max:255|unique:entries,id,' . $entry->id,
        'content' => 'required|min:25|max:3000'
      ]);

        $entry->title = $vlidateData['title'];
        $entry->content = $vlidateData['content'];

        $entry->save(); //insert
        $status = 'Your entry has been updated successfully.';
        return back()->with(compact('status'));
    }

}
