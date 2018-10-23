

// prend le modal Modifier
var modal = document.getElementById('myModal');

// prend le modal Ajouter
var modalAdd = document.getElementById("myModalAdd");

// Prend le modal de suppression
var modalSup = document.getElementById("modalSup");



// prend les bouton qui ouvre le modal Modifier
var liste_btn = document.getElementsByClassName("btn-titre");

for(var i=0; i< liste_btn.length; i++){
  // Pour afficher le modal
  liste_btn[i].onclick = function(event) {
    modal.style.display = "block";
    for(var f=0; f<tab_donnee.length; f++){
      if(tab_donnee[f]["titre"] == event.target.innerText){
        remplissage(tab_donnee[f]);
      }
    }
  };

}

// prend le bouton qui ouvre le modal Ajouter
var btnAdd = document.getElementById("myBtnAdd");

// Prend le bouton de supression
var btnSup = document.getElementById("btnSup");


// prend l'élément span (x) pour fermer le modal
var btn_close_modal = document.getElementsByClassName("close")[1];

// prend l'élément span (x) pour fermer le modalAdd
var btn_close_modalAdd = document.getElementsByClassName("close")[0];

// prend l'élément span (x) pour fermer le modalAdd
var btn_close_modalSup = document.getElementsByClassName("close")[2];



//Quand l'utilisateur clique sur le bouton, ouvre le modal Modifier
function remplissage(info_fillm) {
  // Récupèrer dles inputs du formulaire de modification dans le modal
  var idModif = document.getElementById('form_id_mod');
  var titreModif = document.getElementById('form_title_mod');
  var anneeModif = document.getElementById('form_year_mod');
  var urlFilmModif = document.getElementById('form_urlFilm_mod');
  var urlImageModif = document.getElementById('form_urlImage_mod');
  var synoModif = document.getElementById('form_syno_mod');
  var genreModif = document.getElementById('form_genre_mod');
  var realModif = document.getElementById('form_real_mod');
  
  // Récupère les labels des inputs
  var lab_titre = document.getElementById('lab_form_title_mod');
  var lab_annee = document.getElementById('lab_form_year_mod');
  var lab_urlFilm = document.getElementById('lab_form_urlFilm_mod');
  var lab_urlImage = document.getElementById('lab_form_urlImage_mod');
  var lab_syno = document.getElementById('lab_form_syno_mod');
  var lab_genre = document.getElementById('lab_form_genre_mod');
  var lab_real = document.getElementById('lab_form_real_mod');

  idModif.value = info_fillm["id"];
  titreModif.value = info_fillm["titre"];
  anneeModif.value = info_fillm["annee"];
  urlFilmModif.value = info_fillm["urlFilm"];
  urlImageModif.value = info_fillm["urlImage"];
  synoModif.value = info_fillm["synopsis"];
  genreModif.value = info_fillm["categorie"];
  realModif.value = info_fillm["realisateur"];

  lab_titre.classList.add("active");
  lab_annee.classList.add("active");
  lab_urlFilm.classList.add("active");
  lab_urlImage.classList.add("active");
  lab_syno.classList.add("active");
  lab_genre.classList.add("active");
  lab_real.classList.add("active");
}

//Quand l'utilisateur clique sur le bouton, ouvre le modal Ajouter
btnAdd.onclick = function(){
  modalAdd.style.display = "block";
}

//Quand l'utilisateur clique sur le bouton, ouvre le modal Ajouter
btnSup.onclick = function(){
  modalSup.style.display = "block";
}



//Quand l'utilisateur clique sur (x), ferme le modal Modifier
btn_close_modal.onclick = function() {
  modal.style.display = "none";
}

// Quand l'utilisateur clique sur (x) ferme le modal Ajouter
btn_close_modalAdd.onclick = function() {
  modalAdd.style.display = "none";
}

// Quand l'utilisateur clique sur (x) ferme le modal Ajouter
btn_close_modalSup.onclick = function() {
  modalSup.style.display = "none";
}


// Quand l'utilisateur clique en dehors du modal Modifier, le ferme
window.onclick = (function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
});

// Quand l'utilisateur clique en dehors du modal Ajouter, le ferme
window.onclick = (function(event) {
  if (event.target == modalAdd) {
    modalAdd.style.display = "none";
}
});


// Quand l'utilisateur clique en dehors du modal Ajouter, le ferme
window.onclick = (function(event) {
  if (event.target == modalSup) {
    modalSup.style.display = "none";
}
});