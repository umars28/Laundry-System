$('.btn-delete').click(function() {
    let that = $(this);
    Swal.fire({
        title: 'Konfirmasi Cancel',
        text: "Apakah anda yakin ingin cancel pesanan?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok'
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Dibatalkan!',
                'Berhasil Cancel.',
                'success'
            );
            that.parent('form').submit();
        }
    })
})
