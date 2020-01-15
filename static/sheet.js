const areas = document.querySelectorAll('textarea');
const inputs = document.querySelectorAll('input.hoursOverall');
const sheetForm = document.getElementById('sheetForm');
const overallHours = document.getElementById('overallHours');
const notice = document.getElementById('notice');
const totalHoursInputList = document.querySelectorAll('input.totalHours');

areas.forEach((element) => {
    element.addEventListener('change', (event) => collectData());
});

inputs.forEach((element) => {
    element.addEventListener('change', (event) => collectData());
});

notice.addEventListener('change', (event) => collectData());

function collectData() {
    console.log('collect Data');
    sheetForm.submit();
}



// calculate overall hours
let hours = 0;
totalHoursInputList.forEach((element) => {
    let val = element.value;
    if(val !== '') {
        hours += parseInt(val);
    }
});
overallHours.innerText = hours.toString();

console.log('run');