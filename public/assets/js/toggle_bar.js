let toggle = document.getElementById("toggleSidebar");
let sideBar = document.getElementById("sideNavbar");

toggle.addEventListener('click', function () {
    if (sideBar.style.display === 'block' || sideBar.style.display === '') {
        sideBar.style.display = 'none'; 
    } else {
        sideBar.style.display = 'block';
    }
});
