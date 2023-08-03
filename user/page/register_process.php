<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdsg";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Thiết lập chế độ báo lỗi cho PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy thông tin đăng ký từ form
        $username = $_POST['usernameregis'];
        $password = $_POST['passwordregis'];
        $email = $_POST['emailregis'];

        // Kiểm tra tính hợp lệ của thông tin đăng ký
        if (empty($username) || empty($password) || empty($email)) {
            echo 'Vui lòng điền đầy đủ thông tin.';
        } else {
            // Sử dụng prepared statement để tránh SQL injection
            $query = "SELECT * FROM user WHERE user_nickname = :username OR email = :email";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo 'Tên đăng nhập hoặc địa chỉ email đã tồn tại.';
            } else {
                // Nếu chưa tồn tại, thêm người dùng mới vào cơ sở dữ liệu
                $query = "INSERT INTO user (user_nickname, email, password) VALUES (:username, :email, :password)";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->execute();
                echo 'Đăng ký thành công.';
            }
        }
    }
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
// Đóng kết nối PDO
$conn = null;
