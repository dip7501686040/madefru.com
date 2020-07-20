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
                    <input type="hidden" id="hidden_maximum_price" value="30000" />
                    <p id="price_show">0 - 30000</p>
                    <div id="price_range"></div>
                </div>
                <br>
                <div class="list-group">
                    <h4>Categories</h4>
                    <div class="list-group-item">
                        <ul>
                            <li class="pb-1">
                                <h6 id="all" style="cursor: pointer;">All</h6>
                            </li>
                            <?php
                                $cateid = 0;
                                $subcatid = 0;
                                $query1 = "SELECT * FROM category";
                                $result1 = $db_handle->runQuery($query1);
                                if($result1){
                                    while($category = $result1->fetch_assoc()){
                                        $cateid++;
                            ?>
                            <li class="pb-1">
                                <a class="category-heading d-flex" style="cursor: pointer;">
                                    <h6 onclick="category_data('<?php echo $category['category']; ?>');"
                                        <?php
                                          if(isset($_REQUEST['category'])){
                                                if($category['category'] == $_REQUEST['category']){
                                                    echo"id=modal";
                                                }
                                                
                                            }  
                                        ?>
                                    >
                                        <?php echo $category['category']; ?>
                                    </h6>
                                    <span data-toggle="collapse" href="#collapseExample-<?php echo $cateid; ?>" 
                                    role="button" aria-expanded="false" aria-controls="collapseExample-<?php echo $cateid; ?>" style="padding: 0 20px">
                                        <i class="fas fa-caret-down"></i>
                                    </span>
                                </a>
                                <div class="collapse" id="collapseExample-<?php echo $cateid; ?>">
                                    <ul class="pl-4">
                                    <?php
                                        $query2 = "SELECT * FROM subcategory WHERE category = '$category[category]'";
                                        $result2 = $db_handle->runQuery($query2);
                                        if($result2){
                                            while($subcategory = $result2->fetch_assoc()){
                                                $subcatid++;
                                    ?>
                                        <li>
                                            <a class="category-heading d-flex" style="cursor: pointer;">
                                                <h6 onclick="category_data('<?php echo $category['category']; ?>', 
                                                '<?php echo $subcategory['subcategory']; ?>');" style="font-size: 14px; font-weight: 500;"
                                                    <?php
                                                        if(isset($_REQUEST['subcategory'])){
                                                            if($subcategory['subcategory'] == $_REQUEST['subcategory']){
                                                                echo"id=modal";
                                                            }  
                                                        }  
                                                    ?>
                                                >
                                                    <?php echo $subcategory['subcategory']; ?>
                                                </h6>
                                                <span data-toggle="collapse" 
                                                href="#subcollapse-<?php echo $subcatid; ?>" role="button" 
                                                aria-expanded="false" aria-controls="subcollapse-<?php echo $subcatid; ?>" style="padding: 0 20px">
                                                <i class="fas fa-caret-down"></i>
                                            </span>
                                            </a>
                                            <div class="collapse" id="subcollapse-<?php echo $subcatid; ?>">
                                                <ul class="pl-4">
                                                    <?php
                                                        $query3 = "SELECT * FROM subsubcategory WHERE 
                                                        category = '$category[category]' AND 
                                                        subcategory = '$subcategory[subcategory]'";
                                                        $result3 = $db_handle->runQuery($query3);
                                                        if($result3){
                                                            while($subsubcategory = $result3->fetch_assoc()){
                                                    ?>
                                                    <li>
                                                        <a onclick="category_data('<?php echo $category['category']; ?>', 
                                                        '<?php echo $subcategory['subcategory']; ?>', 
                                                        '<?php echo $subsubcategory['subsubcategory']; ?>');" 
                                                        style="cursor: pointer; font-size: 13px;"
                                                          <?php
                                                                if(isset($_REQUEST['subsubcategory'])){
                                                                    if($subsubcategory['subsubcategory'] == $_REQUEST['subsubcategory']){
                                                                        echo"id=modal";
                                                                    }  
                                                                }  
                                                            ?>  
                                                        >
                                                            <?php echo $subsubcategory['subsubcategory']; ?>
                                                        </a>
                                                    </li>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                        </li>
                                    <?php
                                       }
                                    }
                                    ?>
                                    </ul>
                                </div>
                            </li>
                            <?php
                               }
                            }
                            ?>
                        </ul>
                    </div>
                </div>			
            </div>
            <div class="col-md-9">
                <div class="row" id="filter_data">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #loading
{
    position: relative;
    top: 100px;
	left: 300px;
	height: 100px;
}
</style>
<script>
    function category_data(category, subcategory, subsubcategory){
            if(category && !subcategory && !subsubcategory){
                document.getElementById("filter_data").innerHTML = '<img id="loading" src="images/loader.gif"/>';
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("filter_data").innerHTML = this.responseText;
                    }
                };
                xhttp.open("POST", "fetch_client_shop_data.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                xhttp.send("category="+encodeURIComponent(category));
            }
            else if(category && subcategory && !subsubcategory){
                document.getElementById("filter_data").innerHTML = '<img id="loading" src="images/loader.gif"/>';
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("filter_data").innerHTML = this.responseText;
                    }
                };
                xhttp.open("POST", "fetch_client_shop_data.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                xhttp.send("category="+encodeURIComponent(category)+"&subcategory="+encodeURIComponent(subcategory)+"");
            }
            else if(category && subcategory && subsubcategory){
                document.getElementById("filter_data").innerHTML = '<img id="loading" src="images/loader.gif"/>';
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("filter_data").innerHTML = this.responseText;
                    }
                };
                xhttp.open("POST", "fetch_client_shop_data.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("category="+encodeURIComponent(category)+"&subcategory="+encodeURIComponent(subcategory)+"&subsubcategory="+encodeURIComponent(subsubcategory)+"");

            }
            else{
                alert('problem');
            }
        }
    $(document).ready(function(){
        filter_data();

        $("#all").on('click', function(){
            filter_data();
        });
        function filter_data()
        {
            $('#filter_data').html('<img id="loading" src="images/loader.gif"/>');
            var action = 'fetch_data';
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();
            $.ajax({
                url:"fetch_client_shop_data.php",
                method:"POST",
                data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price},
                success:function(data){
                    $('#filter_data').html(data);
                }
            });
        }

        $('#price_range').slider({
            range:true,
            min:0,
            max:30000,
            values:[0, 30000],
            step:100,
            stop:function(event, ui)
            {
                $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_price').val(ui.values[0]);
                $('#hidden_maximum_price').val(ui.values[1]);
                filter_data();
            }
        });
    });
jQuery(function(){
   jQuery('#modal').click();
});
</script>
<div id="client-shop-footer" style="position: relative; top: 150px; height: 612px;">
<?php
    include('footer.php');
?>
</div>