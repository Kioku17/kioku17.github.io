$(document).on('click', '#listen', function () {
    var txt = $('#tts').val() + '... hết rồi, đờ cờ mờ mờ ahihihihi';
    var speed = $('#speed').val();
    var tone = $('#tone').val();

    var extra = {
        pitch: parseFloat(tone),
        rate: parseFloat(speed)
    };
    var lang = 'Vietnamese Male';
    responsiveVoice.speak(txt, lang, extra);

});

$(document).on('click', '#pause', function () {
    responsiveVoice.pause();
});

var speed = document.getElementById("speed");
var tone = document.getElementById("tone");
var output_slider = document.getElementById("val_speed");
var output_tone = document.getElementById("val_tone");

output_slider.innerHTML = speed.value;
output_tone.innerHTML = tone.value;

speed.oninput = function () {
    output_slider.innerHTML = this.value;
}

tone.oninput = function () {
    output_tone.innerHTML = this.value;
}
