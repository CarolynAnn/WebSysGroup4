
function loadEvents() {
    let get_data = new URLSearchParams(document.location.search);
    let search_query = get_data.get("search-bar");
    let search_category = get_data.get("search-category");
    $.ajax({
        type: "post",
        url: "get_events.php",
        data: {
            "search-bar": search_query,
            "search-category": search_category
        },
        success: function(data, status){ //dynamically add events list to DOM
            data = JSON.parse(data);
            data = data["Events"];
            var length = data.length;
            var newRow;
            if(length == 0){
                $("#loading-home").text("No events found.");
            }
            if(length > 0){
                $("#loading-home").hide();
            }
            for(var i = 0; i < length; i++){
                var newEvent = document.createElement("div");
                newEvent.className = "col-sm-4";
                newEvent.id = "event"+data[i][0]; //Event ID

                //Get Title
                var title = document.createElement("h4");
                title.appendChild(document.createTextNode(data[i][1]));

                //Get Location
                var loc = document.createElement("p");
                loc.appendChild(document.createTextNode("Where: " + data[i][5]));

                //Get Date & convert to readable format
                var date = document.createElement("p");
                var d = new Date(data[i][2]+"T"+data[i][3]);
                var dateStr = formatDate(d);

                //Get start & end times & convert to readable format
                var startTime = data[i][3];
                startTime = startTime.substr(0,5);

                var endTime = data[i][4];
                endTime = endTime.substr(0,5);

                date.appendChild(document.createTextNode("When: " + dateStr + ", " + startTime + " - " + endTime));

                //Create Buttons

                //Save Event Button
                var save = document.createElement("form");
                save.method = "post";

                var input = document.createElement("button");
                input.type = "submit";
                input.className = "btn btn-success event-btn";
                input.id = i + "Save";
                input.innerHTML = "Save";
                input.value = data[i][0];
                input.name = "EVENT_ID";
                input.formmethod="post";

                save.appendChild(input);

                //View Event Button
                var view = document.createElement("button");
                view.type = "button";
                view.className = "btn";
                view.id = i + "View";
                view.innerHTML = "View";
                view.setAttribute("data-toggle", "modal");
                view.setAttribute("data-target", "#eventModal");

                // When View button clicked, populate modal with correct info
                view.addEventListener("click", function(){
                    setModal(data, this.id);
                });

                //Append all parts to newEvent element
                newEvent.appendChild(title);
                newEvent.appendChild(loc);
                newEvent.appendChild(date);
                save.appendChild(view);
                newEvent.appendChild(save);

                //If this is 3rd event in current row, create new row for following events (i.e. only 3 events listed per row)
                if(i%3 == 0){
                    newRow = document.createElement("div");
                    newRow.className = "row rowEvents";
                    $("#event-holder").append(newRow);
                }

                //Append newEvent element to newRow
                newRow.appendChild(newEvent);
            }

        },error: function(msg) {
            // There was a problem
            alert("There was a problem: " + msg.status + " " + msg.statusText);
        }
    });
}

// Format date for display
function formatDate(date){
    var locale = "en-us";
    var month = date.toLocaleString(locale, {month: "short"});
    var day = date.toLocaleString(locale, {weekday: "short"})
    return day + " "+ month +" "+ date.getDate() + ", " + date.getFullYear();
}

/*Upon clicking "View" button for an event, populate modal with respective info for that specific event*/
function setModal(data, i){
    //Extract index of relevant data from i (i = button id)
    var index = i.indexOf("View");
    i = i.substr(0,index);
    data = data[i];
    var d = new Date(data[2]+"T"+data[3]);
    var dateStr = formatDate(d);
    //Insert data into modal
    $("#event-modal-title").html(data[1]);
    $("#event-modal-date").html(dateStr);
    $("#event-modal-start").html(data[3].substr(0,5));
    $("#event-modal-end").html(data[4].substr(0,5));
    $("#event-modal-loc").html(data[5]);
    $("#event-modal-owner").html(data[7]);
    $("#event-modal-desc").html(data[6]);
}


function isEmpty() {
    var x;
    x = document.getElementById("search-bar").value;
    if (x == "") {
        return false;
    };

}

//when DOM loads
$(document).ready(function() {
    loadEvents();
});
