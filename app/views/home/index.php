    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=count($data['data']['buku'])?></h3>

              <p>Data Buku</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="<?= BASEURL;?>/buku" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=count($data['data']['distributor'])?></h3>

              <p>Data Distributor</p>
            </div>
            <div class="icon">
              <i class="fa fa-table"></i>
            </div>
            <a href="<?= BASEURL;?>/distributor" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=count($data['data']['pasok'])?></h3>

              <p>Data Pasok</p>
            </div>
            <div class="icon">
              <i class="fa fa-dropbox"></i>
            </div>
            <a href="<?= BASEURL;?>/pasok" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=count($data['data']['penjualan'])?></h3>

                <p>Data Penjualan</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="<?= BASEURL;?>/penjualan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <!-- data table -->
      <div class="row">
        <!-- buku -->
        <div class="col-lg-3">
          <div class="box">
            <div class="box-header with-border">
              Tabel Buku
            </div>
            <div class="box-body">
              <table class="table table-bordered" id="table_buku">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Judul</th>
                    <th class="text-center">Stok</th>
                  </tr>
                </thead>
                  <tbody>
                <?php if ($data['data']['buku']): ?>
                  <?php foreach($data['data']['buku'] as $number => $ori): ?>
                    <tr>
                      <td class="text-center"><?=$number+1?></td>
                      <td><?=$ori['judul']?></td>
                      <td><?=$ori['stok']?></td>
                    </tr>
                  <?php endforeach;?>
                <?php else: ?>
                <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- end buku -->

        <!-- distributor -->
        <div class="col-lg-3">
          <div class="box">
            <div class="box-header with-border">
              Tabel Distributor
            </div>
            <div class="box-body">
              <table class="table table-bordered" id="table_distributor">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Telepon</th>
                  </tr>
                </thead>
                  <tbody>
                <?php if ($data['data']['distributor']): ?>
                  <?php foreach($data['data']['distributor'] as $number => $ori): ?>
                    <tr>
                      <td class="text-center"><?=$number+1?></td>
                      <td><?=$ori['nama_distributor']?></td>
                      <td><?=$ori['alamat']?></td>
                    </tr>
                  <?php endforeach;?>
                <?php else: ?>
                <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- end distributor -->

        <!-- pasok -->
        <div class="col-lg-3">
          <div class="box">
            <div class="box-header with-border">
              Tabel Pasok
            </div>
            <div class="box-body">
              <table class="table table-bordered" id="table_pasok">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Buku</th>
                    <th class="text-center">Distributor</th>
                  </tr>
                </thead>
                  <tbody>
                <?php if ($data['data']['pasok']): ?>
                  <?php foreach($data['data']['pasok'] as $number => $ori): ?>
                    <tr>
                      <td class="text-center"><?=$number+1?></td>
                      <td><?=$data['model']->relation_id($ori['id_buku'],'buku','id_buku','judul')?></td>
                      <td><?=$data['model']->relation_id($ori['id_distributor'],'distributor','id_distributor','nama_distributor')?></td>
                    </tr>
                  <?php endforeach;?>
                <?php else: ?>
                <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- end Pasok -->

        <!-- penjualan -->
        <div class="col-lg-3">
          <div class="box">
            <div class="box-header with-border">
              Tabel Penjualan
            </div>
            <div class="box-body">
              <table class="table table-bordered" id="table_penjualan">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Buku</th>
                    <th class="text-center">Jumlah</th>
                  </tr>
                </thead>
                  <tbody>
                <?php if ($data['data']['penjualan']): ?>
                  <?php foreach($data['data']['penjualan'] as $number => $ori): ?>
                    <tr>
                      <td class="text-center"><?=$number+1?></td>
                      <td><?=$data['model']->relation_id($ori['id_buku'],'buku','id_buku','judul')?></td>
                      <td><?=$ori['jumlah']?></td>
                    </tr>
                  <?php endforeach;?>
                <?php else: ?>
                <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- end penjualan -->
      </div>
      <!-- end data table -->

    </section>
