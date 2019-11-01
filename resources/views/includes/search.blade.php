 <div class="search-row-wrapper" style="background-image: url({{asset('images/bg2.jpg')}})">
        <div class="inner">
            <div class="container ">
                <form action="{{route('search')}}" method="GET">
                <div class="row search-row animated fadeInUp">
                    <div class="col-xl-8 col-sm-8 search-col relative locationicon">
                        <i class="icon-location-2 icon-append"></i>
                        <input type="text" value="{{session('keyword')}}" name="query" id="autocomplete-ajax"
                            class="form-control locinput input-rel searchtag-input has-icon" placeholder="Search food or menu..."
                            value="" autocomplete="off">
                
                    </div>
                    <div class="col-xl-4 col-sm-4 search-col">
                        <button type="submit" class="btn btn-block btn-search  btn-gradient"><i
                                class="icon-search"></i><strong>Refine Search</strong></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>