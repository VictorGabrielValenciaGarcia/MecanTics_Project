@if (isset($errors) && count($errors) > 0)
    
    <div class="alert alert-danger alert-bonito">


        <ul class="list-unstyled mb-0">

            @foreach ($errors->all() as $errors)
                <li class="mt-1 text-center border-2">{{ $errors }}</li>
            @endforeach

        </ul>

    </div>
    
@endif

@if (Session::get('success',false))

    <?php $data = Session::get('success'); ?>

    @if (is_array($data))

        @foreach ($data as $message)
            <div class="alert alert-success text-center alert-bonito">
                <i class="fa fa-check"></i>
                {{ $message }}
            </div>
        @endforeach

    @else
            <div class="alert alert-success text-center alert-bonito">
                <i class="fa fa-check"></i>
                {{ $data }}
            </div>
    @endif
    
@endif