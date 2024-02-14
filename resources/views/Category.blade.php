<x-app-layout>
    <div class="container">
       <div class="row">
        <div class="col-md-8">
            <h1 class="text-center bg-white p-2 mt-4 mb-0">Category Table</h1>
            <table class="table bg-white ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>User_Name</th>
                        <th>Category_Name</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $id=1  ?>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$id++}}</td>
                        <td>{{$category->user_id}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>{{Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <form action="" class="mt-5">
                <input type="text" name="category_name" placeholder="Enter category name">
                <input type="submit" class="btn btn-info bg-info" value="Add Category">
            </form>
        </div>
       </div>
    </div>
</x-app-layout>
