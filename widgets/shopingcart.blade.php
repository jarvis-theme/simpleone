    <ul class="nav topcart pull-left">
        <li class="dropdown hover carticon "> <a href="#" class="dropdown-toggle" > Keranjang <span class="label label-orange font14">{{Shpcart::cart()->total_items()}} item(s)</span> - {{ jadiRupiah(Shpcart::cart()->total() )}} <b class="caret"></b></a>
            <ul class="dropdown-menu topcartopen ">
                <li>
                    <table>
                        <tbody>
                        @foreach (Shpcart::cart()->contents() as $key => $cart) 
                            <tr>
                                <td class="image"><a href="#"><img width="50" height="50" src="{{URL::to(getPrefixDomain().'/produk/'.$cart['image'])}}" alt="product" title="product"></a></td>
                                <td class="name"><a href="#">{{$cart['name']}}</a></td>
                                <td class="quantity">x&nbsp;{{ $cart['qty']}}</td>
                                <td class="total">{{jadiRupiah($cart['price'])}}</td>
                                <td class="remove"><i class="icon-remove"></i></td>
                            </tr>
                        @endforeach 
                        </tbody>
                    </table>
                    <table>
                        <tbody>
                            <tr>
                                <td class="textright"><b>Total:</b></td>
                                <td class="textright">{{ jadiRupiah(Shpcart::cart()->total() )}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="well pull-right buttonwrap">
                        <a class="btn btn-orange" href="{{URL::to('checkout')}}">View Cart</a>
                    </div>
                </li>
            </ul>
        </li>
    </ul>