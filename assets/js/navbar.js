const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box");

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    body.classList.toggle("sidebar-open"); // Toggle class on body
});

searchBtn.addEventListener("click", () => {
    sidebar.classList.remove("close");
    body.classList.remove("sidebar-open"); // Ensure sidebar-open class is removed
});


