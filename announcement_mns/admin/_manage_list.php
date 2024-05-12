<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tüm Duyurular</h5>
          
          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th></th>
                <th>Görüntüsü</th>
                <th>Başlık</th>
                <th data-type="date" data-format="DD/MM/YYYY">Düzenleme Tar.</th>
                <th>İslem</th>
              </tr>
            </thead>
            <tbody>
              <?php $infos = pdoGetAllDataRow('SELECT * from announcement_mns order by created_at') ;
                foreach($infos as $key => $info):
              ?>
              <tr>
                <td><?php echo ($key+1) ?></td>
                <td><img src="<?php echo '../'.$info['info_image'] ?? BASE_URL.'backend/assets/images/trkz_imgs/no_image.png' ?>" alt="" width="50" height="50"> </td>

                <!-- <td><img src="//192.168.1.228/Departman/Havuz/Grafik/LOGOLAR/Cerastyle22.PNG" alt="" width="50" height="50"> </td> -->
                
                
                <td><?php echo substr($info['title'], 0, 100) ?></td>
                <td><?php echo date('d-m-Y H:i', strtotime($info['created_at'])) ?></td>
                
                <td>
                  <?php if($info['publish_status'] == 1): ?>
                    <button id="unpublishInfo<?php echo $info['id'] ?>" data-id="<?php echo $info['id'] ?>" 
                      class="btn btn-warning btn-md unpublishInfo" target="_blanc" title="Duselt"><i class="ri-eye-off-fill"></i> Yayından kaldır</button>
                  <?php else : ?>
                  <button id="publishInfo<?php echo $info['id'] ?>" data-id="<?php echo $info['id'] ?>" 
                    class="btn btn-success btn-md publishInfo" target="_blanc" title="Duselt"><i class="ri-eye-fill"></i> Yayınla </button>
                  <?php endif; ?>
                  <a href="index.php?page=edit&id=<?php echo $info['id'] ?>" class="btn btn-info btn-md" 
                    target="_blanc" title="Duselt"><i class="ri-edit-2-fill "></i></a>

                  <button id="delInfo<?php echo $info['id'] ?>" data-id="<?php echo $info['id'] ?>" class="btn btn-danger btn-md delInfo" 
                  target="_blanc" title="Duselt"><i class="ri-delete-bin-2-fill "></i></button>
                </td>
              </tr>
            <?php endforeach; ?>

            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>