

@if (session('MensajeStatus'))

 <div class="alert alert-primary alert-dismissible fade show" role="alert">
     {{session('MensajeStatus')}}
<button type="button"
        class="close"
        data-dismiss="alert"
        aria-label="close">
        <span aria-hidden="true">&times;</span>
        </button>

 </div>




@endif
