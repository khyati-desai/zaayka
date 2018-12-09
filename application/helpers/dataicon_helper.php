<?php
function get_icons()
{
?>
    {
        extend:    'copyHtml5',
        text:      '<i class="fa fa-files-o"></i>',
        titleAttr: 'Copy'
    },
    {
            extend: 'excelHtml5',
            text: 'Save current page',
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
    },
    {
        extend:    'csvHtml5',
        text:      '<i class="fa fa-file-text-o"></i>',
        titleAttr: 'CSV'
    },
    {
        extend:    'pdfHtml5',
        text:      '<i class="fa fa-file-pdf-o"></i>',
        titleAttr: 'PDF'
    },
    {
        extend: 'print',
        text: '<i class="fa fa-print"></i>',
        autoPrint: true
    },
<?php
}
?>