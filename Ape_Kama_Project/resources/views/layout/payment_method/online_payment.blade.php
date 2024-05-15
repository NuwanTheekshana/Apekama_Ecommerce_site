
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Paycorp Payment">
        <title></title>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
       
        <style type="text/css">
        html {
            border: 0;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 0 auto;
            max-width: 1200px;
        }
    
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    
        .row {
            float: left;
            width: 100%;
            padding: 20px 0 50px;
        }
    
        .col-3 {
            float: left;
            width: 27.33%;
            margin: 40px 3%;
            position: relative;
        }
    
        .col-6 {
            float: left;
            width: 40%;
            margin: 20px 5%;
            position: relative;
        }
    
        .col-12 {
            float: left;
            width: 90%;
            margin: 20px 5%;
            position: relative;
        }
    
        input {
            font: 15px/24px "Lato", Arial, sans-serif;
            color: #333;
            width: 100%;
            box-sizing: border-box;
            letter-spacing: 1px;
        }
    
        input::placeholder {
            color: #ddd;
        }
    
        .effect {
            border: 0;
            padding: 7px 0;
            border-bottom: 1px solid #ccc;
        }
    
        .effect~.focus-border {
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: #3399FF;
            transition: 0.4s;
        }
    
        .effect:focus~.focus-border {
            width: 100%;
            transition: 0.4s;
            left: 0;
        }
    
        .btn {
            font: 15px/24px "Lato", Arial, sans-serif;
            display: inline-block;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
    
        @media screen and (prefers-reduced-motion: reduce) {
            .btn {
                transition: none;
            }
        }
    
        .btn:hover,
        .btn:focus {
            text-decoration: none;
        }
    
        .btn:focus,
        .btn.focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(106, 130, 251, 0.25);
        }
    
        .btn.disabled,
        .btn:disabled {
            opacity: 0.65;
        }
    
        .btn:not(:disabled):not(.disabled) {
            cursor: pointer;
        }
    
        .btn:not(:disabled):not(.disabled):active,
        .btn:not(:disabled):not(.disabled).active {
            background-image: none;
        }
    
        .btn-block {
            display: block;
            width: 100%;
        }
    
        .btn-block+.btn-block {
            margin-top: 0.5rem;
        }
    
        a.btn.disabled,
        fieldset:disabled a.btn {
            pointer-events: none;
        }
    
        .btn-primary {
            color: #fff;
            background: #6a82fb linear-gradient(180deg, #8095fc, #6a82fb) repeat-x;
            border-color: #6a82fb;
        }
    
        .btn-primary:hover {
            color: #fff;
            background: #4563fa linear-gradient(180deg, #617afb, #4563fa) repeat-x;
            border-color: #3858fa;
        }
    
        .btn-primary:focus,
        .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(106, 130, 251, 0.5);
        }
    
        .btn-primary.disabled,
        .btn-primary:disabled {
            color: #fff;
            background-color: #6a82fb;
            border-color: #6a82fb;
        }
    
        .btn-primary:not(:disabled):not(.disabled):active,
        .btn-primary:not(:disabled):not(.disabled).active,
        .show>.btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #3858fa;
            background-image: none;
            border-color: #2c4ef9;
        }
    
        .btn-primary:not(:disabled):not(.disabled):active:focus,
        .btn-primary:not(:disabled):not(.disabled).active:focus,
        .show>.btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem rgba(106, 130, 251, 0.5);
        }
    
        .btn-secondary {
            color: #fff;
            background: #857327;
            border-color: #857327;
        }
    
        .btn-secondary:hover {
            color: #fff;
            background: #857327;
            border-color: #857327;
        }
    
        .btn-secondary:focus,
        .btn-secondary.focus {
            box-shadow: 0 0 0 0.2rem #857327);
        }
    
        .btn-secondary.disabled,
        .btn-secondary:disabled {
            color: #fff;
            background-color: #857327;
            border-color: #857327;
        }
    
        .btn-secondary:not(:disabled):not(.disabled):active,
        .btn-secondary:not(:disabled):not(.disabled).active,
        .show>.btn-secondary.dropdown-toggle {
            color: #fff;
            background-color: #857327;
            background-image: none;
            border-color: #857327;
        }
    
        .btn-secondary:not(:disabled):not(.disabled):active:focus,
        .btn-secondary:not(:disabled):not(.disabled).active:focus,
        .show>.btn-secondary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem #857327;
        }
    
        * {
            box-sizing: border-box;
        }
    
        body {
            background: #fce790;
            font-family: sans-serif;
            font-size: 100%;
            color: #555;
            margin: 0;
            padding: 0;
        }
    
        .lefttoplogo {
    
            max-width: 100%;
            max-height: 100%;
            margin-top: 1.0em;
            margin-bottom: -1.0em;
            max-width: 100px;
        }
    
        .toplogo {
            display: block;
            max-width: 100%;
            max-height: 100%;
            margin-top: 1.5em;
            margin-bottom: -1.0em;
            max-width: 180px;
        }
    
        .bottomlogo {
            display: block;
            margin-right: auto;
            height: 70px;
            margin-top: 0.5em;
            max-width: 315px;
            float: left;
        }
    
        .bottomlogo2 {
            display: block;
            margin-left: auto;
            margin-top: 1.5em;
            width: auto;
            max-width: 120px;
            float: right;
            height: 40px;
        }
    
        .cardimg {
            display: block;
            margin-bottom: -0.7em;
            width: 50px;
            float: left;
            margin-top: -0.7em;
            padding-right: 10px;
        }
    
        .if-form {
            background: #fff;
            box-shadow: rgba(0, 0, 0, .15) 0 2px 20px,
                rgba(0, 0, 0, .1) 0 0 3px;
            min-width: 300px;
            max-width: 450px;
            width: 100%;
            padding: 0;
            margin: 2em auto;
        }
    
        .if-form2 {
            min-width: 300px;
            max-width: 450px;
            width: 100%;
            padding: 0;
            margin: 0 auto;
        }
    
        .right-box {
            width: 180px;
            float: right;
            text-align: right;
        }
    
        .left-box {
            width: 180px;
            float: left;
            text-align: left;
        }
    
        fieldset {
            border: none;
            margin: 0;
            padding: 1.6em 1em 0.5em;
            border-bottom: 1px solid #d2d8dc;
        }
    
        .if-field-submit {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 2.5em;
        }
    
        h2 {
            font-weight: 100;
            font-size: 1.6em;
            color: #41637b;
            margin-top: 0;
        }
    
        .if-field-top-logos {
            display: inline-block;
            width: 100%;
            padding: 1em;
            margin: 0 auto;
            min-width: 300px;
            max-width: 450px;
        }
    
        .if-field-top-logos div {
            width: 50%;
            float: left
        }
    
        .if-field-top-logos div img {
            width: 100%;
            height: auto;
        }
    
        .if-field {
            display: inline-flex;
            width: 100%;
            margin-bottom: 1.0em;
        }
    
        .if-field-btn {
            display: inline-block;
            width: 100%;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
        }
    
        .if-field-80 {
            display: inline-block;
            width: 78%;
            margin-bottom: 1.0em;
        }
    
        .if-field-20 {
            display: inline-block;
            min-width: 50px;
            margin-bottom: 0.0em;
            width: auto;
            margin-left: 0.12em;
            max-width: 50px;
        }
    
        .if-field-60 {
            display: inline-block;
            width: 58%;
            margin-bottom: 1.0em;
        }
    
        .if-field-40 {
            display: inline-block;
            width: 40%;
            margin-bottom: 1.0em;
            margin-left: 0.12em;
        }
    
        label {
            display: block;
            margin-bottom: .25em;
            white-space: nowrap;
            overflow: hidden;
        }
    
        .if-label-secondary {
            color: #999;
            font-size: .8125em;
            margin-top: .5em;
        }
    
        .if-input-text {
            display: block;
            width: 100%;
            border-radius: 3px;
            border: 1px solid #ccc;
            padding: .65em .5em;
            font-size: 91%;
        }
    
        .if-expiry {
            width: 18%;
            display: inline-block;
            float: left;
            margin-right: 0.42em;
        }
    
        .if-card {
            float: left;
            width: 60%;
            display: inline-block;
            margin-right: 0.42em;
        }
    
        .if-cvc {
            float: left;
            width: 18%;
            display: inline-block;
        }
    
        .if-name {
            float: left;
            width: 60%;
            display: inline-block;
            margin-right: 0.42em;
        }
    
        .if-amount {
            float: left;
            width: 38%;
            display: inline-block;
        }
    
        .if-field-group {
            display: inline-block;
        }
    
        .if-month {
            width: 20%;
        }
    
        .if-year {
            width: 30%;
        }
    
        .if-exp-divider {
            display: inline-block;
            margin: 0 .4em;
            font-size: 150%;
            line-height: 1.5;
            position: relative;
            top: .2em;
        }
    
        #errors,
        #message {
            color: red;
            margin: 1em 0;
            line-height: 1.5;
        }
    
        #message {
            color: green;
        }
    
        @media screen and (max-width: 330px) {
            .if-form {
                margin: 1.0em auto;
            }
        }
    
        @media screen and (max-width: 625px) {
            .if-form {
                width: 100%;
            }
        }
        </style>
        <style type="text/css">
        $ {
            data.customStyling
        }
        </style>
    </head>
    
    <body>
        <form class="if-form" id="paymentForm" action="{{route('payment_success')}}" method="get" onsubmit="btn1.disabled = true;">
            @csrf
            <div class="if-field-top-logos">
                <div class="left">
                    
                    <img src="{{asset('img/logo.png')}}" alt="" />
                    <!-- <img src="images/merchantLogoUrl.png" alt=""/> -->
                    
                </div>
                <div class="right">
                    
                    <img src="https://s3-eu-west-1.amazonaws.com/pyc-smp-payment-pages-config.prod.aws.paycorp.lk/app/N1xSpjQxvxvbbKdV4Y5Cuzol8/brandLogoUrl.png" alt="" />
                    <!-- <img src="./images/brandLogoUrl.png" alt=""/> -->
                    
                </div>
            </div>
            <input type='hidden' name='csrfToken' value='8x4S8QM7Twy1qT8gJ2FI' />
            <input type='hidden' id="cardNo" name="cardNo" />
            
            <span style="display:none">payment amount is not required in the form</span>
            
            <fieldset>

                <div class="if-field">
                    <div class="if-card">
                        <img class="cardimg" id="ccard" alt="" />
                        <label>Card Number</label><label id="warning_number" style="display: none; color:red;"></label>
                        <input class="if-input-text" id="cardNoDisplay" name="cardNoDisplay" type="tel" autocomplete="off" required="required" maxlength="19" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;">
                        <span id="cNumberBorder" style="display:none"></span>
                    </div>
                    <div class="if-expiry">
                        <label>Expiry </label><label id="warning_expiry" style="display: none; color:red;"></label>
                        <input class="if-input-text" id="cardExpiry" name="cardExpiry" type="tel" autocomplete="off" required="required" maxlength="5" placeholder="MM/YY">
                    </div>
                    <div class="if-cvc">
                        <label>CVC </label>
                        <label id="warning_secureid" style="display: none; color:red;"></label>
                        <input class="if-input-text" id="cardSecureId" name="cardSecureId" type="tel" autocomplete="off" required="required" maxlength="4" placeholder="&#149;&#149;&#149;">
                    </div>
                </div>
                <div class="if-field">
                    <div class="if-name">
                        <label>Name on Card </label>
                        <label id="warning_cardname" style="display: none; color:red;"></label>
                        <input class="if-input-text" id="cardHolderName" name="cardHolderName" type="text" autocomplete="off" required="required" placeholder="eg. First Last">
                    </div>
                    <div class="if-amount">
                        <label>Amount(?)</label>
                        <label id="warning_amount" style="display: none; color:red;"></label>
                        
                        <input class="if-input-text" id="paymentAmountDisplay" name="paymentAmountDisplay" type="tel" autocomplete="off" required="required" disabled value="{{$total_price}}">
                        
                    </div>
                </div>
                <div class="if-field-btn">
                    <button type="submit" class="btn btn-secondary btn-block" name="btn1" disabled>Submit</button>
                </div>
            </fieldset>
        </form>
        <br />
        <br />
        <script>
        var acceptedCreditCards = {
            visa: /^4[0-9]{12}(?:[0-9]{3})?$/,
            mastercard: /^5[1-5][0-9]{14}$|^2(?:2(?:2[1-9]|[3-9][0-9])|[3-6][0-9][0-9]|7(?:[01][0-9]|20))[0-9]{12}$/,
            amex: /^3[47][0-9]{13}$/,
            cup: /^(62[0-9]{14,17})$/,
        };
    
        $('#cardNoDisplay, #cardSecureId, #cardExpiry, #cardHolderName').on('input', function(e) {
            if (validateCard($('#cardNoDisplay').val()) && validateExpiry($('#cardExpiry').val()) && validateCVV($('#cardNoDisplay').val(), $('#cardSecureId').val()) && validateCardHolder($('#cardHolderName').val())) {
                $('button[type="submit"]').prop('disabled', false);
            } else {
                $('button[type="submit"]').prop('disabled', true);
            }
    
            if(e.target.id === 'cardNoDisplay') {
                fixCursor(e.target.id,' ');
            }
            if(e.target.id === 'cardExpiry') {
                fixCursor(e.target.id,'/');
            }
    
        });
        
        function fixCursor(e, sep) { // e=element, sep=separator character
            var node = $('#'+e)[0]; // vanilla javascript element
            var cursor = node.selectionStart; // store cursor position
            var lastValue = $('#'+e).val(); // get value before formatting
            var formattedValue;
    
            // var formattedValue = formatCardNumber(lastValue);
            if(e === 'cardNoDisplay') {
                formattedValue = formatCardNumber(lastValue);
            }
            else if (e === 'cardExpiry') {
                formattedValue = formatExpiry(lastValue);
            }
    
            $('#'+e).val(formattedValue); // set value to formatted
    
            // keep the cursor at the end on addition of spaces
            if (cursor === lastValue.length) {
                cursor = formattedValue.length;
                // decrement cursor when backspacing
                if ($('#'+e).attr('data-lastvalue') && $('#'+e).attr('data-lastvalue').charAt(cursor - 1) == sep) {
                    cursor--;
                }
            }
    
            if (lastValue != formattedValue) {
                // increment cursor when inserting character before a space
                // i.e. "1234| 6" => "5" typed => "1234 5|6"
                if (lastValue.charAt(cursor) == sep && formattedValue.charAt(cursor - 1) == sep) {
                    cursor++;
                }
            }
    
            // set cursor position
            node.selectionStart = cursor;
            node.selectionEnd = cursor;
            // store last value
            $('#'+e).attr('data-lastvalue', formattedValue);
        }
    
        function setCardImage(cardNo) {
            var isFlag = false;
            var type = '';
    
            Object.keys(acceptedCreditCards).forEach(function(key) {
                var regex = acceptedCreditCards[key];
                if (regex.test(cardNo)) {
                    type = String(key);
                    isFlag = true;
                }
            });
            if (isFlag) {
                if (type === 'visa') {
                    var cardimg = 'data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAAHgAAABQCAYAAADSm7GJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDowRDdCNjU1RUE0MUExMUU4OEI2Q0FEQjI0QzQzQjY4OCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDowRDdCNjU1RkE0MUExMUU4OEI2Q0FEQjI0QzQzQjY4OCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjBEN0I2NTVDQTQxQTExRTg4QjZDQURCMjRDNDNCNjg4IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjBEN0I2NTVEQTQxQTExRTg4QjZDQURCMjRDNDNCNjg4Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+q44augAAHRVJREFUeNrsfQm0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';
                    $("#ccard").attr('src',cardimg);
                }
                if (type === 'mastercard') {
                    var cardimg = 'data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAAHgAAABQCAYAAADSm7GJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpGQjJDN0NGREE0MTcxMUU4OEI2Q0FEQjI0QzQzQjY4OCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpGQjJDN0NGRUE0MTcxMUU4OEI2Q0FEQjI0QzQzQjY4OCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkZCMkM3Q0ZCQTQxNzExRTg4QjZDQURCMjRDNDNCNjg4IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkZCMkM3Q0ZDQTQxNzExRTg4QjZDQURCMjRDNDNCNjg4Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+ZUuOvgAAHb1JREFUeNrsfQl4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';
                    $("#ccard").attr('src',cardimg);
                }
                if (type === 'amex') {
                    var cardimg = 'data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAAHgAAABQCAYAAADSm7GJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDowRDdCNjU1QUE0MUExMUU4OEI2Q0FEQjI0QzQzQjY4OCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDowRDdCNjU1QkE0MUExMUU4OEI2Q0FEQjI0QzQzQjY4OCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkZCMkM3Q0ZGQTQxNzExRTg4QjZDQURCMjRDNDNCNjg4IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkZCMkM3RDAwQTQxNzExRTg4QjZDQURCMjRDNDNCNjg4Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+qpBXXgAAJ9ZJREFUeNrsfQmU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';
                    $("#ccard").attr('src',cardimg);
                }
            } else {
                var cardimg = 'data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAAHgAAABQCAYAAADSm7GJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDoxNzhGNDkwREE0MUExMUU4OEI2Q0FEQjI0QzQzQjY4OCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDoxNzhGNDkwRUE0MUExMUU4OEI2Q0FEQjI0QzQzQjY4OCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjE3OEY0OTBCQTQxQTExRTg4QjZDQURCMjRDNDNCNjg4IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjE3OEY0OTBDQTQxQTExRTg4QjZDQURCMjRDNDNCNjg4Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+gBobTwAABhFJREFUeNrsndtL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';
                $("#ccard").attr('src',cardimg);
            }
        }
    
        function validateCardHolder(name) {
            var nameStr = String(name);
            if (nameStr.length > 2) {
                setFieldValid($('#cardHolderName'),true);
                return true;
            } else {
                setFieldValid($('#cardHolderName'),false);
                return false;
            }
        }
    
        function formatExpiry(value) {
            var value = value.replace(/\D/g, ''); // remove non digits
    
            formattedExp = value.replace(/(\d{2})/, '$1/'); //.replace(/(\d{2})\/$/,'$1');
            return formattedExp;
        }
    
        function validateExpiry(value) {
            // value = "102/0"
            if (/\d\d\d\/\d/.test(value)) {
                value=formatExpiry(value);
            }
            else if (!/\d\d\/\d\d/.test(value)) {
                setFieldValid($('#cardExpiry'),false);
                return false;
            }
    
            // Check month is 1 to 12 inclusive
            var mth = value.split('/');
            if (mth[0] < 1 || mth[0] > 12) {
                setFieldValid($('#cardExpiry'),false);
                return false;
            }
    
            // Check is this month or later
            var today = new Date()
            var currentYear = today.getFullYear() / 100 | 0 + '';
            if (new Date(currentYear + mth[1], mth[0], 1) < today) {
                setFieldValid($('#cardExpiry'),false);
                return false;
            }
            setFieldValid($('#cardExpiry'),true);
            setTimeout(function(){$('#cardSecureId').focus();},1);
            return true;
        }
    
        function formatCardNumber(value) {
            var value = value.replace(/\D/g, ''); // remove non digits
            var formattedValue;
            var maxLength;
    
            if ((/^3[47]\d{0,13}$/).test(value)) { // AMEX
                formattedValue = value.replace(/(\d{4})/, '$1 ').replace(/(\d{4}) (\d{6})/, '$1 $2 ');
                maxLength = 17;
            } else if ((/^3(?:0[0-5]|[68]\d)\d{0,11}$/).test(value)) { // Diners
                formattedValue = value.replace(/(\d{4})/, '$1 ').replace(/(\d{4}) (\d{6})/, '$1 $2 ');
                maxLength = 16;
            } else if ((/^\d{0,16}$/).test(value)) { // Other Valid CC
                formattedValue = value.replace(/(\d{4})/, '$1 ').replace(/(\d{4}) (\d{4})/, '$1 $2 ').replace(/(\d{4}) (\d{4}) (\d{4})/, '$1 $2 $3 ');
                maxLength = 19;
            }
    
            $('#cardNoDisplay').attr('maxlength', maxLength);
            return formattedValue;
        }
    
    
        function validateCard(value) {
            // remove all non digit characters
            var value = value.replace(/\D/g, '');
            var sum = 0;
            var shouldDouble = false;
            // loop through values starting at the rightmost side
            for (var i = value.length - 1; i >= 0; i--) {
                var digit = parseInt(value.charAt(i));
    
                if (shouldDouble) {
                    if ((digit *= 2) > 9) digit -= 9;
                }
    
                sum += digit;
                shouldDouble = !shouldDouble;
            }
    
            var valid = (sum % 10) == 0;
            var accepted = false;
    
            // loop through the keys (visa, mastercard, amex, etc.)
            Object.keys(acceptedCreditCards).forEach(function(key) {
                var regex = acceptedCreditCards[key];
                if (regex.test(value)) {
                    accepted = true;
                }
            });
            setFieldValid($('#cardNoDisplay'), valid && accepted);
    
            if (valid && accepted) {
                $('#cardNo').val(value.replace(/\D/g, ''));
                setCardImage($('#cardNo').val());
                setTimeout(function(){$('#cardExpiry').focus();},1);
            }
            return valid && accepted;
        }
    
        function setFieldValid(field,value) {
            if (value) {
                field.css('color','black');	
                field.css('background-color','white');
            }
            else {
                field.css('color','red');	
                field.css('background-color','#FFB6C1');	
            }
        }
    
        function validateCVV(creditCard, cvv) {
            // remove all non digit characters
            var creditCard = creditCard.replace(/\D/g, '');
            var cvv = cvv.replace(/\D/g, '');
            // american express and cvv is 4 digits
            if ((acceptedCreditCards.amex).test(creditCard)) {
                if ((/^\d{4}$/).test(cvv)) {
                    setFieldValid($('#cardSecureId'),true);
                    setTimeout(function(){$('#cardHolderName').focus();},1);
                    return true;
                }
            } else if ((/^\d{3}$/).test(cvv)) { // other card & cvv is 3 digits
                setFieldValid($('#cardSecureId'),true);
                setTimeout(function(){$('#cardHolderName').focus();},1);
                return true;
            }
            setFieldValid($('#cardSecureId'),false);
            return false;
        }
        </script>
    </body>
    
    </html>