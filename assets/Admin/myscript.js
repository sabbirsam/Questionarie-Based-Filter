
window.addEventListener("load", function () {
    //store tab variable
    var tabs = document.querySelectorAll("ul.nav-tabs > li");  //<ul class="nav nav-tabs">

    //if click on tabs the below event lis will happen
    for (i =0 ; i< tabs.length; i++){
        tabs[i].addEventListener("click",switchTab);  // function is initialize on call

    }

    //define the function ====   switchTab

    function switchTab (event){
        event.preventDefault();

        // console.log(event);// use to show on inspect whether its working or not
        document.querySelector("ul.nav-tabs li.active").classList.remove("active");  //it will remove the active class if i click on another tab
        //to see go to inspect


        //<div id="tab-1" class="tab-pane active"> used in below
        document.querySelector(".tab-pane.active").classList.remove("active"); // it used after clcik on another tab remove content of first tab

        //used below one to active the current class

        var clickedtab = event.currentTarget;
        var anchor = event.target;
        //console.log(anchor);  // show what #tab-1 is now

        var activePaneID = anchor.getAttribute("href");



        clickedtab.classList.add("active");
        document.querySelector(activePaneID).classList.add("active");

    }

});