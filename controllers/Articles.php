<?php

class Articles extends Controller{
    public function __construct(){ 
    }

    public function index(){
        $this->loadModel("Article");
        $articles = $this->Article->getAll();

        $this->render('index', compact('articles'));
    }
}