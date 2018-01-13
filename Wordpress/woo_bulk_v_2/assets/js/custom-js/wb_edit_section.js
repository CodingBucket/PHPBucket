jQuery(document).ready(function(){

    /* Bulk Edit Section */
    
    // Main Drop-down for bulk section
    jQuery(".product_bulk_edit").change(function (){
        var select_option = jQuery(this).val();
        
        if(select_option == 'bulk_name'){
            var len = jQuery('.show_edit_section').find('.name_bulk_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.name_bulk_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#name_bulk_block').css('display','inline-block');
                show_filter_block.find('.name_bulk_block').css('display','block');
                jQuery('.show_edit_section').append(show_filter_block);
            }
        } else if (select_option == 'bulk_short_des') {
            var len = jQuery('.show_edit_section').find('.short_des_bulk_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.short_des_bulk_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#short_des_bulk_block').css('display','inline-block');
                show_filter_block.find('.short_des_bulk_block').css('display','block');
                jQuery('.show_edit_section').append(show_filter_block);
            }
        }  else if (select_option == 'bulk_long_des') {
            var len = jQuery('.show_edit_section').find('.long_des_bulk_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.long_des_bulk_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#long_des_bulk_block').css('display','inline-block');
                show_filter_block.find('.long_des_bulk_block').css('display','block');
                jQuery('.show_edit_section').append(show_filter_block);
            }
        } else if (select_option == 'bulk_price') {
            var len = jQuery('.show_edit_section').find('.price_bulk_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.price_bulk_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#price_bulk_block').css('display','inline-block');
                show_filter_block.find('.price_bulk_block').css('display','block');
                jQuery('.show_edit_section').append(show_filter_block);
            }
        } else if (select_option == 'bulk_sale_price') {
            var len = jQuery('.show_edit_section').find('.sale_price_bulk_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.sale_price_bulk_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#sale_price_bulk_block').css('display','inline-block');
                show_filter_block.find('.sale_price_bulk_block').css('display','block');
                jQuery('.show_edit_section').append(show_filter_block);
            }
        }  else if (select_option == 'bulk_attribute') {
            var len = jQuery('.show_edit_section').find('.attribute_bulk_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.attribute_bulk_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#attribute_bulk_block').css('display','inline-block');
                show_filter_block.find('.attribute_bulk_block').css('display','block');
                jQuery('.show_edit_section').append(show_filter_block);
            }
        }  else if (select_option == 'bulk_variation') {
            var len = jQuery('.show_edit_section').find('.variation_bulk_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.variation_bulk_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#variation_bulk_block').css('display','inline-block');
                show_filter_block.find('.variation_bulk_block').css('display','block');
                jQuery('.show_edit_section').append(show_filter_block);
            }
        } else if (select_option == 'bulk_category') {
            var len = jQuery('.show_edit_section').find('.category_bulk_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.category_bulk_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#category_bulk_block').css('display','inline-block');
                show_filter_block.find('.category_bulk_block').css('display','block');
                jQuery('.show_edit_section').append(show_filter_block);
            }
        } else if (select_option == 'bulk_tag') {
            var len = jQuery('.show_edit_section').find('.tag_bulk_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.tag_bulk_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#tag_bulk_block').css('display','inline-block');
                show_filter_block.find('.tag_bulk_block').css('display','block');
                jQuery('.show_edit_section').append(show_filter_block);
            }
        } else if (select_option == 'bulk_weight') {
            var len = jQuery('.show_edit_section').find('.weight_bulk_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.weight_bulk_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#weight_bulk_block').css('display','inline-block');
                show_filter_block.find('.weight_bulk_block').css('display','block');
                jQuery('.show_edit_section').append(show_filter_block);
            }
        } else if (select_option == 'bulk_height') {
            var len = jQuery('.show_edit_section').find('.height_bulk_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.height_bulk_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#height_bulk_block').css('display','inline-block');
                show_filter_block.find('.height_bulk_block').css('display','block');
                jQuery('.show_edit_section').append(show_filter_block);
            }
        } else if (select_option == 'bulk_width') {
            var len = jQuery('.show_edit_section').find('.width_bulk_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.width_bulk_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#width_bulk_block').css('display','inline-block');
                show_filter_block.find('.width_bulk_block').css('display','block');
                jQuery('.show_edit_section').append(show_filter_block);
            }
        } else if (select_option == 'bulk_depth') {
            var len = jQuery('.show_edit_section').find('.depth_bulk_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.depth_bulk_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#depth_bulk_block').css('display','inline-block');
                show_filter_block.find('.depth_bulk_block').css('display','block');
                jQuery('.show_edit_section').append(show_filter_block);
            }
        } else if (select_option == 'bulk_sku') {
            var len = jQuery('.show_edit_section').find('.sku_bulk_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.sku_bulk_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#sku_bulk_block').css('display','inline-block');
                show_filter_block.find('.sku_bulk_block').css('display','block');
                jQuery('.show_edit_section').append(show_filter_block);
            }
        } else if (select_option == 'bulk_stock') {
            var len = jQuery('.show_edit_section').find('.stock_bulk_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.stock_bulk_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#stock_bulk_block').css('display','inline-block');
                show_filter_block.find('.stock_bulk_block').css('display','block');
                jQuery('.show_edit_section').append(show_filter_block);
            }
        }  else if (select_option == 'bulk_shipping_class') {
            var len = jQuery('.show_edit_section').find('.stock_bulk_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.shipping_class_bulk_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#shipping_bulk_block').css('display','inline-block');
                show_filter_block.find('.shipping_bulk_block').css('display','block');
                jQuery('.show_edit_section').append(show_filter_block);
            }
        } else {
            
        }
        
        var len = jQuery(".bulk_edit_section > div:visible").length;
        if(len > 0){
           jQuery('.first_edit_criteria').hide();
           jQuery('.second_edit_criteria').show();
        } else {
           jQuery('.second_edit_criteria').hide();
           jQuery('.first_edit_criteria').show();
        }
        
    }); 
    
    // Add Button for edit section
    jQuery('body').delegate('.add_new_drop_bulk','click', function(e){
        e.preventDefault();
        var b = jQuery(this).attr('data-block');
        var block = '#'+b+'_bulk_block';
        var block_class = '.'+b+'_bulk_block';
        var new_block = jQuery(block).clone();
        
        // counting elements (max 4)
        var len = jQuery(block_class+" > div").length;
        if(len < 5){      
            new_block.find('.left_level').empty();  
            new_block.find('.left_level').text('AND');
            new_block.find('.remove_block').remove(); 

            new_block.removeAttr('id');
            new_block.find('.first-input').hide();  
            new_block.find('.second-input').remove();  
            new_block.find('.terms').remove(); 
            new_block.find('.bulk_variation_term').remove(); 
            new_block.find('.between').remove();
            new_block.find('.bulk_attribute_terms').empty();           
            new_block.find('.bulk_category').empty();           
            new_block.find('.bulk_update_increase').hide();           
            new_block.find('.bulk_update_availibility').hide();           
            new_block.find('.variation_bulk_update_price').hide();           
            new_block.find('.variation_bulk_update_sale_price').hide();           
            
            var block_cls = block_class+' .bulk_block';
            jQuery(block_cls).css('display','block');
            new_block.css('display','inline-block');
            new_block.css('margin-left','53px');
            new_block.find('.left_level').css('width','73px');

            jQuery(this).before(new_block);
            jQuery(block_class).children().last().show();
            
            if(len == '4'){
                jQuery(block_class+'_main').find('.add_new_drop_bulk').hide('slow');
            } 
        } else {
                          
        }
    });
    
    // Remove Button for edit section
    jQuery('body').delegate('.remove_new_drop_bulk','click', function(e){
		
        e.preventDefault();
        var b = jQuery(this).attr('data-block');
        var block_id = '#'+b+'_bulk_block';
        var block_class = '.'+b+'_bulk_block';
        
        // Removing block and make the last div inline-block
        var this_div = jQuery(this).parent('.bulk_block').parent();
        jQuery(this).closest('.bulk_block').remove();
        this_div.find('.add_new_drop_bulk').prev('.bulk_block').css('display','inline-block');
        
        // Change left text
        var left_text = this_div.attr('data-name');
        this_div.find('.remove_bulk_block').next('.bulk_block').find('.left_level').empty().text(left_text);
        this_div.find('.remove_bulk_block').next('.bulk_block').css('margin-left','');
        this_div.find('.remove_bulk_block').next('.bulk_block').find('.left_level').css('font-weight','bold');
        
        // Removing Add plus button
        var len = jQuery(block_class+" > div:visible").length;
        if(len < 1){ 
            jQuery(block_class+'_main').hide();
            this_div.parent(block_class+'_main').remove();
        }
        if(len < 4){
            jQuery(block_class+'_main').find('.add_new_drop_bulk').show('slow');
        }
    });  
    
    // Remove the full bulk block in the edit section 
    jQuery('body').delegate('.remove_bulk_block','click', function(e){
        var b = jQuery(this).attr('data-block');
        var block_class = '.'+b;
        jQuery(this).closest(block_class).remove();
    });
    
    // Add input after drop in edit section
    jQuery('body').delegate('.bulk_block_brop', "change", function(e) {
        e.preventDefault();
        var val = jQuery(this).val();
        var v = jQuery(this).val();
        
        switch (val){
            
            case '':
            case 'shipping_class_bulk_add':
            case 'shipping_class_bulk_remove':
            case 'shipping_class_bulk_set_new':
                // Placing drop for Bulk shipping class 
                var e = jQuery(this).closest('.bulk_block').find('.select_category').length;
                var ts = jQuery(this).closest('.bulk_block');
                console.log(v);
                if(e == '0'){
                    jQuery.ajax({
                        type : "post",
                        dataType : "json",
                        url : myAjax.ajaxurl,
                        data : {action: "get_shipping_class"},
                        success: function(response) {  
                            console.log(response);
                            var s = jQuery('<select multiple="multiple" style="margin-left:5px;width:500px;" class="term select_category" name="'+ v +'_value[]"  />');                           
                            for(var val in response) {
                                jQuery('<option />', {value: val, text: val}).appendTo(s);
                            }
                            jQuery(ts).find('.bulk_shipping_class').append(s);
                            jQuery(ts).find('.bulk_shipping_class input').css('box-shadow','none');
                            jQuery('.select_category').select2();
                        }
                    });
                }
                
                break;
                
            case 'category_bulk_add':
            case 'category_bulk_remove':
            case 'category_bulk_set_new':
                // Placing drop for Bulk category 
                var e = jQuery(this).closest('.bulk_block').find('.select_category').length;
                var ts = jQuery(this).closest('.bulk_block');
                console.log(v);
                if(e == '0'){
                    jQuery.ajax({
                        type : "post",
                        dataType : "json",
                        url : myAjax.ajaxurl,
                        data : {action: "get_product_category"},
                        success: function(response) {  
                            console.log(response);
                            var s = jQuery('<select multiple="multiple" style="margin-left:5px;width:500px;" class="term select_category" name="'+ v +'_value[]"  />');                           
                            for(var val in response) {
                                jQuery('<option />', {value: val, text: val}).appendTo(s);
                            }
                            jQuery(ts).find('.bulk_category').append(s);
                            jQuery(ts).find('.bulk_category input').css('box-shadow','none');
                            jQuery('.select_category').select2();
                        }
                    });
                }
                
                break;
                
            case 'tag_bulk_add':
            case 'tag_bulk_remove':
            case 'tag_bulk_set_new':
                // Placing drop for Bulk category 
                var e = jQuery(this).closest('.bulk_block').find('.select_category').length;
                var ts = jQuery(this).closest('.bulk_block');
                if(e == '0'){
                    jQuery.ajax({
                        type : "post",
                        dataType : "json",
                        url : myAjax.ajaxurl,
                        data : {action: "get_product_tag"},
                        success: function(response) {  
                            console.log(response);
                            var s = jQuery('<select multiple="multiple" style="margin-left:5px;width:500px;" class="term select_category" name="'+ v +'_value[]"  />');                           
                            for(var val in response) {
                                jQuery('<option />', {value: val, text: val}).appendTo(s);
                            }
                            jQuery(ts).find('.bulk_tag').append(s);
                            jQuery(ts).find('.bulk_tag input').css('box-shadow','none');
                            jQuery('.select_category').select2();
                        }
                    });
                }
                
                break;    
            
            case 'variation_bulk_stock':
                var modification_type = jQuery(this).closest('.bulk_block').find('.modification_type').val();
                if(modification_type == 'variation_bulk_add'){
                    // Showing percentage drop
                    var ts = jQuery(this).closest('.bulk_block');
                    jQuery(ts).find('.bulk_update_increase').show();
                    jQuery(ts).find('.bulk_update_increase').css('display','inline-block');
                    jQuery(ts).find('.bulk_update_increase').find('.variation_input').remove();

                    // Showing first input
                    var t = jQuery(this).closest('.bulk_block').find('.first-input:visible'); 
                    if(t.length < 1){
                        jQuery(this).closest('.bulk_block').find('.first-input').show();                     
                    }
                } else if (modification_type == 'variation_bulk_set_new')  {
                    // Showing first input
                    var t = jQuery(this).closest('.bulk_block').find('.first-input:visible'); 
                    if(t.length < 1){
                        jQuery(this).closest('.bulk_block').find('.first-input').show();                     
                    }
                } else if (modification_type == 'variation_bulk_remove') {
                    // do nothing.
                } else {
                    // do nothing.
                }
            
                break;
                
            case 'variation_bulk_price':                    
                var modification_type = jQuery(this).closest('.bulk_block').find('.modification_type').val();
                if(modification_type == 'variation_bulk_add'){
                    // Showing percentage drop
                    var ts = jQuery(this).closest('.bulk_block');
                    jQuery(ts).find('.variation_bulk_update_price').show();
                    jQuery(ts).find('.variation_bulk_update_price').css('display','inline-block');

                    // Showing first input
                    var t = jQuery(this).closest('.bulk_block').find('.first-input:visible'); 
                    if(t.length < 1){
                        jQuery(this).closest('.bulk_block').find('.first-input').show();                     
                    }
                } else if (modification_type == 'variation_bulk_set_new')  {
                    // Showing first input
                    var t = jQuery(this).closest('.bulk_block').find('.first-input:visible'); 
                    if(t.length < 1){
                        jQuery(this).closest('.bulk_block').find('.first-input').show();                     
                    }
                } else if (modification_type == 'variation_bulk_remove') {
                    // do nothing.
                } else {
                    // do nothing.
                }
            
                break; 
            
            case 'variation_bulk_sale_price':
                var modification_type = jQuery(this).closest('.bulk_block').find('.modification_type').val();
                if(modification_type == 'variation_bulk_add'){
                    // Showing percentage drop
                    var ts = jQuery(this).closest('.bulk_block');
                    jQuery(ts).find('.variation_bulk_update_sale_price').show();
                    jQuery(ts).find('.variation_bulk_update_sale_price').css('display','inline-block');

                    // Showing first input
                    var t = jQuery(this).closest('.bulk_block').find('.first-input:visible'); 
                    if(t.length < 1){
                        jQuery(this).closest('.bulk_block').find('.first-input').show();                     
                    }
                } else if (modification_type == 'variation_bulk_set_new')  {
                    // Showing first input
                    var t = jQuery(this).closest('.bulk_block').find('.first-input:visible'); 
                    if(t.length < 1){
                        jQuery(this).closest('.bulk_block').find('.first-input').show();                     
                    }
                } else if (modification_type == 'variation_bulk_remove') {
                    // do nothing.
                } else {
                    // do nothing.
                }    
            
                break; 
            
            case 'variation_bulk_availibility':
                var modification_type = jQuery(this).closest('.bulk_block').find('.modification_type').val();
                if(modification_type == 'variation_bulk_add' || modification_type == 'variation_bulk_set_new'){
                    // Showing availibility drop
                    var ts = jQuery(this).closest('.bulk_block');
                    jQuery(ts).find('.bulk_update_availibility').show();
                    jQuery(ts).find('.bulk_update_availibility').css('display','inline-block');
                    //jQuery(ts).find('.bulk_update_increase').find('.variation_input').remove();
                } else if (modification_type == 'variation_bulk_remove'){
                    // do nothing
                } else {
                    // do nothing
                }
               break
            
            case 'variation_bulk_sku':
            case 'variation_bulk_weight':
            case 'variation_bulk_height':
            case 'variation_bulk_height':
            case 'variation_bulk_depth':
                var modification_type = jQuery(this).closest('.bulk_block').find('.modification_type').val();
                if(modification_type == 'variation_bulk_add' || modification_type == 'variation_bulk_set_new'){
                    // Showing first input
                    var t = jQuery(this).closest('.bulk_block').find('.first-input:visible'); 
                    if(t.length < 1){
                        jQuery(this).closest('.bulk_block').find('.first-input').show();                     
                    }
                } else if (modification_type == 'variation_bulk_remove') {
                    // do nothing.
                } else {
                    // do nothing.
                }  
               break;
            
            case 'is_not_empty':
               break;

            default: 
                // Showing first input
                var t = jQuery(this).closest('.bulk_block').find('.first-input:visible'); 
                if(t.length < 1){
                    jQuery(this).closest('.bulk_block').find('.first-input').show();                     
                }
                
                // Showing second input
                var str1 = val;
                var str2 = "replace";
                if(str1.indexOf(str2) != -1){    
                    var attru = jQuery(this).val();   
                    if(attru == 'name_bulk_replace'){
                        jQuery(this).closest('.bulk_block').find('.first-input').after(' <span class="between">with</span> <input class="input-field second-input" type="text" name="name_bulk_filter_value_second[]" style="" class="short">');
                    } else if(attru == 'short_des_bulk_replace'){
                        jQuery(this).closest('.bulk_block').find('.first-input').after(' <span class="between">with</span> <input class="input-field second-input" type="text" name="short_des_bulk_filter_value_second[]" style="" class="short">');
                    } else if(attru == 'long_des_bulk_replace'){
                        jQuery(this).closest('.bulk_block').find('.first-input').after(' <span class="between">with</span> <input class="input-field second-input" type="text" name="long_des_bulk_filter_value_second[]" style="" class="short">');
                    }else{

                    }
                } else {
                    jQuery(this).closest('.bulk_block').find('.first-input').show();
                    jQuery(this).closest('.bulk_block').find('.first-input').next('span').remove();                                                                   
                    jQuery(this).closest('.bulk_block').find('.second-input').remove(); 
                }
        }

    }); 
    
    // get attribute terms for filter section
    jQuery('body').delegate('.global-attribute-bulk', "change", function(e) { 
        e.preventDefault();
        var attr = jQuery(this).val();

        jQuery.ajax({
                    type : "post",
                    dataType : "json",
                    url : myAjax.ajaxurl,
                    data : {action: "pincode_check", attr : attr},
                    success: function(response) {
                        var s = jQuery('<select multiple="multiple" style="margin-left:10px;width:500px;" class="terms select_two" name="filter_value_attribute_terms_bulk['+attr+'][]"  />');
                        for(var val in response) {
                            jQuery('<option />', {value: val, text: val}).appendTo(s);
                        }
                        jQuery('.bulk_edit_section div.bulk_block:visible:last').find('.bulk_attribute_terms').append(s);
                        jQuery('.select_two').select2();
                    }
                });
    });
    
    // Add drop for variation for filter section
    jQuery('body').delegate('.bulk_variation', "change", function(e) {
            e.preventDefault();
            var attru = jQuery(this).val();
            
                content  = '<label for="product-type">';
                content += '    <select class="bulk_variation_term" style="margin-left:5px;margin-top:2px;" name="variation_bulk_filter_type_param[]" class="bulk_variation_update_amount" >';
                content += '        <optgroup>';
                content += '            <option value="variation_increase_by_value">Increase by value</option>';
                content += '            <option value="variation_increase_by_per">Increase by %</option>';
                content += '            <option value="variation_decrease_by_per">Decrease by %</option> ';
                content += '        <optgroup>';
                content += '    </select>';
                content += '</label>';
            
            if(attru == 'variation_bulk_stock'){               
                jQuery(this).closest('.bulk_block').find('.bulk_variation').after(content);
            } else if (attru == 'variation_bulk_price'){
                jQuery(this).closest('.bulk_block').find('.bulk_variation').after(content);
            } else if (attru == 'variation_bulk_sale_price'){
                jQuery(this).closest('.bulk_block').find('.bulk_variation').after(content);
            } else {
                
            }
    });          
    
    // Hide Show for the add remove button in the filter section
    jQuery(document).on('mouseenter', '.bulk_main', function () {
        jQuery(this).find(".remove_bulk_block").show();  
        jQuery(this).find('.remove_bulk_block').next('.bulk_block').css('margin-left','');
    }).on('mouseleave', '.bulk_main', function () {
        jQuery(this).find('.remove_bulk_block').next('.bulk_block').css('margin-left','45px');
        jQuery(this).find(".remove_bulk_block").hide();
    });
    
    // Showing spinner while updating
    jQuery('body').delegate('#perform_changes', "click", function(e) {
        jQuery('.spinner_edit_div').find('.spinner').addClass('is-active');
    });  
		
}); 



