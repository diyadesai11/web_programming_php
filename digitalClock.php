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
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .custom-clock-container {
            border: 5px solid #8d8e94;
            padding: 5vw;
            max-width: 90vw;
            box-sizing: border-box;
            background-color: #000;
            border-radius: 30px;
        }

        .custom-clock {
            width: 100%;
            color: #fff;
        }

        .custom-clock th,
        .custom-clock td {
            text-align: center;
        }

        .date,
        .time th {
            color: #aabdc1;
            font-size: 3vw;
        }

        .date-num,
        .custom-hours {
            font-family: 'Digital-7', sans-serif;
            font-size: 8vw;
            box-shadow: 0 0 0 3px #5a6163;
            border-radius: 10px;
        }

        .custom-hours td {
            font-size: 150px;
            font-family: 'Digital-7', sans-serif;
            color: red;
            /* Set the time color to white */
        }

        .ampm {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 2vw;
        }

        .ampm div {
            width: 3vw;
            height: 3vw;
            border: 2px solid #fff;
            margin: 1vw;
            border-radius: 50%;
        }

        .ampm p {
            color: #fff;
            font-size: 2vw;
            margin: 0 1vw;
        }

        /* Set the color of radio buttons to red */
        .radio-days input[type="radio"] {
            appearance: none;
            -webkit-appearance: none;
            width: 2vw;
            height: 2vw;
            border-radius: 50%;
            border: 2px solid red;
            outline: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .radio-days input[type="radio"]:checked {
            background-color: red;
        }

        .radio-days label {
            color: #fff;
            font-size: 2vw;
        }

        /* Responsive styles for smaller screens */
        @media (max-width: 768px) {

            .date,
            .time th {
                font-size: 4vw;
            }

            .date-num,
            .custom-hours {
                font-size: 10vw;
            }

            .ampm p {
                font-size: 3vw;
            }

            .radio-days input[type="radio"] {
                width: 5vw;
                height: 5vw;
            }

            .radio-days label {
                font-size: 3vw;
            }
        }

        @media (max-width: 480px) {

            .date,
            .time th {
                font-size: 5vw;
            }

            .date-num,
            .custom-hours {
                font-size: 12vw;
            }

            .ampm p {
                font-size: 4vw;
            }

            .radio-days input[type="radio"] {
                width: 6vw;
                height: 6vw;
            }

            .radio-days label {
                font-size: 4vw;
            }
        }
    </style>
</head>

<body>
    <div class="custom-clock-container">
        <table class="custom-clock">
            <tr class="date">
                <th colspan="2">DATE</th>
                <th colspan="4">MONTH</th>
                <th colspan="3">YEAR</th>
            </tr>
            <tr class="date-num" style="color: red;">
                <td colspan="2"><?php echo date("d"); ?></td>
                <td colspan="4"><?php echo date("m"); ?></td>
                <td colspan="3"><?php echo date("y"); ?></td>
            </tr>
            <tr class="time">
                <th colspan="2">HOUR</th>
                <th colspan="4">MINUTE</th>
                <th colspan="3">SECOND</th>
            </tr>
            <tr class="custom-hours" style="color: red;">
                <td colspan="2" id="hours"></td>
                <td>:</td>
                <td colspan="2" id="minutes"></td>
                <td>:</td>
                <td colspan="2" id="seconds"></td>
            </tr>
            <tr class="radio-days">
                <td><input type="radio" id="sun"> <label for="sun">SUN</label></td>
                <td><input type="radio" id="mon"> <label for="mon">MON</label></td>
                <td><input type="radio" id="tue"> <label for="tue">TUE</label></td>
                <td><input type="radio" id="wed"> <label for="wed">WED</label></td>
                <td><input type="radio" id="thu"> <label for="thu">THU</label></td>
                <td><input type="radio" id="fri"> <label for="fri">FRI</label></td>
                <td><input type="radio" id="sat"> <label for="sat">SAT</label></td>
            </tr>
        </table>
        <div class="ampm">
            <div id="am" class="coloram"></div>
            <p>am</p>
            <div id="pm" class="colorpm"></div>
            <p>pm</p>
            <p class="day-of-week" id="dayOfWeek" style="color:green;"></p>
        </div>


        <h1 style="color: white;">Diya Desai</h1>

    </div>

    <script type="text/javascript">
        function updateTime() {
            let currentTime = new Date();
            let hours = String(currentTime.getHours()).padStart(2, '0');
            let minutes = String(currentTime.getMinutes()).padStart(2, '0');
            let seconds = String(currentTime.getSeconds()).padStart(2, '0');
            let dayIndex = currentTime.getDay();
            let dayOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday','Saturday'][dayIndex];

            const ampms = hours >= 12 ? 'PM' : 'AM';
            let ams = document.querySelector(".coloram");
            if (ampms === 'PM') {
                document.querySelector(".colorpm").style.backgroundColor = 'red';
            } else {
                ams.style.backgroundColor = 'red';
            }

            document.getElementById('hours').innerHTML = hours;
            document.getElementById('minutes').innerHTML = minutes;
            document.getElementById('seconds').innerHTML = seconds;

            document.querySelectorAll('.radio-days input[type="radio"]').forEach((radio, index) => {
                radio.checked = index === dayIndex;
            });
        }

        setInterval(updateTime, 1000); // Update time every second
    </script>
</body>

</html>
