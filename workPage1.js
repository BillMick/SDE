//Script pour le menu déroulant
var action = document.getElementById('iconemenu');
action.addEventListener("click", function()
{
    var etat = document.getElementById('menu').style.display;
    if (etat == "none")
    {
        document.getElementById('menu').style.display = "block";
        document.addEventListener("click",function(etat)
        {
            etat = "block";
        }, true);
    }
    else
    {
        document.getElementById('menu').style.display = "none";
    }
}, true);

//voir son profil
var actionp = document.getElementById('profile');
actionp.addEventListener("click", function()
{
    var etatp = document.getElementById('view').style.display;
    if (etatp == "none")
    {
        document.getElementById('view').style.display = "block";
    }
    else
    {
        document.getElementById('view').style.display = "none";
    }
}, true);

//For notes Displaying
var actionN = document.getElementById('notesDisplay');
actionN.onclick = function()
{
    var etatn = document.getElementById('myNotes').style.display;
    if (etatn == "none")
    {
        document.getElementById('myNotes').style.display = "block";
    }
    else
    {
        document.getElementById('myNotes').style.display = "none";
    }
};

//For notifications Displaying
var actionN = document.getElementById('notification');
actionN.onclick = function()
{
    var etatn = document.getElementById('myNotifications').style.display;
    if (etatn == "none")
    {
        document.getElementById('myNotifications').style.display = "block";
    }
    else
    {
        document.getElementById('myNotifications').style.display = "none";
    }
};

//for notes contents
var acc =document.getElementsByClassName("accordion");
var i;
for(i=0;i<acc.length;i++)
{
    acc[i].addEventListener("click", function()
    {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block")
        {
            panel.style.display = "none";
        }
        else
        {
            panel.style.display = "block";
        }
    });
}

//for notifications contents
var acc =document.getElementsByClassName("accordion1");
var i;
for(i=0;i<acc.length;i++)
{
    acc[i].addEventListener("click", function()
    {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block")
        {
            panel.style.display = "none";
        }
        else
        {
            panel.style.display = "block";
        }
    });
}

//Script pour le menu paramètre
var action1 = document.getElementById('usercog');
action1.addEventListener("click", function()
{
    var etat1 = document.getElementById('menucog').style.display;
    if (etat1 == "none")
    {
        document.getElementById('menucog').style.display = "block";
    }
    else
    {
        document.getElementById('menucog').style.display = "none";
    }
}, true);

/* document.addEventListener("click",f1);
function f1()
{
    var etat = document.getElementById('menu').style.display;
    if (etat == "block")
    {
        document.getElementById('menu').style.display = "none";
    }
} */

/* var action1 = document.getElementById('cogUser');
action1.addEventListener("click", function()
{
    var etat1 = document.getElementById('cogMenu').style.display;
    if (etat1 == "none")
    {
        document.getElementById('cogMenu').style.display = "block";
    }
    else
    {
        document.getElementById('cogMenu').style.display = "none";
    }
}, false); */

/* var action1 = document.getElementById('settings');
action1.addEventListener("click", function()
{
    var etat = document.getElementById('menuS').style.display;
    if (etat == "none")
    {
        document.getElementById('menuS').style.display = "block";
    }
    else
    {
        document.getElementById('menuS').style.display = "none";
    }
}, false);
 */
//Script pour l'heure permanente dans la barre
var time = document.getElementById("clock");
var timeR = setInterval(Clock,1000);

function Clock()
{
    var d = new Date();
    time.innerHTML = d.toLocaleTimeString();
}

//Script pour le mode veille
var mode = document.getElementById("standByLink");
mode.onclick = function()
{
    var standBy = document.getElementById("includeIn");
    var standByClock = document.getElementById("clockStandBy");
    standBy.id = "includeIn1";
    standByClock.id = "clockS";
    var timeS = setInterval(ClockS,1000);
    function ClockS()
    {
        var dS = new Date();
        standByClock.innerHTML = dS.toLocaleTimeString();
    }
}

//Script pour désactiver le mode veille
document.addEventListener("dblclick",f);
function f()
{
    var standBy = document.getElementById("includeIn1");
    var standByClock = document.getElementById("clockS");
    standBy.id = "includeIn";
    standByClock.id = "clockStandBy";
}

//Script pour ouvrir le notepad
var mode1 = document.getElementById("notepadDisplay");
mode1.onclick = function()
{
    var pad = document.getElementById("notepad");
    pad.style.display = "inline-block";
}

//Script pour fermer le notepad
var mode2 = document.getElementById("close");
mode2.onclick = function()
{
    var mode3 = document.getElementById("notepad");
    mode3.style.display = "none";
}

//Script pour nettoyer le contenu du notepad
/* var mode4 = document.getElementById("reset");
mode4.onclick = function()
{
    var mode5 = document.getElementById("note");
    mode5.textContent = "Ok.";
} */
//Afficher l'interface d'insertion des tâches
var mode5 = document.getElementById("TasksInterface");
mode5.onclick = function()
{
    var mode6 = document.getElementById("listTasks");
    mode6.style.display = "inline-block";
}

//Script pour fermer le notepad
var mode7 = document.getElementById("closeL");
mode7.onclick = function()
{
    var mode8 = document.getElementById("listTasks");
    mode8.style.display = "none";
}

//Afficher l'interface de modification du mot de passe
var mode11 = document.getElementById("mPass");
mode11.onclick = function()
{
    var mode12 = document.getElementById("passInterface");
    mode12.style.display = "inline-block";
}

//Script pour fermer l'interface de modification du mot de passe
var mode9 = document.getElementById("closeP");
mode9.onclick = function()
{
    var mode10 = document.getElementById("passInterface");
    mode10.style.display = "none";
}

/*var slide = new Array("accueil1.png","accueil2.png");
var numero = 0;
function ChangeSlide(sens){
    numero = numero + sens;
    if (numero < 0)
        numero = slide.length - 1;
    if (numero > slide.length - 1)
        numero = 0;
    document.getElementById("slide").src = slide[numero];
    setInterval("ChangeSlide(1)",4000);
}*/