<?php
use yii\helpers\Url;

?>
<script>

    function getBank(element){
        var bankId = $(element).val();

        $.get('index.php?r=sd/gl-bank/get-bank',{ bankId : bankId },function(data){
            var data = $.parseJSON(data);
            $(element).parents("tr").find("td:nth-child(4)").find("input").attr('value',data.city_bank);
            $(element).parents("tr").find("td:nth-child(5)").find("input").attr('value',data.name_country);
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
    }
    function delRow<?= $class ?>(id) {
        $('#add-<?= $relID?> tr[data-key=' + id + ']').remove();
    }
</script>
