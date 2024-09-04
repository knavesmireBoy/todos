<?php
$env = parse_ini_file("../../.env");
$layout = 'layout.html.php';

$count = 0;
$database = $env['MYSQL_DATABASE'];
 $db = new \PDO(
            "mysql:host=localhost;dbname=$database;charset=utf8mb4",
            $env['MYSQL_USER'],
            $env['MYSQL_PASSWORD']);

        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $db->exec('SET NAMES "utf8"');
$stmt = $db->prepare('SELECT * FROM todos');
$stmt->execute();

$todos = $stmt->fetchAll(PDO::FETCH_CLASS);

if (!empty($_POST['item'])) {
    $sql = 'INSERT INTO todos (`task`) VALUES(:todo)';
    $stmt = $db->prepare($sql);
    $todo = $_POST['item'];
    $i = $count++;
    $stmt->execute(['todo' => $todo]);
    header('Location: ?');
}

include __DIR__ . '/../templates/layout.html.php';
