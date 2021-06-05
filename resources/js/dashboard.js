function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader()
        reader.onload = function(e) {
            $('#imagem').attr('src', e.target.result)
        }
        reader.readAsDataURL(input.files[0])
    }
}
$('#input-image').change(function() {
    readURL(this)
})

window.onload = function() {
    CKEDITOR.replace('content');
};