jQuery(document).ready(function(){
    
    jQuery(".select_category").select2();
    jQuery(".select_two").select2();
    
    // Datatable initialize
    jQuery('#example').dataTable();
    
    /* Filter Section */
    
    // get attribute terms for filter section
    jQuery('body').delegate('.global-attribute', "change", function(e) {        
        
           // e.preventDefault();
            var attr = jQuery(this).val();
            
            jQuery.ajax({
                        type : "post",
                        dataType : "html",
                        url : myAjax.ajaxurl,
                        data : {action: "get_attr_terms", attr : attr},
                        success: function(response) {                         
                            jQuery('.filter_section div.block:visible:last').find('.attribute_terms').empty();
                            jQuery('.filter_section div.block:visible:last').find('.attribute_terms').append(response);                            
                            jQuery(".select_two").select2();
                        }
                    });
    }); 

    // Main Drop-down for filter section
    jQuery(".product_type").change(function (){
        
        var select_option = jQuery(this).val();

        if(select_option == 'name'){
            var len = jQuery('.show_filter_section').find('.name_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.name_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#name_block').css('display','inline-block');
                show_filter_block.find('.name_block').css('display','block');
                jQuery('.show_filter_section').append(show_filter_block);
            }
        } else if(select_option == 'price'){
            var len = jQuery('.show_filter_section').find('.price_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.price_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#price_block').css('display','inline-block');
                show_filter_block.find('.price_block').css('display','block');
                jQuery('.show_filter_section').append(show_filter_block);
            }
        } else if (select_option == 'sale_price'){
            var len = jQuery('.show_filter_section').find('.sale_price_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.sale_price_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#sale_price_block').css('display','inline-block');
                show_filter_block.find('.sale_price_block').css('display','block');
                jQuery('.show_filter_section').append(show_filter_block);
            }
        } else if (select_option == 'sku') {
            var len = jQuery('.show_filter_section').find('.sku_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.sku_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#sku_block').css('display','inline-block');
                show_filter_block.find('.sku_block').css('display','block');
                jQuery('.show_filter_section').append(show_filter_block);
            }
        }  else if (select_option == 'long_des') {
            var len = jQuery('.show_filter_section').find('.long_des_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.long_des_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#long_des_block').css('display','inline-block');
                show_filter_block.find('.long_des_block').css('display','block');
                jQuery('.show_filter_section').append(show_filter_block);
            }
        }  else if (select_option == 'short_des') {
            var len = jQuery('.show_filter_section').find('.short_des_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.short_des_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#short_des_block').css('display','inline-block');
                show_filter_block.find('.short_des_block').css('display','block');
                jQuery('.show_filter_section').append(show_filter_block);
            }
        }  else if (select_option == 'ids') {
            var len = jQuery('.show_filter_section').find('.ids_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.ids_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#ids_block').css('display','inline-block');
                show_filter_block.find('.ids_block').css('display','block');
                jQuery('.show_filter_section').append(show_filter_block);
            }
        }  else if (select_option == 'weight') {
            var len = jQuery('.show_filter_section').find('.weight_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.weight_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#weight_block').css('display','inline-block');
                show_filter_block.find('.weight_block').css('display','block');
                jQuery('.show_filter_section').append(show_filter_block);
            }
        }  else if (select_option == 'stock') {
            var len = jQuery('.show_filter_section').find('.stock_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.stock_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#stock_block').css('display','inline-block');
                show_filter_block.find('.stock_block').css('display','block');
                jQuery('.show_filter_section').append(show_filter_block);
            }
        }  else if (select_option == 'purchase_note') {
            var len = jQuery('.show_filter_section').find('.purchase_note_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.purchase_note_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#purchase_note_block').css('display','inline-block');
                show_filter_block.find('.purchase_note_block').css('display','block');
                jQuery('.show_filter_section').append(show_filter_block);
            }
        }  else if (select_option == 'status') {
            var len = jQuery('.show_filter_section').find('.status_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.status_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#status_block').css('display','inline-block');
                show_filter_block.find('.status_block').css('display','block');
                jQuery('.show_filter_section').append(show_filter_block);
            }
        }  else if (select_option == 'attribute') {
            var len = jQuery('.show_filter_section').find('.attribute_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.attribute_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#attribute_block').css('display','inline-block');
                show_filter_block.find('.attribute_block').css('display','block');
                jQuery('.show_filter_section').append(show_filter_block);
            }
        }  else if (select_option == 'dimention') {
            var len = jQuery('.show_filter_section').find('.dimention_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.dimention_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#dimention_block').css('display','inline-block');
                show_filter_block.find('.dimention_block').css('display','block');
                jQuery('.show_filter_section').append(show_filter_block);
            }
        }  else if (select_option == 'category') {
            var len = jQuery('.show_filter_section').find('.category_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.category_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#category_block').css('display','inline-block');
                show_filter_block.find('.category_block').css('display','block');
                jQuery('.show_filter_section').append(show_filter_block);
                //jQuery(".select_category").select2();
            }
        } else if (select_option == 'tags') {
            var len = jQuery('.show_filter_section').find('.tag_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.tag_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#tag_block').css('display','inline-block');
                show_filter_block.find('.tag_block').css('display','block');
                jQuery('.show_filter_section').append(show_filter_block);
            }
        } else if (select_option == 'product_type') {
            var len = jQuery('.show_filter_section').find('.product_type_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.product_type_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#product_type_block').css('display','inline-block');
                show_filter_block.find('.product_type_block').css('display','block');
                jQuery('.show_filter_section').append(show_filter_block);
            }
        } else if (select_option == 'availability') {
            var len = jQuery('.show_filter_section').find('.availability_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.availability_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#availability_block').css('display','inline-block');
                show_filter_block.find('.availability_block').css('display','block');
                jQuery('.show_filter_section').append(show_filter_block);
            }
        } else if (select_option == 'shipping_class') {
            var len = jQuery('.show_filter_section').find('.shipping_class_block_main > div:visible').length;
            if(len < 1){
                var show_filter_block = jQuery('.shipping_class_block_main').clone();
                show_filter_block.css('display','block');
                show_filter_block.find('#shipping_class_block').css('display','inline-block');
                show_filter_block.find('.shipping_class_block').css('display','block');
                jQuery('.show_filter_section').append(show_filter_block);
                
                    // Placing drop for Shipping Class
                    jQuery.ajax({
                        type : "post",
                        dataType : "json",
                        url : myAjax.ajaxurl,
                        data : {action: "get_shipping_class"},
                        success: function(response) {  
                            console.log(response);
                            var s = jQuery('<select multiple="multiple" style="margin-left:5px;width:500px;" class="term select_category" name="filter_value_shipping_class[]"  />');                           
                            for(var val in response) {
                                jQuery('<option />', {value: val, text: val}).appendTo(s);
                            }
                            jQuery('.show_filter_section').find('.shipping_class').append(s);
                            jQuery('.show_filter_section').find('.shipping_class input').css('box-shadow','none');
                            jQuery('.select_category').select2();
                        }
                    });
                
            }
        } else {
            
        }
        
        var len = jQuery(".filter_section > div:visible").length;
        if(len > 0){
           jQuery('.first_filter_criteria').hide();
           jQuery('.second_filter_criteria').show();
        } else {
           jQuery('.second_filter_criteria').hide();
           jQuery('.first_filter_criteria').show();
        }
    });  
    
    // Remove Button for filter section
    jQuery('body').delegate('.remove_new_drop','click', function(e){
        e.preventDefault();
        var b = jQuery(this).attr('data-block');
        
        var block_id = '#'+b+'_block';
        var block_class = '.'+b+'_block';
        var re = jQuery(this).closest('.block').is(block_id);                       
        
        // Removing block and make the last div inline-block
        var this_div = jQuery(this).parent('.block').parent();
        jQuery(this).closest('.block').remove();
        this_div.find('.add_new_drop').prev('.block').css('display','inline-block');
        
        // Change left text
        var left_text = this_div.attr('data-name');
        this_div.find('.remove_block').next('.block').find('.left_level').empty().text(left_text);
        this_div.find('.remove_block').next('.block').css('margin-left','');
        this_div.find('.remove_block').next('.block').find('.left_level').css('font-weight','bold');
        
        // Removing Add plus button
        var len = jQuery(block_class+" > div:visible").length;
        if(len < 1){ 
            jQuery(block_class+'_main').hide();
            this_div.parent(block_class+'_main').remove();
        }
        if(len < 4){
            jQuery(block_class+'_main').find('.add_new_drop').show('slow');
        }
        
        
        // Enable the diabled options
        var disabled_option = jQuery(this).closest('.block').find('.global-attribute option:selected').attr('value');
        console.log(disabled_option);
        jQuery('.attribute_block .global-attribute option').each(function(){
            var thisval = jQuery(this).attr('value');
            if(thisval == disabled_option){
                jQuery(this).removeAttr('disabled');
            }
        });

    });     

    // Add Button for filter section
    jQuery('body').delegate('.add_new_drop','click', function(e){
        e.preventDefault();
        var b = jQuery(this).attr('data-block');
        var block = '#'+b+'_block';
        var block_class = '.'+b+'_block';
        var new_block = jQuery(block).clone();
        

        // counting elements (max 4)
        var len = jQuery(block_class+" > div").length;
        if(len < 5){      
            new_block.find('.left_level').empty();  
            new_block.find('.left_level').text('AND');
            new_block.find('.remove_block').remove(); 

            new_block.removeAttr('id');
            new_block.find('.first-input').hide();  
            new_block.find('.first-input').val('');  
            new_block.find('.second-input').remove();  
            new_block.find('.terms').remove(); 
            new_block.find('.between').remove(); 
            new_block.find('.product_category').empty(); 
            new_block.find('.attribute_terms').empty(); 
            new_block.find('.first-input').removeAttr('title'); 
            //new_block.find('.global-attribute').removeAttr('disabled'); 
            
            var block_cls = block_class+' .block';
            jQuery(block_cls).css('display','block');
            new_block.css('display','inline-block');
            new_block.css('margin-left','53px');
            new_block.find('.left_level').css('width','73px');

            jQuery(this).before(new_block);
            jQuery(block_class).children().last().show();
            
            if(len == '4'){
                jQuery(block_class+'_main').find('.add_new_drop').hide('slow');
            } 
        } else {
                          
        }

        
        // Gathering selected options
        var selected_value = [];
        jQuery('.attribute_block .global-attribute option:selected').each(function(){
            var thisval = jQuery(this).attr('value');
            if(thisval != ''){
                selected_value.push(thisval);  
            }
        });
        
        // Disable selected options for attr 
        jQuery('.attribute_block .global-attribute option').each(function(){
            var $thisoption = jQuery(this);
            var thisval = jQuery(this).attr('value');
            jQuery.each( selected_value, function( key, value ) {
                if(value == thisval){
                    $thisoption.attr('disabled','disabled');
                }
            });
        });
        
        
        
    });
    
    // Remove the full block in the filter section 
    jQuery('body').delegate('.remove_block','click', function(e){
        var b = jQuery(this).attr('data-block');
        var block_class = '.'+b;
        console.log(block_class);
        jQuery(this).closest(block_class).remove();
    });
    
    // Add input after drop in filter section
    jQuery('body').delegate('.block_brop', "change", function(e) {
        e.preventDefault();
        var val = jQuery(this).val();
        var ts = jQuery(this).closest('.block');
            

        
        switch (val){
            
            case '':
            case 'is_not_empty':
            case 'price_is_empty': 
            case 'price_is_not_empty': 
            case 'cat_is_empty': 
            case 'cat_is_not_empty':  
            case 'is_empty': 
            case 'stock_is_not_empty': 
            case 'dimention_is_empty': 
            case 'dimention_is_not_empty': 
            case 'product_type_is_empty': 
            case 'product_type_is_not_empty': 
            case 'ids_is_not_empty': 
            case 'ids_is_empty': 
            case 'purchase_note_is_empty': 
            case 'purchase_note_is_not_empty': 
            case 'long_des_is_empty': 
            case 'long_des_is_not_empty': 
            case 'short_des_is_empty': 
            case 'short_des_is_not_empty': 
            case 'stock_is_empty': 
            case 'weight_is_empty': 
            case 'weight_is_not_empty': 
            case 'availability_in_stock': 
            case 'availability_out_of_stock': 
            case 'tag_is_empty': 
            case 'tag_is_not_empty':  
            case 'sale_price_is_empty': 
            case 'sale_price_is_not_empty': 
            case 'sku_is_empty': 
            case 'sku_is_not_empty': 
                // Hiding first and second input for empty and not empty
                jQuery(this).closest('.block').find('.first-input').hide(); 
                jQuery(this).closest('.block').find('.first-input').next('span').remove();                                                                   
                jQuery(this).closest('.block').find('.second-input').remove(); 
                jQuery(this).closest('.block').find('.product_category').empty(); 
                break;
                
            case 'cat_has_certains_values':    
                // Placing select for category
                var str1 = val;
                var str2 = "has_certains_values";
                if(str1.indexOf(str2) != -1){
                    jQuery.ajax({
                        type : "post",
                        dataType : "json",
                        url : myAjax.ajaxurl,
                        data : {action: "get_product_category"},
                        success: function(response) {  
                            console.log(response);
                            var s = jQuery('<select multiple="multiple" style="margin-left:5px;width:500px;" class="term select_category" name="filter_value_category_multi[]"  />');                           
                            for(var val in response) {
                                jQuery('<option />', {value: val, text: val}).appendTo(s);
                            }
                            jQuery(ts).find('.product_category').append(s);
                            jQuery(ts).find('.product_category input').css('box-shadow','none');
                            jQuery('.select_category').select2();
                        }
                    });
                }
                break;
                
            case 'tag_has_certains_values':    
                // Placing select for Product Tag
                    jQuery.ajax({
                        type : "post",
                        dataType : "json",
                        url : myAjax.ajaxurl,
                        data : {action: "get_product_tag"},
                        success: function(response) {  
                            console.log(response);
                            var s = jQuery('<select multiple="multiple" style="margin-left:5px;width:500px;" class="term select_tag" name="filter_value_tag_multi[]"  />');                           
                            for(var val in response) {
                                jQuery('<option />', {value: val, text: val}).appendTo(s);
                            }
                            jQuery(ts).find('.product_category').append(s);
                            jQuery(ts).find('.product_category input').css('box-shadow','none');
                            jQuery('.select_tag').select2();
                        }
                    });
                
                break;
                
                
            case 'product_type_has_certains_values':    
                // Placing select for Product type
                    jQuery.ajax({
                        type : "post",
                        dataType : "json",
                        url : myAjax.ajaxurl,
                        data : {action: "get_product_type"},
                        success: function(response) {  
                            console.log(response);
                            var s = jQuery('<select multiple="multiple" style="margin-left:5px;width:500px;" class="term select_product_type" name="filter_value_product_type_multi[]"  />');                           
                            for(var val in response) {
                                jQuery('<option />', {value: val, text: val}).appendTo(s);
                            }
                            jQuery(ts).find('.product_category').append(s);
                            jQuery(ts).find('.product_category input').css('box-shadow','none');
                            jQuery('.select_product_type').select2();
                        }
                    });
                
                break;
                
                
            default: 
                
                // Showing first input
                var t = jQuery(this).closest('.block').find('.first-input:visible'); 
                if(t.length < 1){                   
                    jQuery(this).closest('.block').find('.first-input').show(); 
                    jQuery(this).closest('.block').find('.first-input').next('span').remove();
                }   
                
                // Showing second input
                var str1 = val;
                var str2 = "between";
                if(str1.indexOf(str2) != -1){    
                    jQuery(this).closest('.block').find('.first-input').after(' <span class="between">and</span> <input title="Max Value" class="input-field second-input" type="text" name="filter_value_second[]" style="" class="short">');
                    jQuery(this).closest('.block').find('.first-input').attr('title','Min Value');
                } else {
                    jQuery(this).closest('.block').find('.first-input').show();
                    jQuery(this).closest('.block').find('.first-input').next('span').remove();                                                                   
                    jQuery(this).closest('.block').find('.second-input').remove(); 
                }
                
        }

    }); 

    // Hide Show for the add remove button in the filter section
    jQuery(document).on('mouseenter', '.main', function () {
        jQuery(this).find(".remove_block").show();  
        jQuery(this).find('.remove_block').next('.block').css('margin-left','');
    }).on('mouseleave', '.main', function () {
        jQuery(this).find('.remove_block').next('.block').css('margin-left','45px');
        jQuery(this).find(".remove_block").hide();
    });
    
    // Showing spinner while Filtering
    jQuery('body').delegate('#bulk_filter', "click", function(e) {
        jQuery('.spinner_filter_div').find('.spinner').addClass('is-active');
        // Hiding product drop after hitting filter
        jQuery('.main-dropdown').hide();
    });  
    
    // Submitting form when pressing enter
    jQuery('body').delegate('.first-input', "keypress", function(e) {
      if (e.which == 13) {
        jQuery("#bulk_filter").trigger("click");
      }
    });

	
}); 



