//Variable Sidebar
const checkbox = document.querySelector("#toggle");
const sidebar = document.querySelector("#sidebar");
const contentBar = document.querySelector("#contentBar");
const topMenu = document.querySelector("#topMenu");
const toggleMenu = document.querySelector("#toggleMenu");
const allTextMenu = document.querySelectorAll("#textMenu");

//Variable Dark & Light


//Function Sidebar
checkbox.addEventListener("click", function() {
    if (checkbox.checked) {
        sidebar.classList.add("w-72")
        sidebar.classList.remove("w-16")
        // sidebar.classList.add("absolute")
        // contentBar.classList.add("fixed")
        topMenu.classList.remove("flex-col")
        topMenu.classList.add("flex-row")
        toggleMenu.classList.add("order-last")
        toggleMenu.classList.add("items-center")
        allTextMenu.forEach(eachTextMenu => {
            eachTextMenu.classList.remove("hidden");
        })
        // sidebar.classList.add("sm:w-20")
    } else {
        sidebar.classList.add("w-16")
        sidebar.classList.remove("w-72");
        // sidebar.classList.remove("absolute")
        // contentBar.classList.remove("fixed")
        topMenu.classList.add("flex-col")
        topMenu.classList.remove("flex-row")
        toggleMenu.classList.remove("order-last")
        toggleMenu.classList.remove("items-center")
        allTextMenu.forEach(eachTextMenu => {
            eachTextMenu.classList.add("hidden");
        })
        // sidebar.classList.remove("sm:w-20")
    }
});

//Function Dark & Light
const checkboxDark = document.querySelector("#toggleDarkLight");
const html = document.querySelector("html");
const checkbox_light = document.querySelector("#ligthMode");
const checkbox_dark = document.querySelector("#darkMode");

checkboxDark.addEventListener("click", function () {
    if(checkboxDark.checked){
        html.classList.add("dark");
        checkbox_dark.classList.add("hidden");
        checkbox_light.classList.remove("hidden");
    }else{
        html.classList.remove("dark");
        checkbox_light.classList.add("hidden");
        checkbox_dark.classList.remove("hidden");
    }
    });