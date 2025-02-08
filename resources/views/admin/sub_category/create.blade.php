@extends('admin.layouts.layout')  

@section('admin_page_title')  
    Dashboard - Admin Panel  
@endsection  

@section('admin_layout')  
    <h3>Create Sub Category Page</h3>  
    <div class="row">  
        <div class="col-12">  
            <div class="card">  
                <div class="card-header">  
                    <h5 class="card-title mb-0">Create Sub Category</h5>  
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
                            {{ session('success') }}  
                        </div>  
                    @endif  

                    <form action="{{ route('store.subcat') }}" method="POST">  
                        @csrf  
                        <div class="form-group">  
                            <label for="subcategory_name" class="fw-bold mb-2">Give Name of Your Subcategory</label>  
                            <input type="text" class="form-control" name="subcategory_name" placeholder="Computer" required>  
                        </div>  

                        <div class="form-group">  
                            <label for="category_id" class="fw-bold mb-2">Select Category</label>  
                            <select name="category_id" class="form-control" id="category_id" required>  
                                @foreach ($categories as $category)  
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>  
                                @endforeach  
                            </select>  
                        </div>  

                        <button type="submit" class="btn btn-primary w-100 mt-2">Add Sub Category</button>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
@endsection