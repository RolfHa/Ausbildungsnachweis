const areas = document.querySelectorAll('textarea');
const inputs = document.querySelectorAll('input.hoursOverall');
const sheetForm = document.getElementById('sheetForm');

areas.forEach((element) => {
    element.addEventListener('change', (event) => {
        collectData();
    });
});

inputs.forEach((element) => {
    element.addEventListener('change', (event) => {
        collectData();
    });
});

function collectData() {
    console.log('collect Data');
    sheetForm.submit();
}