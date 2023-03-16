<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Adding the head component --}}
    <x-head />
    <title>Machine Manager</title>
</head>

<body class="bg-white">
    {{-- Adding the header component --}}
    <x-header />
    <div class="container-fluid pb-5">
        <div class="row align-items-center justify-content-center bg-white border shadow" style="height:60vh">
            <div class="mx-auto col-10 col-md-8 col-lg-6 w-100">
                <form action="{{ route('machine') }}" method="post" class="bg-white p-5 ">
                    @csrf
                    <h1 class="text-primary pb-3">Add a new Machine</h1>

                    <div class="form-group pb-3">
                        <label hidden for="reference">Reference</label>
                        <input type="text" class="form-control @error('reference')border border-danger @enderror"
                            id="reference" name="reference" placeholder="Reference">
                        {{-- Printing the error in case of invalid entry --}}
                        <div class="text-danger">
                            @error('reference')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group pb-3">
                        <label hidden for="brand">Brand</label>
                        <input type="text" class="form-control @error('brand')border border-danger @enderror"
                            id="brand" name="brand" placeholder="Label">

                        {{-- Printing the error in case of invalid entry --}}
                        <div class="text-danger">
                            @error('brand')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group pb-3">
                        <label hidden for="buydate">Buy Date</label>
                        <input type="date" class="form-control @error('buydate')border border-danger @enderror"
                            id="buydate" name="buydate" placeholder="Buy Date">

                        {{-- Printing the error in case of invalid entry --}}
                        <div class="text-danger">
                            @error('buydate')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group pb-3">
                        <label hidden for="price">Price</label>
                        <input type="text" class="form-control @error('price')border border-danger @enderror"
                            id="price" name="price" placeholder="Price">

                        {{-- Printing the error in case of invalid entry --}}
                        <div class="text-danger">
                            @error('price')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group pb-3">
                        <select name="roomid" class="form-select" id="roomid">
                            @foreach ($rooms as $room)
                                <option value="{{$room->id}}">{{$room->label}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Inserting a datatable to show all of the available rooms --}}
    <div class="pt-5 m-3">
        <table class="table table-striped" id="machine-table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Label</th>
                    <th>Buy Date</th>
                    <th>Price</th>
                    <th>Room ID</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if ($machines->count())
                    @foreach ($machines as $machine)
                        <tr>
                            <td>
                                {{ $machine->reference }}
                            </td>
                            <td>
                                {{ $machine->brand }}
                            </td>
                            <td>
                                {{ $machine->buydate }}
                            </td>
                            <td>
                                {{ $machine->price }}
                            </td>
                            <td>
                                {{ $machine->roomid }}
                            </td>
                            <td>
                                <form action="{{ route('machine.destroy', $machine->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>

    {{-- Adding the necessary script for the datatable --}}
    <script>
        $(document).ready(function() {
            $('#machine-table').DataTable({
                columns: [{
                        data: 'reference',
                        name: 'reference'
                    },
                    {
                        data: 'brand',
                        name: 'brand'
                    },
                    {
                        data: 'buydate',
                        name: 'buydate'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'roomid',
                        name: 'roomid'
                    },
                    {
                        data: 'delete',
                        name: 'delete'
                    },
                ]
            });
        });
    </script>
</body>

</html>
