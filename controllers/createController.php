<?php
/**
 * Controlador da página Home.
 */
class createController extends Controller{

    public function index()
    {
        $this->loadTemplate('create');
    }
}