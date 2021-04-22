/* ----------------------------- Responsive Menu ----------------------------- */

let navigation = document.getElementById('navigation');
let navigationIcon = document.getElementById('navigation-icon');
let navigationElements = navigation.childElementCount;
let width = document.body.clientWidth;

navResponsive(document.body.clientWidth);

window.onresize = () => {
   width = document.body.clientWidth;
   navResponsive(width);
}

function navResponsive (width) {
    if(width < 767.98) {
        //navigation.classList.add('responsive');
        navigationIcon.style.display = "block";
        navigation.style.display = "none";
    }     
    else {
        //navigation.classList.remove('responsive');
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

// document.addEventListener('click', function(){
//     if(showMenu){
//         navigation.style.display = "none";
//         showMenu = false;
//     }
// });

/* -------------------------------- Side Menu ------------------------------- */

let sideMenuWidth = (width < 767.98) ? width : 225;

/* Set the width of the side navigation to 225px */
let sideUser = document.getElementById("side-user");

if(sideUser) {
   let sideOpened = false;
   sideUser.addEventListener('click',function(){
       document.getElementById("mySidenav").style.right = "0px";
       setTimeout(function(){
           sideOpened = true;
       },500);
   });

   /* Set the width of the side navigation to 0 */
   document.addEventListener('click', function(){
      if(sideOpened){
         document.getElementById("mySidenav").style.right = "-" + sideMenuWidth + "px";
         sideOpened = false;
      }
   });
}


