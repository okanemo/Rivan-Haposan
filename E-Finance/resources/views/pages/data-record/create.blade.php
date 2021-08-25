@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Data Record</h1>   
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <div class="card shadow">
            <div class="card-body">
                <form action="{{route('data-record.store')}}" method="post" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                    <label for="sub_categories_id">Sub-Category</label>
                    <select name="sub_categories_id" required class="form-control">
                        <option value="">
                            Choose Sub-Category
                        </option>
                        @foreach ($sub_categories as $sub_category)
                            <option value="{{$sub_category->id}}">
                                {{$sub_category->title}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Data Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Input Description" value="{{old('description')}}">
                </div>
                <div class="form-group">
                    <label for="transaction">Transaction Amount</label>
                    <input type="number" class="form-control" name="transaction" placeholder="0" value="{{old('transaction')}}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
    </div>
    <!-- /.container-fluid -->
@endsection