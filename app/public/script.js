var m = 0;
var tab_month = ["Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień"];
var c = new Date();
var currentday = "" + c.getFullYear() + "-" + (c.getMonth() + 1) + "-" + c.getDate() + "";

showMonth(0);
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
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("calendar_month").innerHTML = this.responseText;
			focusTile(currentday);
		}
	}
	xhttp.open("GET", "calendar.php?m=" + m, true);
	xhttp.send();
}

function showDay(id) {
	var xhttp = new XMLHttpRequest();
	$("#calendar_events tr").hide(500);
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("calendar_day").innerHTML = this.responseText;
			$("#calendar_events tr").hide();
			$("#calendar_events tr").each(function(index) {
				$(this).delay(index*200).show(500);
			});
		}
	}
	xhttp.open("GET", "calendarDay.php?id=" + id, true);
	xhttp.send();
}

function eventDetails(id, el) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("event_details").innerHTML = this.responseText;
			$("#event_details").animate({"right": "0"});
		}
	}
	xhttp.open("GET", "eventDetails.php?id=" + id, true);
	xhttp.send();
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
	openTabs(document.getElementById("calendar_tab_1"), "calendar_tab1");
	focusTile(id);
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