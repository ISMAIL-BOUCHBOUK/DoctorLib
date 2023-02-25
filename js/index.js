let form = document.querySelector("form");
let R_avancee = document.getElementById("R-avancee")
let R_simple = document.getElementById("R-simple");
let check_box = document.querySelector(".bg .header .search-box .s-type").getElementsByTagName("input")[0];
let collapse = document.getElementById("advanced-search");
let search_btn = document.getElementById("search");
let nom = "";
let prenom = "";
let code_postal = "";
collapse.style.transition = "all 0.7s";
R_avancee.style.transition = "all 0.3s";
R_simple.style.transition = "all 0.3s";


R_avancee.addEventListener("click", function () {
    if (this.className != "active") {
        R_simple.removeAttribute("class");
        this.className = "active";
        check_box.checked = true;
        if (window.matchMedia("(max-width: 991.9px)").matches) {
            collapse.style.height = "19.5vw";
        } else {
            collapse.style.height = "44.5px";
        }
    }
});

R_simple.addEventListener("click", function () {
    if (this.className != "active") {
        R_avancee.removeAttribute("class");
        this.className = "active";
        check_box.checked = false;
        collapse.style.height = "0px";
    }
});

addEventListener("resize", function () {
    if (check_box.checked) {
        if (window.matchMedia("(max-width: 991.9px)").matches) {
            collapse.style.height = "19.5vw";
        } else {
            collapse.style.height = "44.5px";
        }
    }
})



form.addEventListener("submit", function (e) {
    if (check_box.checked == false) {
        collapse.getElementsByTagName("input")[0].value="";
        collapse.getElementsByTagName("input")[1].value="";
        collapse.getElementsByTagName("input")[2].value="";
    }
    
});