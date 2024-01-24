<?php
$pythonPath = 'C:\\Users\\User\\Anaconda3\\python.exe'; // Replace 'YourUsername' with your actual username
$scriptPath = 'C:\\xampp\\htdocs\\prediction\\predict_ratios.py'; // Make sure this is the correct path to your script

// The command
$command = escapeshellcmd("$pythonPath $scriptPath");
// Execute the command and capture the output
$output = shell_exec($command . ' 2>&1');

// Display the output
echo "<pre>$output</pre>";

// Run the Python script and get the relative web path to the saved image
$imagePath = trim(shell_exec("$pythonPath $scriptPath 2>&1"));

// Output the image as an HTML image tag using the relative path
echo "<img src='$imagePath' />";

?>

