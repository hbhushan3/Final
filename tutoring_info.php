<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Himanshu">
        <meta name="author" content="Kyle">

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

        th {
            background-color: #656464;
        }

        body {
            background-color: #6600cc;
        }

        .container {
            border-radius: 5px;
            padding: 20px;
            background-color: #ffffff;
        }
        </style>
    </head>
    <body>
        <h2></h2>
        <div class ="container">
            <table id="tutor_table">
                <tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Day</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>
                <?php
                    //get info from text file and display in table
                    $myfile = fopen("tutor_info.txt", "r+");
                    $newline = fgets($myfile);

                    while ($newline !== false) 
                    {
                        $regex = "/#,,#";                        
                        echo "<tr><td>".preg_replace($regex . "/", "</td><td>", $newline)."</td></tr>";
                        $newline = fgets($myfile);
                    }
                    fclose($myfile);
                ?>
            </table>
            <br>
            <a href="index.html">Go back to homepage</a>
        </div>
    </body>
</html>