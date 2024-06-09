<style>
 /*
* Prefixed by https://autoprefixer.github.io
* PostCSS: v8.4.14,
* Autoprefixer: v10.4.7
* Browsers: last 4 version
*/
/*
* Prefixed by https://autoprefixer.github.io
* PostCSS: v8.4.14,
* Autoprefixer: v10.4.7
* Browsers: last 4 version
*/
html {
  -webkit-print-color-adjust: exact;
}

@font-face {
    font-family: 'NotoSans';
    src: url('/fonts/NotoSans/NotoSans-Variable.ttf') format('truetype');
}

    *{
        font-family: NotoSans;
    }

    h1{
        font-size: 1.6rem;
    }
    h2{
        font-size: 1.2rem;
    }
    h3{
        font-size: 1rem;
    }
    p{
        font-size: 1.2rem;
    }
    .meat{
        padding: 60px;

    }

    .invoice_heading{
        text-align: right;
        
        margin-bottom: 10px;
        font-weight: 900;
    }

    .logo{
        
        margin-bottom: 20px;
        font-weight: 700;
    }

    .invoice_to{
        
    }

    .customer_details{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
            -ms-flex-pack: justify;
                justify-content: space-between;
    }

    .svg-img{
        width: 100%;
    }


    .non-taxable{
        color: #FF8401;
    }

    .services-table {
        width: 100%;
        text-align: center;
        border-collapse: collapse; /* Ensure borders are applied properly */
        margin: 10px 0 10px 0;
    }

    .services-table tr th{
        padding: 20px;
    }

    .services-table tr td{
        padding: 10px;
    }

    

    

    /* Ensure borders are applied to table cells */
    .services-table__service:nth-child(odd) {
        background:#E2E1E1 !important;
    }

    .services-table td, .services-table th {
        border-bottom: 1px solid black;
    }

    .services-table__header th, .services-table__header td{
        border: none;
    }

    .services-table__header{
        background-color: #3ec509 !important;
        font-size: 1.3rem;
        color: white;
        border: none;
    }

    .payment-info{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
            -ms-flex-pack: justify;
                justify-content: space-between;
    }
    .payment-info__acount-details{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
            -ms-flex-direction: column;
                flex-direction: column;
    }
    .payment-info__payment-summary{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
            -ms-flex-direction: column;
                flex-direction: column;
    }

    .total-cost{
        text-align: right;
        padding-top: 80px;
    }
    .total-cost__box{
        
        display: inline;
        
        padding: 10px;
        font-size: 1.2rem;
        border: 3px solid black;
        font-weight: 900;
    }

    .footer{
        margin-top: 20px;
    }

    .footer__links{
        
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
            -ms-flex-pack: justify;
                justify-content: space-between;
       
    }

    .footer__links p{
        font-size: 1rem ;
    }

    svg{
        width: 15px;
        height: 15px;
        margin-right: 10px;
    }

    .flex{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
    }

    .footer svg path {
    fill: #3ec509;
}
    
</style>


<div class="svg-img">
    <img class="svg-img" src="<?php echo asset("/imgs/invoice_header.svg"); ?>" alt="invoice header" />
</div>

