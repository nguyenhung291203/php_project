<?php
// Function to get all categories
function getAllCategories()
{
    global $conn;
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    $categories = array();
    while ($row = $result->fetch_assoc()) {
        $category = new Category($row['id'], $row['name']);
        $categories[] = $category;
    }
    return $categories;
}

// Function to get category by ID
function getCategoryById($id)
{
    global $conn;
    $sql = "SELECT * FROM categories WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return new Category($row['id'], $row['name']);
}

// Function to insert a new category
function insertCategory($name)
{
    global $conn;
    $sql = "INSERT INTO categories (name) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Function to update a category
function updateCategory($id, $name)
{
    global $conn;
    $sql = "UPDATE categories SET name = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $name, $id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Function to delete a category
function deleteCategory($id)
{
    global $conn;
    $sql = "DELETE FROM categories WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
