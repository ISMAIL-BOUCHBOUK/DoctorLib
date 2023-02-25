// let h1 = document.getElementById("head");
// h1.style.color = "red";
// h1.style.margin = "10vw";
// console.log(h1);

let a1 = document.getElementsByClassName("header")[0];


document.body.style.textAlign = "center";

function addIlement(name , _age , _img){
    let container = document.createElement('div');
    let head = document.createElement('h1');
    let age = document.createElement('h2');
    let img = document.createElement('img');

    container.appendChild(head);
    container.appendChild(age);
    container.appendChild(img);

    head.textContent = name;
    age.textContent = _age+' years old';
    img.src = _img;

    document.body.appendChild(container);

    container.style.backgroundColor = 'gray';
    container.style.textAlign = 'center';
    container.style.width = '250px'
    container.style.display = 'inline-block';
    container.style.margin = '10px';
    img.style.width='200px';
}

addIlement('name' , '54' , '../style/media/doctor.png');
addIlement('name' , '13' , '../style/media/doctor.png');
addIlement('name' , '34' , '../style/media/doctor.png');

// let container = document.createElement('div');
// let head = document.createElement('h1');
// let age = document.createElement('h3');
// let img = document.createElement('img');

// container.appendChild(head);
// container.appendChild(age);
// container.appendChild(img);

// head.textContent = 'ismail';
// age.textContent = 21+'years old';
// img.src = '../style/media/doctor.png';

// document.body.appendChild(container);

document.getElementById('head').remove();



