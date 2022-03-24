const form = document.getElementsByTagName('form');
let pastDate = new Date();

const getFormType = () => {
    const action = (window.location.href.includes('create')) ? 'store' : 'update';
    form.setAttribute(method, `{{ route('characters.${action}') }}`);
};


const date = new Date();
const monthSelect = document.getElementById('month-select');
let month;
const addMonth = () => {
    while ((monthSelect.childElementCount - 1) < 12) {
        monthSelect.innerHTML += `<option value="${Number(monthSelect.lastElementChild.value) + 1}" {{ ${Number(monthSelect.lastElementChild.value) + 1} === old('month') ? 'selected' : '' }}>${Number(monthSelect.lastElementChild.value) + 1}</option>`;
    }
}

const yearSelect = document.getElementById('year-select');
let previousYear = 0;
yearSelect.addEventListener('change', function () {
    monthSelect.disabled = false;
    if (Number(yearSelect.options[yearSelect.selectedIndex].value) === date.getFullYear()) {
        month = date.getMonth() + 1;
        while (monthSelect.childElementCount - 1 > month) {
            monthSelect.removeChild(monthSelect.lastChild);
        }
        previousYear = date.getFullYear()
    } else {
        if (previousYear === date.getFullYear()) {
            addMonth();
        }
        previousYear = Number(0);
    }
    pastDate.setFullYear(
        Number(yearSelect.options[yearSelect.selectedIndex].value)
    );
    if (!daySelect.disabled) {
        calculateDay();
    }
});

const daySelect = document.getElementById('day-select');
const calculateDay = () => {
    if (Number(daySelect.childElementCount - 1) !== pastDate.getDate()) {
        if (Number(daySelect.childElementCount - 1) > pastDate.getDate()) {
            while ((daySelect.childElementCount - 1) > pastDate.getDate()) {
                daySelect.removeChild(daySelect.lastChild);
            }
        } else {
            while ((daySelect.childElementCount - 1) < pastDate.getDate()) {
                daySelect.innerHTML += `<option value="${
                        Number(daySelect.lastElementChild.value) + 1
                    }" {{ ${
                        Number(daySelect.lastElementChild.value) + 1
                    } === old('day') ? 'selected' : '' }}>${
                        Number(daySelect.lastElementChild.value) + 1
                    }</option>`;
            }
        }
    }
}

monthSelect.addEventListener("change", function () {
    daySelect.disabled = false;
    pastDate.setMonth(
        Number(monthSelect.options[monthSelect.selectedIndex].value), 0
    );
    calculateDay();
});

if (yearSelect.options[yearSelect.selectedIndex].value !== "") {
        pastDate.setFullYear(
            Number(yearSelect.options[yearSelect.selectedIndex].value)
        );
        monthSelect.disabled = false;
    if (monthSelect.options[monthSelect.selectedIndex].value !== "") {
        daySelect.disabled = false;
        pastDate.setMonth(
            Number(monthSelect.options[monthSelect.selectedIndex].value),
            0
        );
        calculateDay();
    }
}


const removeOccupationButton = document.getElementById('remove-occupation');
const addOccupationButton = document.getElementById('add-occupation');

const parseOccupations = () => {
    const occupationList = Array.from(document.getElementById('occupation-list').value.split(", "));
    occupationList.forEach((occupation, index) => {
        if (index !== 0) {
            addOccupations();
        }
        document.querySelectorAll('.occupations')[index].value = occupation;
    });
};

const addOccupations = () => {
    const occupationInput = '<input class="form-input occupations" type="text" name="occupations" placeholder="Type One Per Box">';
    document.getElementById('occupation-wrapper').insertAdjacentHTML('beforeend', occupationInput);
};

const replaceOccupationLabel = (newTag) => {
    const wrapper = document.getElementById('occupation-wrapper');
    let newWrapper = document.createElement(newTag);
    let description = (newTag === "fieldset") ? document.createElement('legend') : document.createElement('label');
    document.getElementById('descriptor').remove();
    description.setAttribute('id', 'descriptor');
    if (description.tagName === "LABEL") {
        description.setAttribute('for', 'occupations');
        description.className = "form-label";
            description.innerText = "Occupation";
    } else {
            description.innerText = "Occupations";
    }
    newWrapper.appendChild(description);
    Array.from(wrapper.children).forEach(child => newWrapper.appendChild(child));
    newWrapper.setAttribute('id', 'occupation-wrapper');
    if (newWrapper.tagName === "FIELDSET") {
    newWrapper.setAttribute('class', 'd-flex flex-wrap pb-2 occupation-wrapper-fieldset');
    } else {
        newWrapper.setAttribute('class', 'pb-2')
    }
    document.getElementById('occupation-parent-wrapper').replaceChild(newWrapper, wrapper);
}

document.getElementById('add-occupation').addEventListener('click', function () {
    addOccupations();
    if (document.querySelectorAll(".occupations").length === 2) {
        replaceOccupationLabel("fieldset");
        removeOccupationButton.hidden = false;
        removeOccupationButton.disabled = false
    }
});

removeOccupationButton.addEventListener('click', function () {
    document.getElementById("occupation-wrapper").lastElementChild.remove();
    const occupations = document.querySelectorAll(".occupations");
    if (occupations.length === 1) {
        replaceOccupationLabel("div");
        removeOccupationButton.hidden = true;
        removeOccupationButton.disabled = true;
    }
});

window.addEventListener('DOMContentLoaded', function() {
    parseOccupations();
    if (document.querySelectorAll('.occupations').length > 1) {
        removeOccupationButton.disabled = false;
        removeOccupationButton.hidden = false;
        replaceOccupationLabel("fieldset");
    }
});

document.getElementById('submit-button').addEventListener('click', function () {
    let occupations = [];
    document.querySelectorAll('.occupations').forEach((input) => {
        if (new RegExp(".").test(input.value)) {
            occupations.push(input.value);
        }
    });
    while (document.querySelectorAll('.occupations').length !== 1) {
        document.getElementById('occupation-wrapper').removeChild(document.getElementById('occupation-wrapper').lastChild);
    }
    document.getElementById('occupation-list').value = occupations.join(', ');
})
