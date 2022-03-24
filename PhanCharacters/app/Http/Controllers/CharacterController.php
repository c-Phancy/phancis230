<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = \App\Models\Character::paginate(10);
        return view('characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $character = new \App\Models\Character;
        return view('characters.create', ['character' => $character]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
    \App\Models\Character::create($this->validatedData($request));

    return redirect()->route('characters.index')->with('success', 'Character was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $character = \App\Models\Character::findOrFail($id);
        return view('characters.show', ['character' => $character]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $character = \App\Models\Character::findOrFail($id);
        return view('characters.edit', ['character' => $character]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \App\Models\Character::find($id)->update($this->validatedData($request));
	    return redirect()->route('characters.index')->with('success', 'Character was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $character = \App\Models\Character::find($id);
        $character->delete();

        return redirect()->route('characters.index')->with('success', 'Character was deleted');
    }

    private function validatedData($request) {
        $validatedData = $request->validate([
                'name' => 'required',
                'year' => 'required|date_format:"Y"',
                'month' =>   'required|date_format:"m"',
                'day' => 'required|date_format:"d"',
                'occupations' => 'required',
                'status' => 'required',
                // MAKE SURE TO CHECK FOR SECURITY VULNERABILITIES (if this weren't an assignment)
                'img' => 'required'
            ]);
    
        $dateString = sprintf('%d-%d-%d', $validatedData['year'], $validatedData['month'], $validatedData['day']);
        $date['birthday'] = date("m-d-Y", strtotime($dateString));
    
        unset($validatedData['year'], $validatedData['month'], $validatedData['day']);
        $validatedData += ['birthday' => $date['birthday']];
        $validatedData['occupation'] = $validatedData['occupations'];
        unset($validatedData['occupations']);
        return $validatedData;
    }

}
