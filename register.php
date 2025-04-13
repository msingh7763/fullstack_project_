<?php
include 'connect.php';
session_start();

// ----------- SIGN UP -----------
if (isset($_POST['signUp'])) {
    $firstName = trim($_POST['firstName']);
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    // Check if email already exists
    $checkEmailQuery = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('⚠️ Email address already registered!'); window.location.href='login.php';</script>";
    } else {
        $insertQuery = "INSERT INTO user (firstName, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sss", $firstName, $email, $password);

        if ($stmt->execute()) {
            echo "<script>alert('✅ Registered successfully! Please log in.'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('❌ Registration failed: " . $stmt->error . "'); window.location.href='login.php';</script>";
        }
    }
    $stmt->close();
}

// ----------- SIGN IN -----------
if (isset($_POST['signIn'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $loginQuery = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($loginQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $loginResult = $stmt->get_result();

    if ($loginResult->num_rows > 0) {
        $user = $loginResult->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $user['email'];
            header("Location: homepage.php");
            exit();
        } else {
            echo "<script>alert('❌ Incorrect password. Please try again.'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('❌ Email not found. Please sign up first.'); window.location.href='login.php';</script>";
    }

    $stmt->close();
}
?>
