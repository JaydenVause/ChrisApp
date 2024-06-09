<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .admin-dashboard {
            margin: 0 auto;
            background-color: #fff;
            max-width: 900px;
            
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        td p {
            margin: 5px 0;
        }

        td address {
            margin: 0;
        }

        td span {
            display: flex;
            gap: 10px;
        }

        button {
            padding: 8px 12px;
            border: none;
            background-color: #59C033;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a026;
        }

        @media (max-width: 600px) {
            th, td {
                display: block;
                width: 100%;
            }

            td p {
                font-size: 14px;
            }

            button {
                width: 100%;
                margin-top: 5px;
            }

            td span {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>

<x-layout>
    <div class="admin-dashboard">
        <x-dashboard-nav />
        <div class="table-container">
            <table class="table">
                
                @foreach($invoices as $invoice)
                <tr>
                    <td>
                        <p><strong>ID:</strong></p>
                        <p>{{$invoice->id}}</p>
                    </td>
                    <td>
                        <p><strong>Name:</strong></p>
                        <p>{{$invoice->customer_name}}</p>
                    </td>
                    <td>
                        <p><strong>Email:</strong></p>
                        <p>{{$invoice->customer_email_address}}</p>
                    </td>
                    <td>
                        <p><strong>Date:</strong></p>
                        <p class="date-object">{{$invoice->invoice_date}}</p>
                    </td>
                    <td>
                        <p><strong>Due Date:</strong></p>
                        <p class="date-object">{{$invoice->due_date}}</p>
                    </td>
                    <td>
                        <p><strong>Address:</strong></p>
                        <p><address>{{$invoice->customer_address}}</address></p>
                    </td>
                    <td>
                        <p><strong>Contact Number:</strong></p>
                        <p>{{$invoice->customer_contact_number}}</p>
                    </td>
                    <td>
                        <p><strong>Actions:</strong></p>
                        <span>
                            
                        <a href="{{ url('/admin_panel/edit_invoice/' . $invoice->id) }}">
                            <button>Edit</button>
                        </a>

                        <form action="{{ url('/admin_panel/delete_invoice/' . $invoice->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>

                        <a href="{{ url('/admin_panel/download_invoice/' . $invoice->id) }}">
                            <button>Download</button>
                        </a>

                        </span>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</x-layout>
<script>

    function print_out_date_australia(string){
        let new_string = string.split("-");
        console.log(new_string);
        new_string = new_string[2] + "/" + new_string[1] + "/" + new_string[0];
        return new_string;
    }

    // date-object

    document.addEventListener("DOMContentLoaded", ()=>{
        let date_objects = document.querySelectorAll(".date-object");
        // console.log(date_objects);
        date_objects.forEach((date_object) => {
            // console.log(date_object);
            date_object.innerHTML = print_out_date_australia(date_object.innerHTML);
        });
    })

</script>