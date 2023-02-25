
let categorie = document.getElementById("categorie");

function w_resize() {
    if (innerHeight > innerWidth) {
        categorie.className = "categorie-ver";
    }
    else {
        categorie.className = "categorie-hor";
    }

}

w_resize();

addEventListener("resize", w_resize);





