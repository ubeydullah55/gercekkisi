<?php

namespace App\Controllers;

use App\Models\CustomerModel;

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

    public function silinenler()
    {
        // Modeli yükleyelim
        $model = new \App\Models\CustomerModel();

        // Veritabanından id'ye göre büyükten küçüğe sıralı verileri alalım
        $customers = $model->where('status', 'P')->orderBy('id', 'DESC')->findAll(); // DESC ile büyükten küçüğe sıralama

        // View'a verileri göndereceğiz
        return view('homepage', ['customers' => $customers]);
    }

    public function tckarsilastirview()
    {
        return view('tckarsilastir');
    }

    public function tckarsilastir()
    {
        $input = $this->request->getPost('tc_list');
        $tcler = explode("\n", $input);

        // Boşlukları temizle, boşları at
        $tcler = array_filter(array_map('trim', $tcler));

        $kisilerModel = new \App\Models\CustomerModel();

        $dbTcler = $kisilerModel
            ->whereIn('tc', $tcler)
            ->findAll();

        $bulunanTcler = array_column($dbTcler, 'tc');
        $olmayanlar = array_diff($tcler, $bulunanTcler);

        $sonuc = implode("\n", $olmayanlar);

        // 👇 Yeni sayılar
        $eklenenSayisi = count($tcler);
        $olmayanSayisi = count($olmayanlar);
        $bulunanSayisi = count($bulunanTcler); // ✅ eklendi

        return view('tckarsilastir', [
            'tc_list' => $input,
            'sonuc' => $sonuc,
            'olmayanSayisi' => $olmayanSayisi,
            'bulunanSayisi' => $bulunanSayisi,
            'eklenenSayisi' => $eklenenSayisi
        ]);
    }
    
     public function excelData()
    {
        $model = new CustomerModel();
        $data = $model->findAll(); // tüm veriler
        return $this->response->setJSON($data);
    }
}
