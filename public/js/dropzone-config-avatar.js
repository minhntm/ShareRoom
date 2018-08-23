Dropzone.options.myDropzone = {
    uploadMultiple: true,
    parallelUploads: 2,
    maxFiles:1,
    maxFilesize: 16,
    previewTemplate: document.querySelector('#preview').innerHTML,
    addRemoveLinks: true,
    dictRemoveFile: 'Remove file',
    dictFileTooBig: 'Image is larger than 16MB',
    timeout: 10000,
 
    init: function () {
        $('#notice').hide();

        this.on("maxfilesexceeded", function(file) {
            this.removeAllFiles();
            this.addFile(file);
        });

        this.on('removedfile', function (file) {
            $.post({
                url: '/avatar/delete',
                data: {id: file.name, _token: $('[name="_token"]').val()},
                dataType: 'json',
                success: function (data) {
                    $('#notice').hide()
                }
            });
        });
        
        this.on('success', function (file, res, e) {
            $('#notice').show();
        });
    },
    success: function (file, done) {

    }
};
