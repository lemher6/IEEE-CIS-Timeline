function loadErasEditor() {

    //Clear edit box contents
    document.getElementById("edit-container").innerHTML = "";

    //Make SheetsAPI call to retrieve eras content, then append content to edit-box

    //Client ID, API key, and discovery docs from the developer console
    var CLIENT_ID = '114677580215736134978';
    var API_KEY = 'AIzaSyBtb6NGjWA0dvlZmrjBO1OzcKyYIRWGu7M';
    var DISCOVERY_DOCS = ["https://sheets.googleapis.com/$discovery/rest?version=v4"];
    var SCOPES = 'https://www.googleapis.com/auth/spreadsheets';

    //Load the API client library
    gapi.load('client', initClient);

    //Initializes the API client library then invokes retrieveErasData
    function initClient() {
        gapi.client.init({
            apiKey: API_KEY,
            //clientId: CLIENT_ID,
            discoveryDocs: DISCOVERY_DOCS,
            //scope: SCOPES
        }).then(function () {
            retrieveErasData();
        }, function (error) {
            window.alert("An error has occured.");
        });
    }

    function retrieveErasData() {
        gapi.client.sheets.spreadsheets.values.get({
            spreadsheetId: '1GPh2t6OjixLJv3BSZmsJhzdNA7O5NNNJZvbn8UgXUso',
            range: 'od1!A3:R',
        }).then(function (response) {
            var range = response.result;
            if (range.values.length > 0) {
                for (i = 0; i < range.values.length; i++) {

                    var row = range.values[i];
                    var type = String(row[15]);
                    var compare = "era";

                    if ((compare.localeCompare(type)) == 0) {

                        //Create divs to hold spreadsheet editing content
                        var d1 = document.createElement("div");
                        var d2 = document.createElement("div");
                        var d3 = document.createElement("div");
                        var d4 = document.createElement("div");
                        var d5 = document.createElement("div");
                        var d6 = document.createElement("div");
                        var d7 = document.createElement("div");
                        var d8 = document.createElement("div");
                        var d9 = document.createElement("div");
                        var d10 = document.createElement("div");

                        //Create paragraphs to hold headings
                        var ph2 = document.createElement("p");
                        var ph3 = document.createElement("p");
                        var ph4 = document.createElement("p");
                        var ph5 = document.createElement("p");
                        var ph6 = document.createElement("p");
                        var ph7 = document.createElement("p");
                        var ph8 = document.createElement("p");
                        var ph9 = document.createElement("p");
                        var ph10 = document.createElement("p");

                        //Create paragraphs to hold content
                        var pc2 = document.createElement("p");
                        var pc3 = document.createElement("p");
                        var pc4 = document.createElement("p");
                        var pc5 = document.createElement("p");
                        var pc6 = document.createElement("p");
                        var pc7 = document.createElement("p");
                        var pc8 = document.createElement("p");
                        var pc9 = document.createElement("p");
                        var pc10 = document.createElement("p");

                        //Create headings
                        var t2 = document.createTextNode("Headline");
                        var t3 = document.createTextNode("Start Year");
                        var t4 = document.createTextNode("Start Month");
                        var t5 = document.createTextNode("Start Day");
                        var t6 = document.createTextNode("Start Time");
                        var t7 = document.createTextNode("End Year");
                        var t8 = document.createTextNode("End Month");
                        var t9 = document.createTextNode("End Day");
                        var t10 = document.createTextNode("End Time");

                        //Create edit button
                        var b1 = document.createElement("button");
                        var b2 = document.createTextNode("Edit");
                        b1.appendChild(b2);
                        b1.onclick = function() {

                        }

                        //Create delete button
                        var b3 = document.createElement("button");
                        var b4 = document.createTextNode("Delete");
                        b3.appendChild(b4);
                        b3.onclick = function() {
                            var r = window.confirm("Are you sure you want to send a delete request for this entry?")
                            if (r == true) {
                                window.alert("Entered delete function");
                            } else {
                                window.alert("Canceled delete request!");
                            }
                        }

                        //Set class values for flex boxes
                        d1.setAttribute("class", "outer-flex");
                        d2.setAttribute("class", "inner-flex");
                        d3.setAttribute("class", "inner-flex");
                        d4.setAttribute("class", "inner-flex");
                        d5.setAttribute("class", "inner-flex");
                        d6.setAttribute("class", "inner-flex");
                        d7.setAttribute("class", "inner-flex");
                        d8.setAttribute("class", "inner-flex");
                        d9.setAttribute("class", "inner-flex");
                        d10.setAttribute("class", "inner-flex");

                        //Append headings to paragraphs
                        ph2.appendChild(t2);
                        ph3.appendChild(t3);
                        ph4.appendChild(t4);
                        ph5.appendChild(t5);
                        ph6.appendChild(t6);
                        ph7.appendChild(t7);
                        ph8.appendChild(t8);
                        ph9.appendChild(t9);
                        ph10.appendChild(t10);

                        //Append heading paragraphs to divs
                        d2.appendChild(ph2);
                        d3.appendChild(ph3);
                        d4.appendChild(ph4);
                        d5.appendChild(ph5);
                        d6.appendChild(ph6);
                        d7.appendChild(ph7);
                        d8.appendChild(ph8);
                        d9.appendChild(ph9);
                        d10.appendChild(ph10);

                        //Assign spreadsheet values to content variables
                        var c2 = document.createTextNode(row[9]);
                        var c3 = document.createTextNode(row[0]);
                        var c4 = document.createTextNode(row[1]);
                        var c5 = document.createTextNode(row[2]);
                        var c6 = document.createTextNode(row[3]);
                        var c7 = document.createTextNode(row[4]);
                        var c8 = document.createTextNode(row[5]);
                        var c9 = document.createTextNode(row[6]);
                        var c10 = document.createTextNode(row[7]);

                        //Append content to content paragraphs
                        pc2.appendChild(c2);
                        pc3.appendChild(c3);
                        pc4.appendChild(c4);
                        pc5.appendChild(c5);
                        pc6.appendChild(c6);
                        pc7.appendChild(c7);
                        pc8.appendChild(c8);
                        pc9.appendChild(c9);
                        pc10.appendChild(c10);

                        //Append heading paragraphs to divs
                        d2.appendChild(pc2);
                        d3.appendChild(pc3);
                        d4.appendChild(pc4);
                        d5.appendChild(pc5);
                        d6.appendChild(pc6);
                        d7.appendChild(pc7);
                        d8.appendChild(pc8);
                        d9.appendChild(pc9);
                        d10.appendChild(pc10);

                        //Append inner flex boxes to outer flex box
                        d1.appendChild(d2);
                        d1.appendChild(d3);
                        d1.appendChild(d4);
                        d1.appendChild(d5);
                        d1.appendChild(d6);
                        d1.appendChild(d7);
                        d1.appendChild(d8);
                        d1.appendChild(d9);
                        d1.appendChild(d10);
                        d1.appendChild(b1);
                        d1.appendChild(b3);

                        //Append finished edit card to edit container
                        document.getElementById("edit-container").appendChild(d1);

                    }



                }

                //Create and append add new event box
                var a1 = document.createElement("div");
                a1.setAttribute("class", "outer-flex");
                var a2 = document.createElement("button");
                a2.onclick = function () { addNewEra() };
                var a3 = document.createTextNode("Add New Era");
                a2.appendChild(a3);
                a1.appendChild(a2);
                document.getElementById("edit-container").appendChild(a1);

                function addNewEra() {
                    a1.innerHTML = "Under Construction!";
                }

            } else {
                window.alert("No data found.");
            }
        }, function (response) {
            window.alert("Unknown data error.");;
        });
    }

}
