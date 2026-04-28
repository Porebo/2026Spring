<?php
/**
 * Page Visit Counter API
 * Class-style PHP: per-page plain text file, read → increment → write → return count.
 * Professor's pattern: check if file exists, create if not, read, increment, write, display.
 *
 * GET  ?page=page-key  -> increments and returns { ok: true, count: N, page: "key" }
 */

declare(strict_types=1);

header('Content-Type: application/json; charset=UTF-8');
header('Cache-Control: no-store');

// Validate the page key: only letters, digits, dashes, underscores
$rawPage = $_GET['page'] ?? '';
$pageKey = preg_replace('/[^a-zA-Z0-9_\-]/', '', (string) $rawPage);

if ($pageKey === '') {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Missing or invalid page key']);
    exit;
}

// Store counters in a subfolder (keeps the website root tidy)
$counterDir = __DIR__ . '/counters';
if (!is_dir($counterDir)) {
    mkdir($counterDir, 0755, true);
}

$counterFile = $counterDir . '/' . $pageKey . '.txt';

// Professor's pattern: check if file exists, create and initialize if not
if (!file_exists($counterFile)) {
    file_put_contents($counterFile, '0', LOCK_EX);
}

// Read current value
$currentCount = (int) trim((string) file_get_contents($counterFile));

// Increment
$currentCount++;

// Write back (with file locking)
file_put_contents($counterFile, (string) $currentCount, LOCK_EX);

// Return result
echo json_encode(['ok' => true, 'count' => $currentCount, 'page' => $pageKey]);
exit;
