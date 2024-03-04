$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Emin misiniz?',
                    text: "Veriyi silinsin mi?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Hayır',
                    confirmButtonText: 'Evet, Sil!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Silindi!',
                        'Veriniz tamamen silindir.',
                        'success'
                      )
                    }
                  })


    });

});
