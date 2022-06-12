var list_buttons = document.getElementsByClassName("list_button");

for (let list_button of list_buttons) {
    list_button.addEventListener("click", function() {
        this.parentElement.querySelector(".nested").classList.toggle("active");
        this.classList.toggle("minus");
    });
}
