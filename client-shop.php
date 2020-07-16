<?php
    include('header.php');
?>
<div id="client-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
					<h4>Price</h4>
					<input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
                </div>
                <br>
                <div class="list-group">
                    <h4>Categories</h4>
                    <div class="list-group-item">
                        <ul>
                            <li>
                                <a class="category-heading d-flex" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <h6 class="pr-3">Jwellery</h6>
                                    <span><i class="fas fa-caret-down"></i></span>
                                </a>
                                <div class="collapse" id="collapseExample">
                                    <ul class="pl-3">
                                        <li>
                                            <a class="category-heading d-flex" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <h6 class="pr-3">Men</h6>
                                                <span><i class="fas fa-caret-down"></i></span>
                                            </a>
                                            <div class="collapse" id="collapseExample1">
                                                <ul class="pl-3">
                                                    <li>
                                                        <a href="">sccc</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>			
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#price_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
        }
    });
    });
</script>
<div style="position: relative; top: 150px; height: 612px;">
<?php
    include('footer.php');
?>
</div>