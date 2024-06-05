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
        <form class="form" action="/generate_invoices" method="POST">
            @csrf <!-- Add CSRF token for form submission -->
            <label for="account_id">Account ID</label>
            <input type="text" name="account_id" placeholder="e.g C2203203232" />
            <label for="security_key">Security Key</label>
            <input type="password" name="security_key"  placeholder="********" />
            <button type="submit">Go</button> <!-- Specify type="submit" for the button -->
        </form>
    </div>
</x-layout>
