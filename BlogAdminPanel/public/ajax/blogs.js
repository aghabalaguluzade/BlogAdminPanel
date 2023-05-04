const _token = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function () {
     $('.status-checkbox').on('change', function () {
          console.log('deyisdi');
         let status = $(this).is(':checked');
         let id = $(this).data('id');

         $.ajax({
             method: 'POST',
             url : `blogs/updateStatus/${id}`.replace(':id',id),
             data: {
               _token,
               status,
               '_method': 'PUT'
          },
             success: function (data) {
                document.getElementById(`status-${id}`).innerHTML = data.status === true ? "Aktiv" : "Deaktiv";
             },
             error : function(err) {
               console.log(err);
             }
         });
     });
 });

 const blog_delete = (id) => {
  swal({
      title: "Diqqət!",
      text: "Silinən informasiya geri qaytarılmır, yenidən əlavə olunmaldır!",
      icon: "warning",
      buttons: ["İmtina et", "Sil"],
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          type : 'POST',
          data: {
            _token,
            id: id,
            _method: 'DELETE'
        },
        url : `blogs/${id}`,
        success: function (data) {
          document.getElementById('all').innerHTML = '';
        },
        error : function(err) {
          console.log(err);
        }
        })
      } else {
        swal("İmtina Edildi!");
      }
    });
}