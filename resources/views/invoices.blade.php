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
            <input type="password" name="password"  placeholder="********" />
            <button type="submit">Go</button> <!-- Specify type="submit" for the button -->
        </form>
    </div>
   
        {{$errors}}
   
</x-layout>
