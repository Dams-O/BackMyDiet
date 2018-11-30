
var newDates = [];
var date;
var dates;
function getCalendar(data) {
    for(var key in data.dates){
        var dateMoment = moment(new Date(key));
        newDates.push(dateMoment);
    }
    dates = data.dates;

    $('#datetimepicker12').datetimepicker({
        inline: true,
        format: 'DD/MM/YYYY',
        enabledDates: newDates,
        locale: 'fr',
        daysOfWeekDisabled: [0]
    });
    $('#datetimepicker12').data('DateTimePicker').minDate(data.minDate);
    $('#horaires').show();
    $('#horaires').find('option').remove();
    $('#ajouter').prop("disabled", false);
    $('#ajouter').prop("enabled", false);
    var value = data.dates[Object.getOwnPropertyNames(data.dates)[0]];
    value.forEach(function(val){
        $('#horaires').append( '<option>'+val+'</option>' );
    });
    data = $('#datetimepicker12').data('DateTimePicker').date();
    date = moment(data).format('YYYY/MM/DD');

    $('#datetimepicker12').on('dp.change',function(e){
        $('#horaires').find('option').remove();
        date = moment(e.date._d).format('YYYY/MM/DD');
        for(var key in dates){
            if(moment(e.date._d).format('YYYY/MM/DD') == key){
                var values = dates[key];
                values.forEach(function(value){
                    $('#horaires').append( '<option>'+value+'</option>' );
                });
            }
        }
    });
}
