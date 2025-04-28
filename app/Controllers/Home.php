<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        if (!session()->get('logged_in')) {
            header('Location: ' . base_url('/'));
            exit();
        }
    }
    
    public function index()
    {
   // Modeli yükleyelim
$model = new \App\Models\CustomerModel();

// Veritabanından id'ye göre büyükten küçüğe sıralı verileri alalım
$customers = $model->where('status', 'A')->orderBy('id', 'DESC')->findAll(); // DESC ile büyükten küçüğe sıralama

// View'a verileri göndereceğiz
return view('homepage', ['customers' => $customers]);

    }
    
}
