<?php

class BaseEntity
{
    protected $created_at;
    protected $updated_at;

    public function __construct()
    {
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
    }

    public function save()
    {
        // Lưu entity vào database
        $this->updated_at = date('Y-m-d H:i:s');
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}