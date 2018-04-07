<?php
if (!isset($this->session->userdata['signed']))
$this->load->view('login');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type = "text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <style>
            ul {
                    margin : 0;
                    padding : 0;
                    overflow : hidden;
                    list-style-type : none;
                    background-color : Blue;
                    font : 17px Arial Rounded MT Bold , sans-serif;
                }

            li a {
                    float : left;
                    color : white;
                    display : block;
                    text-align : center;
                    padding : 15px 15px;
                    text-decoration : none;
                  }

            li a:hover {
                                background-color : Navy;
                            }
        </style>
        <script>
            $(document).ready(function() {
                $('.datepicker').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: false,
                    format: 'yyyy-mm-dd',
                    today: 'Today',
                    clear: 'Clear',
                    close: 'Ok',
                    closeOnSelect: false // Close upon selecting a date,
                });
                
                $('.timepicker').pickatime({
                    format: 'h : i A',
                    default: 'now', // Set default time: 'now', '1:30AM', '16:30'
                    twelvehour: true, // Use AM/PM or 24-hour format
                    donetext: 'OK', // text for done-button
                    cleartext: 'Clear', // text for clear-button
                    canceltext: 'Cancel', // Text for cancel-button
                    autoclose: false, // automatic close timepicker
                    ampmclickable: true // make AM PM clickable
                });
            });
        </script>
    </head>
    <body class = "blue-grey darken-3 indigo-text text-lighten-3"  style = "padding : 7% 15%">
        <ul>
            <li><a href="<?php echo site_url('admin/insert') ?>">Create New Flight Schedule</a></li>
            <li><a href="<?php echo site_url('admin/show') ?>">View All Flights</a></li>
            <li><a href="<?php echo site_url('admin/search') ?>">Search Flights</a></li>
            <li style="float:right"><a href="<?php echo site_url('admin/logout') ?>">Log Out</a></li>
            <li style="float:right"><a href="#"><?php echo "Signed In As : ".$this->session->userdata['signed']['Name'] ?></a></li>
        </ul>
        <h4>Search Flights</h4>
        <form class="col s12" action = "" method = "POST">
                <div class="row">
                    <div class="input-field col s4">
                        <i class="material-icons prefix">flight_takeoff</i>
                        <input id="from" type="text" name="from" class="validate">
                        <label for="from">From</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <i class="material-icons prefix">flight_land</i>
                        <input id="to" type="text" name="to" class="validate">
                        <label for="to">To</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <i class="material-icons prefix">date_range</i>
                        <input id="date" type="text" name="date" class="datepicker">
                        <label for="date">Date</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s4">
                        <button class="btn waves-effect waves-light blue" type="submit" name="Search">Search
                            <i class="material-icons left">search</i>
                        </button>
                    </div>
                </div>
            </form>
        </body>
    </html>