<section class="content-header">
  <h1>
    <?=$data['title'] ?>
    <small><?= $data['model']->prosedur_function()?></small>
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box">
        <div class="box-header with-border">
          <div class="col-lg-7">
            <button class="btn btn-primary showModalInsert" data-toggle="modal" data-target="#formModal">
              Tambah Data
            </button>
          </div>
          <!-- search -->
          <div class="col-lg-5">
            <div class="input-group input-group-sm">
              <input type="text" value="" placeholder="Search Data" class="form-control" id="input_search">
              <span class="input-group-btn">
                <button type="button" class="btn btn-info btn-flat" id="button_search"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-bordered" id="table_buku">
            <thead class="thead-light">
              <tr>
                <!-- <th scope="col">#</th> -->
                <th class="text-center">#</th>
                <th class="text-center">Judul</th>
                <th class="text-center">Stok</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
              <tbody>
            <?php if ($data['data']): ?>
              <?php foreach($data['data'] as $number => $ori): ?>
                <tr id="buku<?=$ori['id']?>">
                  <td class="text-center"><?=$number+1?></td>
                  <td><?=$ori['judul']?></td>
                  <td><?=$ori['jumlah']?></td>
                  <td>
                    <button data-id="<?= $ori['id']?>" class="btn btn-success showModalEdit" data-toggle="modal" data-target="#formModal">
                      <li class="fa fa-pencil"></li> Edit
                    </button>
                    <button data-id="<?= $ori['id']?>" data-table="buku" class="btn btn-danger delete_data">
                      <li class="fa fa-fw fa-trash"></li>Delete
                    </button>
                  </td>
                </tr>
              <?php endforeach;?>
            <?php else: ?>
            <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- Small boxes (Stat box) -->
</section>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="formModalLable">HEADER TITLE</h4>
      </div>

      <form class="modalForm" id="modal_form">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="id" value="" class="input_class">
          </div>
          <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" class="form-control input_class">
          </div>
          <div class="form-group">
            <label for="">Jumlah</label>
            <input type="number" name="jumlah" class="form-control input_class">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="#" class="btn btn-primary modalButton" data-dismiss="modal">Save</a>
        </div>
      </form>
    </div>
  </div>
<!-- /.content -->
</div>
<!-- END MODAL -->
