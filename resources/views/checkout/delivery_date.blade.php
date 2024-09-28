


@for($i = 1; $i <= 30; $i++) @if(count($offdays)> 0)

    @if(!in_array($date->format('D'),$offdays))
    <option value="{{$date->toDateString()}}" @if(!empty($order) && $order->delivery_date == $date->toDateString()) selected @endif >{{$date->format('D, d M')}}</option>
    @endif
    @else
                                                        <option value="{{$date->toDateString()}}" @if(!empty($order) && $order->delivery_date == $date->toDateString()) selected @endif >{{$date->format('D, d M')}}</option>

    @endif

    @php
    $date = $date->addDays(1);
    @endphp
    @endfor