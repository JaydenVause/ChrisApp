<x-header />
    
@if ($errors->any())
    <div class="main-container">
        <div class="alert alert--danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if (session('success'))
    <div class="main-container">
        <div class="alert alert--success">
            <ul>
                <li>{{ session('success') }}</li>
            </ul>
        </div>
    </div>
@endif

            

    {{ $slot }}
    
<x-footer />
