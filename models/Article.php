<?php

class Article extends Model {
    public function __construct() {
        $this->table  = "articles";
        $this->getConnection();
    }
}