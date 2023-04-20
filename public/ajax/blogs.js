const _token = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function () {
     $('.status-checkbox').on('change', function () {
          console.log('deyisdi');
         let status = $(this).is(':checked');
         let id = $(this).data('id');

         $.ajax({
             method: 'POST',
          //    url : "{{ route('blogs.updateStatus', ':id') }}".replace(':id',id),
             url : `blogs/updateStatus/${id}`.replace(':id',id),
             data: {
               _token,
               status,
               '_method': 'PUT'
          },
             success: function (data) {
                 console.log(data);
             },
             error : function(err) {
               console.log(err);
             }
         });
     });
 });

 const blog_delete = (id) => {
console.log('salam');
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
        success: function (data,e) {
          e.preventDefault();
          console.log(data);
          window.location='/blogs'
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