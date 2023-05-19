function addCalendarEvent() {
    $.ajax({
		type: "POST",
		url:  "addCalendarEvent.php",
		data: {
			'date': $('#event_date').val(),
			'time': $('#event_time').val(),
			'title': $('#event_title').val(),
			'descr': $('#event_descr').val()
		},
		success: function(data){
		   $("#info").html(data);
		}
    });
}