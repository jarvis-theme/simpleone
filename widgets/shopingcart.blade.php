    <ul class="nav topcart pull-left">
        <li class="dropdown hover carticon "> <a href="#" class="dropdown-toggle" > Keranjang <span class="label label-orange font14">{{Shpcart::cart()->total_items()}} item(s)</span> - {{ price(Shpcart::cart()->total() )}} <b class="caret"></b></a>
            <ul class="dropdown-menu topcartopen ">
                <li>
                    <table>
                        <tbody>
                        @foreach (Shpcart::cart()->contents() as $key => $cart) 
                            <tr>
                                <td class="image"><a href="{{url('produk/'.Str::slug($cart['name']))}}"><img width="50" height="50" src="{{product_image_url($cart['image'],'thumb')}}" alt="{{$cart['name']}}" title="{{$cart['name']}}"></a></td>
                                <td class="name"><a href="{{url('produk/'.Str::slug($cart['name']))}}">{{short_description($cart['name'],20)}}</a></td>
                                <td class="quantity">x&nbsp;{{ $cart['qty']}}</td>
                                <td class="total">{{price($cart['price'])}}</td>
                                <td class="remove remove-item"><i class="icon-remove"></i></td>
                            </tr>
                        @endforeach 
                        </tbody>
                    </table>
                    <table>
                        <tbody>
                            <tr>
                                <td class="textright"><b>Total:</b></td>
                                <td class="textright">{{ price(Shpcart::cart()->total() )}}</td>
                            </tr>
                        </tbody>
                    </table>
                    @if(Shpcart::cart()->total_items() > 0)
                    <div class="well pull-right buttonwrap">
                        <a class="btn btn-orange" href="{{URL::to('checkout')}}">View Cart</a>
                    </div>
                    @endif
                </li>
            </ul>
        </li>
    </ul>