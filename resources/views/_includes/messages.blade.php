@if (Session::has('success'))
  {{-- <div class="container"> --}}
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{ Session::get('success') }}
    </div>
  {{-- </div> --}}

@endif
@if ($errors->any())
  {{-- <div class="container"> --}}
    <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div>
  {{-- </div> --}}
@endif
