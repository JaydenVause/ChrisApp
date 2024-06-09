<div class="admin-dashboard-nav">
    <h1>Admin Dashboard</h1>
    <ul>
        <li>
            <a href="/admin_panel">Dashboard</a>
        </li>
        <li>
            <a href="/admin_panel/create_invoice" class="btn--green">Generate Invoice</a>
            <div>
                <input type="text" name="search_term" placeholder="Search Term" />
                <button>Search</button>
            </div>
        </li>
    </ul>
</div>

<style>
       

        .admin-dashboard-nav {
            background-color: #333;
            padding: 20px;
            color: #fff;
        }

        .admin-dashboard-nav h1 {
            margin: 0 0 20px;
        }

        .admin-dashboard-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .admin-dashboard-nav ul li {
            margin-bottom: 10px;
        }

        .admin-dashboard-nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .admin-dashboard-nav ul li a:hover {
            background-color: #444;
        }

        .admin-dashboard-nav div {
            margin-top: 10px;
        }

        .admin-dashboard-nav input[type="text"] {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: calc(100% - 90px);
            margin-right: 10px;
        }

        .admin-dashboard-nav button {
            padding: 8px 15px;
            border: none;
            background-color: #59C033;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .admin-dashboard-nav button:hover {
            background-color: #45a026;
        }

        @media (max-width: 600px) {
            .admin-dashboard-nav h1 {
                font-size: 24px;
                text-align: center;
            }

            .admin-dashboard-nav ul li {
                text-align: center;
            }

            .admin-dashboard-nav input[type="text"] {
                width: calc(100% - 20px);
                margin-right: 0;
                margin-bottom: 10px;
            }

            .admin-dashboard-nav button {
                width: 100%;
            }
        }
    </style>