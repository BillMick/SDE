let compteur = 0 ;
let timer, im, slides, slideWidth /*declaration*/ ;

window.onload = ()=>{
    const diapo = document.querySelector(".diapo");
    im = document.querySelector(".im");
    slides =  Array.from(im.children); /* mettre dans tableau depuis les enfants de img pour en faire un tableau*/

    slideWidth = diapo.getBoundingClientRect().width; /*calculer la largeur du diapo*/
    /*deplacer les elemnts*/
    let next = document.querySelector("#nav-droite");
    let previous = document.querySelector("#nav-gauche");

    next.addEventListener("click", slideNext); /* ecouteur d'evenement pour aller vers l'element suivant*/
    previous.addEventListener("click", slidePrevious); /* ecouteur d'evenement pour aller vers l'element suivant*/

    // pour mettre en marche automatiquement le diapo
    timer = setInterval(slideNext,4000);
    // survol de la souris
    diapo.addEventListener("mouseover", stopTimer);
    diapo.addEventListener("mouseout", startTimer);
    //responsive
    window.addEventListener("resize", () =>{
        slideWidth = diapo.getBoundingClientRect().width; 
        slideNext();
    })

}
// effet de défilement vers la droite /----/ vers la gauche
function slideNext(){
    compteur++;
    if(compteur == slides.length){
        compteur = 0;
    }

    let decal = -slideWidth * compteur; /*decaler la 1ere image vers la gauche de facon a ce que la 2eme image s'affiche*/
    im.style.transform = `translateX(${decal}px)`; /*pour ejecter la variable decal*/
    
}
function slidePrevious(){
    
    if(compteur){
        //compteur = slides.length -1; //remettre le compteur à la dernière slide qui est la longueur du slide -1
        compteur--;
    }

    let decal = -slideWidth * compteur; /*decaler la 1ere image vers la gauche de facon a ce que la 2eme image s'affiche*/
    im.style.transform = `translateX(${decal}px)`; /*pour ejecter la variable decal*/
    
}
function stopTimer(){
    clearInterval(timer);
}
function startTimer(){
    timer = setInterval(slideNext, 4000);
}