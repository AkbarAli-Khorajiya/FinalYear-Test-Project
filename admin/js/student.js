$(document).ready(function () {
    $('.modal-container').hide()

    $('#add-student').on('click',()=>{
        $('.modal-container').show()
    })
    $('.close').on('click',()=>{
        $('.modal-container').hide()
    })

    $('.std-form').submit(()=>{
        $('.msg').html('<p class="error">*name is required</p>')
    })

})