let form = document.querySelector("form");
let inp_Tarea = document.querySelectorAll(".form-floating input , .form-floating textarea");
let MTP = document.getElementById("MTP");
let con_MTP = document.getElementById("con-MTP");
let select = document.querySelectorAll(".form-floating select");
let check = document.querySelector(".bg .main .row .checkbox .form-check input");
let submit = document.querySelector(".bg .main .row .submit button");
let labels = document.querySelectorAll(".form-floating .infocused");
//var specialites_array = ["Spécialité1", "Spécialité2", "Spécialité3", "Spécialité4", "Spécialité5"];
let spesial_select = document.querySelectorAll(".specialite select");
let remove_spe;
let add_spe = document.getElementById("add-Speciality");
let other_spesial_html = `<div class="row other-specialite">
<div class="col-lg-5 col-10 input specialite">
    <div class="form-floating">
        <select class="form-select" id="specialite" name="specialite[]">
            <option value="0" selected disabled value="">Spécialités</option>
        </select>
        <label class="focused">Spécialités</label>
    </div>
</div>
<div class="col-lg-1 col-2">
    <span class="remove_spe">-</span>
</div>
</div>`;



let Fucos = function () {
    this.parentElement.querySelector("label").className = "focused";
}

let Blur = function () {
    this.parentElement.querySelector("label").className = "focused";
    if (this.value == "") {
        this.parentElement.querySelector("label").className = "infocused";
    }
    else {
        this.parentElement.querySelector("label").className = "focused";
    }
}

let inp_Tarea_validation = function () {
    this.classList.remove("is-valid");
    this.classList.remove("is-invalid");
    if (this.value.trim() == "") {
        this.classList.add("is-invalid");
    }
    else {
        this.classList.add("is-valid");
    }
}

let inp_Tarea_validat = function (item) {
    item.classList.remove("is-valid");
    item.classList.remove("is-invalid");
    if (item.value.trim() == "") {
        item.classList.add("is-invalid");
        return false;
    }
    else {
        item.classList.add("is-valid");
        return true;
    }
}

let MTP_validat = function () {
    con_MTP.classList.remove("is-valid");
    con_MTP.classList.remove("is-invalid");

    MTP.classList.remove("is-valid");
    MTP.classList.remove("is-invalid");

    if (MTP.value.length < 8) {
        con_MTP.classList.add("is-invalid");
        MTP.classList.add("is-invalid");
        return false;
    } else if (con_MTP.value != MTP.value || con_MTP.value.trim() == "") {
        con_MTP.classList.add("is-invalid");
        MTP.classList.add("is-valid");
        return false;
    }
    else {
        con_MTP.classList.add("is-valid");
        MTP.classList.add("is-valid");
        return true;
    }
}

let valid = false;
let email_validat = function () {
    $("#email").removeClass("is-invalid").removeClass("is-valid");
    $.ajax({
        type: "POST",
        url: "administration/js/php-ajax/detect data change.php",
        data: { "proce": 'SELECT count(email) FROM `medecins` WHERE email = "' + $("#email").val() + '"' },
        success: function (response) {
            if (parseInt(response) != 0 && $("#email").val() != "") {
                $("#email").addClass("is-invalid");
                $("#em_used").show();
                valid = false;
            }
            else if ($("#email").val() == "" || !$("#email").val().includes("@")) {
                $("#email").addClass("is-invalid");
                $("#em_used").hide();
                valid = false;
            }
            else {
                $("#email").addClass("is-valid");
                $("#em_used").hide();
                valid = true;
            }
        }
    });
}

let select_validation = function () {
    this.classList.remove("is-valid");
    this.classList.remove("is-invalid");
    if (this.selectedIndex == 0) {
        this.classList.add("is-invalid");
    }
    else {
        this.classList.add("is-valid");
    }
}

let select_validat = function (item) {
    item.classList.remove("is-valid");
    item.classList.remove("is-invalid");
    if (item.selectedIndex == 0) {
        item.classList.add("is-invalid");
        return false;
    }
    else {
        item.classList.add("is-valid");
        return true;
    }
}

let checkbox_validation = function () {
    this.classList.remove("is-valid");
    this.classList.remove("is-invalid");
    if (!this.checked) {
        this.classList.add("is-invalid");
    }
    else {
        this.classList.add("is-valid");
    }
}

let checkbox_validat = function (item) {
    item.classList.remove("is-valid");
    item.classList.remove("is-invalid");
    if (!item.checked) {
        item.classList.add("is-invalid");
        return false;
    }
    else {
        item.classList.add("is-valid");
        return true;
    }
}

