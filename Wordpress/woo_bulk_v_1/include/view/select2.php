<select multiple="multiple" class="select_two" style="width:500px;">
  <?php if($options){ foreach($options as $key=>$val){ ?>  
  <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
  <?php }} else { ?>
  <option value="<?php echo $option; ?>"><?php echo $option; ?></option>
  <?php } ?>
</select>