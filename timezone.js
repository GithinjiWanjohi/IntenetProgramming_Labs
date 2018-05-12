$(document).ready(function(){
//    Returns the number of minutes ahead or behind Greenwich meridian
    var offset = new Date().getTimezoneOffset();

//    Returns the number of milliseconds since 1970/01/01
    var timestamp = new Date().getTime();

//    Converting time to UTC
    var utc_timestamp = timestamp +(60000*offset);

    $('#time_zone_offset').value(offset);
    $('#utc_timestamp').value(utc_timestamp);
});