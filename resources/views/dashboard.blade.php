<x-app-layout>
    <div class="container">
       <div class="row">
        <div class="col-md-8">
            <table class="table bg-white mt-2">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $id=1  ?>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$id++}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            Part 4
        </div>
       </div>
    </div>
</x-app-layout>
