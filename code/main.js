const elemsSidenav = document.querySelectorAll(".sidenav");
const instancesSidenav = M.Sidenav.init(elemsSidenav, {
    edge: "left"
});

//Dropdown

document.addEventListener('DOMContentLoaded', function() {
    var drop = document.querySelectorAll('.dropdown-trigger'); 
    M.Dropdown.init(drop);
    
  });
