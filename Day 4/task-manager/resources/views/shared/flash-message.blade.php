@if(session('message'))
    <div class="alert {{ session('alert-class')  }}">{{ session('message') }}</div>
@endif
