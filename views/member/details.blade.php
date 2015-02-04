	<div id="maincontainer">
		<section id="product">
			<div class="container">
				<!--  breadcrumb --> 
				<ul class="breadcrumb">
					<li>
						<a href="{{URL::to('/')}}">Home</a>
						<span class="divider">/</span>
					</li>
					<li class="active"> Order History</li>
				</ul>       
				<h1 class="heading1"><span class="maintext"> Order History</span><span class="subtext"> All your order history</span></h1>
				<!-- Cart-->
				<div class="cart-info">
					<table class="table table-striped table-bordered">
						<tr>
							<th class="image">ID Order</th>
							<th class="name">Tanggal Order</th>
							<th class="model">Detail Order</th>
							<th class="quantity">Total Order</th>
							<th class="total">No. Resi </th>
							<th class="price">Status</th>
							<th class="total">Action</th>
						</tr>
						@foreach ($order as $item)	
						<tr>
							<td class="image">{{prefixOrder()}}{{$item->kodeOrder}}</td>
							<td  class="name">{{waktu($item->tanggalOrder)}}</td>
							<td class="model">
							@foreach ($item->detailorder as $detail)
								<li style="margin-left: 8px">{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku->opsi1.($detail->opsisku->opsi2 != '' ? ' / '.$detail->opsisku->opsi2:'').($detail->opsisku->opsi3 !='' ? ' / '.$detail->opsisku->opsi3:'').')':''}} - {{$detail->qty}}</li>
							@endforeach
							</td>
							<td class="quantity">{{ jadiRupiah($item->total)}}</td>
							<td class="price">{{ $item->noResi}}</td>
							<td class="total">
							@if($item->status==0)
								<span class="label label-warning">Pending</span>
							@elseif($item->status==1)
								<span class="label label-important">Konfirmasi diterima</span>
							@elseif($item->status==2)
								<span class="label label-success">Pembayaran diterima</span>
							@elseif($item->status==3)
								<span class="label label-info">Terkirim</span>
							@elseif($item->status==4)
								<span class="label label-default">Batal</span>
							@endif
							</td>
							<td class="total">
								<a href="{{URL::to('konfirmasiorder/'.$item->id)}}"><img style="background:#f25c27;" class="tooltip-test" data-original-title="Update" src="{{URL::to(dirTemaToko().'shopymart/assets/images/update.png')}}" alt=""></a>
								<!-- <a href="#"><img class="tooltip-test" data-original-title="Remove"  src="img/remove.png" alt=""></a> -->
							</td>						 
						</tr>
						@endforeach	
					</table>
				</div>
				
			</div>
		</section>
	</div>