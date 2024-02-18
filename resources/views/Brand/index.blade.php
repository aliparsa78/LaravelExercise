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
            <h1 class="text-center bg-white p-2 mt-4 mb-0">Brands Table</h1>
            <table class="table bg-white ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Brand_Name</th>
                        <th>Brand_image</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $id=1  ?>
                    @foreach($brands as $brand)
                    <tr>
                        <td>{{$id++}}</td>
                        <td>{{$brand->brand_name}}</td>
                        <td><img src="{{asset('Images/Brand/'.$brand->brand_image)}}" alt="" width="100px"></td>
                        <td>{{$brand->created_at->diffForHumans() }}</td>
                        <td>{{$brand->updated_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{url('brand/edit/'.$brand->id)}}" class="btn btn-info">Edite</a>
                            <a href="{{url('brand/delete/'.$brand->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $brands->links() }}
        </div>
        <div class="col-md-4">
            <div class="card mt-3">
                <div class="card-header">
                    <h3>Adding brand</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('addBrand')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Brand Name</label>
                            <input type="text" name="brand_name" placeholder="Enter brand name" class="form-control"> 
                            @error('brand_name')
                               <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Brand Image</label>
                            <input type="file" name="brand_image" class="input_image"> 
                            @error('brand_image')
                               <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                            <input type="submit" class="btn btn-info bg-info" value="Add Brand">
                    </form>
                </div>
            </div>
        </div>
       </div>
    </div>



   
</x-app-layout>
