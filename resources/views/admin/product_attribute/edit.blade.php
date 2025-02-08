@extends('admin.layouts.layout')
@section('admin_page_title')
    Edit Default Attribute
@endsection
@section('admin_layout')
    <h3>Edit Default Attribute Page</h3>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Default Attribute</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    <form action="{{route('update.attribute', $attribute_info->id)}}" method="POST">

                        @csrf
                        @method('PUT')
                        <label for="attribute_value" class="fw-bold mb-2">Give Name of Your Attribute</label>
                        <input type="text" class="form-control" name="attribute_value" placeholder="Computer" value="{{$attribute_info->attribute_value}}" required>

                        <button type="submit" class="btn btn-primary w-100 mt-2">Update Attribute</button>
                    </form>
                </div>
            </div>
        @endsection
