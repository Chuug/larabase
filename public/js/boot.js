/* ----------------------------- Responsive Menu ----------------------------- */

let navigation = document.getElementById('navigation');
let navigationIcon = document.getElementById('navigation-icon');
let navigationElements = navigation.childElementCount;

navResponsive(document.body.clientWidth);

window.onresize = () => {
    navResponsive(document.body.clientWidth)
}

function navResponsive (width) {
    if(width < 1000) {
        navigation.classList.add('responsive');
        navigationIcon.style.display = "block";
        navigation.style.display = "none";
    }     
    else {
        navigation.classList.remove('responsive');
        navigationIcon.style.display = "none";
        navigation.style.display = "inline-block";
    }     
}

let showMenu = false;
navigationIcon.addEventListener('click',function(){
    if(showMenu) {
        navigation.style.display = "none";
        showMenu = false;
    } else {
        navigation.style.display = "block";
        setTimeout(function(){
            showMenu = true;
        },100);
    }
});

document.addEventListener('click', function(){
    if(showMenu){
        navigation.style.display = "none";
        showMenu = false;
    }
});

/* -------------------------------- Side Menu ------------------------------- */

let sideMenuWidth = 225;

/* Set the width of the side navigation to 250px */
let sideUser = document.getElementById("side-user");
let sideOpened = false;
sideUser.addEventListener('click',function(){
    document.getElementById("mySidenav").style.width = sideMenuWidth + "px";
    navigationIcon.style.marginRight = (sideMenuWidth+15) + "px";
    setTimeout(function(){
        sideOpened = true;
    },500);
});

/* Set the width of the side navigation to 0 */
document.addEventListener('click', function(){
    if(sideOpened){
        document.getElementById("mySidenav").style.width = "0";
        navigationIcon.style.marginRight = "80px";
        sideOpened = false;
    }
});