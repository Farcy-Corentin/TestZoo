<div class="container">
    @if( Session::has('success') )
        <div class="alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if( Session::has('error'))
        <div class="alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
</div>
