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
						<th class="image">ID Order</th>
						<th class="name">Tanggal Order</th>
						<th class="model">Detail Order</th>
						<th class="quantity">Jumlah</th>
						<th class="quantity">Jumlah yg belum di bayar</th>
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
						<td class="quantity">{{($order->status==2 || $order->status==3) ? price(0) : price($order->total)}}</td>
						<td class="price">{{ $order->noResi}}</td>
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

			@if($order->jenisPembayaran==1)
			<div class="cartoptionbox">
				<h4 class="heading4"> Konfirmasi Form </h4>
				
				{{Form::open(array('url'=> 'konfirmasiorder/'.$order->id, 'method'=>'put', 'class'=> 'form-vertical'))}} 
					<fieldset>
						<div class="control-group">
							<label  class="control-label">Nama Pelanggan</label>
							<div class="controls">
								<input type="text" name='nama' value='{{Input::old("nama")}}' required class="input-xlarge">
							</div>
							<label  class="control-label">No. Rekening Pelanggan</label>
							<div class="controls">
								<input type="text" name='noRekPengirim' value='{{Input::old("noRekPengirim")}}' required class="input-xlarge">
							</div>
							<label  class="control-label">Bank Tujuan</label>
							<div class="controls">
								<select name='bank' class="span3">
									<option value=''>-- Pilih Bank Tujuan --</option>
									@foreach ($banktrans as $bank)
									<option value="{{$bank->id}}">{{$bank->bankdefault->nama}} - {{$bank->noRekening}} - A/n {{$bank->atasNama}}</option>
									@endforeach
								</select>
							</div>
							<label  class="control-label">Jumlah Transfer</label>
							<div class="controls">
								<input type="text" name='jumlah' value='{{$order->total}}' required class="input-xlarge">
							</div>
							<input type="submit" value="Konfirmasi Order" class="btn btn-orange">
						</div>
					</fieldset>
				{{Form::close()}}
			</div>
			@endif

			@if($order->jenisPembayaran==2)
				<h3><center>Konfirmasi Pemabayaran Via Paypal</center></h3>
				<p>Silakan melakukan pembayaran dengan paypal Anda secara online via paypal payment gateway. Transaksi ini berlaku jika pembayaran dilakukan sebelum {{$expired}}. Klik tombol "Bayar Dengan Paypal" di bawah untuk melanjutkan proses pembayaran.</p>
				{{$paypalbutton}}
			@elseif($order->jenisPembayaran==6)
	            @if($order->status == 0)
	            <h3><center>Konfirmasi Pembayaran Via Bitcoin</center></h3><br>
	            <p>Silahkan melakukan pembayaran dengan bitcoin Anda secara online via bitcoin payment gateway. Transaksi ini berlaku jika pembayaran dilakukan sebelum <b>{{$expired_bitcoin}}</b>. Klik tombol "Pay with Bitcoin" di bawah untuk melanjutkan proses pembayaran.</p>
	            {{$bitcoinbutton}}
	            <br>
	            @endif
	        @endif
		</div>
	</section>
</div>