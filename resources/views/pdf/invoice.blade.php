<style>

    .pdf{
        padding: 20px;
        padding-top: 100px;
        font-size: 1.3rem;
    }
    .header__contact-details, .content__title{
        text-align: right;
    }

    .content__title{
        font-size: 1.3rem;
        font-weight: 900;
    }

    .content__divider{
        border-top: 5px solid black;
    }

    .content__details{
        display: flex;
        justify-content: space-between;
       
    }

    .payment-instructions__details{
        display: flex;
        justify-content: space-between;''
    }


    .content__services{
        width: 100%;
        font-size: 1.3rem;
    }

    .services__header{
        background-color: #3EC509;
        color: white;
        font-weight: 900;
        font-size: 1.3rem;
        min-width: 100%;
        
    }

    .services__header th{
        padding: 10px;
    }

    .content__services{
        border-spacing: 0;
        text-align: center;
    }

.custom-shape-divider-top-1717726900 {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;

}

.custom-shape-divider-top-1717726900 svg {
    position: relative;
    display: block;
    width: calc(100% + 1.3px);
    height: 92px;
    transform: rotateY(180deg);
}

.custom-shape-divider-top-1717726900 .shape-fill {
    fill: #3EC509;
}

.details__total-cost{
    background-color: #000;
    color: white;
    font-size: 2rem;
    display: inline-block;
    float: right;
    padding: 20px;
}

.box {
    border: 1px solid #000;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    background-color: #f9f9f9;
}
.box h3 {
    margin-top: 0;
}

.svg-img{
    max-width: 300px;
}
</style>
<div class="pdf">
    <div class="custom-shape-divider-top-1717726900">
        <img class="svg-img" src="<?php echo asset("/imgs/invoice_header.png"); ?>" alt="invoice header" />
    </div>
    <div class="pdf__header">
        <div class="header__contact-details">
            <p class="contact-details__address"><address>1/5 Bolwarra Road Coffs Harbour, NSW 2450</address></p>
            <p class="contact-details__contact-number">+61 412 279 731</p>
            <p class="contact-details__email-address">chris@coffslawnsandpropertymaintenance.net</p>
        </div>
    </div>
    <div class="pdf__content">
        <p class="content__title"><strong>Invoice</strong></p>
        <h1 class="content__company_name">Coffs lawns and property maintenance</h1>
        <hr class="content__divider" />
        <div class="content__details">
            <span class="details__customer-details">
                <p>Bill To:</p>
                <div class="header__contact-details">
                    <p class="contact-details__name">{{$invoice->customer_name}}</p>
                    <p class="contact-details__address"><address>{{$invoice->customer_address}}</address></p>
                    <p class="contact-details__contact-number">{{$invoice->customer_contact_number}}</p>
                    <p class="contact-details__email-address">{{$invoice->customer_email_address}}</p>
                </div>
            </span>
            <span class="details__invoice-details">
                <p>Invoice Number: #{{$invoice->id}}</p>
                <p>Date: {{$invoice->invoice_date}}</p>
                
                <p>Due Date: {{$invoice->due_date}}</p>
            </span>
        </div>
        <table class="content__services">
            <tr class="services__header">
                <th>
                    Description
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Rate
                </th>
                <th>
                    Total
                </th>
            </tr>
            @foreach ($services as $service)
            <tr>
                <td>
                    {{$service->description}}
                </td>
                <td>
                    {{$service->quantity}}
                </td>
                <td>
                    ${{$service->rate}}
                </td>
                <td>
                    ${{$service->total}}
                </td>
            @endforeach
            </tr>
        </table>
        <p>*Indicates non-taxable-item</p>
        <div class="content__payment-instructions">
            <h2 class="payment-instructions__header">Payment Instructions</h2>
            <div class="payment-instructions__details">
                <div class="details__business-details">
                    <p>Please deposit money into</p>
                    <p><strong>Bank:</strong> BCU</p>
                    <p><strong>BSB:</strong> 533000</p>
                    <p><strong>ACC:</strong> 151548</p>
                    <p><strong>Account Name:</strong> Chris Webb</p>
                    <p><strong>ABN:</strong> 76658386348</p>
                </div>
                <div class="details__costs">
                    <p><strong>Subtotal:</strong> ${{$invoice->net_price}}</p>
                    <p><strong>Tax:</strong> {{$invoice->tax}}%</p>
                    <p><strong>Total:</strong> ${{$invoice->total_price}}</p>
                    <p><strong>Paid:</strong> ${{$invoice->paid}}</p>
                </div>
            </div>
        </div>
        <div class="details__total-cost">
            Balance Due: <span class="price">${{$invoice->total_price - $invoice->paid}}</span>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="box">
            <h3>Terms</h3>
            <p>{{ $invoice->terms }}</p>
        </div>

        <div class="box">
            <h3>Notes</h3>
            <p>{{ $invoice->notes }}</p>
        </div>
    </div>
</div>