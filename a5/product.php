<?php
function product($productname, $productprice, $productimg, $productid, $brand){
$product="
<div class=\"col-lg-4 col-sm-4 $brand\">
    <form method=\"post\" action=\"productdetail.php\">
        <div class=\"single_product_item\">
            <div>
                <img src=\"$productimg\" alt=\"\" class=\"img-fluid\">
                    <h3 style=\"text-align:center\"><input style=\"width:100%\"type=\"submit\" class=\"link-button\" name=\"detail\" value=\"$productname\"></h3>
                    <p style=\"text-align:center\">$ $productprice</p>
            </div>
            <input type=\"hidden\" name=\"productid\" value=\"$productid\">
        </div>
    </form>
</div>
";
echo $product;
}
?>