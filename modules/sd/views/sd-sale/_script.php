<?php
use yii\helpers\Url;

?>
<script>
    var qty = 0;
    var price = 0;
    var lineTotal = 0;
    var lineWeight = 0;
    var weight = 0;
    var freightCost = 0;
    var net = 0;
    var weightTotal = 0;
    var tax = 0;
    var taxTotal = 0;
    var payterm = 0;

    function getFreight(){
        return $('#sdsale-freightcost_sale').val();
    }

    //get item quantity
    function getQty(element){
        qty = $(element).val();
        setLineTotal($(element));
        setLineWeight($(element));
        setTotal($(element));
        setWeighttotal($(element));
    }

    //get item price
    function getPrice(element){
        price = $(element).val();
        setLineTotal($(element));
        setTotal($(element));
    }

    //calculate line total
    function setLineTotal(element){
        lineTotal = qty*price;
        $(element).parents("tr").find("td:nth-child(12)").find("input").attr('value',lineTotal);
    }

    //calculate line weight
    function setLineWeight(element){
        lineWeight = qty*weight;
        $(element).parents("tr").find("td:nth-child(11)").find("input").attr('value',lineWeight);
    }

    //calculate net price
    function setTotal(element){
        var net = 0;
        $('.line-total').each(function(){
            net += parseFloat($(this).val());
        });
        freightCost = getFreight();
        net = parseFloat(net) + parseFloat(freightCost) + ((parseFloat(net) + parseFloat(freightCost))*taxTotal/100) - ((parseFloat(net) + parseFloat(freightCost))*payterm/100);
        $('#sdsale-net_sale').attr('value',net);
    }

    //calculate weight total
    function setWeighttotal(element){
        weightTotal = 0;
        $('.weight-total').each(function(){
            weightTotal += parseFloat($(this).val());
        });
        $('#sdsale-weight_sale').attr('value',weightTotal);
    }

    //calculate tax total
    function setTaxtotal(element){
        taxTotal = 0;
        $('.tax-line').each(function(){
            taxTotal += parseFloat($(this).val());
        });
    }

    function setRule(element){

    }

    //get customer data
    function getCustomer(element){
        var customerId = $(element).val();

        $.get('index.php?r=sd/sd-customer/get-customer',{ customerId : customerId },function(data){
            var data = $.parseJSON(data);
            $('#sdsale-currency_id').select2('val', data.currency_id);
            $('#sdsale-ar_payterm_id').select2('val', data.ar_payterm_id);
            $('#sdsale-sd_ship_id').select2('val', data.sd_ship_id);
        });    
    }

    //get item data
    function getItem(element){
        var itemId = $(element).val();

        $.get('index.php?r=iwm/iwm-item-master/get-data',{ iIn : itemId },function(data){
            var data = $.parseJSON(data);
            $(element).parents("tr").find("td:nth-child(5)").find("input").attr('value',data.item_description);
            $(element).parents("tr").find("td:nth-child(6)").find("select").select2('val',data.uom_id);
            weight = data.item_weight;
            setLineWeight($(element));
            setWeighttotal($(element));
        });
    }

    //get ship data
    function getShip(element){
        var shipId = $(element).val();

        $.get('index.php?r=sd/sd-ship/get-ship',{ shipId : shipId },function(data){
            var data = $.parseJSON(data);
            $('#sdsale-freightcost_sale').attr('value', data.cost_ship);
            freightCost = data.cost_ship;
            setTotal($(element));
        });    
    }

    //get payterm data
    function getPayterm(element){
        var paytermId = $(element).val();

        $.get('index.php?r=ar/ar-payterm/get-payterm',{ paytermId : paytermId },function(data){
            var data = $.parseJSON(data);
            payterm = data.percent_payterm;
            setTotal($(element));
        });    
    }

    //get shipping condition data
    function getShipcon(element){
        var shipconId = $(element).val();

        $.get('index.php?r=sd/sd-shipcondition/get-shipcon',{ shipconId : shipconId },function(data){
            var data = $.parseJSON(data);
        });    
    }

    //get tax data
    function getTax(element){
        var taxId = $(element).val();

        $.get('index.php?r=master/tax/get-tax',{ taxId : taxId },function(data){
            var data = $.parseJSON(data);
            $(element).parents("tr").find("td:nth-child(4)").find("input").attr('value',data.name_tax);
            $(element).parents("tr").find("td:nth-child(5)").find("input").attr('value',data.value_tax);
            $(element).parents("tr").find("td:nth-child(6)").find("select").select2('val',data.currency_id);
            $(element).parents("tr").find("td:nth-child(7)").find("input").attr('value',data.name_country);
            tax = data.value_tax;
            setTaxtotal($(element));
            getFreight();
            setTotal($(element));
        });
    }

    $(function () {
        var data = <?= $value ?>;
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['add-'.$relID]); ?>',
            data: {'<?= $class?>' : data, action : 'load', isNewRecord : <?= $isNewRecord ?>},
            success: function (data) {
                $('#add-<?= $relID?>').html(data);
            }
        });
    });
    function addRow<?= $class ?>() {
        var data = $('#add-<?= $relID?> :input').serializeArray();
        data.push({name: 'action', value : 'add'});
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['add-'.$relID]); ?>',
            data: data,
            success: function (data) {
                $('#add-<?= $relID?>').html(data);
            }
        });
        price = 0;
        qty = 0;
    }
    function delRow<?= $class ?>(id) {
        $('#add-<?= $relID?> tr[data-key=' + id + ']').remove();
        setTotal();
        setWeighttotal();
        setTotal();
    }
</script>
