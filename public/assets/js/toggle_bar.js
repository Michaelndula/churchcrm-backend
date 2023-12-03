let toggle_menu = document.getElementById("toggleSidebar");
let sideBar = document.getElementById("sideNavbar");
let pageBody = document.getElementById("page-body")
let dashBoardContainer = document.getElementById("dashboardContainer")

toggle_menu.addEventListener('click', function () {
    if (sideBar.style.display === 'block' || sideBar.style.display === '') {
        sideBar.style.display = 'none'; 
        pageBody.style.display = 'block'
        dashBoardContainer.style.paddingLeft = '50px'
    } else {
        sideBar.style.display = 'block';
        pageBody.style.display = 'grid'
    }
});
