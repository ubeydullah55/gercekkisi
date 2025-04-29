<?= view('include/header') ?>

<?= view('include/leftmenu') ?>

<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<?php if (session()->getFlashdata('success')): ?>
					<div class="alert alert-success" style="text-align: center;">
						<?= session()->getFlashdata('success') ?>
					</div>
				<?php endif; ?>
				<?php if (session()->getFlashdata('error')): ?>
					<div class="alert alert-danger" style="text-align: center;">
						<?= session()->getFlashdata('error') ?>
					</div>
				<?php endif; ?>
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Gerçek Kişi Listesi</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index.html">Anasayfa</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									Liste
								</li>
							</ol>
						</nav>
					</div>

				</div>
			</div>
			<!-- Simple Datatable start -->

			<!-- Simple Datatable End -->
			<!-- multiple select row Datatable start -->

			<!-- multiple select row Datatable End -->
			<!-- Checkbox select Datatable start -->

			<!-- Checkbox select Datatable End -->
			<!-- Export Datatable start -->




			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-blue h4">Gerçek Kişi Liste</h4>
				</div>
				<div class="pb-20">
					<table
						class="table hover multiple-select-row data-table-export nowrap">

						<thead>
							<tr>
								<th>İd</th>
								<th class="table-plus datatable-nosort">Ad Soyad</th>
								<th class="table-plus datatable-nosort">T.C Kimlik</th>
								<th class="table-plus datatable-nosort">İş Ünvanı</th>
								<th class="table-plus datatable-nosort">Cep Telefonu</th>
								<th class="table-plus datatable-nosort">Şehir</th>
								<th class="table-plus datatable-nosort">Adres</th>
								<th class="table-plus datatable-nosort">Not</th>
								<th class="table-plus datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							// Session'dan role değerini alalım
							$role = session()->get('role');
							?>
							<?php foreach ($customers as $customer): ?>
								<tr>
									<td><?= esc($customer['id']); ?></td>
									<td class="table-plus"><?= esc($customer['ad']) . ' ' . esc($customer['soyad']); ?></td>
									<td><?= esc($customer['tc']); ?></td>
									<td><?= esc($customer['meslek']); ?></td>
									<td><?= esc($customer['tel']); ?></td>
									<td><?= esc($customer['sehir']); ?></td>
									<td><?= esc($customer['adres']); ?></td>
									<td><?= esc($customer['musteri_notu']); ?></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="#" onclick="redirectToViewPage(<?= $customer['id']; ?>)"><i class="dw dw-eye"></i> İncele</a>
												<?php if ($role == 1 || $role == 2): ?>
													<a class="dropdown-item" href="#" onclick="redirectToEditPage(<?= $customer['id']; ?>)">
														<i class="dw dw-edit2"></i> Düzenle
													</a>
													<a class="dropdown-item" href="#" onclick="deleteCustomer(<?= $customer['id']; ?>, '<?= esc($customer['ad']) . ' ' . esc($customer['soyad']); ?>')">
														<i class="dw dw-delete-3"></i> Sil
													</a>
												<?php endif; ?>
												<a class="dropdown-item" href="#" onclick="printRow(this,
    '<?= base_url('tccard/' . $customer['img_1']); ?>', 
    '<?= base_url('tccard/' . $customer['img_2']); ?>', 
    '<?= $customer['dogum_yeri']; ?>',
    '<?= $customer['dogum_tarihi']; ?>',
    '<?= $customer['anne_adi']; ?>',
    '<?= $customer['baba_adi']; ?>',
    '<?= $customer['uyruk']; ?>',
    '<?= $customer['kimlik_belgesi_turu']; ?>',
    '<?= $customer['kimlik_belgesi_numarası']; ?>',
    '<?= $customer['e_posta']; ?>')">
													<i class="dw dw-print"></i> Yazdır
												</a>

											</div>
										</div>
									</td>
								</tr>
							<?php endforeach; ?>






						</tbody>
					</table>
				</div>
			</div>
			<!-- Export Datatable End -->
		</div>
		<div class="footer-wrap pd-20 mb-20 card-box">
			Creadet By
			<a href="https://github.com/ubeydullah55" target="_blank">Ubeydullah Doğan</a>
		</div>
	</div>
