<style>
    .alert {
            padding: 20px;
            
            color: white; /* White text */
            margin-bottom: 15px; /* Space below the alert */
            border-radius: 5px; /* Rounded corners */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Slight shadow */
        }

        .alert ul {
            list-style-type: none; /* Remove bullets */
            padding: 0; /* Remove padding */
            margin: 0; /* Remove margin */
        }

        .alert li {
            margin-bottom: 10px; /* Space between list items */
        }

        .alert:empty {
            display: none; /* Hide alert box if empty */
        }

        @media (max-width: 600px) {
            .alert {
                padding: 15px; /* Adjust padding for smaller screens */
                font-size: 14px; /* Smaller font size */
            }

            .alert li {
                margin-bottom: 8px; /* Adjust margin for smaller screens */
            }
        }

        .alert--danger{
            background-color: #f44336; /* Red background */
        }

        .alert--success{
            background-color: #44CC5D;
        }        
        
</style>

<x-header />
    
    <div class="main-container">
        @if ($errors->any())
            <div class="alert alert--danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="main-container">
        @if (session('success'))
            <div class="alert alert--success">
                <ul>
                    
                        <li>{{ session('success') }}</li>
                    
                </ul>
            </div>
        @endif
    </div>
            

    {{ $slot }}
    
<x-footer />
