<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Himanshu">
        <meta name="author" content="Kyle">

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
            background-color: #656464;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .container {
            border-radius: 5px;
            padding: 20px;
            background-color: #f2f2f2;
        }
        
        body {
           background-color: #6600cc;
        }

        input {
            margin-bottom: 10px;
        }
    
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Please put in the hours you are available or delete hours you have already posted</h2>
            <form action="form.php" method="post">
                Email:
                <br>
                <input type="email" name="email" required>

                <br>
                Name:
                <br>
                <input type="text" name="full_name" required>

                What Day You Can Tutor:
                <br>
                <select class="form-control" id="day" name="day" required>
                    <option>Monday</option> 
                    <option>Tuesday</option> 
                    <option>Wednesday</option> 
                    <option>Thursday</option> 
                    <option>Friday</option> 
                </select>

                Start Time
                <br>
                <input type="time" name="start_time" required>
                <br>

                End Time
                <br>
                <input type="time" name="end_time" required>
                <br>

                <input type="submit" name="btnSubmit" value="Submit">
                <input type="submit" name="btnDelete" value="Delete">
            </form>

            <br>
            <a href="index.html">Go back to homepage</a>
        </div>
        <?php
            // Report all error information on the webpage
            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            //check if variables are not empty and what button is pressed
            if (!empty($_POST)) 
            {
                //if submit button pressed write input to text file seperated by #,,#
                if (isset($_POST['btnSubmit'])) 
                {
                    $myfile = fopen("tutor_info.txt", "a");

                    fwrite($myfile, $_POST["email"] . "#,,#");
                    fwrite($myfile, $_POST["full_name"] . "#,,#");
                    fwrite($myfile, $_POST["day"] . "#,,#");
                    fwrite($myfile, $_POST["start_time"] . "#,,#");
                    fwrite($myfile, $_POST["end_time"] . "\n");

                    fclose($myfile);

                    echo '<script type="text/javascript">',
                                    'alert("You have successfully submitted your hours");',
                        '</script>';
                }
                
                //if delete button pressed
                if (isset($_POST['btnDelete'])) 
                {
                    $found = false; //for checking if line to delete exists in file

                    $del_line = $_POST["email"] . "#,,#" . $_POST["full_name"] . "#,,#" . $_POST["day"] . "#,,#"
                                . $_POST["start_time"] . "#,,#" . $_POST["end_time"] . "\n";
                    
                    $lines = file("tutor_info.txt"); //array with lines from file 
                    $output = '';
                    
                    //store line in $output if it is not equal to $del_line
                    foreach ($lines as $line) 
                    {
                        if ($line!==$del_line) 
                        {
                            $output .= $line;
                        } 
                        else
                        {
                            $found = true;
                        }
                    }
                
                    //delete successful
                    if($found)
                    {
                        // replace contents of the file with the output
                        file_put_contents("tutor_info.txt", $output);

                        echo '<script type="text/javascript">',
                                        'alert("You have successfully deleted your hours");',
                            '</script>';
                    }

                    //delete values not found in text file
                    else
                    {
                        echo '<script type="text/javascript">',
                                    'alert("Not Found, Please check the Values");',
                            '</script>';
                    }
                }
            }
        ?>
    </body>
</html>