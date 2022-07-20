$(document).ready(function(){

  $(function(){
    var content = 'pinjam';
    var urlOri = 'http://localhost/ujian/public/'+content;
    function check_action_modal(action, data){
      if(action == 'edit'){
        let result = Object.keys(data).map(function(key){
          return [data[key]];
        });
        $('.input_class').each(function(e){
          $(this).val(result[e]);
        });
      }
      else if(action == 'create'){
        $('.input_class').each(function(e){
          $(this).val('');
        });
      }
      else{
        return false;
      }
    }

    function refreshData(data){
      $('tbody').html('');
      let fieldData = '';
      if (data) {
        data = JSON.parse(data);
        for (var i = 0; i < data.length; i++){
          fieldData = fieldData + `
           <tr id="${content+data[i]['id']}">
           <td class='text-center'> ${eval(i+1)}</td>
             <td>${data[i]['id_member']}</td>
             <td>${data[i]['id_buku']}</td>
             <td>${data[i]['tgl_pinjam']}</td>
             <td>${data[i]['tgl_kembali']}</td>
             <td>
              <button data-id=${data[i]['id']} class="btn btn-success showModalEdit" data-toggle="modal" data-target="#formModal"><li class="fa fa-pencil"></li> Edit</button>
              <button data-id=${data[i]['id']} data-table="${content}" class="btn btn-danger delete_data"><li class="fa fa-fw fa-trash"></li> Delete </button>
             </td>
           </tr>
           `;
        }
      }
      
      $('tbody').html(fieldData);
    }

    $(document).on('click','.delete_data',function(){
      let id_data = $(this).attr('data-id'),
          table = $(this).attr('data-table');
      $.ajax({
        url: urlOri+'/delete',
        data:{
        id_ajax : id_data,
        table : table},
        method:'post',
        success:function(data){
          swal ( "Success" ,  "" ,  "success" );
          refreshData(data);
        },
        error:function(){
          swal ( "Fail" ,  "Something is wrong, please refresh and try again" ,  "error" );
        }
      });
    });

    $(document).on('click','.showModalInsert', function(e){
      e.preventDefault();
      $('#formModalLable , .modal-footer a').html('Insert Data');
      $('.modal-footer a').attr('class','btn btn-primary insertButton'); // replace modalButton to insertButton

      $(`[name="id_buku"]`).attr('readonly', false);
      $(`[name="id_member"]`).attr('readonly', false);

      check_action_modal('create');
    });
    $(document).on('click','.insertButton',function(e){
      e.preventDefault();
      $.ajax({
        url: urlOri+'/add',
        data: $('#modal_form').serialize(),
        method:'post',
        success:function(data){
          if (data) {
            console.log(data);
            swal ( "Success" ,  "" ,  "success" );
            refreshData(data);
          }
          else{
            swal ( "Fail" ,  "Something is wrong" ,  "error" );
          }
        },
        error:function(){
          swal ( "Fail" ,  "Something is wrong, please refresh and try again" ,  "error" );
        }
      });
    });

    $(document).on('click','.showModalEdit',function(e){
      e.preventDefault();
      $('#formModalLable , .modal-footer a').html('Edit Data');
      $('.modal-footer a').attr('class','btn btn-primary editButton'); // replace modalButton to editButton
      let idKu = $(this).attr('data-id'); // ambil data-id
      $.ajax({
        url: urlOri+'/getdata',
        data:{idAjax : idKu},
        method:'post',
        dataType:'json',
        success:function(data){
          $(`[name="id_buku"]`).attr('readonly', true);
          $(`[name="id_member"]`).attr('readonly', true);
          check_action_modal('edit', data);
        }
      });
    });

    $(document).on('click','.editButton',function(e){
      e.preventDefault();
      $.ajax({
        url: urlOri+'/edit',
        data: $('#modal_form').serialize(),
        method:'post',
        success:function(data){
          if (data) {
            console.log(data);
            swal ( "Success" ,  "" ,  "success" );
            refreshData(data);
          }
          else{
            swal ( "Fail" ,  "Something is wrong, please refresh and try again" ,  "error" );
          }
        },
        error:function(){
          swal ( "Fail" ,  "Something is wrong, please refresh and try again" ,  "error" );
        }
      });
    });

  });

});
