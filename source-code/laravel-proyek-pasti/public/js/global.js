let sidebarclose = document.getElementById("sidebarclose");
let sidebaropen = document.getElementById("sidebaropen");
let sidebar = document.getElementById("sidebar");
// sidebarclose.addEventListener("click", (event) => {
//     sidebar.classList.remove("active");
// });
// sidebaropen.addEventListener("click", (event) => {
//     sidebar.classList.add("active");
// });

document.getElementById("sidebaropen").addEventListener("click", function () {
    document.getElementById("sidebar").classList.toggle("active");
});
