<style>
    .cont {
        margin-bottom: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    h1 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .form {
        display: flex;
        flex-direction: column;
        max-width: 300px;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"] {
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button[type="submit"] {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>

<x-layout>


<div class="cont">
    <h1>Search Invoice</h1>
    <form class="form" action="/invoices" method="POST">
        @csrf <!-- Add CSRF token for form submission -->
        <label for="invoice_id">Invoice ID</label>
        <input type="text" name="invoice_id" placeholder="e.g A2031293232" />
        <label for="security_key">Security Key</label>
        <input type="password" name="security_key" placeholder="********" />
        <button type="submit">Search</button> <!-- Specify type="submit" for the button -->
    </form>
</div>

<div class="cont">
    <h1>Admin Panel</h1>
    <form class="form" action="/admin_panel/login" method="POST">
        @csrf <!-- Add CSRF token for form submission -->
        <label for="email">Email Address</label>
        <input type="email" name="email" placeholder="e.g sample@gmail.com" />
        <label for="password">Security Key</label>
        <input type="password" name="password" placeholder="********" />
        <button type="submit">Go</button> <!-- Specify type="submit" for the button -->
    </form>
</div>


   
</x-layout>
