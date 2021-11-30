<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Himanshu">

        <title>Submit Hours</title>

        <style>
        input[type=text], select, textarea {
            width: 100%; 
            padding: 12px; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
            box-sizing: border-box; 
            margin-top: 6px; 
            margin-bottom: 16px; 
            resize: vertical 
        }

        input[type=submit] {
            background-color: #6600cc;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .container {
            border-radius: 5px;
            padding: 20px;
        }
        
        body {
            background-color: #f2f2f2;
        }
    
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Please put in the hours you are available this week</h2>
            <form action="form.php" method="post">
                Email:
                <br>
                <input type="email" name="email">
                <br>
                <br>

                Name:
                <br>
                <input type="text" name="full_name">
                <br>
                <br>

                What Day You Can Tutor:
                <br>
                <select class="form-control" id="day" name="day">
                    <option>Monday</option> 
                    <option>Tuesday</option> 
                    <option>Wednesday</option> 
                    <option>Thursday</option> 
                    <option>Friday</option> 
                </select>
                <br>
                <br>

                Start Time
                <br>
                <input type="time" name="start_time">
                <br>
                <br>
            
                End Time
                <br>
                <input type="time" name="end_time">
                <br>
                <br>
                <input type="submit">
            </form>

            <br>
            <a href="index.html">Go back to homepage</a>
        </div>
        <?php
            // Report all error information on the webpage
            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            //check if inputs are empty
            //if not empty, write input to text file seperated by comma
            //else won't write to text file
            if (!empty($_POST) && !empty($_POST["email"]) && !empty($_POST["full_name"])
                && !empty($_POST["day"]) && !empty($_POST["start_time"]) && !empty($_POST["end_time"])) 
            {
                $myfile = fopen("tutor_info.txt", "a");

                fwrite($myfile, $_POST["email"] . ",");
                fwrite($myfile, $_POST["full_name"] . ",");
                fwrite($myfile, $_POST["day"] . ",");
                fwrite($myfile, $_POST["start_time"] . ",");
                fwrite($myfile, $_POST["end_time"] . "\n");

                fclose($myfile);

                echo '<script type="text/javascript">',
                                'alert("You have successfully submitted your hours");',
                     '</script>';
            }
            
            /*
            else
            {
                echo '<script type="text/javascript">',
                                'alert("Failed! Please enter all the information correctly!");',
                     '</script>';
            }
            */
        ?>
    </body>
</html>