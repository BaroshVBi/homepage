var m = 0;
var tab_month = ["Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień"];
var c = new Date();
var currentday = "" + c.getFullYear() + "-" + (c.getMonth() + 1) + "-" + c.getDate() + "";
var today = currentday;

//showMonth(0);
//showWeek();

//window.addEventListener('load', function () {
  //alert("It's loaded!")
  //$("#loading").css({"background-color": "transparent"});
  //$("#loading").css({"width": "0"});
//})

function showMonth(k) {
	m = m + k;
	var d = new Date();
	d.setMonth(d.getMonth() + m);
	document.getElementById("cal").innerHTML = "<b>" + tab_month[d.getMonth()] + " " + d.getFullYear() + "</b>";
	
	$.ajax({
		type: "POST",
		url:  "calendar.php",
		data: {
			'm': m
		},
		success: function(data) { 
			$("#calendar_month").html(data);
			focusTile(currentday);
			$("#" + today).css({"border": "solid 0.1vw #6e79f3"});
		}
    });
}

function showDay(id) {
	$("#calendar_events tr").hide(500);
	
	$.ajax({
		type: "POST",
		url:  "calendarDay.php",
		data: {
			'id': id
		},
		success: function(data) { 
			$("#calendar_day").html(data);
			$("#calendar_events tr").hide();
			$("#calendar_events tr").each(function(index) {
				$(this).delay(index*200).show(500);
			});
		}
    });
}

function eventDetails(id) {
	$.ajax({
		type: "POST",
		url:  "eventDetails.php",
		data: {
			'id': id
		},
		success: function(data) { 
			$("#event_details").html(data);
			$("#event_details").animate({"right": "0"});
		}
    });
}

function showWeek(){
	$.ajax({
		type: "POST",
		url:  "week.php",
		success: function(data) {
		   $("#week").html(data);
		}
    });
}

function recentApps() {
	$.ajax({
		type: "POST",
		url:  "recentApps.php",
		success: function(data) {
			$("#recent_apps").html(data);
		}
    });
}

function recentAppsUpdate(id) {
	$.ajax({
		type: "POST",
		url:  "recentAppsUpdate.php",
		data: {
			'id': id
		},
		success: function(data) { 
			recentApps();
		}
    });
}

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
		   viewEvents();
		}
    });
}

function deleteEvent(id) {
	let text = "Czy napewno chcesz usunąć Wydarzenie nr #" + id + "?";
	if (confirm(text) == true) {
		$.ajax({
			type: "POST",
			url:  "deleteEvent.php",
			data: {
				'id': id
			},
			success: function(data) { 
				viewEvents();
			}
		});
	}
}

function viewEvents() {
	$.ajax({
		type: "POST",
		url:  "viewEvents.php",
		success: function(data) { 
			$("#view_events").html(data);
		}
    });
}

function addNotification() {
    $.ajax({
		type: "POST",
		url:  "addNotification.php",
		data: {
			'title': $('#notify_title').val(),
			'descr': $('#notify_descr').val()
		},
		success: function(data){
		   $("#infoN").html(data);
		   viewNotifications();
		}
    });
}

function deleteNotification(id) {
	let text = "Czy napewno chcesz usunąć Powiadomienie nr #" + id + "?";
	if (confirm(text) == true) {
		$.ajax({
			type: "POST",
			url:  "deleteNotification.php",
			data: {
				'id': id
			},
			success: function(data) { 
				viewNotifications();
			}
		});
	}
}

function viewNotifications() {
	$.ajax({
		type: "POST",
		url:  "viewNotifications.php",
		success: function(data) { 
			$("#view_notifications").html(data);
		}
    });
}

function focusTile(id) {
	var tile = document.getElementById(id);
	if(tile != null) {
		var ctile = document.getElementById(currentday);
		if(ctile != null) {
			ctile.classList.remove('focustile');
		}
		
		tile.classList.add('focustile');
		showDay(id);
		currentday = id;
		if($("#event_details").css("right") == '0px'){
			closeSlideIn();
		}
	}
}

function focusTileWeek(id) {
	currentday = id;
	m = 0;
	showMonth(0);
	openTabs(document.getElementById("calendar_tab_1"), "calendar_tab1");
	//focusTile(id);
}

function collapse(el, elb) {
	var content = document.getElementById(el);
	
	if (content.style.maxHeight == '100%') {
		content.style.maxHeight = null;
		content.style.padding = '0px';
		elb.classList.toggle('active');
	} 
	else {
		content.style.maxHeight = '100%';
		content.style.padding = null;
		elb.classList.toggle('active');
	} 
}

function closeSlideIn() {
	$("#event_details").animate({"right": "-35%"});
}

function openTabs(evt, tab) {
	var tabs = document.getElementsByClassName("tabs");
	for (i = 0; i < tabs.length; i++) {
		$(tabs[i]).css({"z-index": "0"}).fadeOut(300);
		//tabs[i].style.display = "none";
	}
	
	var tab_links = document.getElementsByClassName("tab_links");
	for (i = 0; i < tab_links.length; i++) {
		tab_links[i].className = tab_links[i].className.replace("tab_link_active", "");
	}
	
	$("#"+tab).css({"z-index": "1"}).fadeIn(300);
	//document.getElementById(tab).style.display = "block";
	evt.className += " tab_link_active";
}

function notifyTab(el) {
	$(".notify_tab_dot").children().css({"background-color": "grey"});
	$(el).children().css({"background-color": "#6e79f3"});
	$("#notify_tab_table").css({"left": "-" + ($(el).index() * 100) + "%"});
}

function redirect(string){
	window.location.href = string;
}

//https://www.geeksforgeeks.org/search-bar-using-html-css-and-javascript/
function search(id, search_class) {
	let input = document.getElementById(id).value
	input = input.toLowerCase();
	let x = document.getElementsByClassName(search_class);
	  
	for (i = 0; i < x.length; i++) { 
		if (!x[i].innerHTML.toLowerCase().includes(input)) {
			x[i].style.display="none";
		}
		else {
			x[i].style.display="table-row";                 
		}
	}
}