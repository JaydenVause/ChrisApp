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
                <tr>
                    <td>
                        <p><strong>ID:</strong></p>
                        <p>12345</p>
                    </td>
                    <td>
                        <p><strong>Name:</strong></p>
                        <p>John Doe</p>
                    </td>
                    <td>
                        <p><strong>Email:</strong></p>
                        <p>sample@gmail.com</p>
                    </td>
                    <td>
                        <p><strong>Date:</strong></p>
                        <p>01/01/2024</p>
                    </td>
                    <td>
                        <p><strong>Address:</strong></p>
                        <p><address>21 Sample Street</address></p>
                    </td>
                    <td>
                        <p><strong>Contact Number:</strong></p>
                        <p>+61 412 323 323</p>
                    </td>
                    <td>
                        <p><strong>Actions:</strong></p>
                        <span>
                            <button>Edit</button>
                            <button>Delete</button>
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</x-layout>
