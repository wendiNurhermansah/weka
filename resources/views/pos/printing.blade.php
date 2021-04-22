
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Data PDF</title>
    <script>
        window.onload = function() {
            window.print();
        };

    </script>
  </head>
  <body>


                <div class="modal-body" id="BillPrint">
                    <div class="text-center my-4">
                        <h4 class="text-black modal-title font-weight-bold">Simple POS</h4>
                        <p class="text-black modal-title">Order</p>
                    </div>
                    <div class="form-group">
                        <label for="customer" class="">C : </label>
                        <label id="billCustomer" for="billCustomer" class=""></label>
                    </div>
                    <div class="form-group">
                        <label for="note" class="">R : </label>
                        <label for="getNote" class=""></label>
                    </div>
                    <div class="form-group">
                        <label for="pelayan" class="">U : </label>
                        <label for="getPelayan" class="">{{ Auth::user()->username }}</label>
                    </div>
                    <div class="form-group">
                        <label for="date" class="">T : </label>
                        <label for="getDate" class="">{{ date('D d M Y h:i A') }}</label>
                    </div>
                    <table class="table">
                        <tbody id="appendBill">
                        </tbody>
                    </table>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="d-flex">
                                <span>Total Items</span>
                                <span class="ml-auto">
                                    <span id="billJumlahItem"></span>
                                    (<span id="billTotalItem"></span>)
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex">
                                <span>Total</span>
                                <span id="billTotal" class="ml-auto"></span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex">
                                <span>Order Tax</span>
                                <span id="billPajak" class="ml-auto">0</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex">
                                <span>Grand Total</span>
                                <span id="grandTotal" class="ml-auto">0</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex">
                                <span>Rounding</span>
                                <span class="ml-auto">0</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex">
                                <span>Total Payable</span>
                                <span id="billTotalPayable" class="ml-auto"></span>
                            </div>
                        </li>
                    </ul>
                    <div class="m-1 text-center">Merchant Copy</div>
                </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
