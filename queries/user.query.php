<?php
function getAllUsers() {
    global $conn;
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    $users = array();
    while ($row = $result->fetch_assoc()) {
        $user = new User(
            $row['id'],
            $row['name'],
            $row['email'],
            $row['password'],
            $row['created_at'],
            $row['updated_at']
        );
        $users[] = $user;
    }
    return $users;
}

// Function to get user by ID
function getUserById($id) {
    global $conn;
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return new User(
        $row['id'],
        $row['name'],
        $row['email'],
        $row['password'],
        $row['created_at'],
        $row['updated_at']
    );
}

// Function to insert a new user
function insertUser($name, $email, $password) {
    global $conn;
    $sql = "INSERT INTO users (name, email, password, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Function to update a user
function updateUser($id, $name, $email, $password) {
    global $conn;
    $sql = "UPDATE users SET name = ?, email = ?, password = ?, updated_at = NOW() WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $email, $password, $id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Function to delete a user
function deleteUser($id) {
    global $conn;
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
?>