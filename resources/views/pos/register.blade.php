@push('modal')
    <div class="modal fade" id="register" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
                <div class="modal-header">
                    <h6 class="text-black modal-title">Register Details (Opened at: {{ date('D d M Y h:i A') }})</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Cash Sales :</th>
                                <th class="text-right">{{$saleToday->where('metode','cash')->take(1)->get(['total'])}} ({{$saleAll->where('metode','cash')->sum('total')}})</th>
                            </tr>
                            <tr>
                                <th>Cheque Sales :</th>
                                <th class="text-right">0000</th>
                            </tr>
                            <tr>
                                <th>Credit Card :</th>
                                <th class="text-right">0000</th>
                            </tr>
                            <tr>
                                <th>Gift Card Sales :</th>
                                <th class="text-right">0000</th>
                            </tr>
                            <tr>
                                <th>Stripe :</th>
                                <th class="text-right">0000</th>
                            </tr>
                            <tr>
                                <th>Others :</th>
                                <th class="text-right">0000</th>
                            </tr>
                            <tr>
                                <th>Total Cash :</th>
                                <th class="text-right">{{$saleToday->sum('total')}} ({{$saleAll->sum('total')}})</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endpush