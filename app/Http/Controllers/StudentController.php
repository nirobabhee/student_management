<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Services\Datatable;
use Illuminate\Support\Facades\URL;
use Riskihajar\Terbilang\Facades\Terbilang;
use Str;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route="student";
        if (request()->ajax()) {
            $table=new Datatable('Student','student');
            return $table->get()
            ->editColumn('id', function($row){
                return implode('',explode('-',$row->dob)).$row->id;
            })
            ->addColumn('action', function($row) use($route){
                $btn='<span class="ts-action-btn">
                <a href="'.URL::to("student/fee/".$row->id).'" class="btn btn-link btn-sm">Fee</a>
            </span> 
                <a href="'.route($route.".edit",$row->id).'" class="btn-edit"><i class="bx bxs-edit"></i></a>
            </span> 
            <span class="ts-action-btn ml-2">
                <a class="delete-button btn-trash" href="#" data-href="'.route($route.".destroy",$row->id).'"><i class="bx bxs-trash-alt"></i></a>
            </span>'
            
            ;

                    return $btn;
            })
            ->addColumn('status',function($row){
                $checked="";
                if($row->active==1){
                    $checked="checked";
                }
                return '<label class="ts-swich-label d-inline">
                <input data-href="'.URL::to('student/status/'.$row->id).'"  type="checkbox"'.$checked.' class="switch-status switch ts-swich-input" name="status" id="" value="1">
                <span class="ts-swich-body"></span>
              </label>';
            })
            ->rawColumns(['action','status'])
            ->make(true);
      } 
      
        return view('student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create'); 
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'sms_no' => ['required', 'string', 'max:255'],
            'session' => ['required', 'string', 'max:255'],
            'class' => ['required', 'string', 'max:255'],
            'group' => ['required', 'string', 'max:255'],
            'class_section' => ['required', 'string', 'max:255'],
            'roll' => ['required', 'string', 'max:255'],
            'active'=>1,
            
        ]);
        Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'sms_no' => $request->sms_no,
            'session' => $request->session,
            'class' => $request->class,
            'group' => $request->group,
            'class_section' => $request->class_section,
            'roll' => $request->roll,

        ]);

       return redirect()->route('student.index')->with('success','Student created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit',compact('student'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'sms_no' => ['required', 'string', 'max:255'],
            'session' => ['required', 'string', 'max:255'],
            'class' => ['required', 'string', 'max:255'],
            'group' => ['required', 'string', 'max:255'],
            'class_section' => ['required', 'string', 'max:255'],
            'roll' => ['required', 'string', 'max:255'],
            
        ]);
        $student->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'sms_no' => $request->sms_no,
            'session' => $request->session,
            'class' => $request->class,
            'group' => $request->group,
            'class_section' => $request->class_section,
            'roll' => $request->roll,

        ]);

       return redirect()->route('student.index')->with('success','Student created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return "Student deleted successfully";
    }
    public function updateStatus(Student $student,$status){
        $student->update([
            "active"=>$status
        ]);
        return "Student updated successfully";
    }

    public function fee(Student $student){
        $fees=Fee::all();
       $total= Terbilang::make($fees->sum('price'));
        return view('student.fee_book',compact('student','fees','total'));
    }
   
}
