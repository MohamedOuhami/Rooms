<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Adding the head component --}}
    <x-head />
</head>

<body class="bg-white">
    {{-- Adding the header component --}}
    <x-super_admin_header />

    <h1 class="text-primary pb-1" style="padding:30px 20px 20px 10px;font-size:50px">User Manager</h1>
    <div class="pt-5 m-3">
        <table class="table table-striped" id="machine-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>UserName</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Delete</th>
                    <th>Change Status</th>
                </tr>
            </thead>
            <tbody>
                @if ($users->count())
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->username }}
                            </td>
                            <td>
                                {{ $user->fullname }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->created_at }}
                            </td>
                            <td>
                                {{ $user->updated_at }}
                            </td>
                            <td>
                                <form action="{{ route('user-management-delete', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('user-management-change-status', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="status_buttons" type="submit">{{$user->status}}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>

</body>
<script>
    $(document).ready(function(){
        $('#machine-table').DataTable();

        $('.status_buttons').each(function() {
            var status = $(this);
        
            if (status.text() == "Disable") {
                    status.addClass('btn btn-danger');
            } else {
                    status.addClass('btn btn-success');
            }
})

    })
</script>

</html>