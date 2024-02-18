<base href="../public">
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
            <div class="card mt-3">
                <div class="card-header">
                    <h3>Edite Brand</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('updateBrand/'.$brand->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{$brand->brand_image}}">
                        <div class="form-group">
                            <label for="">Brand Name</label>
                            <input type="text" name="brand_name" value="{{$brand->brand_name}}" class="form-control"> 
                            @error('brand_name')
                               <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img src="{{asset('Images/Brand/'.$brand->brand_image)}}" width="200px" alt="">
                        </div>
                        <div class="form-group">
                            <label for="">Brand Image</label>
                            <input type="file" name="brand_image" class="input_image"> 
                            @error('brand_image')
                               <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                            <input type="submit" class="btn btn-info bg-info" value="Update Brand">
                    </form>
                </div>
            </div>
            
        </div>
        <div class="col-md-4">
        </div>
       </div>
    </div>



   
</x-app-layout>
