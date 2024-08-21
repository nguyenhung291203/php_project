<?php
// Function to get all roles
function getAllRoles() {
    global $conn;
    $sql = "SELECT * FROM roles";
    $result = $conn->query($sql);
    $roles = array();
    while ($row = $result->fetch_assoc()) {
        $role = new Role($row['id'], $row['name']);
        $roles[] = $role;
    }
    return $roles;
}

// Function to get role by ID
function getRoleById($id) {
    global $conn;
    $sql = "SELECT * FROM roles WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return new Role($row['id'], $row['name']);
}

// Function to insert a new role
function insertRole($name) {
    global $conn;
    $sql = "INSERT INTO roles (name) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Function to update a role
function updateRole($id, $name) {
    global $conn;
    $sql = "UPDATE roles SET name = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $name, $id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Function to delete a role
function deleteRole($id) {
    global $conn;
    $sql = "DELETE FROM roles WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
?>