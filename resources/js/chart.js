$(document).ready(function(){

    // Getting the number Occurences button

    var occbtn = $("#occtbn");
    var machinesperroombtn = $("#machinesperroombtn");
    var nbrChart = $("#nbrChart");

    occbtn.click(function(){
        nbrChart.attr("hidden",'true');
    })
    machinesperroombtn.click(function(){
        nbrChart.attr("hidden",'false');
    })
})