	<div id="maincontainer">
		<section id="product">
			<div class="container">      
			<!-- Product Details-->
				<!--  breadcrumb -->
				<ul class="breadcrumb">
					<li>
						<a href="{{URL::to('/')}}">Home</a>
						<span class="divider">/</span>
					</li>
					<li class="active">Detail Produk</li>
				</ul>
				<div class="row">
					<!-- Left Image-->
					<div class="span5">
						<ul class="thumbnails mainimage">
							<li class="span5">
								<a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar1)}}">
									<img src="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar1)}}" alt="" title="">
								</a>
							</li>
							<li class="span5">
								<a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar2)}}">
									<img  src="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar2)}}" alt="" title="">
								</a>
							</li>
							<li class="span5">
								<a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar3)}}">
									<img src="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar3)}}" alt="" title="">
								</a>
							</li>
							<li class="span5">
								<a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar4)}}">
									<img  src="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar4)}}" alt="" title="">
								</a>
							</li>
						</ul>
						<span>Mouse move on Image to zoom</span>
						<ul class="thumbnails mainimage">
						@if($produk->gambar1!='')
							<li class="producthtumb">
								<a class="thumbnail" >
									<img  src="{{URL::to(getPrefixDomain().'/produk/thumb/'.$produk->gambar1)}}" alt="" title="">
								</a>
							</li>
						@endif
						@if($produk->gambar2!='')
							<li class="producthtumb">
								<a class="thumbnail" >
									<img  src="{{URL::to(getPrefixDomain().'/produk/thumb/'.$produk->gambar2)}}" alt="" title="">
								</a>
							</li>
						@endif
						@if($produk->gambar3!='')
							<li class="producthtumb">
								<a class="thumbnail" >
									<img  src="{{URL::to(getPrefixDomain().'/produk/thumb/'.$produk->gambar3)}}" alt="" title="">
								</a>
							</li>
						@endif
						@if($produk->gambar4!='')
							<li class="producthtumb">
								<a class="thumbnail" >
									<img  src="{{URL::to(getPrefixDomain().'/produk/thumb/'.$produk->gambar4)}}" alt="" title="">
								</a>
							</li>
						@endif
						</ul>
					</div>
					<!-- Right Details-->
					<div class="span7">
						<div class="row">
							<div class="span7">
								<h1 class="productname"><span class="bgnone">{{$produk->nama}}</span></h1>
								<div class="productname">
									<iframe src="//www.facebook.com/plugins/share_button.php?href={{URL::to(slugProduk($produk))}}&amp;layout=button" scrolling="no" frameborder="0" style="border:none; overflow:hidden;height:20px;width:75px;" allowTransparency="true"></iframe>
									<a class="twitter-share-button" href="https://twitter.com/share" data-count="none">Tweet </a>
									<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
								</div>
								<div class="productprice">
									<div class="productpageprice">
										<span class="spiral"></span>{{ jadiRUpiah($produk->hargaJual) }}
									</div>
									@if($produk->hargaCoret != 0)
									<div class="productpageoldprice">{{ jadiRUpiah($produk->hargaCoret) }}</div>
									@endif
								</div>
								<form action="#" id='addorder'>
									<div class="quantitybox">
										@if($opsiproduk->count()>0)         
											<select class="selectsize" name="opsiproduk">
												<option value="">-- Pilih Opsi --</option>
												@foreach ($opsiproduk as $key => $opsi)
												<option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >					
													{{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{jadiRupiah($opsi->harga)}}
												</option>
												@endforeach
											</select>
										@endif
										<label class="checkbox">
											Jumlah :
											<input style="float:none" type="text" name="qty" class="selectqty" value="1">
										</label>
										<div class="clear"></div>
									</div>
									<ul class="productpagecart">
										<li><button class="cart add_cart" type=''>Tambah ke Keranjang</button></li>
									</ul>
								</form>
								<!-- Product Description tab & comments-->
								<div class="productdesc">
									<ul class="nav nav-tabs" id="myTab">
										<li class="active"><a href="#description">Description</a></li>
										<li><a href="#review">Review</a></li>
										<li><a href="#comment">Comment</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="description">
											{{$produk->deskripsi}}
										</div>
										<div class="tab-pane" id="review">
						        			{{pluginTrustklik()}}
										</div>
										<div class="tab-pane" id="comment">
											{{$fbscript}}
											{{$fbcomment}}
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		@if(count($produklain) > 0)
		<!--  Related Products-->
		<section id="related" class="row">
			<div class="container">
				<h1 class="heading1"><span class="maintext">Related Products</span><span class="subtext"> See Our Most featured Products</span></h1>
				<ul class="thumbnails">
				@foreach($produklain as $key => $myproduk)	
					<li class="span3">
						<a class="prdocutname" href="product.html">{{$myproduk->nama}}</a>
						<div class="thumbnail">
							<a href="{{slugProduk($myproduk)}}">{{HTML::image(getPrefixDomain().'/produk/'.$myproduk->gambar1, $myproduk->nama)}}</a>
							<div class="shortlinks">
								<a class="details" href="{{slugProduk($myproduk)}}">DETAILS</a>
							</div>
							<div class="pricetag">
								<span class="spiral"></span>
								<a href="{{slugProduk($myproduk)}}" class="productcart">Lihat Produk</a>
								<div class="price">
									<div class="pricenew">{{jadiRupiah($myproduk->hargaJual)}}</div>
									@if($myproduk->hargaCoret != 0)
									<div class="priceold">{{jadiRupiah($myproduk->hargaCoret)}}</div>
									@endif
								</div>
							</div>
						</div>
					</li>
				@endforeach	
				</ul>
			</div>
		</section>
		@endif
	</div>