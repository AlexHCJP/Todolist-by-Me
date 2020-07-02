
$( document ).ready( () => {
    let status = false
    let toggleElements = () => {
        $('#form-create').toggle();
        $('#btn-back').toggle();
        status = !status;
    }

    $('#btn-create').on('click', () => {
        if (status)
        {
            $('#form-create').submit();
        }
        toggleElements();
    });
    $('#btn-back').on('click', toggleElements);


});
