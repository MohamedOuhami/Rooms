<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Adding the head component --}}
    <x-head />
    {{-- <script src="{{ asset('js/chart.js') }}"></script> --}}
    <title>Dashboard</title>
</head>

<body class="bg-white">
    {{-- Adding the header component --}}
    <x-header />

    <div>
        <h1 class="text-center m-5">Dashboard</h1>
    </div>

    <div class="d-flex justify-content-center pb-3">
        <div class="align-items-center">
            <button id="occbtn" class="btn btn-primary">Number of Occurences</button>
            <button id="machinesperroombtn" class="btn btn-primary">Machines Per Room</button>
        </div>
    </div>

    <div id="nbrChartdiv" class="container border shadow mt-3">
        <div class="row">
            <div class=" pt-5 mx-auto w-50">
                <canvas id="roomChart"></canvas>
            </div>

            <div class=" pt-5 mx-auto w-50">
                <canvas id="machineChart"></canvas>
            </div>
            <div class=" pt-5 mx-auto w-50">
                <canvas id="userChart"></canvas>
            </div>
        </div>
    </div>

    <div id="machperroomdiv" class="container border shadow mt-3">
        <div class="row">
            <div class=" pt-5 mx-auto w-50">
                <canvas id="machperroomChart"></canvas>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctroom = $('#roomChart');
        const ctmachine = $('#machineChart');
        const ctuser = $('#userChart');
        const ctmachineperroom = $("#machperroomChart");
        new Chart(ctroom, {
            type: 'bar',
            data: {
                labels: ['Rooms'],
                datasets: [{
                    label: '# of occurences',
                    data: [{{ $salles->count() }}],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(ctmachine, {
            type: 'bar',
            data: {
                labels: ['Machines'],
                datasets: [{
                    label: '# of occurences',
                    data: [{{ $machines->count() }}],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(ctuser, {
            type: 'bar',
            data: {
                labels: ['Users'],
                datasets: [{
                    label: '# of occurences',
                    data: [{{ $users->count() }}],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Getting the room IDs
        var data = [];
        var datanbr = [];
        var rooms = {!! json_encode($salles) !!};
        var machines = {!! json_encode($machines) !!};
        var activemachines = []; // define activemachines outside the loop

        rooms.forEach(room => {
            data.push(room.label);
            var roommachines = machines.filter(machine => machine.roomid === room.id);
            var activelength = roommachines.length;
            console.log(activelength);
            activemachines.push(activelength); // update activemachines inside the loop
        });

        new Chart(ctmachineperroom, {
            type: 'line',
            data: {
                labels: data,
                datasets: [{
                    label: '# of occurences',
                    data: activemachines,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        // Getting the number Occurences button

        var occbtn = $("#occbtn");
        var machinesperroombtn = $("#machinesperroombtn");
        var nbrChart = $("#nbrChartdiv");
        var machperroomdiv = $("#machperroomdiv");
        machperroomdiv.hide();

        occbtn.click(function() {
            nbrChart.show();
            machperroomdiv.hide();
        })
        machinesperroombtn.click(function() {
            nbrChart.hide();
            machperroomdiv.show();
        })
    </script>
</body>

</html>
