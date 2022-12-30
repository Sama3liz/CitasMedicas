let $doctor,$date,$specialty,iRadio;
let $hoursMorning,$hoursAfternoon,$titleMorning,$titleAfternoon;
const titleMorning = `In the Morning`;
const titleAfternoon = `In the Afternoon`;
const noHours = `<h5 class="text-danger">No hours available</h5>`;

$(function(){
    $specialty = $('#specialty');
    $doctor = $('#doctor');
    $date = $('#date');
    $titleMorning = $('#titleMorning');
    $hoursMorning = $('#hoursMorning');
    $titleAfternoon = $('#titleAfternoon');
    $hoursAfternoon = $('#hoursAfternoon');
    $specialty.change(()=> {
        const specialtyId = $specialty.val();
        const url = `/specialties/${specialtyId}/doctors`;
        $.getJSON(url, onDoctorsLoaded);
    });
    $doctor.change(loadHours);
    $date.on('change',loadHours);
});

function onDoctorsLoaded(doctors){
    let htmlOptions = '';
    doctors.forEach(doctor => {
        htmlOptions += `<option value="${doctor.id}">${doctor.name}</option>`;
    });
    $doctor.html(htmlOptions);
    loadHours();
}

function loadHours(){
    const selectedDate = $date.val();
    const doctorId = $doctor.val();
    const url = `/schedule/hours?date=${selectedDate}&doctor_id=${doctorId}`;
    $.getJSON(url, displayHours);
}

function displayHours(data){
    let htmlHoursM = '';
    let htmlHoursA = '';
    iRadio = 0;
    if (data.morning) {
        const morning_intervals = data.morning;
        morning_intervals.forEach(interval=>{
            htmlHoursM += getRadioIntervalHTML(interval);
        });
    }
    if (!htmlHoursM != "") {
        htmlHoursM += noHours;
    }
    if (data.afternoon) {
        const afternoon_intervals = data.afternoon;
        afternoon_intervals.forEach(interval=>{
            htmlHoursA += getRadioIntervalHTML(interval);
        });
    }
    if (!htmlHoursA != "") {
        htmlHoursA += noHours;
    }
    $hoursMorning.html(htmlHoursM);
    $hoursAfternoon.html(htmlHoursA);
    $titleMorning.html(titleMorning);
    $titleAfternoon.html(titleAfternoon);
}

function getRadioIntervalHTML(interval){
    const text = `${interval.start} - ${interval.end}`;
    return `<div class="custom-control custom-radio mb-5">
                <input type="radio" id="interval${iRadio}" name="scheduled_time" class="custom-control-input" value="${interval.start}" required>
                <label class="custom-control-label" for="interval${iRadio++}">${text}</label>
            </div>`;
}
