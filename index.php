<?php
// File penyimpanan data
$dataFile = 'data.json';

// Ambil data yang sudah ada
$data = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    if ($name && $message) {
        $data[] = ['name' => $name, 'message' => $message];
        file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
        header("Location: " . $_SERVER['PHP_SELF']); // Hindari re-submit
        exit;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Simple PHP Backend</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
            background: #f5f5f5;
        }

        form {
            margin-bottom: 20px;
        }

        .message {
            background: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .message strong {
            color: #333;
        }
    </style>
</head>

<body>

    <h2>buku tamu</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Your name" required><br><br>
        <textarea name="message" placeholder="Your message" required></textarea><br><br>
        <button type="submit">Submit</button>
    </form>

    <h3>Messages:</h3>
    <?php foreach (array_reverse($data) as $entry): ?>
        <div class="message">
            <strong><?= $entry['name'] ?>:</strong> <?= $entry['message'] ?>
        </div>
    <?php endforeach; ?>

</body>

</html>