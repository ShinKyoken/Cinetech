
window.onclick = function(event){
    let search = document.getElementById("search");
    let conteneur = document.getElementById("content-search");
    if(event.target != search){
        conteneur.classList.remove("expend");
    }
    else {
        conteneur.classList.add("expend");
    }
}