let all_validation = function () {
    let bool = true;
    inp_Tarea.forEach(function (item) {
        if (!inp_Tarea_validat(item)) {
            bool = false;
        }
    });

    select.forEach(function (item) {
        if (!select_validat(item)) {
            bool = false;
        }
    });

    if (!checkbox_validat(check)) {
        bool = false;
    }

    if (!MTP_validat()) {
        bool = false;
    }
    email_validat();
    if (!valid) {
        bool = false;
    }
    return bool;
}

let special_change = function () {
    spesial_select.forEach(function (item, index) {
        for (var i = 1; i < item.options.length; i++) {
            item.options[i].removeAttribute("disabled");
        }
        for (var i = 1; i < item.options.length; i++) {
            spesial_select.forEach(function (item1, index1) {
                if (index != index1) {
                    if (item.options[i].value == item1.value) {
                        item.options[i].setAttribute("disabled", "");
                    }
                }
            })
        }
    })
}

let allFucosed = function (item, index) {
    item.addEventListener("focus", Fucos);
    item.addEventListener("blur", Blur);
    if (item.id == "con-MTP" || item.id == "MTP") {
        item.addEventListener("input", MTP_validat);
    }
    else if (item.id == "email") {
        item.addEventListener("input", email_validat);
    }
    else {
        item.addEventListener("input", inp_Tarea_validation);
    }
    if (item.value == "") {
        labels[index].className = "infocused";
    }
    else {
        labels[index].className = "focused";
    }
}

// inp_Tarea[2].addEventListener("keydown", function (e) {
//     if (e.key == " ") {
//         e.preventDefault();
//     }
// });

// inp_Tarea[2].addEventListener("paste", function (e) {
//     e.preventDefault();
//     inp_Tarea[2].value = e.clipboardData.getData('Text').replaceAll(" ","");
// });

inp_Tarea[2].addEventListener("input", function (e) {
    e.preventDefault();
    inp_Tarea[2].value = e.target.value.replaceAll(" ", "");
});

// MTP.addEventListener("keydown", function (e) {
//     if (e.key == " ") {
//         e.preventDefault();
//     }
// });

// MTP.addEventListener("paste", function (e) {
//     e.preventDefault();
//     MTP.value = e.clipboardData.getData('Text').replaceAll(" ","");
// });

MTP.addEventListener("input", function (e) {
    e.preventDefault();
    MTP.value = e.target.value.replaceAll(" ", "");
});

// con_MTP.addEventListener("keydown", function (e) {
//     if (e.key == " ") {
//         e.preventDefault();
//     }
// });

// con_MTP.addEventListener("paste", function (e) {
//     e.preventDefault();
//     con_MTP.value = e.clipboardData.getData('Text').replaceAll(" ","");
// });

con_MTP.addEventListener("input", function (e) {
    e.preventDefault();
    con_MTP.value = e.target.value.replaceAll(" ", "");
});


add_spe.addEventListener("click", function () {
    if (spesial_select.length < 3) {
        this.parentElement.parentElement.insertAdjacentHTML("beforebegin", other_spesial_html);

        remove_spe = document.getElementsByClassName("remove_spe");

        spesial_select = document.querySelectorAll(".specialite select");

        select = document.querySelectorAll(".form-floating select");

        select.forEach(function (item) {
            item.addEventListener("change", select_validation);
        });

        remove_spe[remove_spe.length - 1].addEventListener("click", function (e) {
            this.parentElement.parentElement.remove();

            spesial_select = document.querySelectorAll(".specialite select");

            select = document.querySelectorAll(".form-floating select");

            // for (var i = 1; i < spesial_select.length; i++) {
            //     spesial_select[i].id = "specialite" + i;
            // }

            special_change();
        });

        // for (var i = 0; i < specialites_array.length; i++) {
        //     spesial_select[spesial_select.length - 1].insertAdjacentHTML("beforeend", `<option value="${specialites_array[i]}">${specialites_array[i]}</option>`);
        // }


        for (const [key, value] of Object.entries(specialites_array)) {
            spesial_select[spesial_select.length - 1].insertAdjacentHTML("beforeend", `<option value="${key}">${value}</option>`);
        }

        // for (var i = 1; i < spesial_select.length; i++) {
        //     spesial_select[i].id = "specialite" + i;
        // }

        special_change();

        spesial_select.forEach(function (item) {
            item.addEventListener("change", special_change);
        });
    }
});

form.addEventListener("submit", function (event) {
    if (!all_validation()) {
        event.preventDefault();
    }
});








inp_Tarea.forEach(allFucosed);
select.forEach(function (item) {
    item.addEventListener("change", select_validation);
});
check.addEventListener("change", checkbox_validation);

spesial_select.forEach(function (item) {
    item.addEventListener("change", special_change);
});






