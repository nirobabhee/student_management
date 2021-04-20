@extends('layouts.admin')
@section('title')
<title>Edit Student</title>
@endsection
@section('bread')
<div class="row">
    <div class="col-12">
      <div class="breadcrumb-section">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
          <a href="{{route('home')}}">Home</a>
            <i class="bx bxs-chevron-right mx-1"></i>
          </li>
          <li class="breadcrumb-item">
          <a href="{{route('student.edit',$student->id)}}">Edit Student</a>
          </li>
        </ol>
      </div>
    </div>
  </div>
  @endsection 
@section('content')
    <div class="container-fluid ts__dashboard__content">
        <form   method="post" action="{{route('student.update',$student->id)}}"  >
            @csrf
           @method('patch')
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between ts-header-info">
                        <div class="align-self-start">
                            <h4 class="mb-0">Edit Student</h4>
                        </div>
                        <div class="align-self-end">
                            <input type="submit" value="Save" class="default-btn">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2" for="">Fisrst Name <span>*</span></label>
                        <input value="{{ $student->first_name }}" name="first_name" required type="text" class="form-control" placeholder="Enter first name">
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2" for="">Last Name <span>*</span></label>
                        <input value="{{ $student->last_name }}" name="last_name" required type="text" class="form-control" placeholder="Enter last name">
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2" for="">Gender <span>*</span></label>
                        <input {{$student->gender=="male"?"checked":""}} value="male" name="gender" required type="radio" required >Male
                        <input  {{$student->gender=="female"?"checked":""}} value="female" name="gender" required type="radio" required >Female

                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2" for="">Date Of Birth <span>*</span></label>
                        <input value="{{ $student->dob }}" name="dob" required type="date" class="form-control" placeholder="Enter Date Of Birth">
                        @error('dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2" for="">Present Address <span>*</span></label>
                        <input value="{{ $student->address }}" name="address" required type="text" class="form-control" placeholder="Enter Address">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2" for="">SMS No <span>*</span></label>
                        <input value="{{ $student->sms_no }}" name="sms_no" required type="text" class="form-control" placeholder="Enter SMS no">
                        @error('sms_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2" for="">Session <span>*</span></label>
                        <select name="session" class="form-control" required>
                            <option value="">Select Session</option>
                            @foreach(["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"] as $month)
                                    <option {{$student->session==$month."'21"?"selected":""}} value="{{$month}}'21">{{$month}}'21</option>
                            @endforeach
                        </select>
                        @error('session')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2" for="">Class <span>*</span></label>
                        <select name="class" class="form-control" required>
                            <option value="">Select Class</option>
                            @foreach(["VI","VII","VIII","IX","X"] as $class)
                                    <option {{$student->class==$class?"selected":""}} value="{{$class}}">{{$class}}</option>
                            @endforeach
                        </select>
                        @error('class')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2" for="">Group <span>*</span></label>
                        <select name="group" class="form-control" required>
                            <option value="">Select Group</option>
                            @foreach(["N/A","Science","Business Studies","Humanities"] as $group)
                                    <option {{$student->group==$group?"selected":""}} value="{{$group}}">{{$group}}</option>
                            @endforeach
                        </select>
                        @error('group')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2" for="">Class Sectionn <span>*</span></label>
                        <select name="class_section" class="form-control" required>
                            <option value="">Select Section</option>
                            @foreach(["A","B","C"] as $section)
                                    <option {{$student->class_section==$section?"selected":""}} value="{{$section}}">{{$section}}</option>
                            @endforeach
                        </select>
                        @error('class_section')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2" for="">Roll <span>*</span></label>
                        <input value="{{ $student->roll }}" name="roll" required type="number" class="form-control" placeholder="Enter roll">
                        @error('roll')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            



            </div>
          
          
        </form>
    </div>
@endsection

