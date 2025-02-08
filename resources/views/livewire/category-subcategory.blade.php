<div>
    {{-- Be like water. --}}
    <select class="form-control">
        <option value="">Select A Category </option>
        @foreach ($categories as $category )
        <option value="{{$category->id}}">{{$category->category_name}}</option>
        @endforeach
    </select>
</div>
