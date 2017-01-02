// Demo datatables
// -----------------------------------


(function(window, document, $, undefined){

  $(function(){

    //
    // Zero configuration
    //

    $('#datatable1').dataTable({
        'paging':   true,  // Table pagination
        'ordering': true,  // Column ordering
        'info':     true,  // Bottom left status text
        'responsive': true, // https://datatables.net/extensions/responsive/examples/
        // Text translation options
        // Note the required keywords between underscores (e.g _MENU_)
        oLanguage: {
            sSearch:      'Search all columns:',
            sLengthMenu:  '_MENU_ records per page',
            info:         'Showing page _PAGE_ of _PAGES_',
            zeroRecords:  'Nothing found - sorry',
            infoEmpty:    'No records available',
            infoFiltered: '(filtered from _MAX_ total records)'
        },
        // Datatable Buttons setup
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            {extend: 'copy',  className: 'btn-sm' },
            {extend: 'csv',   className: 'btn-sm' },
            {extend: 'excel', className: 'btn-sm', title: 'XLS-File'},
            {extend: 'pdf',   className: 'btn-sm', title: $('title').text() },
            {extend: 'print', className: 'btn-sm' }
        ]
    });


  });

})(window, document, window.jQuery);
