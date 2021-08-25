@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Record {{$item->description}}</h1>   
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
                <form action="{{route('data-record.update', $item->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf 
                <div class="form-group">
                    <label for="sub_categories_id">Sub-Category</label>
                    <select name="sub_categories_id" required class="form-control">
                        <option value="">
                            Edit Sub-Category
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
                    <input type="text" class="form-control" name="description" placeholder="Input Description" value="{{$item->description}}">
                </div>
                <div class="form-group">
                    <label for="transaction">Transaction Amount</label>
                    <input type="number" class="form-control" name="transaction" placeholder="0" value="{{$item->transaction}}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Edit</button>
                </form>
            </div>
        


    </div>
    <!-- /.container-fluid -->
@endsection