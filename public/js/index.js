/*=============== SHOW MENU ===============*/
const showMenu = (toggleId, navId) => {
    const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId);

    toggle.addEventListener("click", () => {
        // Add show-menu class to nav menu
        nav.classList.toggle("show-menu");

        // Add show-icon to show and hide the menu icon
        toggle.classList.toggle("show-icon");
    });
};

showMenu("nav-toggle", "nav-menu");

// menu_img

const observer_menu_img = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry);
        if (entry.isIntersecting) {
            entry.target.classList.add("show");
        } else {
            entry.target.classList.remove("show");
        }
    });
});
const hiddenElements_menu_img = document.querySelectorAll(".menu_img");
hiddenElements_menu_img.forEach((el) => observer_menu_img.observe(el));


// menu_text

const observer_menu_text = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry);
        if (entry.isIntersecting) {
            entry.target.classList.add("show_menu_text");
        } else {
            entry.target.classList.remove("show_menu_text");
        }
    });
});
const hiddenElements_menu_text = document.querySelectorAll(".menu_text");
hiddenElements_menu_text.forEach((el) => observer_menu_text.observe(el));



// info_data

const observer_info_data = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry);
        if (entry.isIntersecting) {
            entry.target.classList.add("show_info_data");
        } else {
            entry.target.classList.remove("show_info_data");
        }
    });
});
const hiddenElements_info_data = document.querySelectorAll(".info_data");
hiddenElements_info_data.forEach((el) => observer_info_data.observe(el));


// about_discription

const observer_about_discription = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry);
        if (entry.isIntersecting) {
            entry.target.classList.add("show_about_discription");
        } else {
            entry.target.classList.remove("show_about_discription");
        }
    });
});
const hiddenElements_about_discription = document.querySelectorAll(".about_discription");
hiddenElements_about_discription.forEach((el) => observer_about_discription.observe(el));

// about_text

const observer_about_text = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry);
        if (entry.isIntersecting) {
            entry.target.classList.add("show_about_text");
        } else {
            entry.target.classList.remove("show_about_text");
        }
    });
});
const hiddenElements_about_text = document.querySelectorAll(".about_text");
hiddenElements_about_text.forEach((el) => observer_about_text.observe(el));
// about_text_2

const observer_show_about_text_2 = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry);
        if (entry.isIntersecting) {
            entry.target.classList.add("show_about_text");
        } else {
            entry.target.classList.remove("show_about_text");
        }
    });
});
const hiddenElements_about_text_2 = document.querySelectorAll(".about_text");
hiddenElements_about_text_2.forEach((el) => observer_show_about_text_2.observe(el));
// course_image

const observer_course_image = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry);
        if (entry.isIntersecting) {
            entry.target.classList.add("show_course_image");
        } else {
            entry.target.classList.remove("show_course_image");
        }
    });
});
const hiddenElements_course_image = document.querySelectorAll(".course_image");
hiddenElements_course_image.forEach((el) => observer_course_image.observe(el));