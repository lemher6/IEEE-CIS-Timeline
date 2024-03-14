<?php
    ### ****************************************************************************
    ### IEEE-CIS TIMELINE PROJECT
    ### 3/6/2024 - AH
    ### VALIDATES AND CLEAN INPUT POST PARAMETERS AFTER UPDATE OR CREATE AN EVENT
    ### WITH trim Remove blank spaces
    ### WITH htmlspecialchars Convert special characters to HTML entities
    ### ****************************************************************************

    $zanitize_result = cleaningData(); // validate input data
  
    if(!empty($zanitize_result)){
        echo "
            <style>
                body {
                    font-family: Arial, Verdana, sans-serif;
                    color: #666;
                    font-size: 14px;
                    margin: auto;
                    width: 100%;
                }

                .errorBlock {
                    text-align: left;
                    border-radius: 5px;
                    background-color: #f9f9f9;
                    padding: 1em 1em 0.3em 1em;
                    margin: auto;
                    border: #dddcdc 1px solid;
                    width:1000px;
                }

                .inputText {
                    color:blue
                }

                .inputText {
                    color:blue
                }
            </style>
            <br><br>
            <div class='errorBlock'>
                <br>
                <h1>IEEE-CIS HISTORICAL TIMELINE</h1> 
                <h3>Invalid Data</h3>
                Sorry, your request couldn't be processed. <br><br>
                Check the field(s): 
                
                $zanitize_result
                
                <br><br>
                <br>Please ensure that you only enter letters, digits, whitespace, and common punctuation marks such as hyphens, apostrophes, commas, periods, exclamation marks, colons, semicolons, and parentheses.
                <br><br>If you have any questions, please contact the CIS Historic Timeline committee or the administrator.
                <br><br><a href='/'>Go back to the application</a>
                <br><br>
            </div>";
        exit();
    }



    function cleaningData(){
        $wrongData = '';

        // special characters to escape
        $tlUnsafeChars = array('*', '%');

        // Define corresponding HTML entities for the special characters
        $tlSafeChars = array('&ast;', '&percnt;');

        

        $patternText = "/^[A-Za-z0-9\s\-',.!?:;&()#*%]+$/"; // letters, digits, whitespace, and common punctuation marks such as hyphens, apostrophes, commas, periods, exclamation marks, colons, semicolons, and parentheses
        $patternDate = "/^([0-9]{4})-([0-1][0-9])-([0-3][0-9])\s([0-2][0-9]):([0-5][0-9])$/"; // YYYY-MM-DD
        $patternY = "/^(19|20)\d{2}$/"; // 19YY OR 20YY
        $patternM = "/^(0[1-9]|1[0-2])$/"; // MM
        $patternD = "/^([0-2][1-9]|3[0-1])$/"; // DD
        $patternURL = "%^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z0-9\x{00a1}-\x{ffff}][a-z0-9\x{00a1}-\x{ffff}_-]{0,62})?[a-z0-9\x{00a1}-\x{ffff}]\.)+(?:[a-z\x{00a1}-\x{ffff}]{2,}\.?))(?::\d{2,5})?(?:[/?#]\S*)?$%iuS"; // URLs that start with either "http://" or "https://", followed by any characters except whitespace, '/', '$', '?', '.', or '#', but it no longer includes the "ftp://" option.
        $patternColor = "/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/"; //string starts with '#' followed by either six hexadecimal characters ([A-Fa-f0-9]) representing the RGB values in pairs, or three hexadecimal characters for shorthand notation.


        ##################################################################################        
        ### VALIDATE TEXT ################################################################
        ##################################################################################

        
        if (!empty($_POST["opt"])) {
            $field_to_validate = trim($_POST["opt"]);
            $description_of_field = 'Request option';
            $pattern_to_validate = $patternText;
            $max_length = 5;
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["opt"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate); 
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }

        if (!empty($_POST["status"])) {
            $field_to_validate = trim($_POST["status"]);
            $description_of_field = 'Request status';
            $pattern_to_validate = $patternText;
            $max_length = 7;
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["status"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }

        if (!empty($_POST["counter"])) {
            $field_to_validate = trim($_POST["counter"]);
            $description_of_field = 'Event counter';
            $pattern_to_validate = $patternText;
            $max_length = 7;
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["counter"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }

        if (!empty($_POST["page"])) {
            $field_to_validate = trim($_POST["page"]);
            $description_of_field = 'Page';
            $pattern_to_validate = $patternText;
            $max_length = 17;
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["page"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }

        if (!empty($_POST["submit"])) {
            $field_to_validate = trim($_POST["submit"]);
            $description_of_field = 'Submitted option';
            $pattern_to_validate = $patternText;
            $max_length = 20;
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["submit"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }

        if (!empty($_POST["eId"])) {
            $field_to_validate = trim($_POST["eId"]);
            $description_of_field = 'Event ID';
            $pattern_to_validate = $patternText;
            $max_length = 20;
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["eId"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }

        if (!empty($_POST["author"])) {
            $field_to_validate = trim($_POST["author"]);
            $description_of_field = 'Author Name';
            $pattern_to_validate = $patternText;
            $max_length = 25;
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["author"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }

        if (!empty($_POST["group"])) {
            $field_to_validate = trim($_POST["group"]);
            $description_of_field = 'Event Group';
            $pattern_to_validate = $patternText;
            $max_length = 15;
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["group"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }

        if (!empty($_POST["headline"])) {
            $field_to_validate = trim($_POST["headline"]);
            $description_of_field = 'Event Headline';
            $pattern_to_validate = $patternText;
            $max_length = 80;                   
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["headline"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }

        if (!empty($_POST["text0"])) {
            $field_to_validate = trim($_POST["text0"]);
            $description_of_field = 'Event Detail #1';
            $pattern_to_validate = $patternText;
            $max_length = 150;             
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["text0"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }


        if (!empty($_POST["text1"])) {
            $field_to_validate = trim($_POST["text1"]);
            $description_of_field = 'Event Detail #2';
            $pattern_to_validate = $patternText;
            $max_length = 150;            
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["text1"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }


        if (!empty($_POST["text2"])) {
            $field_to_validate = trim($_POST["text2"]);
            $description_of_field = 'Event Detail #3';
            $pattern_to_validate = $patternText;
            $max_length = 150;            
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["text2"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }

        if (!empty($_POST["text3"])) {
            $field_to_validate = trim($_POST["text3"]);
            $description_of_field = 'Event Detail #4';
            $pattern_to_validate = $patternText;
            $max_length = 150;            
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["text3"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }


        if (!empty($_POST["text4"])) {
            $field_to_validate = trim($_POST["text4"]);
            $description_of_field = 'Event Detail #5';
            $pattern_to_validate = $patternText;
            $max_length = 150;            
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["text4"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }

        if (!empty($_POST["caption"])) {
            $field_to_validate = trim($_POST["caption"]);
            $description_of_field = 'Caption';
            $pattern_to_validate = $patternText;
            $max_length = 80;            
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["caption"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }

        if (!empty($_POST["credit"])) {
            $field_to_validate = trim($_POST["credit"]);
            $description_of_field = 'Credit';
            $pattern_to_validate = $patternText;
            $max_length = 80;
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["credit"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }

        if (!empty($_POST["comment"])) {
            $field_to_validate = trim($_POST["comment"]);
            $description_of_field = 'Comments';
            $pattern_to_validate = $patternText;
            $max_length = 500;
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["comment"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }

        ##################################################################################
        ### VALIDATE DATES ###############################################################
        ##################################################################################

        if (!empty($_POST["created_on"])) {
            $field_to_validate = trim($_POST["created_on"]);
            $description_of_field = 'Create Date';
            $pattern_to_validate = $patternDate;
            $max_length = 20;
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["created_on"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);    
        }

        if (!empty($_POST["last_modification"])) {
            $field_to_validate = trim($_POST["last_modification"]);
            $description_of_field = 'Last Modification';
            $pattern_to_validate = $patternDate;
            $max_length = 20;
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["last_modification"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }


        if (!empty($_POST["start_date"])) {            
            $field_to_validate = htmlspecialchars( $_POST["start_date"], ENT_QUOTES, 'UTF-8' );
            $_POST["start_date"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);   
            $description_of_field = 'Event Start Date';         

            $cleanYear = substr($_POST['start_date'],0,4);
            $cleanMonth = substr($_POST['start_date'],5,2);
            $cleanDay = substr($_POST['start_date'],8,2);

            $field_to_validate = $cleanYear;            
            $pattern_to_validate = $patternY;
            $max_length = 4;
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);

            $field_to_validate = $cleanMonth;
            $pattern_to_validate = $patternM;
            $max_length = 2;
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);

            $field_to_validate = $cleanDay;
            $pattern_to_validate = $patternD;
            $max_length = 2;
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);        
        }

        if (!empty($_POST["end_date"])) {
            $field_to_validate = htmlspecialchars( $_POST["end_date"], ENT_QUOTES, 'UTF-8' );
            $_POST["end_date"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);   
            $description_of_field = 'Event End Date'; 

            $cleanYear = substr($_POST['end_date'],0,4);
            $cleanMonth = substr($_POST['end_date'],5,2);
            $cleanDay = substr($_POST['end_date'],8,2);

            $field_to_validate = $cleanYear;            
            $pattern_to_validate = $patternY;
            $max_length = 4;
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);

            $field_to_validate = $cleanMonth;
            $pattern_to_validate = $patternM;
            $max_length = 2;
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);

            $field_to_validate = $cleanDay;
            $pattern_to_validate = $patternD;
            $max_length = 2;
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length); 
        }


        ##################################################################################
        ### VALIDATES URL AND LINKS ######################################################
        ##################################################################################

        if (!empty($_POST["mediaURL"])) {
            $field_to_validate = trim($_POST["mediaURL"]);
            $description_of_field = 'Media URL';
            $pattern_to_validate = $patternURL;
            $max_length = 600;
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["mediaURL"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }

        if (!empty($_POST["mediaLINK"])) {
            $field_to_validate = trim($_POST["mediaLINK"]);
            $description_of_field = 'Media Link';
            $pattern_to_validate = $patternURL;
            $max_length = 600;
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["mediaLINK"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }

        ##################################################################################
        ### VALIDATES COLOR IN HEXADECIMAL ###############################################
        ##################################################################################

        if (!empty($_POST["color"])) {
            $field_to_validate = trim($_POST["color"]);
            $description_of_field = 'Background Color';
            $pattern_to_validate = $patternColor;
            $max_length = 400;
            $field_to_validate = htmlspecialchars( $field_to_validate, ENT_QUOTES, 'UTF-8' );
            $_POST["color"] = str_replace($tlUnsafeChars, $tlSafeChars, $field_to_validate);
            $wrongData .= validateField($field_to_validate, $description_of_field, $pattern_to_validate, $max_length);
        }


        return $wrongData;
    }


    ### ****************************************************************************
    ### CHECK IF FIELD HAS A VALID PATTERN AND LENGTH
    ### Return  a string containing any error messages encountered during validation
    ### ****************************************************************************
    function validateField($validating_field, $validating_description, $validating_pattern, $validating_length) {
        $wrongData = '';

        if (!preg_match_all($validating_pattern, $validating_field)) {
            $wrongData .= "<br><br>- <b>$validating_description</b>: Wrong pattern. 
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Text input: <span class='inputText'>$validating_field</span>";
        }

        if (strlen($validating_field) > $validating_length) {
            $wrongData .= "<br><br>- <b>$validating_description:</b> Max length. $validating_length characters. 
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Text input: <span class='inputText'>$validating_field</span>";}

        return $wrongData;
    }

?>