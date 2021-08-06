<script>
    $('.tblscroll').nicescroll({
        cursorcolor: "#515365",
        cursorwidth: "30px",
        background: "rgba(20,20,20,0.3)",
        cursorborder: "0px",
        cursorborderradius: 3
    })

    function Confirm(id, eventName, text)
    {
        swal({
            title: 'CONFIRMAR',
            text: text,
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#3B3F5C'
        }).then(function (result) {
            if (result.value){
                window.livewire.emit(eventName, id)
                swal.close()
            }
        });
    }
</script>
