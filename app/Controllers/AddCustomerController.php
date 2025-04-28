<?php

namespace App\Controllers;


class AddCustomerController extends BaseController
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
        return view('addcustomer');
    }
    public function savecustomer()
    {
        $uploadedFileNameOnyuz = 'default.png'; // Başta default resim
        $uploadedFileNameArkayuz = 'default.png'; // Başta default resim
    
        $onyuzFile = $this->request->getFile('onyuz_resim');
        if ($onyuzFile && $onyuzFile->getError() == 0) {
            if ($onyuzFile->isValid() && !$onyuzFile->hasMoved()) {
                $newNameOnyuz = uniqid() . '.' . $onyuzFile->getClientExtension();
                $onyuzFile->move(ROOTPATH . 'tccard', $newNameOnyuz);
                $uploadedFileNameOnyuz = $newNameOnyuz;
            }
        }
    
        $arkayuzFile = $this->request->getFile('arkayuz_resim');
        if ($arkayuzFile && $arkayuzFile->getError() == 0) {
            if ($arkayuzFile->isValid() && !$arkayuzFile->hasMoved()) {
                $newNameArkayuz = uniqid() . '.' . $arkayuzFile->getClientExtension();
                $arkayuzFile->move(ROOTPATH . 'tccard', $newNameArkayuz);
                $uploadedFileNameArkayuz = $newNameArkayuz;
            }
        }
    
        $data = [
            'ad'            => $this->request->getPost('ad'),
            'soyad'         => $this->request->getPost('soyad'),
            'tc'            => $this->request->getPost('tc'),
            'dogum_tarihi'  => $this->request->getPost('dogum_tarihi'),
            'dogum_yeri'    => $this->request->getPost('dogum_yeri'),
            'anne_adi'      => $this->request->getPost('anne_adi'),
            'baba_adi'      => $this->request->getPost('baba_adi'),
            'uyruk'         => $this->request->getPost('uyruk'),
            'kimlik_belgesi_turu'    => $this->request->getPost('belge_turu'),
            'kimlik_belgesi_numarası'=> $this->request->getPost('belge_numarası'),
            'e_posta'        => $this->request->getPost('eposta'),
            'tel'           => $this->request->getPost('tel'),
            'meslek'        => $this->request->getPost('meslek'),
            'sehir'         => $this->request->getPost('sehir'),
            'adres'         => $this->request->getPost('adres'),
            'musteri_notu'  => $this->request->getPost('not'),
            'img_1'         => $uploadedFileNameOnyuz, 
            'img_2'         => $uploadedFileNameArkayuz,
        ];
    
        $model = new \App\Models\CustomerModel();
        $model->insert($data);
        return redirect()->to('/homepage')->with('success', 'Müşteri başarıyla eklendi.');
    }
    
    

    public function deletecustomer($id)
{
    $customerModel = new \App\Models\CustomerModel(); // Model ismini senin kullandığın modele göre değiştir.
    $customerModel->delete($id);

    return redirect()->to('/homepage')->with('success', 'Müşteri başarıyla silindi.');
}

public function customerview($id)
{
    $customerModel = new \App\Models\CustomerModel();
    $customer = $customerModel->find($id); // id'ye göre müşteri verilerini al

    if (!$customer) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Müşteri bulunamadı.');
    }

    // Müşteri verisini view'e gönder
    return view('viewcustomer', ['customer' => $customer]);
}
public function customereditview($id)
{
    $customerModel = new \App\Models\CustomerModel();
    $customer = $customerModel->find($id); // id'ye göre müşteri verilerini al

    if (!$customer) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Müşteri bulunamadı.');
    }

    // Müşteri verisini view'e gönder
    return view('editcustomer', ['customer' => $customer]);
}


public function editcustomer($customerId)
{
    $uploadedFileNameOnyuz = null;
    $uploadedFileNameArkayuz = null;

    $onyuzFile = $this->request->getFile('onyuz_resim');
    if ($onyuzFile && $onyuzFile->isValid() && !$onyuzFile->hasMoved()) {
        $newNameOnyuz = uniqid() . '.' . $onyuzFile->getClientExtension();
        $onyuzFile->move(ROOTPATH . 'tccard', $newNameOnyuz);

        $oldImage = $this->request->getPost('old_img_1');
        if ($oldImage && file_exists(ROOTPATH . 'tccard/' . $oldImage)) {
            unlink(ROOTPATH . 'tccard/' . $oldImage);
        }
        $uploadedFileNameOnyuz = $newNameOnyuz;
    } else {
        // Yeni resim yüklenmediyse eski resmi koru
        $uploadedFileNameOnyuz = $this->request->getPost('old_img_1');
    }

    $arkayuzFile = $this->request->getFile('arkayuz_resim');
    if ($arkayuzFile && $arkayuzFile->isValid() && !$arkayuzFile->hasMoved()) {
        $newNameArkayuz = uniqid() . '.' . $arkayuzFile->getClientExtension();
        $arkayuzFile->move(ROOTPATH . 'tccard', $newNameArkayuz);

        $oldImage2 = $this->request->getPost('old_img_2');
        if ($oldImage2 && file_exists(ROOTPATH . 'tccard/' . $oldImage2)) {
            unlink(ROOTPATH . 'tccard/' . $oldImage2);
        }
        $uploadedFileNameArkayuz = $newNameArkayuz;
    } else {
        // Yeni resim yüklenmediyse eski resmi koru
        $uploadedFileNameArkayuz = $this->request->getPost('old_img_2');
    }

    $data = [
        'ad'                      => $this->request->getPost('ad'),
        'soyad'                   => $this->request->getPost('soyad'),
        'tc'                      => $this->request->getPost('tc'),
        'dogum_tarihi'             => $this->request->getPost('dogum_tarihi'),
        'dogum_yeri'              => $this->request->getPost('dogum_yeri'),
        'anne_adi'                => $this->request->getPost('anne_adi'),
        'baba_adi'                => $this->request->getPost('baba_adi'),
        'uyruk'                   => $this->request->getPost('uyruk'),
        'kimlik_belgesi_turu'     => $this->request->getPost('belge_turu'),
        'kimlik_belgesi_numarası' => $this->request->getPost('belge_numarası'),
        'e_posta'                 => $this->request->getPost('eposta'),
        'tel'                     => $this->request->getPost('tel'),
        'meslek'                  => $this->request->getPost('meslek'),
        'sehir'                   => $this->request->getPost('sehir'),
        'adres'                   => $this->request->getPost('adres'),
        'musteri_notu'            => $this->request->getPost('not'),
        'img_1'                   => $uploadedFileNameOnyuz,
        'img_2'                   => $uploadedFileNameArkayuz,
    ];

    $model = new \App\Models\CustomerModel();
    $model->update($customerId, $data);

    return redirect()->back()->with('success', 'Müşteri bilgileri başarıyla güncellendi.');
}


    
}
