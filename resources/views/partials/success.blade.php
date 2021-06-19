<!--Mostramos los mensajes de confirmacion producidos-->
@if (Session::has('success'))
      <div class="alert alert-success">         
        <p><strong>{{Session::get('success')}}</strong></p>
      </div>
@endif