<?php

namespace App\Http\Controllers\admin;

use App\Models\Technology;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::with('projects')->paginate(10);
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::all();
        return view('admin.technologies.create', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $form_data = $request->validated();
        $form_data["slug"] =  Technology::generateSlug($form_data["name"]);
        
        $new_type = new Technology();
        $new_type->fill($form_data);
        $new_type->save();
        return redirect()->route("admin.technologies.index");
    }
    // ->with('message', $technologies->name . ' has been successfully created')
    /**
     * Display the specified resource.
     */
    public function show(Technology $tecnology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $tecnology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tecnology $tecnology)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tecnology $tecnology)
    {
        //
    }
}
