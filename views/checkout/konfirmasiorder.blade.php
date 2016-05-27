<div id="maincontainer">
	<section id="product">
		<div class="container">
			<!--  breadcrumb -->
			<ul class="breadcrumb">
				<li>
					<a href="{{URL::to('/')}}">Home</a>
					<span class="divider">/</span>
				</li>
				<li class="active"> Konfirmasi Order</li>
			</ul>
			<h1 class="heading1"><span class="maintext"> Order History</span><span class="subtext"> All your order history</span></h1>
			<!-- Cart-->
			<div class="cart-info">
				<table class="table table-striped table-bordered">
					<tr>
						<th class="image">Kode Order</th>
						<th class="name">Tanggal Order</th>
						<th class="model">Detail Order</th>
						<th class="quantity">Jumlah</th>
						@if($checkouttype != 1)
						<th class="quantity">Jumlah yg belum di bayar</th>
						@endif
						<th class="total">No. Resi </th>
						<th class="price">Status</th>
						<!-- <th class="total">Action</th> -->
					</tr>
					<tr>
						<td class="image">{{prefixOrder().$order->kodeOrder}}</td>
						<td  class="name">{{waktu($order->tanggalOrder)}}</td>
						<td class="model">
						@foreach ($order->detailorder as $detail)
							<li class="detailorder">{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku->opsi1.($detail->opsisku->opsi2 != '' ? ' / '.$detail->opsisku->opsi2:'').($detail->opsisku->opsi3 !='' ? ' / '.$detail->opsisku->opsi3:'').')':''}} - {{$detail->qty}}</li>
						@endforeach
						</td>
						<td class="quantity">{{ price($order->total)}}</td>
						@if($checkouttype != 1)
						<td class="quantity">{{($order->status==2 || $order->status==3) ? price(0) : '- '.price($order->total)}}</td>
						@endif
						<td class="price">{{ $order->noResi }}</td>
						<td class="total">
						@if($order->status==0)
							<span class="label label-warning">Pending</span>
						@elseif($order->status==1)
							<span class="label label-important">Konfirmasi diterima</span>
						@elseif($order->status==2)
							<span class="label label-info">Pembayaran diterima</span>
						@elseif($order->status==3)
							<span class="label label-info">Terkirim</span>
						@elseif($order->status==4)
							<span class="label label-info">Batal</span>
						@endif
						</td>
						<!-- <td class="total"> <a href="{{URL::to('konfirmasiorder/'.$order->id)}}"><img style="background:#f25c27;" class="tooltip-test" data-original-title="Update" src="{{URL::to(dirTemaToko().'shopymart/assets/images/update.png')}}" alt=""></a> -->
							<!-- <a href="#"><img class="tooltip-test" data-original-title="Remove"  src="img/remove.png" alt=""></a>
						</td> -->
					</tr>
				</table>
			</div>

			@if($paymentinfo!=null)
			<h3><center>Paypal Payment Details</center></h3>
			<hr>
			<table class='table table-bordered'>
				<tr>
					<td>Payment Status</td><td>:</td><td>{{$paymentinfo['payment_status']}}</td>
				</tr>

				<tr>
					<td>Payment Date</td><td>:</td><td>{{$paymentinfo['payment_date']}}</td>
				</tr>

				<tr>
					<td>Address Name</td><td>:</td><td>{{$paymentinfo['address_name']}}</td>
				</tr>

				<tr>
					<td>Payer Email</td><td>:</td><td>{{$paymentinfo['payer_email']}}</td>
				</tr>

				<tr>
					<td>Item Name</td><td>:</td><td>{{$paymentinfo['item_name1']}}</td>
				</tr>

				<tr>
					<td>Receiver Email</td><td>:</td><td>{{$paymentinfo['receiver_email']}}</td>
				</tr>

				<tr>
					<td>Total Payment</td><td>:</td><td>{{$paymentinfo['payment_gross']}} {{$paymentinfo['mc_currency']}}</td>
				</tr>
			</table>
			<p>Thanks you for your order.</p>
			@endif  

			@if($order->jenisPembayaran == 1 && $order->status == 0)
			<div class="cartoptionbox">
				<h4 class="heading4"> {{trans('content.step5.confirm_btn')." ".trans('content.step3.transfer')}} </h4>
				
				{{Form::open(array('url'=> 'konfirmasiorder/'.$order->id, 'method'=>'put', 'class'=> 'form-vertical'))}} 
					<fieldset>
						<div class="control-group">
							<label class="control-label">Nama Pelanggan</label>
							<div class="controls">
								<input type="text" name="nama" value="{{Input::old('nama')}}" class="input-xlarge" required>
							</div>
							<label class="control-label">No. Rekening Pelanggan</label>
							<div class="controls">
								<input type="text" name="noRekPengirim" value="{{Input::old('noRekPengirim')}}" class="input-xlarge" required>
							</div>
							<label class="control-label">Bank Tujuan</label>
							<div class="controls">
								<select name="bank" class="span3">
									<option value="">-- Pilih Bank Tujuan --</option>
									@foreach ($banktrans as $bank)
									<option value="{{$bank->id}}">{{$bank->bankdefault->nama}} - {{$bank->noRekening}} - A/n {{$bank->atasNama}}</option>
									@endforeach
								</select>
							</div>
							<label class="control-label">Jumlah Transfer</label>
							<div class="controls">
								<input type="text" name="jumlah" value="{{$order->total}}" required class="input-xlarge">
							</div>
							<input type="submit" value="{{trans('content.step5.confirm_btn')}}" class="btn btn-orange">
						</div>
					</fieldset>
				{{Form::close()}}
			</div>
			@endif

			@if($order->jenisPembayaran==2)
                <center>
                    <h2><b>{{trans('content.step5.confirm_btn')}} Paypal</b></h2><hr>
                    <p>{{trans('content.step5.paypal')}}</p>
                </center><br>
                <center id="paypal">{{$paypalbutton}}</center>
                <br>
            @elseif($order->jenisPembayaran==4) 
                @if(($checkouttype==1 && $order->status < 2) || ($checkouttype==3 && ($order->status!=6)))
                <center>
                    <h2><b>{{trans('content.step5.confirm_btn')}} iPaymu</b></h2><hr>
                    <p>{{trans('content.step5.ipaymu')}}</p><br>
                    <a class="btn-pay" href="{{url('ipaymu/'.$order->id)}}" target="_blank">{{trans('content.step5.ipaymu_btn')}}</a>
                    <br>
                </center>
                @endif
            @elseif($order->jenisPembayaran==5 && $order->status == 0)
                <center>
                    <h2><b>{{trans('content.step5.confirm_btn')}} DOKU MyShortCart</b></h2><hr>
                    <p>{{trans('content.step5.doku')}}</p><br>
                    {{ $doku_button }}
                    <br>
                </center>
            @elseif($order->jenisPembayaran == 6 && $order->status == 0)
                <center>
                    <h2><b>{{trans('content.step5.confirm_btn')}} Bitcoin</b></h2><hr>
                    <p>{{trans('content.step5.bitcoin')}}</p><br>
                    {{$bitcoinbutton}}
                    <br>
                </center>
            @elseif($order->jenisPembayaran == 8 && $order->status == 0)
                <center>
                    <h2><b>{{trans('content.step5.confirm_btn')}} Veritrans</b></h2><hr>
                    <p>{{trans('content.step5.veritrans')}}</p><br>
                    <button class="btn-pay" onclick="location.href='{{ $veritrans_payment_url }}'">{{trans('content.step5.veritrans_btn')}}</button>
                    <br>
                </center>
            @endif
		</div>
	</section>
</div>