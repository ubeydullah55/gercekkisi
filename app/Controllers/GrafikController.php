<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\CustomerModel;
class GrafikController extends BaseController
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
        // UserModel'den isimleri alıyoruz
        $userModel = new UserModel();
        $users = $userModel->findAll();
    
        // CustomerModel'den ekleyen_id'ye göre gruplandırarak kayıt sayısını alıyoruz
        $customerModel = new CustomerModel();
        $customerCounts = $customerModel->select('ekleyen_id, COUNT(*) as count')
            ->groupBy('ekleyen_id')
            ->findAll();
    
        // Kullanıcı isimlerini ve karşılık gelen kayıt sayılarını hazırlıyoruz
        $names = [];
        $series = [];
    
        foreach ($customerCounts as $count) {
            // Kullanıcı adını alıyoruz (ekleyen_id'ye göre)
            $user = $userModel->find($count['ekleyen_id']);
            if ($user) {
                $names[] = $user['name']; // Kullanıcı adını ekliyoruz
                $series[] = (int)$count['count'];  // Kullanıcıya ait kayıt sayısını ekliyoruz
            }
        }
    
        // Ay bazında toplam kayıtları alıyoruz
        $monthlyCounts = $customerModel->select('MONTH(created_date) as month, COUNT(*) as count')
        ->where('created_date IS NOT NULL') 
            ->groupBy('month')
            ->findAll();
    
        // Aylar ve kayıt sayıları için verileri hazırlıyoruz
        $months = [];
        $monthlySeries = [];
    
        foreach ($monthlyCounts as $monthlyCount) {
            $months[] = date('F', mktime(0, 0, 0, $monthlyCount['month'], 10)); // Ay ismi
            $monthlySeries[] = (int)$monthlyCount['count'];  // Her ay için kayıt sayısı
        }
    
        // View'a veri gönderiyoruz
        return view('grafik', [
            'names'  => $names,
            'series' => $series,
            'months' => $months,
            'monthlySeries' => $monthlySeries
        ]);
    }
    
    
}
