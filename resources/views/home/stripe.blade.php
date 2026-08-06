<!DOCTYPE html>
<html>
<head>
    <title>Ahsan Gift Shop Payment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f4f4;
        }

        .payment-box{
            max-width:600px;
            margin:70px auto;
            background:#fff;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 15px rgba(0,0,0,.1);
        }

        h2,h4{
            text-align:center;
        }
    </style>

</head>
<body>

<div class="payment-box">

    <h2>Ahsan Gift Shop Payment</h2>

    <h4>Total Amount : ${{ number_format($amount,2) }}</h4>

    <form action="{{ route('stripe.post') }}" method="POST">

        @csrf

        <input type="hidden" name="amount" value="{{ $amount }}">

        <div class="mb-3">
            <label>Name</label>
            <input
                type="text"
                name="name"
                class="form-control"
                required
            >
        </div>

        <div class="mb-3">
            <label>Address</label>
            <input
                type="text"
                name="address"
                class="form-control"
                required
            >
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input
                type="text"
                name="phone"
                class="form-control"
                required
            >
        </div>

        <div class="mb-3">
            <label>Card Number</label>
            <input
                type="text"
                name="card_number"
                class="form-control"
                placeholder="1234 5678 9012 3456"
                required
            >
        </div>

        <div class="row">

            <div class="col-md-6">

                <label>Expiry</label>

                <input
                    type="text"
                    name="expiry"
                    class="form-control"
                    placeholder="12/34"
                    required
                >

            </div>

            <div class="col-md-6">

                <label>CVV</label>

                <input
                    type="text"
                    name="cvv"
                    class="form-control"
                    placeholder="123"
                    required
                >

            </div>

        </div>

        <br>

        <button class="btn btn-primary w-100">
            Pay Now
        </button>

    </form>

</div>

</body>
</html>