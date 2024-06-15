var b1 = document.getElementById("<?php echo $task['idA']; ?>");
var p1 = document.getElementById("<?php echo $number; ?>");

var timeoutId;
var intervalId;

var dec = 0;
var sec = 0;
var min = 0;
var heu = 0;
p1.textContent = heu + ':' + min + ':' + sec + ':' + dec;
b1.addEventListener('click', timer);

function timer()
{
    intervalId = setInterval(function(){
        p1.textContent = heu + ':' + min + ':' + sec + ':' + dec;
        dec += 1;
        if(dec >= 10)
        {
            dec = 0;
            sec += 1;
        }
        if(sec >= 60)
        {
            sec = 0;
            min += 1;
        }
        if(min >= 60)
        {
            min = 0;
            heu += 1;
        }
    }, 100)
}