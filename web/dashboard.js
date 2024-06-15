    var displayAT = document.getElementById('allTasks1');
    displayAT.addEventListener("click", function()
    {
        var d = document.getElementById('displayAllTasks').style.display;
        if(d == "none")
        {
            document.getElementById('displayAllTasks').style.display = "block";
        }
        else
        {
            document.getElementById('displayAllTasks').style.display = "none";
        }
    }, true);

    var displayTT = document.getElementById('todayTasks');
    displayTT.addEventListener("click", function()
    {
        var d1 = document.getElementById('displayTodayTasks').style.display;
        if(d1 == "none")
        {
            document.getElementById('displayTodayTasks').style.display = "block";
        }
        else
        {
            document.getElementById('displayTodayTasks').style.display = "none";
        }
    }, true);

    var displayAE = document.getElementById('allEmployees');
    displayAE.addEventListener("click", function()
    {
        var d2 = document.getElementById('displayAllEmployees').style.display;
        if(d2 == "none")
        {
            document.getElementById('displayAllEmployees').style.display = "block";
        }
        else
        {
            document.getElementById('displayAllEmployees').style.display = "none";
        }
    }, true);

    var displayAR = document.getElementById('arrivals');
    displayAR.addEventListener("click", function()
    {
        var d3 = document.getElementById('displayArrivals').style.display;
        if(d3 == "none")
        {
            document.getElementById('displayArrivals').style.display = "block";
        }
        else
        {
            document.getElementById('displayArrivals').style.display = "none";
        }
    }, true);