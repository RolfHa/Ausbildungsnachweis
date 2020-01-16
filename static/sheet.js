const App = {};
App.run = function () {
    console.log('run app');

    const inputs = document.querySelectorAll(['input[type=number]','input[type=text]','textarea', 'select']);
    const sheetForm = document.getElementById('sheetForm');
    const overallHours = document.getElementById('overallHours');
    const totalHoursInputList = document.querySelectorAll('input.totalHours');

    inputs.forEach((element) => {
        element.addEventListener('change', (event) => collectData());
    });

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
};

document.addEventListener("DOMContentLoaded", (event) => App.run());