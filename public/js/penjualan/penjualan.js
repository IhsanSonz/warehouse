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
                url: "/barang/get-barang",
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

    $('#qty').on("change", () => {
        let harga_modal = decode_money($('#harga_modal').val());
        let harga_jual = decode_money($('#harga_jual').val());
        console.log(harga_modal + " " + harga_jual);
        console.log($('#qty').val());

        let total_modal = encode_money(harga_modal * Number($('#qty').val()));
        let total_jual = encode_money(harga_jual * Number($('#qty').val()));
        console.log(total_modal);
        console.log(total_jual);

        $('#total_modal').val(total_modal);
        $('#total_harga').val(total_jual);
    });
});

function encode_money(money) {
    return Intl.NumberFormat('id-ID').format(money);
}

function decode_money(money) {
    return Number(money.toString().split('.').join(''));
}

function testkuy() {
    console.log("TESTING");
}
