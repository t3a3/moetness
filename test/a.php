$sql = 'INSERT INTO users_table(id, users_name, users_email, users_password,created_at, updated_at) VALUES(NULL, :users_name, :users_email, :users_password,now(), now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':users_name', $users_name, PDO::PARAM_STR);
$stmt->bindValue(':users_email', $users_email, PDO::PARAM_STR);
$stmt->bindValue(':users_password', $users_password, PDO::PARAM_STR);

try {
$status = $stmt->execute();
} catch (PDOException $e) {
echo json_encode(["sql error" => "{$e->getMessage()}"]);
exit();
}

header("Location:users_input.php");
exit();

password_hash($_POST['users_password'], PASSWORD_DEFAULT);