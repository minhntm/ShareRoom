var imagesId = [];
Dropzone.options.myDropzone = {
    uploadMultiple: true,
    parallelUploads: 2,
    maxFilesize: 16,
    previewTemplate: document.querySelector('#preview').innerHTML,
    addRemoveLinks: true,
    dictRemoveFile: 'Remove file',
    dictFileTooBig: 'Image is larger than 16MB',
    timeout: 10000,
 
    init: function () {
        $('#notice').hide();
        $('#next').click(function(event) {
            if (imagesId.length === 0) {
                event.preventDefault();
                $('#notice').show();
            } else {
                $('#notice').hide();
            }
        });

        this.on('removedfile', function (file) {
            $.post({
                url: '/rooms/delete',
                data: {id: file.name, _token: $('[name="_token"]').val()},
                dataType: 'json',
                success: function (data) {
                    var deletedId = data['image_id'];
                    console.log(deletedId)
                    var index = imagesId.indexOf(deletedId);
                    imagesId.splice(index, 1);
                    $('#images_id').val(JSON.stringify(imagesId));
                }
            });
        });
        
        this.on('success', function (file, res, e) {
            // var res = JSON.parse(res);
            var savedImageId = res.images_id;
            for (let i = 0; i < savedImageId.length; i++){
                if (!imagesId.includes(savedImageId[i])) {
                    imagesId.push(savedImageId[i]);
                }
            }
            $('#notice').hide();
            $('#images_id').val(JSON.stringify(imagesId));
        });
    },
    success: function (file, done) {
        $('#images_id').val(JSON.stringify(imagesId));
    }
};
