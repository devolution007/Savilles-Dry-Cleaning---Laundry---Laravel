@foreach($services as $service)
                                                    <div class="prc-item">                                                      
                                                        <div class="left">
                                                            <h4>{{$service->title}}</h4>
                                                            <h5>{{$service->description}}</h5>
                                                        </div>
                                                        <div class="right">
                                                            <p>&#163;{{$service->price}}</p>
                                                        </div>
                                                    </div>
                                                    @endforeach