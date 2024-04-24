<?php
$host = 'database';
$user = 'user';
$pass = 'merito2023';
// $dbname = 'mydatabase';
$dbname = isset($_POST['dbname']) ? $_POST['dbname'] : '';

$message = '';
if ($dbname) {
    mysqli_report(MYSQLI_REPORT_STRICT); // Włącz raportowanie wyjątków dla mysqli
    try {
        $conn = new mysqli($host, $user, $pass, $dbname);
        $message = "Połączono pomyślnie z bazą danych: " . $dbname;
    } catch (Exception $e) {
        $message = "Nie udało się połączyć z bazą danych: " . $dbname;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprawdzanie połączenia z bazą danych</title>
</head>
<body>
    <form action="" method="post">
        <label for="dbname">Nazwa bazy danych:</label>
        <input type="text" id="dbname" name="dbname">
        <input type="submit" value="Sprawdź połączenie">
    </form>
    <p><?php echo $message; ?></p>
</body>
</html>
