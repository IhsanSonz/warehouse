jQuery(function() {
    console.log('Testing');
    // Format mata uang.
    $('.money').mask('000.000.000.000', { reverse: true });

    var CSRF_TOKEN = $('input[name="_token"]').attr('value');
    $( "#nama_barang" ).autocomplete({
        source: function( request, response ) {
            console.log(CSRF_TOKEN);
            // Fetch data
            $.ajax({
                url: "barang",
                type: 'post',
                dataType: "json",
                _token: CSRF_TOKEN,
                data: {
                    s: request.term
                },
                success: function( { data } ) {
                    // let nama = data.map((barang) => barang.nama);
                    console.log(data);
                    response( data );
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            console.log(ui.item);
            $('#nama_barang').val(ui.item.label); // display the selected text
            $('#barang_id').val(ui.item.value); // save selected id to input
            $('#harga_modal').val(ui.item.harga_modal); // save selected id to input
            $('#harga_jual').val(ui.item.harga_jual); // save selected id to input
            $('#deskripsi').val(ui.item.deskripsi); // save selected id to input
            return false;
        },
    });
});

function testkuy() {
    console.log("TESTING");
}
