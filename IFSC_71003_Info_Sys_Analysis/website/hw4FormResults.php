<?php
/**
 * HW4 - Rideshare Driver Log Results
 * Reads saved entries from JSON and displays them in a styled table.
 */

$dataFile = 'hw4_rideshare_log.json';
$entries = [];
if (file_exists($dataFile)) {
    $json = file_get_contents($dataFile);
    $entries = json_decode($json, true) ?: [];
}

// Reverse so newest entries appear first
$entries = array_reverse($entries);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HW4 | Rideshare Log Entries</title>
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
        .nav { margin-bottom: 25px; padding-bottom: 20px; border-bottom: 2px solid #f0f0f0; }
        .nav a { color: #667eea; text-decoration: none; margin-right: 15px; font-weight: 500; }
        .nav a:hover { text-decoration: underline; }
        .stats {
            display: flex; gap: 20px; margin-bottom: 25px; flex-wrap: wrap;
        }
        .stat-card {
            background: white; padding: 15px 22px; border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.06); min-width: 140px;
        }
        .stat-card .label { font-size: 0.82em; color: #888; text-transform: uppercase; font-weight: 600; }
        .stat-card .value { font-size: 1.5em; font-weight: 700; color: #667eea; }
        .empty-msg { color: #888; font-style: italic; margin: 30px 0; }
        table {
            width: 100%; background: white; border-radius: 10px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.08);
            border-collapse: collapse; overflow: hidden;
        }
        thead th {
            background: #667eea; color: white; padding: 12px 14px;
            text-align: left; font-size: 0.88em; font-weight: 600;
        }
        tbody td { padding: 10px 14px; border-bottom: 1px solid #f0f0f0; font-size: 0.9em; }
        tbody tr:hover { background: #f8f9ff; }
        tbody tr:last-child td { border-bottom: none; }
        .badge {
            display: inline-block; padding: 2px 8px; border-radius: 10px;
            font-size: 0.8em; font-weight: 600;
        }
        .badge-yes { background: #d4edda; color: #1e7e34; }
        .badge-no { background: #f0f0f0; color: #999; }
        footer { text-align: center; color: #999; font-size: 0.9em; margin-top: 30px; padding-top: 20px; border-top: 2px solid #f0f0f0; }
    </style>
</head>
<body>
    <div class="container">
        <nav class="breadcrumbs">
            <a href="index.html">Home</a> <span>&rsaquo;</span>
            <a href="hw4.html">Homework 4</a> <span>&rsaquo;</span>
            <a href="hw4FormCreation.html">Task 1</a> <span>&rsaquo;</span> Log Entries
        </nav>

        <h1>📋 Rideshare Driver Log</h1>

        <div class="nav">
            <a href="hw4FormCreation.html">&larr; Log a New Shift</a>
            <a href="hw4.html">Back to Homework 4</a>
        </div>

        <?php if (empty($entries)): ?>
            <p class="empty-msg">No entries yet. <a href="hw4FormCreation.html">Log your first shift!</a></p>
        <?php else: ?>

            <div class="stats">
                <div class="stat-card">
                    <div class="label">Total Shifts</div>
                    <div class="value"><?php echo count($entries); ?></div>
                </div>
                <div class="stat-card">
                    <div class="label">Total Rides</div>
                    <div class="value"><?php echo array_sum(array_column($entries, 'ride_count')); ?></div>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Start</th>
                        <th>Platform</th>
                        <th>Area</th>
                        <th>Rides</th>
                        <th>Shift</th>
                        <th>Tips</th>
                        <th>Surge</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($entries as $i => $e): ?>
                    <tr>
                        <td><?php echo count($entries) - $i; ?></td>
                        <td><?php echo $e['shift_date']; ?></td>
                        <td><?php echo $e['start_time']; ?></td>
                        <td><?php echo $e['platform']; ?></td>
                        <td><?php echo $e['area']; ?></td>
                        <td><?php echo $e['ride_count']; ?></td>
                        <td><?php echo $e['shift_type']; ?></td>
                        <td><span class="badge <?php echo $e['cash_tips'] === 'Yes' ? 'badge-yes' : 'badge-no'; ?>"><?php echo $e['cash_tips']; ?></span></td>
                        <td><span class="badge <?php echo $e['surge'] === 'Yes' ? 'badge-yes' : 'badge-no'; ?>"><?php echo $e['surge']; ?></span></td>
                        <td><?php echo $e['notes'] ?: '—'; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php endif; ?>

        <footer>
            <p>&copy; 2026 Lester S. Carcamo. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
