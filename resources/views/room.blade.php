<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Adding the head component --}}
    <x-head />
    <title>Room Manager</title>
</head>

<body class="bg-white">
    {{-- Adding the header component --}}
    <x-header />
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center bg-white border shadow" style="height:60vh">
            <div class="mx-auto col-10 col-md-8 col-lg-6 w-100">
                <form  id="add_form" action="{{ route('room') }}" method="post" class="bg-white p-5">
                    @csrf
                    <h1 class="text-primary pb-3">Room Manager</h1>

                    <div class="form-group pb-3">
                        <label hidden for="code">Code</label>
                        <input type="text" class="form-control @error('code')border border-danger @enderror"
                            id="code" name="code" placeholder="Code">
                        {{-- Printing the error in case of invalid entry --}}
                        <div class="text-danger">
                            @error('code')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group pb-3">
                        <label hidden for="label">Label</label>
                        <input type="text" class="form-control @error('label')border border-danger @enderror"
                            id="label" name="label" placeholder="Label">

                        {{-- Printing the error in case of invalid entry --}}
                        <div class="text-danger">
                            @error('label')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Inserting a datatable to show all of the available rooms --}}
    <div class="pt-5 m-3">
        <table class="table table-striped" id="salle-table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Label</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if ($salles->count())
                    @foreach ($salles as $salle)
                        <tr>
                            <td>
                                {{ $salle->code }}
                            </td>
                            <td>
                                {{ $salle->label }}
                            </td>
                            <td>
                                <form action="{{ route('room.destroy', $salle->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>

    <script>
        // When clicking on the modify button show the info on the form
        $("#modify_btn").click(function() {
            // Get the form element and submit it
            var form = document.getElementById("edit_form");
            form.submit();
        });
    </script>

    {{-- Adding the necessary script for the datatable --}}
    <script>
        $(document).ready(function() {
            $('#salle-table').DataTable({
                columns: [
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'label',
                        name: 'label'
                    },
                    {
                        data: 'delete',
                        name: 'delete'
                    },
                ]
            });
        });
    </script>

    <script>
        // When clicking on the modify buttom show the info on the form
        $("#modify_btn").click(function() {
            var code
            $('#edit_code').val()
        })
    </script>
</body>

</html>
