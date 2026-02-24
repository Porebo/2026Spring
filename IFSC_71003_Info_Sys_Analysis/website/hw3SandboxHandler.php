<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: hw3Sandbox.html');
    exit;
}

function clean_text(string $value): string {
    return trim($value);
}

$fullName = clean_text($_POST['fullName'] ?? '');
$email = clean_text($_POST['email'] ?? '');
$studyTime = clean_text($_POST['studyTime'] ?? '');
$notes = clean_text($_POST['notes'] ?? '');

$errors = [];

if ($fullName === '') {
    $errors[] = 'Full Name is required.';
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'A valid Email is required.';
}

$allowedStudyTimes = ['1-3', '4-6', '7-10', '10+'];
if (!in_array($studyTime, $allowedStudyTimes, true)) {
    $errors[] = 'Please select a valid Study Time option.';
}

function esc(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HW3 Sandbox Submission</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
        }

        h1 {
            color: #667eea;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #764ba2;
            margin-bottom: 25px;
            font-weight: 500;
        }

        .section {
            margin-bottom: 25px;
            padding-bottom: 25px;
            border-bottom: 2px solid #f0f0f0;
        }

        .section:last-child {
            border-bottom: none;
        }

        .section-title {
            color: #764ba2;
            font-size: 1.2em;
            margin-bottom: 12px;
            font-weight: 600;
        }

        .breadcrumbs {
            margin-bottom: 20px;
            font-size: 0.9em;
            color: #666;
            padding: 5px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .breadcrumbs a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumbs span {
            margin: 0 8px;
            color: #ccc;
        }

        .list {
            margin-left: 20px;
        }

        .list li {
            margin-bottom: 8px;
        }

        .result {
            background-color: #f4f7fb;
            border-left: 4px solid #667eea;
            padding: 12px;
            border-radius: 4px;
        }

        .result p {
            margin-bottom: 8px;
        }

        .result p:last-child {
            margin-bottom: 0;
        }

        .actions a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            margin-right: 15px;
        }

        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="breadcrumbs">
            <a href="index.html">Home</a> <span>&rsaquo;</span> <a href="hw3.html">Homework 3</a> <span>&rsaquo;</span> <a href="hw3Sandbox.html">Sandbox</a> <span>&rsaquo;</span> Submission
        </nav>

        <h1>HW3 Sandbox Submission</h1>
        <p class="subtitle">Server-side PHP Processing Result</p>

        <?php if (!empty($errors)): ?>
            <div class="section">
                <div class="section-title">Please Fix the Following</div>
                <ul class="list">
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo esc($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php else: ?>
            <div class="section">
                <div class="section-title">Submission Received</div>
                <div class="result">
                    <p><strong>Full Name:</strong> <?php echo esc($fullName); ?></p>
                    <p><strong>Email:</strong> <?php echo esc($email); ?></p>
                    <p><strong>Study Time Per Week:</strong> <?php echo esc($studyTime); ?></p>
                    <p><strong>Course Notes:</strong> <?php echo esc($notes === '' ? 'No notes provided.' : $notes); ?></p>
                </div>
            </div>
        <?php endif; ?>

        <div class="section actions">
            <a href="hw3Sandbox.html">← Back to Sandbox Form</a>
            <a href="hw3.html">Back to HW3</a>
            <a href="index.html">Back to Home</a>
        </div>
    </div>
</body>
</html>
