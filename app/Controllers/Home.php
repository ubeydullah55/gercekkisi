<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Modeli yükleyelim
        $model = new \App\Models\CustomerModel();
        
        // Veritabanından verileri alalım
        $customers = $model->findAll(); // Tüm verileri alır
    
        // View'a verileri göndereceğiz
        return view('homepage', ['customers' => $customers]);
    }
    
}
