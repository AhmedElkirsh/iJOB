// DOM elements
const salarySlider = document.getElementById("salarySlider");
let minSalaryHandler = document.getElementById("min-salary-handler");
let maxSalaryHandler = document.getElementById("max-salary-handler");
const track = document.getElementById("track");
const minSalaryInput = document.getElementById("minSalaryLabel");
const maxSalaryInput = document.getElementById("maxSalaryLabel");

// Slider dimensions and values
const sliderWidth = salarySlider.offsetWidth;
let minSalary = 10000;
let maxSalary = 500000;

// Initial positions of handles
function setInitialPositions() {
    minSalaryHandler.style.left = "0px";
    maxSalaryHandler.style.left = `${sliderWidth}px`;
}

function updateTrack() {
    const left = parseInt(minSalaryHandler.style.left);
    const width = Math.abs(parseInt(maxSalaryHandler.style.left) - left);
    track.style.left = `${left}px`;
    track.style.width = `${width}px`;
}

// Reset function
function salaryRangeReset() {
    minSalary = 10000;
    maxSalary = 500000;

    minSalaryInput.value = minSalary;
    maxSalaryInput.value = maxSalary;

    setInitialPositions();
    updateTrack();
}

// Functions for updating the track
function inputUpdateSlider() {
    const minVal = parseInt(minSalaryInput.value);
    const maxVal = parseInt(maxSalaryInput.value);

    if (isNaN(minVal) || minVal < 0 || isNaN(maxVal) || maxVal > maxSalary) {
        minSalaryInput.value = minSalary;
        maxSalaryInput.value = maxSalary;
        return;
    }

    minSalaryHandler.style.left = `${
        ((minVal - minSalary) / (maxSalary - minSalary)) * sliderWidth
    }px`;
    maxSalaryHandler.style.left = `${
        ((maxVal - minSalary) / (maxSalary - minSalary)) * sliderWidth
    }px`;

    updateTrack();
}

// Mouse behaviour functions
let activeHandle = null;
let initialX = 0;

function handleMouseDown(e) {
    activeHandle = e.target;
    initialX = e.clientX;
}

function handleMouseMove(e) {
    if (activeHandle) {
        let deltaX = e.clientX - initialX;
        let newPosition = parseInt(activeHandle.style.left) + deltaX;

        if (activeHandle === maxSalaryHandler) {
            if (newPosition < parseInt(minSalaryHandler.style.left) + 10) {
                newPosition = parseInt(minSalaryHandler.style.left) + 10;
            }
        } else if (activeHandle === minSalaryHandler) {
            if (newPosition > parseInt(maxSalaryHandler.style.left) - 10) {
                newPosition = parseInt(maxSalaryHandler.style.left) - 10;
            }
        }

        newPosition = Math.max(0, Math.min(sliderWidth, newPosition));
        activeHandle.style.left = `${newPosition}px`;

        dragUpdateSlider();
        initialX = e.clientX;
    }
}

function handleMouseUp() {
    activeHandle = null;
}

function dragUpdateSlider() {
    const Handle1Value =
        (parseInt(minSalaryHandler.style.left) / sliderWidth) *
            (maxSalary - minSalary) +
        minSalary;
    const Handle2Value =
        (parseInt(maxSalaryHandler.style.left) / sliderWidth) *
            (maxSalary - minSalary) +
        minSalary;

    minSalaryInput.value = Math.round(Handle1Value);
    maxSalaryInput.value = Math.round(Handle2Value);

    updateTrack();
}

// Event listeners
minSalaryInput.addEventListener("change", inputUpdateSlider);
maxSalaryInput.addEventListener("change", inputUpdateSlider);
minSalaryHandler.addEventListener("mousedown", handleMouseDown);
maxSalaryHandler.addEventListener("mousedown", handleMouseDown);

document.addEventListener("mousemove", handleMouseMove);
document.addEventListener("mouseup", handleMouseUp);

// Initialization
salaryRangeReset();
