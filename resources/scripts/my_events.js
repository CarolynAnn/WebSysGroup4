
function loadEvents(){
    $.ajax({
        type: "Post",
        url: "get_my_events.php",
        success: function(data, status){ //dynamically add events list to DOM
            data = JSON.parse(data);
            data = data["Events"];
            var length = data.length;
            var newRow;
            if(length == 0){
                $("#loading-my-events").text("No events found.");
            }
            if(length > 0){
                $("#loading-my-events").hide();
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
                //Edit Event Button
                var save = document.createElement("form");
                save.method = "post";

                var input = document.createElement("button");
                input.type = "submit";
                input.className = "btn btn-info event-btn";
                input.id = i + "Edit";
                input.innerHTML = "Edit";
                input.value = data[i][0];
                input.name = "EditEvent";
                input.formmethod="post";

                save.appendChild(input);
                // var save = document.createElement("button");
                // save.type = "button";
                // save.className = "btn btn-info event-btn";
                // save.id = i + "Edit";
                // save.innerHTML = "Edit";

                //TODO: When Save button clicked....
                save.addEventListener("click", function(){
                });

                //View Event Button
                var view = document.createElement("button");
                view.type = "button";
                view.className = "btn";
                view.id = i + "View1";
                view.innerHTML = "View";
                view.setAttribute("data-toggle", "modal");
                view.setAttribute("data-target", "#eventModal-MyEvents");

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
                    $("#my-events").append(newRow);
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
    $("#event-modal-title1").html(data[1]);
    $("#event-modal-date1").html(dateStr);
    $("#event-modal-start1").html(data[3].substr(0,5));
    $("#event-modal-end1").html(data[4].substr(0,5));
    $("#event-modal-loc1").html(data[5]);
    $("#event-modal-owner1").html(data[7]);
    $("#event-modal-desc1").html(data[6]);
    $("#DeleteButton").attr('value',data[0]);
}

//when DOM loads
$(document).ready(function() {
    loadEvents();
});
