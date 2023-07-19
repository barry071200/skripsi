var printPreview = document.createElement('div');
printPreview.innerHTML = '<style>
    body {
        font-size: 12px;
    }
</style>' +
'<div class="d-flex justify-content-between">' +
    '<h1>PT Bumi Barito Minieral</h1>' +
    '<h1 class="text-right">Daftar Unit</h1>' +
    '</div>' +
'<table>' + tableData + '</table>';
document.body.innerHTML = printPreview.innerHTML;
window.print();
location.reload();
}
</script>