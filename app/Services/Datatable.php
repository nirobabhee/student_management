<?php
namespace App\Services;
use DataTables;

class Datatable
{
    public $model,$route,$with;
    
    function __construct($model,$route,$with=null) {
        $this->model = 'App\\Models\\'.$model;
        $this->route = $route;
        $this->with = $with;
    }
    function get(){
        $user=auth()->user();
        $route=$this->route;
        if($this->with){
            $data = $this->model::with($this->with)->latest()->get();
        }
        else{
            $data = $this->model::latest()->get();
        }
            return Datatables::of($data);
                    
    }
    function getAll(){
        $user=auth()->user();
        $route=$this->route;
        if($this->with){
            $data = $this->model::with($this->with)->latest()->get();
        }
        else{
            $data = $this->model::latest()->get();
        }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('index', function($row){
                        return '<div class="icheck-primary d-inline">
                        <input data-id="'.$row->id.'" class="check-element check-id"  type="checkbox" id="checkboxPrimary'.$row->id.'" >
                        <label for="checkboxPrimary'.$row->id.'">
                        </label>
                      </div>';

                    })
                    ->addColumn('action', function($row) use($user,$route){
                        $btn='<span style="margin-right:5px;">
                        <a href="'.route($route.".edit",$row->id).'" class="btn-edit"><i class="bx bxs-edit"></i></a>
                    </span> 
                    <span>
                        <a class="delete-button btn-trash" href="#" data-href="'.route($route.".destroy",$row->id).'"><i class="bx bxs-trash-alt"></i></a>
                    </span>';
                        // if ($user->can('edit-'.$route)) {
                        //     $btn = '<a href="'.$route.'.delete" class=" btn btn-primary btn-sm">Edit</a>';
                        // }
                        // if ($user->can('delete-'.$route)) {
                        //     $btn = '<a href="'.$route.'.delete" class=" btn btn-danger btn-sm">Edit</a>';
                        // }
     
                            return $btn;
                    })
                    ->rawColumns(['action','index'])
                    ->make(true);
    }
    function getAllByData($data){
        $user=auth()->user();
        $route=$this->route;
        
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('index', function($row){
                        return '<div class="icheck-primary d-inline">
                        <input data-id="'.$row->id.'" class="check-element check-id"  type="checkbox" id="checkboxPrimary'.$row->id.'" >
                        <label for="checkboxPrimary'.$row->id.'">
                        </label>
                      </div>';

                    })
                    ->addColumn('action', function($row) use($user,$route){
                        $btn='<span style="margin-right:5px;">
                        <a href="'.route($route.".edit",$row->id).'" class="btn-edit"><i class="bx bxs-edit"></i></a>
                    </span> 
                    <span>
                        <a class="delete-button btn-trash" href="#" data-href="'.route($route.".destroy",$row->id).'"><i class="bx bxs-trash-alt"></i></a>
                    </span>';
                        // if ($user->can('edit-'.$route)) {
                        //     $btn = '<a href="'.$route.'.delete" class=" btn btn-primary btn-sm">Edit</a>';
                        // }
                        // if ($user->can('delete-'.$route)) {
                        //     $btn = '<a href="'.$route.'.delete" class=" btn btn-danger btn-sm">Edit</a>';
                        // }
     
                            return $btn;
                    })
                    ->rawColumns(['action','index'])
                    ->make(true);
    }
}