<x-app-layout>
    <div class="container">
       <div class="row">
        <div class="col-md-8">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="close  " data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <h1 class="text-center bg-white p-2 mt-4 mb-0">Category Table</h1>
            <table class="table bg-white ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>User_Name</th>
                        <th>Category_Name</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $id=1  ?>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$categories->firstItem()+$loop->index}}</td>
                        <td>{{$category->user->name}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->created_at->diffForHumans() }}</td>
                        <td>{{$category->updated_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{url('category/edit/'.$category->id)}}" class="btn btn-info">Edite</a>
                            <a href="{{url('category/softDelete/'.$category->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
        <div class="col-md-4">
            <form action="{{route('addCategory')}}" method="POST" class="mt-5">
                @csrf
                <input type="text" name="category_name" placeholder="Enter category name">
                <input type="submit" class="btn btn-info bg-info" value="Add Category">
            </form>
        </div>
       </div>
    </div>



    <div class="container">
       <div class="row">
        <div class="col-md-8">
            <h1 class="text-center bg-white p-2 mt-4 mb-0">Category Trashed Table</h1>
            <table class="table bg-white ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>User_Name</th>
                        <th>Category_Name</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $id=1  ?>
                    @foreach($trashCategory as $category)
                    <tr>
                        <td>{{$categories->firstItem()+$loop->index}}</td>
                        <td>{{$category->user->name}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->created_at->diffForHumans() }}</td>
                        <td>{{$category->updated_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{url('category/restore/'.$category->id)}}" class="btn btn-success">Restore</a>
                            <a href="{{url('category/pdelete/'.$category->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
        
       </div>
    </div>
</x-app-layout>
