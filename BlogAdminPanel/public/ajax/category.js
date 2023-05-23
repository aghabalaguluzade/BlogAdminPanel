const _token = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function () {
     $('.status-checkbox').on('change', function () {
          console.log('deyisdi');
         let status = $(this).is(':checked');
         let id = $(this).data('id');

         $.ajax({
             method: 'POST',
             url : `categories-status/updateStatus/${id}`.replace(':id',id),
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