<?php
/**
 * Meeting Notes API
 * GET  -> returns current notes DB
 * POST -> accepts { action: "sync", db: { notes: [], drafts: {} } }
 */

declare(strict_types=1);

header('Content-Type: application/json; charset=UTF-8');

$dataFile = __DIR__ . '/meeting_notes_store.json';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $db = read_db($dataFile);
    respond_json(['ok' => true, 'db' => $db]);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    respond_json(['ok' => false, 'error' => 'Method not allowed']);
}

$rawBody = file_get_contents('php://input');
$payload = json_decode($rawBody ?: '{}', true);

if (!is_array($payload) || ($payload['action'] ?? '') !== 'sync') {
    http_response_code(400);
    respond_json(['ok' => false, 'error' => 'Unsupported request']);
}

$incoming = sanitize_db($payload['db'] ?? []);
if ($incoming === null) {
    http_response_code(400);
    respond_json(['ok' => false, 'error' => 'Invalid DB format']);
}

if (!write_db($dataFile, $incoming)) {
    http_response_code(500);
    respond_json(['ok' => false, 'error' => 'Unable to save notes']);
}

respond_json(['ok' => true, 'db' => $incoming]);

function read_db(string $filePath): array
{
    if (!file_exists($filePath)) {
        $empty = ['notes' => [], 'drafts' => []];
        write_db($filePath, $empty);
        return $empty;
    }

    $json = file_get_contents($filePath);
    if ($json === false || trim($json) === '') {
        return ['notes' => [], 'drafts' => []];
    }

    $parsed = json_decode($json, true);
    $clean = sanitize_db($parsed);
    return $clean ?? ['notes' => [], 'drafts' => []];
}

function write_db(string $filePath, array $db): bool
{
    $handle = fopen($filePath, 'c+');
    if ($handle === false) {
        return false;
    }

    if (!flock($handle, LOCK_EX)) {
        fclose($handle);
        return false;
    }

    ftruncate($handle, 0);
    rewind($handle);
    $ok = fwrite($handle, json_encode($db, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)) !== false;
    fflush($handle);
    flock($handle, LOCK_UN);
    fclose($handle);

    return $ok;
}

function sanitize_db($db): ?array
{
    if (!is_array($db)) {
        return null;
    }

    $notesIn = $db['notes'] ?? [];
    $draftsIn = $db['drafts'] ?? [];

    if (!is_array($notesIn) || !is_array($draftsIn)) {
        return null;
    }

    $notesOut = [];
    foreach ($notesIn as $note) {
        if (!is_array($note)) {
            continue;
        }

        $id = clamp_string($note['id'] ?? '', 80);
        $meetingId = clamp_string($note['meetingId'] ?? '', 80);
        $meetingLabel = clamp_string($note['meetingLabel'] ?? '', 160);
        $tag = clamp_string($note['tag'] ?? '', 40);
        $text = clamp_string($note['text'] ?? '', 4000);
        $createdAt = clamp_string($note['createdAt'] ?? '', 40);

        if ($id === '' || $meetingId === '' || $text === '') {
            continue;
        }

        $notesOut[] = [
            'id' => $id,
            'meetingId' => $meetingId,
            'meetingLabel' => $meetingLabel,
            'tag' => $tag,
            'text' => $text,
            'createdAt' => $createdAt,
        ];
    }

    $draftsOut = [];
    foreach ($draftsIn as $meetingId => $draft) {
        if (!is_string($meetingId) || !is_array($draft)) {
            continue;
        }

        $cleanMeetingId = clamp_string($meetingId, 80);
        if ($cleanMeetingId === '') {
            continue;
        }

        $draftsOut[$cleanMeetingId] = [
            'tag' => clamp_string($draft['tag'] ?? '', 40),
            'text' => clamp_string($draft['text'] ?? '', 2000),
        ];
    }

    return [
        'notes' => $notesOut,
        'drafts' => $draftsOut,
    ];
}

function clamp_string($value, int $maxLen): string
{
    $text = trim((string) $value);
    if ($text === '') {
        return '';
    }

    if (function_exists('mb_substr')) {
        return mb_substr($text, 0, $maxLen, 'UTF-8');
    }

    return substr($text, 0, $maxLen);
}

function respond_json(array $payload): void
{
    echo json_encode($payload, JSON_UNESCAPED_SLASHES);
    exit;
}
