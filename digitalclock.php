<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Clock</title>
    <link href="https://fonts.cdnfonts.com/css/digital-7-mono" rel="stylesheet">
    <style>
        @import url('https://fonts.cdnfonts.com/css/digital-7-mono');
        body {
            background-color: #000;
        }
        .clock-container {
            background: #000;
            color: #fff;
            padding: 20px;
            border: 3px solid #5a6163;
            border-radius: 30px;
            text-align: center;
        }
        .clock-container td {
            text-align: center;
            color: #e01b21;
        }
        .date-row td {
            font-family: 'Digital-7', sans-serif;
        }
        .clock {
            border: 5px solid #8d8e94;
            padding: 50px;
        }
        .date {
            color: #aabdc1;
            font-size: 50px;
        }
        .date-num {
            font-size: 150px;
            box-shadow: 0 0 0 3px #5a6163;
            border-radius: 10px;
        }
        .time-row {
            box-shadow: 0 0 0 3px #5a6163;
            border-radius: 10px;
        }
        .time-row td {
            font-size: 150px;
            font-family: 'Digital-7', sans-serif;
        }
        .time-labels {
            color: #aabdc1;
            font-size: 50px;
        }
        .ampm-indicator {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .ampm-circle {
            width: 60px;
            height: 60px;
            border: 2px solid #fff;
            margin: 10px;
            border-radius: 50%;
        }
        .ampm-text {
            color: #fff;
        }
        .radio-days {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="clock-container">
        <table class="clock" width="100%">
            <tr class="date">
                <th colspan="2">DATE</th>
                <th colspan="4">MONTH</th>
                <th colspan="3">YEAR</th>
            </tr>
            <tr class="date-num">
                <td colspan="2" id="day"><?php echo date("d"); ?></td>
                <td colspan="4" id="month"><?php echo date("m"); ?></td>
                <td colspan="3" id="year"><?php echo date("y"); ?></td>
            </tr>
            <tr class="time-labels">
                <th colspan="2">HOUR</th>
                <th colspan="4">MINUTE</th>
                <th colspan="3">SECOND</th>
            </tr>
            <tr class="time-row">
                <td colspan="2" id="hours"></td>
                <td colspan="1">:</td>
                <td colspan="2" id="minutes"></td>
                <td colspan="1">:</td>
                <td colspan="2" id="seconds"></td>
            </tr>
            <tr class="radio-days">
                <td><input type="radio" id="sun" name="day"> <label for="sun">SUN</label></td>
                <td><input type="radio" id="mon" name="day"> <label for="mon">MON</label></td>
                <td><input type="radio" id="tue" name="day"> <label for="tue">TUE</label></td>
                <td><input type="radio" id="wed" name="day"> <label for="wed">WED</label></td>
                <td><input type="radio" id="thu" name="day"> <label for="thu">THU</label></td>
                <td><input type="radio" id="fri" name="day"> <label for="fri">FRI</label></td>
                <td><input type="radio" id="sat" name="day"> <label for="sat">SAT</label></td> 
            </tr>
        </table>
        <div class="ampm-indicator">
            <div id="am" class="ampm-circle"></div>
            <p class="ampm-text">AM</p>
            <div id="pm" class="ampm-circle"></div>
            <p class="ampm-text">PM</p>
            <p id="dayOfWeek" class="ampm-text" style="color:green;"></p>
        </div>
    </div>

    <script type="text/javascript">
        function updateTime() {
            let currentTime = new Date();
            let hours = String(currentTime.getHours()).padStart(2, '0');
            let minutes = String(currentTime.getMinutes()).padStart(2, '0');
            let seconds = String(currentTime.getSeconds()).padStart(2, '0');
            let dayIndex = currentTime.getDay();
            let dayOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'][dayIndex];
            let ampm = hours >= 12 ? 'PM' : 'AM';

            // Update AM/PM indicator
            document.getElementById('am').style.backgroundColor = (ampm === 'AM') ? 'yellow' : 'transparent';
            document.getElementById('pm').style.backgroundColor = (ampm === 'PM') ? 'yellow' : 'transparent';

            // Update clock time
            document.getElementById('hours').innerText = (ampm === 'AM' && hours === '00') ? '12' : hours % 12 || '12';
            document.getElementById('minutes').innerText = minutes;
            document.getElementById('seconds').innerText = seconds;
            document.getElementById('dayOfWeek').innerText = dayOfWeek;

            // Update day of the week radio button
            document.querySelectorAll('.radio-days input[type="radio"]').forEach((radio, index) => {
                radio.checked = (index === dayIndex);
            });
        }

        setInterval(updateTime, 1000); // Update time every second
    </script>
</body>
</html>
