  function landpagenav(){
    document.getElementById("headerbar").style.display="none";
    document.getElementById("navi").style.display="none";
    // document.getElementById("naviz").style.display="none";
    document.getElementById("landpage").style.display="block";
    // document.getElementById("landpage2").style.display="none";
    // document.getElementById("mainpage").style.display="none";
    // document.getElementById("accountpage").style.display="none";
    // document.getElementById("NovelsPage").style.display="none";
}

function showlogin(){
    document.getElementById("headerbar").style.display="none";
    document.getElementById("naviz").style.display="block";
    document.getElementById("landpage").style.display="none";
    document.getElementById("landpage2").style.display="block";

}

function showheader(){
    document.getElementById("headerbar").style.display="block";
    document.getElementById("navi").style.display="block";
    document.getElementById("naviz").style.display="none";
    document.getElementById("landpage").style.display="none";
    document.getElementById("landpage2").style.display="none";
    document.getElementById("mainpage").style.display="block";
    document.getElementById("accountpage").style.display="none";
    document.getElementById("NovelsPage").style.display="none";
    // document.getElementById("ComicsPage").style.display="none";
}

// function showpage(page){
//     var pages = document.getElementsByClassName('pages');    
//     for(var j = 1; j < pages.length; j++){
//         console.log(pages[j]);
//         pages[j].style.display="none";
//     }
//     document.getElementById(page).style.display="block";
//     document.getElementById().style.display="block";
//     (element => {
//         element.style.display='none';
//     });
//     document.getElementsByClassName("pages").style.display="none";
// }


function showAccountPage(){
    document.getElementById("headerbar").style.display="block";
    document.getElementById("landpage").style.display="none";
    document.getElementById("landpage2").style.display="none";
    document.getElementById("mainpage").style.display="none";
    document.getElementById("accountpage").style.display="block";
    document.getElementById("NovelsPage").style.display="none";
}

function showNovelsPage(){
    document.getElementById("headerbar").style.display="block";
    document.getElementById("landpage").style.display="none";
    document.getElementById("landpage2").style.display="none";
    document.getElementById("mainpage").style.display="none";
    document.getElementById("accountpage").style.display="none";
    document.getElementById("NovelsPage").style.display="block";
    
}

function showComicsPage(){
    document.getElementById("headerbar").style.display="block";
    document.getElementById("landpage").style.display="none";
    document.getElementById("landpage2").style.display="none";
    document.getElementById("mainpage").style.display="none";
    document.getElementById("accountpage").style.display="none";
    document.getElementById("NovelsPage").style.display="none";
    document.getElementById("ComicsPage").style.display="block";
}