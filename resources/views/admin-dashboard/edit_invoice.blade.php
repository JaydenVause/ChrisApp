<style>
        .admin-dashboard {
            margin: 0 auto;
            background-color: #f4f4f4;
            max-width: 900px;
            
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .invoice-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .invoice-form label {
            font-weight: bold;
        }

        .invoice-form input, .invoice-form select, .invoice-form textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        .invoice-form button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .invoice-form button:hover {
            background-color: #0056b3;
        }

        .service-item {
            display: flex;
            gap: 10px;
        }

        .service-item input {
            flex: 1;
        }

        .remove-service-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            padding: 10px;
        }

        .remove-service-btn:hover {
            background-color: #c82333;
        }

        /* Responsive styles */
        @media only screen and (max-width: 600px) {
            

            .service-item {
                flex-direction: column;
            }

            .remove-service-btn {
                width: 100%;
                margin-top: 10px;
            }
        }

        
    </style>
</head>
<body>
<x-layout>
        <div class="admin-dashboard">
            <x-dashboard-nav />
            
            <form action="{{ url('/admin_panel/edit_invoice/' . $invoice->id) }}" method="POST" class="invoice-form" id="invoiceForm">
                @csrf
                @method('PATCH')

                <label for="customer_name">Customer Name:</label>
                <input type="text" name="customer_name" placeholder="Client's Name" value="{{ $invoice->customer_name }}" required />

                <label for="customer_email_address">Customer Email:</label>
                <input type="email" name="customer_email_address" placeholder="Client's Email" value="{{ $invoice->customer_email_address }}" required />

                <label for="customer_contact_number">Customer Contact Number:</label>
                <input type="tel" name="customer_contact_number" placeholder="Client's Contact Number" value="{{ $invoice->customer_contact_number }}" required />

                <label for="customer_address">Address:</label>
                <input type="text" name="customer_address" placeholder="Customer's Address" value="{{ $invoice->customer_address }}" />

                <label for="invoice_date">Date:</label>
                <input type="date" name="invoice_date" value="{{ $invoice->invoice_date }}" />

                <label for="due_date">Due Date:</label>
                <input type="date" name="due_date" value="{{ $invoice->due_date }}" />

                <label for="tax">Tax %:</label>
                <input type="number" placeholder="0%" step="0.1" name="tax" value="{{ $invoice->tax }}" />

                <label for="paid">$ Paid (Already):</label>
                <input type="number" placeholder="0%" step="0.1" name="paid" value="{{ $invoice->paid }}" />

                <div id="services">
                    @foreach($services as $index => $service)
                        <div class="service-item">
                            <input type="text" name="services[{{ $index }}][description]" placeholder="Description of service or product..." value="{{ $service->description }}" required />
                            <input type="number" name="services[{{ $index }}][amount]" placeholder="Amount" step="0.01" value="{{ $service->amount }}" required />
                            <input type="number" name="services[{{ $index }}][rate]" placeholder="Rate" step="0.01" value="{{ $service->rate }}" required />
                            <input type="number" name="services[{{ $index }}][quantity]" placeholder="Quantity" value="{{ $service->quantity }}" required />
                            <label for="services[{{ $index }}][non_taxable]">Non-Taxable Item</label>
                            <input type="checkbox" id="services[{{ $index }}][non_taxable]" name="services[{{ $index }}][non_taxable]" value="1" {{ $service->non_taxable ? 'checked' : '' }}/>
                            <button type="button" class="remove-service-btn" onclick="removeService(this)">Remove</button>
                        </div>
                    @endforeach
                </div>
                <button type="button" onclick="addService()">Add Service</button>

                <button type="submit">Save Invoice</button>
            </form>
        </div>
    </x-layout>

    <script>
        let serviceCount = document.querySelectorAll('.service-item').length + 1;

        function addService() {
            const servicesDiv = document.getElementById('services');
            const serviceItem = document.createElement('div');
            serviceItem.className = 'service-item';
            serviceItem.innerHTML = `
                <input type="text" name="services[${serviceCount}][description]" placeholder="Description of service or product..." required />
                <input type="number" name="services[${serviceCount}][amount]" placeholder="Amount" step="0.01" required />
                <input type="number" name="services[${serviceCount}][rate]" placeholder="Rate" step="0.01" required />
                <input type="number" name="services[${serviceCount}][quantity]" placeholder="Quantity" required />
                <label for="services[${serviceCount}][non_taxable]">Non-Taxable Item</label>
                <input type="checkbox" id="services[${serviceCount}][non_taxable]" name="services[${serviceCount}][non_taxable]" value="1"/>
                <button type="button" class="remove-service-btn" onclick="removeService(this)">Remove</button>
            `;

            servicesDiv.appendChild(serviceItem);
            serviceCount++;
        }

        function removeService(button) {
            button.parentElement.remove();
        }
    </script>