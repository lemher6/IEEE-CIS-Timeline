function loadEventsEditor() {

    //Clear edit box contents
    document.getElementById("edit-container").innerHTML = "";

    //Make SheetsAPI call to retrieve events content, then append content to edit-box

    //Client ID, API key, discovery docs, and scope from the developer donsole
    var CLIENT_ID = '114677580215736134978';
    var API_KEY = 'AIzaSyBtb6NGjWA0dvlZmrjBO1OzcKyYIRWGu7M';
    var DISCOVERY_DOCS = ["https://sheets.googleapis.com/$discovery/rest?version=v4"];
    var SCOPES = 'https://www.googleapis.com/auth/spreadsheets';

    //Load the API client library
    gapi.load('client', initClient);
    //retrieveEventsData();

    //Initializes the API client library then invokes retrieveEventsData
    function initClient() {
        gapi.client.init({
            apiKey: API_KEY,
            //clientId: CLIENT_ID,
            discoveryDocs: DISCOVERY_DOCS,
            //scope: SCOPES
        }).then(function () {
            retrieveEventsData();
        }, function (error) {
            window.alert("An error has occured.");
        });
    }

    function updateSigninStatus(isSignedIn) {
        if (isSignedIn) {
            retrieveEventsData();
        } else {
            gapi.auth2.getAuthInstance().signIn();
        }
    }

    function retrieveEventsData() {
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

                    if ((compare.localeCompare(type)) !== 0) {

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
                        var d11 = document.createElement("div");
                        var d12 = document.createElement("div");
                        var d13 = document.createElement("div");
                        var d14 = document.createElement("div");
                        var d15 = document.createElement("div");

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
                        var ph11 = document.createElement("p");
                        var ph12 = document.createElement("p");
                        var ph13 = document.createElement("p");
                        var ph14 = document.createElement("p");
                        var ph15 = document.createElement("p");

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
                        var pc11 = document.createElement("p");
                        var pc12 = document.createElement("p");
                        var pc13 = document.createElement("p");
                        var pc14 = document.createElement("p");
                        var pc15 = document.createElement("p");

                        //Create headings
                        var t2 = document.createTextNode("Headline");
                        var t3 = document.createTextNode("Text");
                        var t4 = document.createTextNode("Media");
                        var t5 = document.createTextNode("Media Credit");
                        var t6 = document.createTextNode("Media Caption");
                        var t7 = document.createTextNode("Background");
                        var t8 = document.createTextNode("Start Year");
                        var t9 = document.createTextNode("Start Month");
                        var t10 = document.createTextNode("Start Day");
                        var t11 = document.createTextNode("Start Time");
                        var t12 = document.createTextNode("End Year");
                        var t13 = document.createTextNode("End Month");
                        var t14 = document.createTextNode("End Day");
                        var t15 = document.createTextNode("End Time");

                        //Create edit button
                        var b1 = document.createElement("button");
                        var b2 = document.createTextNode("Edit");
                        b1.appendChild(b2);
                        b1.onclick = function () {

                        }

                        //Create delete button
                        var b3 = document.createElement("button");
                        var b4 = document.createTextNode("Delete");
                        b3.appendChild(b4);
                        b3.onclick = function () {
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
                        d11.setAttribute("class", "inner-flex");
                        d12.setAttribute("class", "inner-flex");
                        d13.setAttribute("class", "inner-flex");
                        d14.setAttribute("class", "inner-flex");
                        d15.setAttribute("class", "inner-flex");

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
                        ph11.appendChild(t11);
                        ph12.appendChild(t12);
                        ph13.appendChild(t13);
                        ph14.appendChild(t14);
                        ph15.appendChild(t15);

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
                        d11.appendChild(ph11);
                        d12.appendChild(ph12);
                        d13.appendChild(ph13);
                        d14.appendChild(ph14);
                        d15.appendChild(ph15);

                        //Assign spreadsheet values to content variables
                        var c2 = document.createTextNode(row[9]);
                        var c3 = document.createTextNode(row[10]);
                        var c4 = document.createTextNode(row[11]);
                        var c5 = document.createTextNode(row[12]);
                        var c6 = document.createTextNode(row[13]);
                        var c7 = document.createTextNode(row[17]);
                        var c8 = document.createTextNode(row[0]);
                        var c9 = document.createTextNode(row[1]);
                        var c10 = document.createTextNode(row[2]);
                        var c11 = document.createTextNode(row[3]);
                        var c12 = document.createTextNode(row[4]);
                        var c13 = document.createTextNode(row[5]);
                        var c14 = document.createTextNode(row[6]);
                        var c15 = document.createTextNode(row[7]);

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
                        pc11.appendChild(c11);
                        pc12.appendChild(c12);
                        pc13.appendChild(c13);
                        pc14.appendChild(c14);
                        pc15.appendChild(c15);

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
                        d11.appendChild(pc11);
                        d12.appendChild(pc12);
                        d13.appendChild(pc13);
                        d14.appendChild(pc14);
                        d15.appendChild(pc15);

                        //Assemble finished edit card
                        d1.appendChild(d2);
                        d1.appendChild(d3);
                        d1.appendChild(d4);
                        d1.appendChild(d5);
                        d1.appendChild(d6);
                        d1.appendChild(d7);
                        d1.appendChild(d8);
                        d1.appendChild(d9);
                        d1.appendChild(d10);
                        d1.appendChild(d11);
                        d1.appendChild(d12);
                        d1.appendChild(d13);
                        d1.appendChild(d14);
                        d1.appendChild(d15);
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
                a2.onclick = function () {
                    a1.innerHTML = "";

                    //Create divs to hold spreadsheet editing content
                    var d2 = document.createElement("div");
                    var d3 = document.createElement("div");
                    var d4 = document.createElement("div");
                    var d5 = document.createElement("div");
                    var d6 = document.createElement("div");
                    var d7 = document.createElement("div");
                    var d8 = document.createElement("div");
                    var d9 = document.createElement("div");
                    var d10 = document.createElement("div");
                    var d11 = document.createElement("div");
                    var d12 = document.createElement("div");
                    var d13 = document.createElement("div");
                    var d14 = document.createElement("div");
                    var d15 = document.createElement("div");

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
                    var ph11 = document.createElement("p");
                    var ph12 = document.createElement("p");
                    var ph13 = document.createElement("p");
                    var ph14 = document.createElement("p");
                    var ph15 = document.createElement("p");

                    //Create headings
                    var t2 = document.createTextNode("Headline");
                    var t3 = document.createTextNode("Text");
                    var t4 = document.createTextNode("Media");
                    var t5 = document.createTextNode("Media Credit");
                    var t6 = document.createTextNode("Media Caption");
                    var t7 = document.createTextNode("Background");
                    var t8 = document.createTextNode("Start Year");
                    var t9 = document.createTextNode("Start Month");
                    var t10 = document.createTextNode("Start Day");
                    var t11 = document.createTextNode("Start Time");
                    var t12 = document.createTextNode("End Year");
                    var t13 = document.createTextNode("End Month");
                    var t14 = document.createTextNode("End Day");
                    var t15 = document.createTextNode("End Time");

                    //Create form for submitting content
                    var f1 = document.createElement("form");

                    //Create input textareas
                    var i2 = document.createElement("textarea");
                    var i3 = document.createElement("textarea");
                    var i4 = document.createElement("textarea");
                    var i5 = document.createElement("textarea");
                    var i6 = document.createElement("textarea");
                    var i7 = document.createElement("textarea");
                    var i8 = document.createElement("textarea");
                    var i9 = document.createElement("textarea");
                    var i10 = document.createElement("textarea");
                    var i11 = document.createElement("textarea");
                    var i12 = document.createElement("textarea");
                    var i13 = document.createElement("textarea");
                    var i14 = document.createElement("textarea");
                    var i15 = document.createElement("textarea");

                    //Create submit button
                    var b1 = document.createElement("button");
                    var b2 = document.createTextNode("Submit");
                    b1.appendChild(b2);

                    //Set class values for flex boxes
                    d2.setAttribute("class", "inner-flex");
                    d3.setAttribute("class", "inner-flex");
                    d4.setAttribute("class", "inner-flex");
                    d5.setAttribute("class", "inner-flex");
                    d6.setAttribute("class", "inner-flex");
                    d7.setAttribute("class", "inner-flex");
                    d8.setAttribute("class", "inner-flex");
                    d9.setAttribute("class", "inner-flex");
                    d10.setAttribute("class", "inner-flex");
                    d11.setAttribute("class", "inner-flex");
                    d12.setAttribute("class", "inner-flex");
                    d13.setAttribute("class", "inner-flex");
                    d14.setAttribute("class", "inner-flex");
                    d15.setAttribute("class", "inner-flex");

                    //Set form properties
                    f1.setAttribute("id", "newEvent");

                    //Set textarea properties
                    i2.setAttribute("form", "newEvent");
                    i3.setAttribute("form", "newEvent");
                    i4.setAttribute("form", "newEvent");
                    i5.setAttribute("form", "newEvent");
                    i6.setAttribute("form", "newEvent");
                    i7.setAttribute("form", "newEvent");
                    i8.setAttribute("form", "newEvent");
                    i9.setAttribute("form", "newEvent");
                    i10.setAttribute("form", "newEvent");
                    i11.setAttribute("form", "newEvent");
                    i12.setAttribute("form", "newEvent");
                    i13.setAttribute("form", "newEvent");
                    i14.setAttribute("form", "newEvent");
                    i15.setAttribute("form", "newEvent");

                    //Set button properties
                    b1.setAttribute("type", "submit");
                    b1.setAttribute("form", "newEvent");
                    b1.setAttribute("value", "Submit");
                   /* b1.onclick = function () {
                        var r = window.confirm("Are you sure you want to submit a review request for this new entry?")
                        if (r == true) {
                            window.alert("Entered submission function");
                        } else {
                            window.alert("Canceled submission request!");
                        }
                    } */
                };
                var a3 = document.createTextNode("Add New Event");
                a2.appendChild(a3);
                a1.appendChild(a2);
                document.getElementById("edit-container").appendChild(a1);

                function addNewEvent() {

                    a1.innerHTML = "";

                    //Create divs to hold spreadsheet editing content
                    var d2 = document.createElement("div");
                    var d3 = document.createElement("div");
                    var d4 = document.createElement("div");
                    var d5 = document.createElement("div");
                    var d6 = document.createElement("div");
                    var d7 = document.createElement("div");
                    var d8 = document.createElement("div");
                    var d9 = document.createElement("div");
                    var d10 = document.createElement("div");
                    var d11 = document.createElement("div");
                    var d12 = document.createElement("div");
                    var d13 = document.createElement("div");
                    var d14 = document.createElement("div");
                    var d15 = document.createElement("div");

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
                    var ph11 = document.createElement("p");
                    var ph12 = document.createElement("p");
                    var ph13 = document.createElement("p");
                    var ph14 = document.createElement("p");
                    var ph15 = document.createElement("p");

                    //Create headings
                    var t2 = document.createTextNode("Headline");
                    var t3 = document.createTextNode("Text");
                    var t4 = document.createTextNode("Media");
                    var t5 = document.createTextNode("Media Credit");
                    var t6 = document.createTextNode("Media Caption");
                    var t7 = document.createTextNode("Background");
                    var t8 = document.createTextNode("Start Year");
                    var t9 = document.createTextNode("Start Month");
                    var t10 = document.createTextNode("Start Day");
                    var t11 = document.createTextNode("Start Time");
                    var t12 = document.createTextNode("End Year");
                    var t13 = document.createTextNode("End Month");
                    var t14 = document.createTextNode("End Day");
                    var t15 = document.createTextNode("End Time");

                    //Create form for submitting content
                    var f1 = document.createElement("form");

                    //Create input textareas
                    var i2 = document.createElement("textarea");
                    var i3 = document.createElement("textarea");
                    var i4 = document.createElement("textarea");
                    var i5 = document.createElement("textarea");
                    var i6 = document.createElement("textarea");
                    var i7 = document.createElement("textarea");
                    var i8 = document.createElement("textarea");
                    var i9 = document.createElement("textarea");
                    var i10 = document.createElement("textarea");
                    var i11 = document.createElement("textarea");
                    var i12 = document.createElement("textarea");
                    var i13 = document.createElement("textarea");
                    var i14 = document.createElement("textarea");
                    var i15 = document.createElement("textarea");

                    //Create submit button
                    var b1 = document.createElement("button");
                    var b2 = document.createTextNode("Submit");
                    b1.appendChild(b2);

                    //Set class values for flex boxes
                    d2.setAttribute("class", "inner-flex");
                    d3.setAttribute("class", "inner-flex");
                    d4.setAttribute("class", "inner-flex");
                    d5.setAttribute("class", "inner-flex");
                    d6.setAttribute("class", "inner-flex");
                    d7.setAttribute("class", "inner-flex");
                    d8.setAttribute("class", "inner-flex");
                    d9.setAttribute("class", "inner-flex");
                    d10.setAttribute("class", "inner-flex");
                    d11.setAttribute("class", "inner-flex");
                    d12.setAttribute("class", "inner-flex");
                    d13.setAttribute("class", "inner-flex");
                    d14.setAttribute("class", "inner-flex");
                    d15.setAttribute("class", "inner-flex");

                    //Set form properties
                    f1.setAttribute("id", "newEvent");

                    //Set textarea properties
                    i2.setAttribute("form", "newEvent");
                    i3.setAttribute("form", "newEvent");
                    i4.setAttribute("form", "newEvent");
                    i5.setAttribute("form", "newEvent");
                    i6.setAttribute("form", "newEvent");
                    i7.setAttribute("form", "newEvent");
                    i8.setAttribute("form", "newEvent");
                    i9.setAttribute("form", "newEvent");
                    i10.setAttribute("form", "newEvent");
                    i11.setAttribute("form", "newEvent");
                    i12.setAttribute("form", "newEvent");
                    i13.setAttribute("form", "newEvent");
                    i14.setAttribute("form", "newEvent");
                    i15.setAttribute("form", "newEvent");

                    //Set button properties
                    b1.setAttribute("type", "submit");
                    b1.setAttribute("form", "newEvent");
                    b1.setAttribute("value", "Submit");
                    b1.onclick = function () {
                        if (i2.value == "" && i8.value == "") {
                            window.alert("Headline and start year fields are required!");
                        } else if (i2.value == "") {
                            window.alert("Headline field is required!");
                        } else if (i8.value == "") {
                            window.alert("Start year field is requried!");
                        } else {
                            //window.alert("Entered else section");
                            // [START sheets_append_values]
                            var values = [
                                [
                                    i8.value,
                                    i9.value,
                                    i10.value,
                                    i11.value,
                                    i12.value,
                                    i13.value,
                                    i14.value,
                                    i15.value,
                                    ,
                                    i2.value,
                                    i3.value,
                                    i4.value,
                                    i5.value,
                                    i6.value,
                                    ,
                                    ,
                                    ,
                                    i7.value
                                ],
                                // Additional rows ...
                            ];
                            // [START_EXCLUDE silent]
                            //values = _values;
                            // [END_EXCLUDE]
                            var body = {
                                values: values
                            };
                            gapi.client.sheets.spreadsheets.values.append({
                                spreadsheetId: '1GPh2t6OjixLJv3BSZmsJhzdNA7O5NNNJZvbn8UgXUso',
                                //apiKey: 'f987b7f1a2c7296b52df61eb54de58caadfb3399',
                                //apiKey: 'AIzaSyBtb6NGjWA0dvlZmrjBO1OzcKyYIRWGu7M',
                                range: 'od1',
                                valueInputOption: 'USER_ENTERED',
                                resource: body
                            }).then((response) => {
                                //var result = response.result;
                                //console.log(`${result.updates.updatedCells} cells appended.`)
                                // [START_EXCLUDE silent]
                                //callback(response);
                                // [END_EXCLUDE]
                            });
                            // [END sheets_append_values]
                            window.alert("Passed append stage");
                        }
                    };

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
                    ph11.appendChild(t11);
                    ph12.appendChild(t12);
                    ph13.appendChild(t13);
                    ph14.appendChild(t14);
                    ph15.appendChild(t15);

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
                    d11.appendChild(ph11);
                    d12.appendChild(ph12);
                    d13.appendChild(ph13);
                    d14.appendChild(ph14);
                    d15.appendChild(ph15);

                    //Append textareas to divs
                    d2.appendChild(i2);
                    d3.appendChild(i3);
                    d4.appendChild(i4);
                    d5.appendChild(i5);
                    d6.appendChild(i6);
                    d7.appendChild(i7);
                    d8.appendChild(i8);
                    d9.appendChild(i9);
                    d10.appendChild(i10);
                    d11.appendChild(i11);
                    d12.appendChild(i12);
                    d13.appendChild(i13);
                    d14.appendChild(i14);
                    d15.appendChild(i15);

                    //Append inner flex boxes to outer flex box
                    a1.appendChild(d2);
                    a1.appendChild(d3);
                    a1.appendChild(d4);
                    a1.appendChild(d5);
                    a1.appendChild(d6);
                    a1.appendChild(d7);
                    a1.appendChild(d8);
                    a1.appendChild(d9);
                    a1.appendChild(d10);
                    a1.appendChild(d11);
                    a1.appendChild(d12);
                    a1.appendChild(d13);
                    a1.appendChild(d14);
                    a1.appendChild(d15);

                    //Append edit button to outer flex box
                    a1.appendChild(b1);
                }

                //function submitNewEvent() {}

            } else {
                window.alert("No data found.");
            }
        }, function (response) {
            window.alert("Unknown data error.");;
        });
    }

}