</div>
<!-- welcome modal start -->

<!--
<script>
	function printRow(el, img1Src, img2Src, dogumYeri, dogumTarihi, anneAdi, babaAdi, uyruk, kimlikBelgesiTuru, kimlikBelgesiNumarasi, eposta) {
		const row = el.closest('tr');
		const cells = row.querySelectorAll('td');
		const adSoyad = cells[1].innerText;
		const tc = cells[2].innerText;
		const unvan = cells[3].innerText;
		const telefon = cells[4].innerText;
		const sehir = cells[5].innerText;
		const ilce = cells[6].innerText;
		const not = cells[7].innerText;

		// Küçük yardımcı fonksiyon
		function isValidImage(src) {
			return src && src.trim() && src.trim().toLowerCase() !== 'null' && src.trim().toLowerCase() !== 'undefined';
		}

		// imagesHtml’i oluştur
		let imagesHtml = '';
		if (isValidImage(img1Src) || isValidImage(img2Src)) {
			imagesHtml = '<div class="images" style="display:flex;justify-content:space-between;margin-bottom:20px;">';
			if (isValidImage(img1Src)) {
				imagesHtml += `<img src="${img1Src}" style="width:45%;" onerror="this.style.display='none'">`;				
			}
			if (isValidImage(img2Src)) {
				imagesHtml += `<img src="${img2Src}" style="width:45%;" onerror="this.style.display='none'">`;
			}
			imagesHtml += '</div>';			
		}

		const printWindow = window.open('', '', 'width=800,height=600');
		printWindow.document.write(`
        <html>
        <head>
          <title>Yazdır</title>
          <style>
            body {font-family:Arial,sans-serif;padding:20px;}
            table {border-collapse:collapse;width:100%;margin-top:20px;}
            td,th {border:1px solid #000;padding:8px;}
            .signature-box {
              width:250px;height:50px;border:1px solid #000;
              margin-top:40px;float:right;text-align:center;
              padding-top:70px;font-weight:bold;
            }
          </style>
        </head>
        <body>
          <h2 style="text-align:center;">GERÇEK KİŞİ TANI FORMU</h2>
          ${imagesHtml}
         <table>
                <tr><th>Ad Soyad</th><td>${adSoyad}</td></tr>
                <tr><th>T.C. Kimlik</th><td>${tc}</td></tr>
                <tr><th>Doğum Yeri</th><td>${dogumYeri}</td></tr>
                <tr><th>Doğum Tarihi</th><td>${dogumTarihi}</td></tr>
                <tr><th>Anne Baba Adı</th><td>${anneAdi} / ${babaAdi}</td></tr>
                <tr><th>Uyruk</th><td>${uyruk}</td></tr>
                <tr><th>Kimlik Belgesinin Türü ve Numarası</th><td>${kimlikBelgesiTuru} / ${kimlikBelgesiNumarasi}</td></tr>
                <tr><th>Adres</th><td>${sehir} / ${ilce}</td></tr>
                <tr><th>İş Ünvanı</th><td>${unvan}</td></tr>
                <tr><th>Cep Telefonu</th><td>${telefon}</td></tr>
                <tr><th>E-posta</th><td>${eposta}</td></tr>
            </table>
          <div class="signature-box"></div>
          <script>
            window.onload = function() {
              window.print();
              window.onafterprint = function() { window.close(); };
            }
          <\/script>
        </body>
        </html>
    `);
		printWindow.document.close();
	}
</script>
 -->
