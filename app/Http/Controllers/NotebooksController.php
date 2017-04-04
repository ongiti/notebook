<?php

namespace App\Http\Controllers;
use App\Notebook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotebooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // this should be able to fetch data from the created model which in turn fetches data from the database
        //Notebook is the model
        //$notebooks = Notebook::all();
        //find notebook of the authenticated user: first get logged in user : return notebooks according to the method defined in  model
         $user = Auth::user();
       $notebooks= $user->notebooks;


        //pass the data to the index page
        return view('notebooks.index',compact('notebooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/notebooks/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //gets all data from the form fields
        $data = $request->all();
        //we store the data to the database using the model class
        //Notebook::create($data);
        $user=Auth::user();
       $user->notebooks()->create($data);

       // after successful posting the go to another page
        return redirect('notebooks');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notebook = Notebook::findOrFail($id);
        $notes = $notebook->notes;

        return view('notes.index',compact('notes','notebook'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //$notebook = Notebook::where('id',$id)->first();
        $user = Auth::user();
        $notebook = $user->notebooks()->find($id);
        return view('notebooks.edit')->with('notebook',$notebook);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {//first find the notebook to update
       // $notebook =Notebook::where('id',$id)->first();

        $user = Auth::user();
        $notebook=$user->notebooks()->find($id);
        $notebook->update($request->all());
        return redirect('/notebooks');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find notebook to destroy or delete
       // $notebook =Notebook::where('id',$id)->first();
        //now call the delete method on that item
        $user = Auth::user();
        $notebook= $user->notebooks()->find($id);
        $notebook->delete();
        return redirect('/notebooks');
    }
}
