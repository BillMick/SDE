//Formulaire de configuration du profil de l'employé
var valid = document.getElementById('setEmployee');
var e_staff = document.getElementById('e_message');
var doc = document.getElementById('identityDocumentNumber');
var job = document.getElementById('job');
var schedule = document.getElementById('schedule');
var hDate = document.getElementById('hiringDate');
valid.addEventListener('click', f_valid);
function f_valid(e)
{
    e_staff.style.color = 'red';
    if(doc.validity.valueMissing)
    {
        e.preventDefault();
        e_staff.textContent = "Identity document number missing !";
    }
    else if(job.validity.valueMissing)
    {
        e.preventDefault();
        e_staff.textContent = "Job missing !";
    }
    else if(schedule.validity.valueMissing)
    {
        e.preventDefault();
        e_staff.textContent = "Schedule missing !";
    }
    else if(hDate.validity.valueMissing)
    {
        e.preventDefault();
        e_staff.textContent = "Hiring date missing !";
    }
}