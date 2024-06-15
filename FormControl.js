//Formulaire de connexion à son compte
var valid = document.getElementById('login');
var staff_m = document.getElementById('m_message');
var staff = document.getElementById('staffNumber');
var pass = document.getElementById('pass');
valid.addEventListener('click', f_valid);
function f_valid(e)
{
    staff_m.style.color = 'red';
    if(staff.validity.valueMissing)
    {
        e.preventDefault();
        staff_m.textContent = "Staff number missing !";
    }
    else if(pass.validity.valueMissing)
    {
        e.preventDefault();
        staff_m.textContent = "Password missing !";
    }
}

var up = document.getElementById('up');
var alert_m = document.getElementById('m_alert');
var staff1 = document.getElementById('staffNumber');
up.addEventListener('click', f_valid);
function f_valid(e)
{
    alert_m.style.color = 'red';
    if(staff.validity.valueMissing)
    {
        e.preventDefault();
        alert_m.textContent = "Staff number missing !";
    }
}