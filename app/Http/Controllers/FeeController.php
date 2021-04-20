<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Datatable;
use Illuminate\Support\Facades\URL;
use Str;
class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route="fee";
        if (request()->ajax()) {
            $table=new Datatable('Fee','fee');
            return $table->get()->editColumn('type',function($row){
                return ["One Time","Monthly","Yearly"][$row->type];
            })->addColumn('action', function($row) use($route){
                $btn='<span class="ts-action-btn">
                <a href="'.route($route.".edit",$row->id).'" class="btn-edit"><i class="bx bxs-edit"></i></a>
            </span> 
            <span class="ts-action-btn ml-2">
                <a class="delete-button btn-trash" href="#" data-href="'.route($route.".destroy",$row->id).'"><i class="bx bxs-trash-alt"></i></a>
            </span>';

                    return $btn;
            })->rawColumns(['action','index'])
            ->make(true);
      } 
      
        return view('fee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fee.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'max:255555'],

            'type' => ['required', 'integer', 'max:255'],
        ]);
        Fee::create([
            'name' => $request->name,
            'type' => $request->type,
            'price'=>$request->price
        ]);

       return redirect()->route('fee.index')->with('success','Fee created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function show(Fee $fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function edit(Fee $fee)
    {
        return view('fee.edit',compact('fee'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fee $fee)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'max:255555'],

            'type' => ['required', 'integer', 'max:255'],
        ]);
        $fee->update([
            'name' => $request->name,
            'type' => $request->type,
            'price'=>$request->price
        ]);

       return redirect()->route('fee.index')->with('success','Fee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fee $fee)
    {
        $fee->delete();
        return "Fee deleted successfully";
    }
   
}
