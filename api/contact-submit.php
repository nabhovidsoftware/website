<?php
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

require __DIR__ . '/config.php';

$name = trim((string)($_POST['name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$phone = trim((string)($_POST['phone'] ?? ''));
$comments = trim((string)($_POST['comments'] ?? ''));

$errors = [];
if ($name === '' || mb_strlen($name) < 2 || mb_strlen($name) > 100) {
    $errors[] = 'Please enter a valid name.';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 190) {
    $errors[] = 'Please enter a valid email address.';
}
if ($phone === '' || mb_strlen($phone) > 40) {
    $errors[] = 'Please enter a valid phone number.';
}
if ($comments === '' || mb_strlen($comments) > 5000) {
    $errors[] = 'Please enter your comments or requirement.';
}

if ($errors) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    exit;
}

try {
    $pdo = db();
    $stmt = $pdo->prepare(
        'INSERT INTO contact_submissions (name, email, phone, comments) VALUES (:name, :email, :phone, :comments)'
    );
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':phone' => $phone,
        ':comments' => $comments,
    ]);

    echo json_encode([
        'success' => true,
        'message' => 'Thank you. Your enquiry has been received. Our team will contact you shortly.'
    ]);
} catch (Throwable $e) {
    http_response_code(500);
    error_log('Nabhovid contact form error: ' . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'We could not submit your enquiry right now. Please try again or contact us directly.'
    ]);
}
