@if($errors->any())
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div role="alert" class="alert alert-danger">
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" class=""></span>
                </button>
                <ul>
                    @foreach($errors->all() as $errorTxt)
                        <li>{{ $errorTxt }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

@if(session('success'))
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div role="alert" class="alert alert-success">
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" class=""></span>
                </button>
                {{ session()->get('success') }}
            </div>
        </div>
    </div>
@endif

