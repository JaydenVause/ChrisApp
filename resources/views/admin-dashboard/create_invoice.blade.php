
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
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
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




@extends('components.layout')

@section('title', $title)

@section('content')

        <div class="admin-dashboard">
            <x-dashboard-nav />
            
            <form action="/admin_panel/save_invoice" method="POST" class="invoice-form" id="invoiceForm">
                @csrf
                <button type="button" id="add_contact_btn">Select from contacts list</button>
                <p id="result_pane"></p>
                <label for="customer_name">Customer Name:</label>
                <input type="text" name="customer_name" id="customer_name" placeholder="Client's Name" required />

                <label for="customer_email_address">Customer Email:</label>
                <input type="email" name="customer_email_address" id="customer_email_address" placeholder="Client's Email" required />

                <label for="customer_contact_number">Customer Contact Number:</label>
                <input type="tel" name="customer_contact_number" id="customer_contact_number" placeholder="Client's Contact Number" required />

                <label for="customer_address">Address:</label>
                <input type="text" name="customer_address" id="customer_address" placeholder="Customer's Address" />

                <label for="invoice_date">Date:</label>
                <input type="date" name="invoice_date" placeholder="Invoice Date" />

                <label for="due_date">Due Date:</label>
                <input type="date" name="due_date" placeholder="Due Date" />

                <label for="tax">Tax %:</label>
                <input type="number" placeholder="0%" step="0.1" name="tax" placeholder="Tax %" value="0"/>        

                <label for="paid">$ Paid (Already):</label>
                <input type="number" placeholder="0%" step="0.1" name="paid" placeholder="e.g. 100" value="0" />   

                <div id="services">
                    <!-- services go here -->
                </div>
                <button type="button" onclick="addService()">Add Service</button>

                <label for="notes">Notes:</label>
                <textarea name="notes" id="notes" placeholder="Additional notes..." rows="4"></textarea>

                <button type="submit">Create Invoice</button>
            </form>
        </div>
        <script>
        let serviceCount = 1;

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

        async function getContacts() {
            const props = ["name", "email", "tel", "address", "icon"];
            const opts = { multiple: false };
            try {
                const contacts = await navigator.contacts.select(props, opts);
                return contacts;
            } catch (ex) {
                return ex;
            }
        }

        function cleanPhoneNumber(phone) {
            return phone.replace(/(?!^\+61)\D/g, '');
        }

        let add_contact_btn = document.querySelector('#add_contact_btn');
        let result_pane = document.querySelector("#result_pane");

        add_contact_btn.addEventListener('click', async function() {
            let contacts = await getContacts();
            if (contacts && contacts.length > 0) {
                let contact = contacts[0];
                let cleanTel = cleanPhoneNumber(contact.tel[0]);

                document.querySelector('#customer_name').value = contact.name[0] || '';
                document.querySelector('#customer_email_address').value = contact.email[0] || '';
                document.querySelector('#customer_contact_number').value = cleanTel || '';
                document.querySelector('#customer_address').value = contact.address[0].addressLine[0] || '';

                result_pane.innerText = `Contact information filled: ${contact.name[0]}, ${contact.email[0]}, ${cleanTel}, ${contact.address[0].addressLine[0]}`;
            } else {
                result_pane.innerText = "No contacts selected or an error occurred.";
            }
        });
    </script>
        @endsection

   
