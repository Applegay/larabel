@extends('admin.layouts.layout')  
@section('admin_page_title')  
    Manage Category  
@endsection  
@section('admin_layout')  
    <h3>Create Category Page</h3>  
    <div class="row">  
        <div class="col-12">  
            <div class="card">  
                <div class="card-header">  
                    <h5 class="card-title mb-0">All Category</h5>  
                </div>  
                <div class="card-body">  
                    @if(session('success'))  
                    <div class="alert alert-success">  
                        {{session('success')}}  
                    </div>  
                    @endif  
                    <div class="table-responsive">  
                        <table class="table">  
                            <thead>  
                                <tr>  
                                    <th>#</th>  
                                    <th>Category Name</th>  
                                    <th>Action</th>  
                                </tr>  
                            </thead>  
                            <tbody>  
                                @foreach ($categories as $cat)  
                                <tr>  
                                    <td>{{ $cat->id }}</td>  
                                    <td>{{ $cat->category_name }}</td>  
                                    <td>  
                                        <a href="{{ route('show.cat', $cat->id) }}" class="btn btn-info">Edit</a>  
                                        <button class="btn btn-danger" onclick="confirmDelete('{{ route('delete.cat', $cat->id) }}')">Delete</button>  
                                    </td>  
                                </tr>  
                                @endforeach  
                            </tbody>  
                        </table>  
                    </div>  
                </div>  
            </div>  
        @endsection  

<script>  
function confirmDelete(url) {  
    Swal.fire({  
        title: 'Are you sure?',  
        text: "You won't be able to revert this!",  
        icon: 'warning',  
        showCancelButton: true,  
        confirmButtonColor: '#3085d6',  
        cancelButtonColor: '#d33',  
        confirmButtonText: 'Yes, delete it!'  
    }).then((result) => {  
        if (result.isConfirmed) {  
            // Create a form and submit it  
            let form = document.createElement('form');  
            form.method = 'POST';  
            form.action = url;  

            let csrfToken = document.createElement('input');  
            csrfToken.type = 'hidden';  
            csrfToken.name = '_token';  
            csrfToken.value = '{{ csrf_token() }}'; // Include CSRF token  

            let methodInput = document.createElement('input');  
            methodInput.type = 'hidden';  
            methodInput.name = '_method';  
            methodInput.value = 'DELETE'; // Specify DELETE method  

            form.appendChild(csrfToken);  
            form.appendChild(methodInput);  

            document.body.appendChild(form);  
            form.submit(); // Submit the form  
        }  
    });  
}  
</script>