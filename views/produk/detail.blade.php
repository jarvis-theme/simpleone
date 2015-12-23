    <div id="maincontainer">
        <section id="product">
            <div class="container">      
            <!-- Product Details-->
                <!--  breadcrumb -->
                <ul class="breadcrumb">
                    {{breadcrumbProduk(@$produk,'  <span class="divider">/</span> ;',';', true)}}  
                </ul>
                <div class="row">
                    <!-- Left Image-->
                    <div class="span5">
                        <ul class="thumbnails mainimage">
                            <li class="span5">
                                <a rel="position: 'inside', showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{{product_image_url($produk->gambar1,'large')}}">
                                    <img src="{{product_image_url($produk->gambar1,'medium')}}" alt="{{$produk->nama}} 1">
                                </a>
                            </li>
                            <li class="span5">
                                <a rel="position: 'inside', showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{{product_image_url($produk->gambar2,'large')}}">
                                    <img src="{{product_image_url($produk->gambar2,'medium')}}" alt="{{$produk->nama}} 2">
                                </a>
                            </li>
                            <li class="span5">
                                <a rel="position: 'inside', showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{{product_image_url($produk->gambar3,'large')}}">
                                    <img src="{{product_image_url($produk->gambar3,'medium')}}" alt="{{$produk->nama}} 3">
                                </a>
                            </li>
                            <li class="span5">
                                <a rel="position: 'inside', showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{{product_image_url($produk->gambar4,'large')}}">
                                    <img src="{{product_image_url($produk->gambar4,'medium')}}" alt="{{$produk->nama}} 4">
                                </a>
                            </li>
                        </ul>
                        <span>Mouse move on Image to zoom</span>
                        <ul class="thumbnails mainimage">
                        @if($produk->gambar1!='')
                            <li class="producthtumb">
                                <a class="thumbnail" >
                                    <img src="{{product_image_url($produk->gambar1,'thumb')}}" alt="{{$produk->nama}}-thumb-1" >
                                </a>
                            </li>
                        @endif
                        @if($produk->gambar2!='')
                            <li class="producthtumb">
                                <a class="thumbnail" >
                                    <img src="{{product_image_url($produk->gambar2,'thumb')}}" alt="{{$produk->nama}}-thumb-2" >
                                </a>
                            </li>
                        @endif
                        @if($produk->gambar3!='')
                            <li class="producthtumb">
                                <a class="thumbnail" >
                                    <img src="{{product_image_url($produk->gambar3,'thumb')}}" alt="{{$produk->nama}}-thumb-3" >
                                </a>
                            </li>
                        @endif
                        @if($produk->gambar4!='')
                            <li class="producthtumb">
                                <a class="thumbnail" >
                                    <img src="{{product_image_url($produk->gambar4,'thumb')}}" alt="{{$produk->nama}}-thumb-4" >
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
                                <div class="productprice">
                                    <div class="productpageprice">
                                        <span class="spiral"></span>{{ price($produk->hargaJual) }}
                                    </div>
                                    @if($produk->hargaCoret != 0)
                                    <div class="productpageoldprice">{{ price($produk->hargaCoret) }}</div>
                                    @endif
                                </div>
                                <form action="#" id='addorder'>
                                    <div class="quantitybox">
                                        @if($opsiproduk->count()>0)         
                                            <select class="selectsize" name="opsiproduk">
                                                <option value="">-- Pilih Opsi --</option>
                                                @foreach ($opsiproduk as $key => $opsi)
                                                <option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >                 
                                                    {{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{price($opsi->harga)}}
                                                </option>
                                                @endforeach
                                            </select>
                                        @endif
                                        <label class="checkbox">
                                            Jumlah :
                                            <input class="nofloat" type="text" name="qty" class="selectqty" value="1">
                                        </label>
                                        <div class="clear"></div>
                                    </div>
                                    <ul class="productpagecart">
                                        <li><button class="cart add_cart">Tambah ke Keranjang</button></li>
                                    </ul>
                                </form>
                                <!-- Product Description tab & comments-->
                                <div class="productdesc">
                                    <ul class="nav nav-tabs" id="myTab">
                                        <li class="active"><a href="#description">Description</a></li>
                                        <li><a href="#review">Review</a></li>
                                        <li><a href="#comment">Comment</a></li>
                                        <li><a href="#share">Share</a></li>
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
                                            {{--$fbcomment--}}
                                            {{fbcommentbox(product_url($produk), '100%', '5', 'light')}}
                                        </div>
                                        <div class="tab-pane" id="share">
                                            {{sosialShare(product_url($produk))}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if(count(other_product($produk)) > 0)
        <!--  Related Products-->
        <section id="related" class="row">
            <div class="container">
                <h1 class="heading1"><span class="maintext">Related Products</span><span class="subtext"> See Our Most featured Products</span></h1>
                <ul class="thumbnails">
                @foreach(other_product($produk) as $key => $myproduk)  
                    <li class="span3">
                        <a class="prdocutname" href="{{product_url($myproduk)}}">{{short_description($myproduk->nama,20)}}</a>
                        <div class="thumbnail">
                            <a href="{{product_url($myproduk)}}">{{HTML::image(product_image_url($myproduk->gambar1,'medium'), $myproduk->nama)}}</a>
                            <div class="shortlinks">
                                <a class="details" href="{{product_url($myproduk)}}">DETAILS</a>
                            </div>
                            <div class="pricetag">
                                <span class="spiral"></span>
                                <a href="{{product_url($myproduk)}}" class="productcart">Lihat Produk</a>
                                <div class="price">
                                    <div class="pricenew">{{price($myproduk->hargaJual)}}</div>
                                    @if($myproduk->hargaCoret != 0)
                                    <div class="priceold">{{price($myproduk->hargaCoret)}}</div>
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