                    <?= view('include/header') ?>

                    <?= view('include/leftmenu') ?>

                    <div class="main-container">
                        <div class="pd-ltr-20 xs-pd-20-10">

                            <!-- Form grid Start -->
                            <div class="pd-20 card-box mb-30">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h4 class="text-blue h4">Gerçek Kişi Ekle</h4>

                                    </div>

                                </div>

                                <form method="post" action="<?= base_url('savecustomer') ?>" enctype="multipart/form-data">


                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <div class="position-relative text-center">
                                                <a class="d-block">
                                                    <!-- Varsayılan Resim ve Resim Önizleme -->
                                                    <img src="products/default-bilezik.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-md" id="bilezikResimPreview">
                                                </a>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="bilezikResim">Kimlik kartı Ön Yüz Resmi Yükle</label>
                                                <input type="file" class="form-control" id="onyuz_resim" name="onyuz_resim" accept="image/*" onchange="previewImage(event)">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative text-center">
                                                <a class="d-block">
                                                    <!-- Varsayılan Resim ve Resim Önizleme -->
                                                    <img src="products/default-bilezik.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-md" id="bilezikResimPreview2">
                                                </a>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="bilezikResim">Kimlik kartı Arka Yüz Resmi Yükle</label>
                                                <input type="file" class="form-control" id="arkayuz_resim" name="arkayuz_resim" accept="image/*" onchange="previewImage2(event)">
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Ad</label>
                                                <input type="text" name="ad" class="form-control"  oninput="this.value = this.value.toUpperCase();" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Soyad</label>
                                                <input type="text" name="soyad" class="form-control"  oninput="this.value = this.value.toUpperCase();" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>T.C Kimlik Numarası</label>
                                                <input type="text" name="tc" class="form-control" maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Doğum Tarihi</label>
                                                <input type="date" name="dogum_tarihi" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Doğum Yeri</label>
                                                <input type="text" name="dogum_yeri" class="form-control"  oninput="this.value = this.value.toUpperCase();" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Anne Adı</label>
                                                <input type="text" name="anne_adi" class="form-control"  oninput="this.value = this.value.toUpperCase();" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Baba Adı</label>
                                                <input type="text" name="baba_adi" class="form-control"  oninput="this.value = this.value.toUpperCase();" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Uyruğu</label>
                                                <input type="text" name="uyruk" class="form-control" value="T.C"  oninput="this.value = this.value.toUpperCase();" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Kimlik Belgesinin Türü</label>
                                                <input type="text" name="belge_turu" class="form-control" value="T.C"  oninput="this.value = this.value.toUpperCase();" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Kimlik Belgesinin Numarası</label>
                                                <input type="text" name="belge_numarası" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>E-Posta</label>
                                                <input type="text" name="eposta" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Telefon Numarası</label>
                                                <input type="text" name="tel" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Meslek Bilgisi</label>
                                                <input type="text" name="meslek" class="form-control"  oninput="this.value = this.value.toUpperCase();" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Şehir</label>
                                                <input type="text" name="sehir" class="form-control"  oninput="this.value = this.value.toUpperCase();" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Adres</label>
                                                <input type="text" name="adres" class="form-control"   oninput="this.value = this.value.toUpperCase();"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Not</label>
                                                <textarea name="not" class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="btn-list">
                                        <button type="submit" class="btn btn-success btn-lg btn-block">
                                            Kaydet
                                        </button>



                                </form>

                            </div>
                        </div>
                        <!-- Form grid End -->
                        <div class="footer-wrap pd-20 mb-20 card-box">
                            Created by
                            <a href="https://github.com/dropways" target="_blank">ubeydullah doğan</a>
                        </div>
                    </div>

                    </div>
                    <!-- welcome modal start -->

                    <?= view('include/footer') ?>


                    <script>
                        // Resim Yükleme Önizleme Fonksiyonu
                        function previewImage(event) {
                            var output = document.getElementById('bilezikResimPreview');
                            output.src = URL.createObjectURL(event.target.files[0]);
                        }

                        function previewImage2(event) {
                            var output = document.getElementById('bilezikResimPreview2');
                            output.src = URL.createObjectURL(event.target.files[0]);
                        }
                    </script>