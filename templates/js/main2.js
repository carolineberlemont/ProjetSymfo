$(document).ready(function() {
    var datesDisabled = $('.datepicker').attr('data-dates-disabled')

    $('.datepicker').datepicker({
      format: "yyyy-mm-dd",
      autoclose: true,
      daysOfWeekDisabled:'0,2',
      endDate: '+1y',
      datesDisabled: datesDisabled

    });
});