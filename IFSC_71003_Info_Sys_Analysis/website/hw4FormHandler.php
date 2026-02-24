<?php
/**
 * HW4 - Rideshare Driver Log Handler
 * Receives POST data from the form, saves to a JSON file, shows confirmation.
 */

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: hw4FormCreation.html');
    exit;
}

// Collect and sanitize form data
$entry = [
    'shift_date'  => htmlspecialchars($_POST['shift_date'] ?? ''),
    'start_time'  => htmlspecialchars($_POST['start_time'] ?? ''),
    'platform'    => htmlspecialchars($_POST['platform'] ?? ''),
    'area'        => htmlspecialchars($_POST['area'] ?? ''),
    'ride_count'  => intval($_POST['ride_count'] ?? 0),
    'shift_type'  => htmlspecialchars($_POST['shift_type'] ?? ''),
    'cash_tips'   => isset($_POST['cash_tips']) ? 'Yes' : 'No',
    'long_ride'   => isset($_POST['long_ride']) ? 'Yes' : 'No',
    'surge'       => isset($_POST['surge']) ? 'Yes' : 'No',
    'notes'       => htmlspecialchars($_POST['notes'] ?? ''),
    'logged_at'   => date('Y-m-d H:i:s'),
];

// Load existing entries (or start fresh)
$dataFile = 'hw4_rideshare_log.json';
$entries = [];
if (file_exists($dataFile)) {
    $json = file_get_contents($dataFile);
    $entries = json_decode($json, true) ?: [];
}

// Append new entry and save
$entries[] = $entry;
file_put_contents($dataFile, json_encode($entries, JSON_PRETTY_PRINT));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HW4 | Shift Logged</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6; color: #333; background: #f5f7fa;
            min-height: 100vh; padding: 20px;
        }
        .container { max-width: none; width: calc(100% - 40px); margin: 0 auto; padding: 20px; }
        h1 { color: #667eea; margin-bottom: 10px; }
        .breadcrumbs { margin-bottom: 20px; font-size: 0.9em; color: #666; padding: 5px 0; border-bottom: 1px solid #f0f0f0; }
        .breadcrumbs a { color: #667eea; text-decoration: none; font-weight: 500; }
        .breadcrumbs span { margin: 0 8px; color: #ccc; }
        .success-box {
            background: #d4edda; border: 1px solid #c3e6cb; border-radius: 10px;
            padding: 25px; max-width: 650px; margin-top: 20px;
        }
        .success-box h2 { color: #1e7e34; margin-bottom: 15px; }
        .detail { margin-bottom: 8px; }
        .detail strong { color: #2c3e50; min-width: 130px; display: inline-block; }
        .actions { margin-top: 20px; display: flex; gap: 15px; }
        .actions a {
            color: #667eea; text-decoration: none; font-weight: 500;
        }
        .actions a:hover { text-decoration: underline; }
        footer { text-align: center; color: #999; font-size: 0.9em; margin-top: 30px; padding-top: 20px; border-top: 2px solid #f0f0f0; }
    </style>
</head>
<body>
    <div class="container">
        <nav class="breadcrumbs">
            <a href="index.html">Home</a> <span>&rsaquo;</span>
            <a href="hw4.html">Homework 4</a> <span>&rsaquo;</span>
            <a href="hw4FormCreation.html">Task 1</a> <span>&rsaquo;</span> Shift Logged
        </nav>

        <h1>✅ Shift Logged Successfully</h1>

        <div class="success-box">
            <h2>Entry #<?php echo count($entries); ?></h2>
            <div class="detail"><strong>Date:</strong> <?php echo $entry['shift_date']; ?></div>
            <div class="detail"><strong>Start Time:</strong> <?php echo $entry['start_time']; ?></div>
            <div class="detail"><strong>Platform:</strong> <?php echo $entry['platform']; ?></div>
            <div class="detail"><strong>Area:</strong> <?php echo $entry['area']; ?></div>
            <div class="detail"><strong>Rides:</strong> <?php echo $entry['ride_count']; ?></div>
            <div class="detail"><strong>Shift Type:</strong> <?php echo $entry['shift_type']; ?></div>
            <div class="detail"><strong>Cash Tips:</strong> <?php echo $entry['cash_tips']; ?></div>
            <div class="detail"><strong>Long Ride:</strong> <?php echo $entry['long_ride']; ?></div>
            <div class="detail"><strong>Surge Active:</strong> <?php echo $entry['surge']; ?></div>
            <div class="detail"><strong>Notes:</strong> <?php echo $entry['notes'] ?: '<em>None</em>'; ?></div>
            <div class="detail"><strong>Logged At:</strong> <?php echo $entry['logged_at']; ?></div>

            <div class="actions">
                <a href="hw4FormCreation.html">&larr; Log Another Shift</a>
                <a href="hw4FormResults.php">📋 View All Entries</a>
            </div>
        </div>

        <footer>
            <p>&copy; 2026 Lester S. Carcamo. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
