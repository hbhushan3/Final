<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Himanshu">

        <title>Submit Hours</title>

        <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <a href="tutoring_info.php">View available tutors and their hours</a>
        <h2>Please put in the hours you are available this week (Email | Full Name | Day | Start time | End Time)</h2>

        <form action="form.php" method="post">
             <input type="email" name="email">
             <input type="text" name="full_name">
            <select class="form-control" id="day" name="day">
                <option>Monday</option> 
                <option>Tuesday</option> 
                <option>Wednesday</option> 
                <option>Thursday</option> 
                <option>Friday</option> 
            </select>
            <input type="time" name="start_time">
            <input type="time" name="end_time">
            <input type="submit">
        </form>
        <?php
            // Report all error information on the webpage
            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            if (!empty($_POST) && !empty($_POST["email"])) 
            {
                $myfile = fopen("tutor_info.txt", "r+");
                fwrite($myfile, $_POST["email"] . ",");
                fwrite($myfile, $_POST["full_name"] . ",");
                fwrite($myfile, $_POST["day"] . ",");
                fwrite($myfile, $_POST["start_time"] . ",");
                fwrite($myfile, $_POST["end_time"] . "\n");

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