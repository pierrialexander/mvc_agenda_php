<?php
/**
 * Controlador da página Home.
 */
class homeController extends Controller{

    public function index()
    {
        $this->loadTemplate('home');
    }
}