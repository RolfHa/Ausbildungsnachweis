const App = {

    datePickerForm:null,
    dateField:null,

    run: function () {
        console.log('run app');

        this.datePickerForm = document.getElementById('datePicker');
        this.dateField = document.getElementById('dateField');

        const inputs = document.querySelectorAll(['input[type=number]', 'input[type=text]', 'textarea', 'select']);
        const sheetForm = document.getElementById('sheetForm');
        const overallHours = document.getElementById('overallHours');
        const totalHoursInputList = document.querySelectorAll('input.totalHours');
        const datePickerCalendar = document.getElementById('datePickerCalendar');

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
            if (val !== '') {
                hours += parseInt(val);
            }
        });

        overallHours.innerText = hours.toString();

        datePickerCalendar.onchange = function (e) {
            App.goto(this.value);
        }
    },

    logout: function () {
        window.location = "logout.php";
    },

    goto: function (dateVal) {
        this.dateField.value = dateVal;
        this.datePickerForm.submit()
    }
};

document.addEventListener("DOMContentLoaded", (event) => App.run());