<script>
	function printRow(el, img1Src, img2Src, dogumYeri, dogumTarihi, anneAdi, babaAdi, uyruk, kimlikBelgesiTuru, kimlikBelgesiNumarasi, eposta) {
		const row = el.closest('tr');
		const cells = row.querySelectorAll('td');
		const adSoyad = cells[1].innerText;
		const tc = cells[2].innerText;
		const unvan = cells[3].innerText;
		const telefon = cells[4].innerText;
		const sehir = cells[5].innerText;
		const ilce = cells[6].innerText;
		const not = cells[7].innerText;

		// Küçük yardımcı fonksiyon
		function isValidImage(src) {
			return src && src.trim() && src.trim().toLowerCase() !== 'null' && src.trim().toLowerCase() !== 'undefined';
		}

		// imagesHtml’i oluştur
		let imagesHtml = '';
		if (isValidImage(img1Src) || isValidImage(img2Src)) {
			imagesHtml = '<div class="images" style="display:flex;justify-content:space-between;margin-bottom:20px;">';
			if (isValidImage(img1Src)) {
				imagesHtml += `
					<div style="position:relative;width:45%;">
						<img src="${img1Src}" style="width:100%;" onerror="this.style.display='none'">
						<div style="position:absolute;top:50%;left:50%;transform:translate(-50%, -50%) rotate(-15deg);color:#808080;font-size:24px;font-weight:bold;opacity:0.8;pointer-events:none;white-space:nowrap;">
							YALNIZCA ALTIN SATIŞI İÇİNDİR
						</div>
					</div>
				`;
			}
			if (isValidImage(img2Src)) {
				imagesHtml += `
					<div style="position:relative;width:45%;">
						<img src="${img2Src}" style="width:100%;" onerror="this.style.display='none'">
					<div style="position:absolute;top:50%;left:50%;transform:translate(-50%, -50%) rotate(-15deg);color:#808080;font-size:24px;font-weight:bold;opacity:0.8;pointer-events:none;white-space:nowrap;">
							YALNIZCA ALTIN SATIŞI İÇİNDİR
						</div>
					</div>
				`;
			}
			imagesHtml += '</div>';
		}

		const printWindow = window.open('', '', 'width=800,height=600');
		printWindow.document.write(`
        <html>
        <head>
          <title>Yazdır</title>
          <style>
            body {font-family:Arial,sans-serif;padding:20px;}
            table {border-collapse:collapse;width:100%;margin-top:20px;}
            td,th {border:1px solid #000;padding:8px;}
            .signature-box {
              width:250px;height:50px;border:1px solid #000;
              margin-top:40px;float:right;text-align:center;
              padding-top:70px;font-weight:bold;
            }
          </style>
        </head>
        <body>
          <h2 style="text-align:center;">GERÇEK KİŞİ TANI FORMU</h2>
          ${imagesHtml}
         <table>
                <tr><th>Ad Soyad</th><td>${adSoyad}</td></tr>
                <tr><th>T.C. Kimlik</th><td>${tc}</td></tr>
                <tr><th>Doğum Yeri</th><td>${dogumYeri}</td></tr>
                <tr><th>Doğum Tarihi</th><td>${dogumTarihi}</td></tr>
                <tr><th>Anne Baba Adı</th><td>${anneAdi} / ${babaAdi}</td></tr>
                <tr><th>Uyruk</th><td>${uyruk}</td></tr>
                <tr><th>Kimlik Belgesinin Türü ve Numarası</th><td>${kimlikBelgesiTuru} / ${kimlikBelgesiNumarasi}</td></tr>
                <tr><th>Adres</th><td>${sehir} / ${ilce}</td></tr>
                <tr><th>Mesleği</th><td>${unvan}</td></tr>
                <tr><th>Cep Telefonu</th><td>${telefon}</td></tr>
                <tr><th>E-posta</th><td>${eposta}</td></tr>
            </table>
          <div class="signature-box"></div>
          <script>
            window.onload = function() {
              window.print();
              window.onafterprint = function() { window.close(); };
            }
          <\/script>
        </body>
        </html>
    `);
		printWindow.document.close();
	}
</script>







<script>
	function deleteCustomer(id, adSoyad) {
		Swal.fire({
			title: 'Emin misin?',
			text: adSoyad + ' isimli kişiyi silmek istediğine emin misin?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Evet, sil!',
			cancelButtonText: 'Vazgeç'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = '<?= base_url('customerdelete/'); ?>' + id;
			}
		});
	}
</script>


<script>
	function redirectToEditPage(id) {
		// Kayıt etme ekranına yönlendiriyoruz ve ID parametresini URL'ye ekliyoruz
		window.location.href = '<?= base_url("customereditview/"); ?>' + id;
	}
</script>
<script>
	function redirectToViewPage(id) {
		// Kayıt etme ekranına yönlendiriyoruz ve ID parametresini URL'ye ekliyoruz
		window.location.href = '<?= base_url("customerview/"); ?>' + id;
	}
</script>


<?= view('include/footer') ?>