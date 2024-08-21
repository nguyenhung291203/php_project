<?php

class Product extends BaseEntity
{
    private $id;
    private $name;
    private $category_id;
    private $description;
    private $price;

    public function __construct($id, $name, $category_id, $description, $price, $created_at, $updated_at)
    {
        parent::__construct($created_at, $updated_at);
        $this->id = $id;
        $this->name = $name;
        $this->category_id = $category_id;
        $this->description = $description;
        $this->price = $price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function save()
    {
        // Lưu thông tin sản phẩm vào database
        parent::save();
    }
}