document.getElementById("toast-button").addEventListener("click", function () {
    document.getElementById('toast-wrapper').classList.add('d-none');
});

// transparent, but not disabled (keyboard users can still tab)

const pointers = document.querySelectorAll(".pointer");
console.log(pointers);
pointers.forEach((item, index) => {
    if (item.classList.contains("form-button")) {
        item.addEventListener("mouseover", function () {
            if (item.classList.contains("delete-button")) {
                pointers[index - 2].classList.add("character-hover");
                pointers[index - 1].classList.add("transparent");
            } else {
                console.log(item);
                pointers[index - 1].classList.add("character-hover");
                pointers[index + 1].classList.add("transparent");
            }
        });
        item.addEventListener("mouseout", function () {
            if (item.classList.contains("delete-button")) {
                pointers[index - 2].classList.remove("character-hover");
                pointers[index - 1].classList.remove("transparent");
            } else {
                pointers[index - 1].classList.remove("character-hover");
                pointers[index + 1].classList.remove("transparent");
            }
        });
    }
});
