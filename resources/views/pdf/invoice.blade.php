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
</style>
<div class="pdf">
    <div class="custom-shape-divider-top-1717726900">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
        </svg>
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