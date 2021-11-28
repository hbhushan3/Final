<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Himanshu">

        <title>Tutor Info</title>

        <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <a href="index.html">Go back to homepage</a> <br>
        <a href="form.php">Are you a tutor? Enter your availibilty here</a>
        <h2>List of tutors with contact information and their availibility this week</h2>

        <table id="tutor_table">
            <tr>
                <th>Email</th>
                <th>Name</th>
                <th>Day</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>
            <?php
                $myfile = fopen("tutor_info.txt", "r+");
                $newline = fgets($myfile);

                while ($newline !== false) 
                    {
                        $regex = "/,";                        
                        echo "<tr><td>".preg_replace($regex . "/", "</td><td>", $newline)."</td></tr>";
                        $newline = fgets($myfile);
                    }


                fclose($myfile);
            ?>
        </table>
    </body>
</html>