<?php
//[id] => 291
//[bonus_type] => main_bonus
//[bonus_for_id] => 61
//[affiliate_link] => /visit/drip_casino/main_bonus
//[first_line] => Drip casino first line
//[second_line] => Drip casino second line
//[description] => This is random description about this bonus
//[promo_code] => XQC
//[bonus_value] => 500
//[free_spins_value] => 100
//[start_date] => Carbon\Carbon Object
//[end_date] => Carbon\Carbon Object
?>

<div class="border border-[#eeeeee] p-4">
    <div>
        <?php echo $args['bonus_type']; ?>
    </div>

    <div>
        <?php echo $args['first_line']; ?>
    </div>

    <div>
        <?php echo $args['second_line']; ?>
    </div>

    <div>
        <?php echo $args['description']; ?>
    </div>

    <div>
        <?php echo $args['promo_code']; ?>
    </div>
</div>