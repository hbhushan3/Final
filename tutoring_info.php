<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Himanshu">

        <title>Tutor Info</title>
        <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        h2, a {
            font-family: arial, sans-serif;
        }
        </style>
    </head>
    <body>
        <h2>List of tutors with contact information and their availibility</h2>

        <table id="tutor_table">
            <tr bgcolor="6600cc">
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
        <br>
        <a href="index.html">Go back to homepage</a>
    </body>
</html>