<div class="meat">
    <h1 class="invoice_heading">Invoice</h1>

    <h1 class="logo">Coffs Lawns and Property Maintainence</h1>

    <h2>Customer Details</h2>
    <div class="customer_details">
        
        <div>
            <table>
                <tr>
                    <td><p>{{$invoice->customer_name}}</p></td>
                </tr>
                <tr>
                    <td><p>{{$invoice->customer_address}}</p></td>
                </tr>
                <tr>
                    <td><p>{{$invoice->customer_contact_number}}</p></td>
                </tr>
                <tr>
                    <td><p>{{$invoice->customer_email_address}}</p></td>
                </tr>
            </table>
        </div>
        <div>
            <table>
                <tr>
                    <td><p>Invoice #:</p></td>
                    <td><p>{{$invoice->id}}</p></td>
                </tr>
                <tr>
                    <td><p>Date:</p></td>
                    <td><p class="date-object">{{$invoice->invoice_date}}</p></td>
                </tr>
                <tr>
                    <td><p>Due Date:</p></td>
                    <td><p class="date-object">{{$invoice->due_date}}</p></td>
                </tr>
            </table>
        </div>
    </div>
    <table class="services-table">
        <tr class="services-table__header">
            <th><p>Description</p></th>
            <th><p>Price</p></th>
            <th><p>Qty</p></th>
            <th><p>Total</p></th>
        </tr>
        @foreach($services as $service)
            <tr class="services-table__service">
                <td>{{$service->description}}
                    @if($service->non_taxable == 1)
                        <span>*</span>
                    @endif
                </td>
                <td><p>{{ sprintf('%0.2f', $service->rate) }}</p></td> <!-- Update this line -->
                <td><p>{{$service->quantity}}</p></td>
                <td><p>{{ sprintf('%0.2f', $service->total) }}</p></td> <!-- Update this line -->
            </tr>
        @endforeach
    </table>
    <p>Non-Taxable Items marked (*)</p>


    <div class="payment-info">
        <div class="payment-info__acount-details">
            
                <h2>Payment Information:</h2>
            <table>
            <tr>
                <td><p>Account Name: </p></td>
                <td><p>Chris Webb</p></td>
            </tr>
            
            <tr>
                <td><p>BSB: </p></td>
                <td><p>533000</p></td>
            </tr>
            <tr>
                <td><p>Account Number: </p></td>
                <td><p>151548</p></td>
            </tr>
            <tr>
                <td><p>Bank: </p></td>
                <td><p>BCU</p></td>
            </tr>
            
            <tr>
                <td><p>ABN: </p></td>
                <td><p>76658386348</p></td>
            </tr>
            </table>
    </div>
            
            
        <div class="payment-info__payment-summary">

                <h2><strong>Payment Summary</strong></h2>

            <table>
            <tr>
                <td><p>Sub Total: </p></td>
                <td><p>${{ sprintf('%0.2f', $invoice->net_price) }}</p></td> <!-- Update this line -->
            </tr>
            <tr>
                <td><p>Tax: </p></td>
                <td><p>{{ sprintf('%0.2f', $invoice->tax) }} %</p></td> <!-- Update this line -->
            </tr>
            <tr>
                <td><p>Tax Total : </p></td>
                <td><p>${{ sprintf('%0.2f', $invoice->total_tax) }}</p></td> <!-- Update this line -->
            </tr>
            <tr>
                <td><p>Paid: </p></td>
                <td><p>${{ sprintf('%0.2f', $invoice->paid) }}</p></td> <!-- Update this line -->
            </tr>

            </table>
    </div>
    </div>

    <div class="total-cost">
        <div class="total-cost__box">
            Balance Due: ${{ sprintf('%0.2f', $invoice->total_price - $invoice->paid) }}
        </div>
    </div>

    <div class="footer">
        <h2>Thank you for your business</h2>
        <div class="footer__links">
            <span class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>phone-in-talk</title><path d="M15,12H17A5,5 0 0,0 12,7V9A3,3 0 0,1 15,12M19,12H21C21,7 16.97,3 12,3V5C15.86,5 19,8.13 19,12M20,15.5C18.75,15.5 17.55,15.3 16.43,14.93C16.08,14.82 15.69,14.9 15.41,15.18L13.21,17.38C10.38,15.94 8.06,13.62 6.62,10.79L8.82,8.59C9.1,8.31 9.18,7.92 9.07,7.57C8.7,6.45 8.5,5.25 8.5,4A1,1 0 0,0 7.5,3H4A1,1 0 0,0 3,4A17,17 0 0,0 20,21A1,1 0 0,0 21,20V16.5A1,1 0 0,0 20,15.5Z" /></svg>
                <p>0412 279 731</p>
            </span>
            <span class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>at</title><path d="M12,15C12.81,15 13.5,14.7 14.11,14.11C14.7,13.5 15,12.81 15,12C15,11.19 14.7,10.5 14.11,9.89C13.5,9.3 12.81,9 12,9C11.19,9 10.5,9.3 9.89,9.89C9.3,10.5 9,11.19 9,12C9,12.81 9.3,13.5 9.89,14.11C10.5,14.7 11.19,15 12,15M12,2C14.75,2 17.1,3 19.05,4.95C21,6.9 22,9.25 22,12V13.45C22,14.45 21.65,15.3 21,16C20.3,16.67 19.5,17 18.5,17C17.3,17 16.31,16.5 15.56,15.5C14.56,16.5 13.38,17 12,17C10.63,17 9.45,16.5 8.46,15.54C7.5,14.55 7,13.38 7,12C7,10.63 7.5,9.45 8.46,8.46C9.45,7.5 10.63,7 12,7C13.38,7 14.55,7.5 15.54,8.46C16.5,9.45 17,10.63 17,12V13.45C17,13.86 17.16,14.22 17.46,14.53C17.76,14.84 18.11,15 18.5,15C18.92,15 19.27,14.84 19.57,14.53C19.87,14.22 20,13.86 20,13.45V12C20,9.81 19.23,7.93 17.65,6.35C16.07,4.77 14.19,4 12,4C9.81,4 7.93,4.77 6.35,6.35C4.77,7.93 4,9.81 4,12C4,14.19 4.77,16.07 6.35,17.65C7.93,19.23 9.81,20 12,20H17V22H12C9.25,22 6.9,21 4.95,19.05C3,17.1 2,14.75 2,12C2,9.25 3,6.9 4.95,4.95C6.9,3 9.25,2 12,2Z" /></svg>
                <p>https://coffslawnsandpropertymaintenance.com/</p>
            </span>
            <span class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>map-marker</title><path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" /></svg><p>1/5 Bolwarra Road<br/>Coffs Harbour, NSW 2450</p>
            </span>
        </div>
    </div>
</div>
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