<base href="{{asset('public')}}">
<x-app-layout>
    <div class="container">
       <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
           
            <h1 class="text-center bg-white p-2 mt-4 mb-0">Edit Category</h1>
            
            <form action="{{url('category/update/'.$category->id)}}" method="POST" class="text-center bg-white p-2 pb-5">
                @csrf
                <input type="text" name="category_name" value="{{$category->category_name}}">
                <input type="submit" class="btn btn-info bg-info" value="Update Category">
            </form>
        </div>
        <div class="col-md-3">
        </div>
       </div>
    </div>
</x-app-layout>
