var getCodes = document.querySelector('#getCodes');
var postcode = document.querySelector('#pc');
var provincie = document.querySelector('#pr');
var myInterval;
var counter = 0;
var nrOfPostcodes = 9000;

getCodes.addEventListener('click', function() {
    var destination = getCodes.getAttribute("url");
    GetRequestInterval = setInterval(function() {
        updateProvinceCode();
    }, 1100);

    function updateProvinceCode() {
        $.ajax({
            type: "GET",
            url: destination,
            dataType: "json",
            error: function(message){
                alert(message.responseText);
            }
        }).done(function(msg) {
            console.log(msg);
            postcode.innerHTML = msg[0];
            provincie.innerHTML = msg[1];
        });
        counter++;
        if (counter > nrOfPostcodes) {
            clearInterval(GetRequestInterval);
            counter = 0;
        }
    }
});


