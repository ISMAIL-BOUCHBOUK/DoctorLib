let form = document.querySelector("form");
let inp_Tarea = document.querySelectorAll(".form-floating input , .form-floating textarea");
let MTP = document.getElementById("MTP");
let con_MTP = document.getElementById("con-MTP");
let select = document.querySelectorAll(".form-floating select");
// let check = document.querySelector(".bg .main .row .checkbox .form-check input");
let submit = document.querySelector(".bg .main .row .submit button");
let labels = document.querySelectorAll(".form-floating .infocused");
let label;



let Fucos = function(){
    label = this.parentElement.querySelector("label");
    label.className = "focused";
}

let Blur = function(){
    label = this.parentElement.querySelector("label");
    label.className = "focused";
    if(this.value == ""){
        label.className = "infocused";
    }
    else{
        label.className = "focused";
    }
}

let inp_Tarea_validation = function(){
    this.classList.remove("is-valid");
    this.classList.remove("is-invalid");
    if(this.value.trim() == ""){
        this.classList.add("is-invalid");
    }
    else{
        this.classList.add("is-valid");
    }
}

let inp_Tarea_validat = function(item){
    item.classList.remove("is-valid");
    item.classList.remove("is-invalid");
    if(item.value.trim() == ""){
        item.classList.add("is-invalid");
        return false;
    }
    else{
        item.classList.add("is-valid");
        return true;
    }
}

let MTP_validat = function(){
    con_MTP.classList.remove("is-valid");
    con_MTP.classList.remove("is-invalid");

    MTP.classList.remove("is-valid");
    MTP.classList.remove("is-invalid");
    
    if(MTP.value.length < 8){
        con_MTP.classList.add("is-invalid");
        MTP.classList.add("is-invalid");
        return false;
    }else if(con_MTP.value != MTP.value || con_MTP.value.trim() == ""){
        con_MTP.classList.add("is-invalid");
        MTP.classList.add("is-valid");
        return false;
    }
    else{
        con_MTP.classList.add("is-valid");
        MTP.classList.add("is-valid");
        return true;
    }
}

let select_validation = function(){
    this.classList.remove("is-valid");
    this.classList.remove("is-invalid");
    if(this.selectedIndex == 0){
        this.classList.add("is-invalid");
    }
    else{
        this.classList.add("is-valid");
    }
}

let select_validat = function(item){
    item.classList.remove("is-valid");
    item.classList.remove("is-invalid");
    if(item.selectedIndex == 0){
        item.classList.add("is-invalid");
        return false;
    }
    else{
        item.classList.add("is-valid");
        return true;
    }
}

let checkbox_validation = function(){
    this.classList.remove("is-valid");
    this.classList.remove("is-invalid");
    if(!this.checked){
        this.classList.add("is-invalid");
    }
    else{
        this.classList.add("is-valid");
    }
}

let checkbox_validat = function(item){
    item.classList.remove("is-valid");
    item.classList.remove("is-invalid");
    if(!item.checked){
        item.classList.add("is-invalid");
        return false;
    }
    else{
        item.classList.add("is-valid");
        return true;
    }
}

let all_validation = function(){
    let bool = true;
    inp_Tarea.forEach(function(item){
        if(!inp_Tarea_validat(item)){
            bool = false;
        }
    });

    select.forEach(function(item){
        if(!select_validat(item)){
            bool = false;
        }
    });

    // if(!checkbox_validat(check)){
    //     bool = false;
    // }
    
    if(!MTP_validat()){
        bool = false;
    }
    return bool;
}

let allFucosed = function(item , index){
    item.addEventListener("focus",Fucos);
    item.addEventListener("blur",Blur);
    if(item.id == "con-MTP" || item.id == "MTP"){
        item.addEventListener("keyup",MTP_validat);
    }else{
        item.addEventListener("keyup",inp_Tarea_validation);
    }
    if(item.value == ""){
        labels[index].className="infocused";
    }
    else{
        labels[index].className="focused";
    }
}

inp_Tarea[2].addEventListener("keydown",function(e){
    if(e.key == " "){
        e.preventDefault();
    }
});

MTP.addEventListener("keydown",function(e){
    if(e.key == " "){
        e.preventDefault();
    }
});

con_MTP.addEventListener("keydown",function(e){
    if(e.key == " "){
        e.preventDefault();
    }
});

form.addEventListener("submit",function(event){
    if(!all_validation()){
        event.preventDefault();
    }
});






inp_Tarea.forEach(allFucosed);
select.forEach(function(item){
    item.addEventListener("change",select_validation);
});
// check.addEventListener("change",checkbox_validation);
