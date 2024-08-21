<?php
// Function to get all products
function getAllProducts() {
    global $conn;
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    $products = array();
    while ($row = $result->fetch_assoc()) {
        $product = new Product(
            $row['id'],
            $row['name'],
            $row['category_id'],
            $row['updated_at'],
            $row['created_at'],
            $row['description'],
            $row['price']
        );
        $products[] = $product;
    }
    return $products;
}

// Function to get product by ID
function getProductById($id) {
    global $conn;
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return new Product(
        $row['id'],
        $row['name'],
        $row['category_id'],
        $row['updated_at'],
        $row['created_at'],
        $row['description'],
        $row['price']
    );
}

// Function to insert a new product
function insertProduct($name, $category_id, $description, $price) {
    global $conn;
    $sql = "INSERT INTO products (name, category_id, description, price, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sids", $name, $category_id, $description, $price);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Function to update a product
function updateProduct($id, $name, $category_id, $description, $price) {
    global $conn;
    $sql = "UPDATE products SET name = ?, category_id = ?, description = ?, price = ?, updated_at = NOW() WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sidsi", $name, $category_id, $description, $price, $id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Function to delete a product
function deleteProduct($id) {
    global $conn;
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
?>