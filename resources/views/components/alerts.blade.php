@if(Session::get('success'))
    <div class="alert-success">{{ Session::get('success') }}</div>
@endif

@if(Session::get('info'))
    <div class="alert-info">{{ Session::get('info') }}</div>
@endif

@if(Session::get('warning'))
    <div class="alert-warning">{{ Session::get('warning') }}</div>
@endif

@if(Session::get('danger'))
    <div class="alert-danger">{{ Session::get('danger') }}</div>
@endif