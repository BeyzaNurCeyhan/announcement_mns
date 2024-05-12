
<form method="POST" action="../bkg_process.php" id="create_info_form" enctype="multipart/form-data">
    <div class="row">

        <div class="col-xl-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Yeni Duyuru Ekle</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="info_title" class="form-label">Duruyu Başlığı</label>
                                <input type="text" class="form-control"  id="info_title" name="info_title" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="info_tags" class="form-label">Anahtar Kelimeler</label>
                                <input type="text" value="Turkuaz seramik, Cerastyle" class="form-control" id="info_tags" name="info_tags" required data-role="tagsinput">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="target_choice" class="form-label">Hedef Kitlesi</label>
                                <select class="form-select" id="target_choice" name="target_choice" required>
                                    <option value="all">Herkese</option>
                                    <option value="departs">Özel Departmanlar</option>
                                </select>
                            </div>
                        </div>

                        
                        

                        <div class="col-md-12 " id="departs_div" style = "display:none;">
                            <?php $departs = getBolumler()?>
                            <div class="mb-3">
                                <label class="form-label">Bölümler Seç</label>
                                <select class="select2 form-control select2-multiple" multiple="multiple" 
                                        id="target_departs" name="target_departs[]" >
                                    <option  disabled value="">Bölüm Seç</option>
                                    <?php foreach($departs as $dept): ?>
                                    <option value="<?php echo $dept['KOD'] ?>"><?php echo $dept['AD'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                       
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Duruyu Resmi</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="info_image" class="form-label">Duruyu Resmi</label>
                            <input type="file" class="form-control" name="info_image" id="info_image" onchange = "mainThamUrl(this)">
                            
                        </div>
                        <div class="col-md-12 mt-5">
                            <img src="" id="mainThmb" alt="" style="width:100%;">
                        </div>
                    </div>                    
                </div>
            </div>
            <!-- end card -->
        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Duyuru İçeriği</h4>
                                    <textarea id="elm1" class="form-control" name="info_content" ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
        <div class="col-xl-12">
            <div class="text-center mb-10">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" name="publish_status" id="invalidCheck" >
                    <label class="form-check-label" for="invalidCheck"><b>Onay gerekmeden automatik yayınlansın</b></label>
                </div>
                <button type="submit" class="btn btn-lg btn-success"><i class="ri-save-2-line"></i> Kaydet</button>
            </div>
        </div>
    </div>
</form>