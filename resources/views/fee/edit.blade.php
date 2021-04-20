@extends('layouts.admin')
@section('title')
<title>Edit Fee</title>
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
          <a href="{{route('fee.edit',$fee->id)}}">Edit Fee</a>
          </li>
        </ol>
      </div>
    </div>
  </div>
  @endsection 
@section('content')
    <div class="container-fluid ts__dashboard__content">
        <form   method="post" action="{{route('fee.update',$fee->id)}}"  >
           @csrf
           @method('patch')
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between ts-header-info">
                        <div class="align-self-start">
                            <h4 class="mb-0">Edit Fee</h4>
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
                        <label class="mb-2" for="">Name <span>*</span></label>
                        <input value="{{ $fee->name}}" name="name" required type="text" class="form-control" placeholder="Enter fee name">
                        @error('name')
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
                        <label class="mb-2" for="">Price <span>*</span></label>
                        <input value="{{ $fee->price }}" name="price" required type="number" class="form-control" placeholder="Enter fee price">
                        @error('price')
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
                        <label class="mb-2" for="">Type <span>*</span></label>
                        <select name="type" id="" class="form-control" name="type" required>
                                <option value="">Select fee type</option>
                                <option {{$fee->type=='0'?'selected':''}}  value="0">One Time</option>
                                <option  {{$fee->type=='1'?'selected':''}} value="1">Monthly</option>
                                <option  {{$fee->type=='2'?'selected':''}} value="2">Yearly</option>
                        </select>   
                        @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
          
          
        </form>
    </div>
@endsection

