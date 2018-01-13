    <?php
        if ($success == 1) {
            // Showing success data
            rsbras_updated_notification($success_txt);
        } 
        if($error == 1){
            // Showing error data
            rsbras_error_notification($error_txt);
        }
    ?>  


<div id="poststuff">
             
    <div id="post-body" class="metabox-holder">

        <!-- main content -->
        <div id="post-body-content">

                <div class="meta-box-sortables ui-sortable">
                        
                    <!-- Filter Section -->
                    <div class="postbox">

                        <h3><span><b>Which Product Do You Want To Edit ?</b></span></h3>
                            
                        <div class="inside">
                            <form id="filter_form" method="post">   
                               
                                <div class="first_filter_criteria" style="margin-bottom: 30px;display: block;">
                                    <h4><span>Choose filtering criteria</span></h4>
                                    <div class="main-dropdown">
                                    <span>Product Data<span class="type_box"> &mdash; 
                                            <label for="product-type">
                                                <select name="product-type" class="product_type">
                                                    <optgroup label="Product Type">
                                                        <option selected="selected" value="simple">Choose Criteria</option>
                                                        <option value="name">Name</option>
                                                        <option value="attribute">Attribute</option>
                                                        <option value="price">Price</option>
                                                        <option value="sale_price">Sale Price</option>
                                                        <option value="sku">SKU</option>
                                                        <option value="category">Category</option>
                                                        <option value="tags">Tags</option>
                                                        <option value="status">Status</option>
                                                        <option value="dimention">Dimention</option>
                                                        <option value="weight">Weight</option>
                                                        <option value="stock">Stock Quantity</option>
                                                        <option value="availability">Stock Status</option>
                                                        <option value="shipping_class">Shipping Class</option>
                                                        <option value="ids">IDs</option>
                                                        <option value="purchase_note">Purchase Note</option>
                                                        <option value="long_des">Long Description</option>
                                                        <option value="short_des">Short Description</option>
                                                    </optgroup>
                                                </select>
                                            </label>

                                    </div>
                                </div>
                                        
                            <div class="filter_section">
                                       
                                <div class="show_filter_section"> 
                                    
                                    <!-- Showing all filter drop here -->
                                    
                                </div>   
                                
 
                                    <!-- Drop1 Name -->
                                    <div class="name_block_main main" >
                                        <div class="name_block" style="display: none;" data-name="Name">
                                            
                                            <!--<div style="width:45px;display:block;">-->
                                            <a href="#" style="float: left;margin-right: 10px;" class="btn btn-warning remove_block" data-block="name_block" name="submit"><i class="fa fa-trash"></i></a> 
                                            <!--</div>-->
                                            
                                            <div class="block" id="name_block" style="display: inline-block;">
                                                <span class="left_level"><b>Name</b></span> &mdash; 
                                                
                                                <label for="product-type">
                                                    <select name="filter_type[]" class="block_brop" data-attr="filter_value[]">
                                                        <optgroup>
                                                            <option selected="selected">Select Option</option>
                                                            <option value="starts_with">Starts with</option>
                                                            <option value="ends_with">Ends with</option>
                                                            <option value="contains">Contains</option>
                                                            <option value="does_not_contain">Does not contain</option>
                                                            <option value="is_empty">Is empty</option>
                                                            <option value="is_not_empty">Is not empty</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                 
                                                <input style="display: none;" class="input-field first-input" type="text" name="filter_value[]" style="" class="short">
                                                
                                                <button href="#" class="btn btn-danger remove_new_drop" data-block="name" name="submit"><i class="fa fa-trash"></i></button> 
                                 
                                            </div>
                                             
                                            <a href="#" style="margin-left: 5px;" class="btn btn-success add_new_drop" data-block="name"><i class="fa fa-plus"></i></a>
       
                                        </div>         
                                    </div>         
                                    
                                    <!-- Drop2 Price -->
                                    <div class="price_block_main main" style="margin-bottom: 30px;">
                                        <div class="price_block" data-name="Price">
                                            
                                            
                                            <a href="#" style="float: left;margin-right: 10px;" class="btn btn-warning remove_block" data-block="price_block" name="submit"><i class="fa fa-trash"></i></a> 
                                            
                                            <div class="block" id="price_block" style="display: inline-block;">
                                                <span class="left_level"><b>Price</b></span> &mdash; 
                                                
                                                <label for="product-type">
                                                    <select name="filter_type_price[]" class="block_brop is_between" data-attr="filter_value_price[]">
                                                        <optgroup>
                                                            <option selected="selected">Select Option</option>
                                                            <option value="price_smaller_than">smaller-than</option>
                                                            <option value="price_grater_then">greater-than</option>
                                                            <option value="price_is_between">Is between</option>
                                                            <option value="price_is_empty">Is empty</option>
                                                            <option value="price_is_not_empty">Is not empty</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                
                                                <input style="display: none;" class="input-field first-input" type="text" name="filter_value_price[]" style="" class="short">
                                                
                                                <button href="#" class="btn btn-danger remove_new_drop" data-block="price" name="submit"><i class="fa fa-trash"></i></button> 
                                 
                                            </div>
                                             
                                            <a href="#" style="margin-left: 5px;" class="btn btn-success add_new_drop" data-block="price"><i class="fa fa-plus"></i></a>
                                    
                                              
                                        </div>
                                    </div>                                           
                                          
                                    <!-- Drop3 Sale Price -->
                                    <div class="sale_price_block_main main">    
                                        <div class="sale_price_block" data-name="Sale Price">
                                            
                                            <a href="#" class="btn btn-danger remove_block" data-block="sale_price_block"><i class="fa fa-trash"></i></a>
                                             
                                            
                                            <div class="block" id="sale_price_block">                 
                                                        <span class="left_level"><b>Sale Price</b></span> &mdash;
                                                
                                                <label for="product-type">
                                                    <select name="filter_type_sale_price[]" class="block_brop is_between">
                                                        <optgroup>
                                                            <option selected="selected">Select Option</option>
                                                            <option value="sale_price_smaller_than">smaller-than</option>
                                                            <option value="sale_price_grater_then">greater-than</option>
                                                            <option value="sale_price_is_between">Is between</option>
                                                            <option value="sale_price_is_empty">Is empty</option>
                                                            <option value="sale_price_is_not_empty">Is not empty</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                        
                                                <input class="input-field first-input" type="text" name="filter_value_sale_price[]" style="" class="short">
                                                <a href="#" class="btn btn-danger remove_new_drop" data-block="sale_price"><i class="fa fa-trash"></i></a>
                                             
                                            </div>
                                            
                                                <a href="#" class="btn btn-success add_new_drop" data-block="sale_price"><i class="fa fa-plus"></i></a>
                                    
                                            
                                        </div>              
                                    </div>    
                                        
                                    <!-- Drop4 sku -->
                                    <div class="sku_block_main main">
                                        <div class="sku_block" data-name="SKU">
                                            
                                            <a href="#" class="btn btn-danger remove_block" data-block="sku_block"><i class="fa fa-trash"></i></a>
                                             
                                            
                                            <div class="block" id="sku_block">
                                               
                                                <span class="left_level"><b>SKU</b></span> &mdash;
                                                
                                                <label for="product-type">
                                                    <select name="filter_type_sku[]" class="block_brop">
                                                        <optgroup>
                                                            <option value="">Select Option</option>
                                                            <option value="sku_starts_with">Starts with</option>
                                                            <option value="sku_ends_with">Ends with</option>
                                                            <option value="sku_contains">Contains</option>
                                                            <option value="sku_does_not_contain">Does not contain</option>
                                                            <option value="sku_is_empty">Is empty</option>
                                                            <option value="sku_is_not_empty">Is not empty</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                <input class="input-field first-input" type="text" name="filter_value_sku[]" style="" class="short">
                                                <a href="#" class="btn btn-danger remove_new_drop" data-block="sku"><i class="fa fa-trash"></i></a>
                                             </div>
                                             <a href="#" class="btn btn-success add_new_drop" data-block="sku"><i class="fa fa-plus"></i></a>
                                    
                                        </div>
                                       
                                    </div>    
                                            
                                    <!-- Drop5 Long des -->
                                    <div class="long_des_block_main main">
                                        <div class="long_des_block" data-name="Long Description">
                                                  
                                            <a href="#" class="btn btn-danger remove_block" data-block="long_des_block"><i class="fa fa-trash"></i></a>
                                             
                                            <div class="block" id="long_des_block">

                                                <span class="left_level"><b>Long Description</b></span> &mdash;
                                                
                                                <label for="product-type">
                                                    <select name="filter_type_long_des[]" class="block_brop">
                                                        <optgroup>
                                                            <option value="">Select Option</option>
                                                            <option value="long_des_starts_with">Starts with</option>
                                                            <option value="long_des_ends_with">Ends with</option>
                                                            <option value="long_des_contains">Contains</option>
                                                            <option value="long_des_does_not_contain">Does not contain</option>
                                                            <option value="long_des_is_empty">Is empty</option>
                                                            <option value="long_des_is_not_empty">Is not empty</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                <input class="input-field first-input" type="text" name="filter_value_long_des[]" style="" class="short">
                                                
                                                <a href="#" class="btn btn-danger remove_new_drop" data-block="long_des"><i class="fa fa-trash"></i></a>
                                           </div>
                                             <a href="#" class="btn btn-success add_new_drop" data-block="long_des"><i class="fa fa-plus"></i></a>
                                    
                                        </div>
                                        
                                    </div>
                                            
                                    <!-- Drop6 Short des -->
                                    <div class="short_des_block_main main">
                                        <div class="short_des_block" data-name="Short Description">
                                            
                                            <a href="#" class="btn btn-danger remove_block" data-block="short_des_block"><i class="fa fa-trash"></i></a>
                                             
                                            
                                            <div class="block" id="short_des_block">
                                              
                                                  <span class="left_level"><b>Short Description</b></span> &mdash;
                                                      
                                                
                                                <label for="product-type">
                                                    <select name="filter_type_short_des[]" class="block_brop">
                                                        <optgroup>
                                                            <option value="">Select Option</option>
                                                            <option value="short_des_starts_with">Starts with</option>
                                                            <option value="short_des_ends_with">Ends with</option>
                                                            <option value="short_des_contains">Contains</option>
                                                            <option value="short_des_does_not_contain">Does not contain</option>
                                                            <option value="short_des_is_empty">Is empty</option>
                                                            <option value="short_des_is_not_empty">Is not empty</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                <input class="input-field first-input" type="text" name="filter_value_short_des[]" style="" class="short">
                                                
                                                <a href="#" class="btn btn-danger remove_new_drop" data-block="short_des"><i class="fa fa-trash"></i></a>
                                              </div>
                                            <a href="#" class="btn btn-success add_new_drop" data-block="short_des"><i class="fa fa-plus"></i></a>
                                    
                                        </div>
                                         
                                    </div>
                                            
                                    <!-- Drop7 ids -->
                                    <div class="ids_block_main main" >
                                        <div class="ids_block" data-name="IDs">
                                            
                                            <a href="#" class="btn btn-danger remove_block" data-block="ids_block"><i class="fa fa-trash"></i></a>
                                             
                                            <div class="block" id="ids_block"> 
                                                
                                                
                                                        <span class="left_level"><b>IDs</b></span> &mdash;
                                                   
                                                
                                                <label for="product-type">
                                                    <select name="filter_type_ids[]" class="block_brop">
                                                        <optgroup>
                                                            <option value="">Select Option</option>
                                                            <option value="ids_starts_with">Starts with</option>
                                                            <option value="ids_ends_with">Ends with</option>
                                                            <option value="ids_contains">Contains</option>
                                                            <option value="ids_does_not_contain">Does not contain</option>
                                                            <option value="ids_is_not_empty">Is not empty</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                <input class="input-field first-input" type="text" name="filter_value_ids[]" style="" class="short">
                                                
                                                <a href="#" class="btn btn-danger remove_new_drop" data-block="ids"><i class="fa fa-trash"></i></a>
                                            </div>
                                             <a href="#" class="btn btn-success add_new_drop" data-block="ids"><i class="fa fa-plus"></i></a>
                                    
                                        </div>
                                       
                                    </div>
                                            
                                    <!-- Drop8 weight -->
                                    <div class="weight_block_main main">
                                        <div class="weight_block" data-name="Weight">
                                            
                                            <a href="#" class="btn btn-danger remove_block" data-block="weight_block"><i class="fa fa-trash"></i></a>
                                                
                                            <div class="block" id="weight_block">
                                                
                                                <span class="left_level"><b>Weight</b></span> &mdash;
                                                
                                                <label for="product-type">
                                                    <select name="filter_type_weight[]" class="block_brop is_between">
                                                        <optgroup>
                                                            <option value="">Select Option</option>
                                                            <option value="weight_smaller_than">smaller-than</option>
                                                            <option value="weight_grater_then">greater-than</option>
                                                            <option value="weight_is_between">Is between</option>
                                                            <option value="weight_is_empty">Is empty</option>
                                                            <option value="weight_is_not_empty">Is not empty</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                <input class="input-field first-input" type="text" name="filter_value_weight[]" style="" class="short">
                                                
                                                <a href="#" class="btn btn-danger remove_new_drop" data-block="weight"><i class="fa fa-trash"></i></a>
                                            </div>
                                             <a href="#" class="btn btn-success add_new_drop" data-block="weight"><i class="fa fa-plus"></i></a>
                                    
                                        </div>
                                        
                                    </div>
                                            
                                    <!-- Drop9 Stock -->
                                    <div class="stock_block_main main">
                                        <div class="stock_block" data-name="Stock Quantity">
                                            
                                            <a href="#" class="btn btn-danger remove_block" data-block="stock_block"><i class="fa fa-trash"></i></a>
                                               
                                            <div class="block" id="stock_block">
                                             
                                                <span class="left_level"><b>Stock Quantity</b></span> &mdash;
                                                
                                                <label for="product-type">
                                                    <select name="filter_type_stock[]" class="block_brop is_between">
                                                        <optgroup>
                                                            <option value="">Select Option</option>
                                                            <option value="stock_smaller_than">smaller-than</option>
                                                            <option value="stock_grater_then">greater-than</option>
                                                            <option data-between="is_between" value="stock_is_between">Is between</option>
                                                            <option value="stock_is_empty">Is empty</option>
                                                            <option value="stock_is_not_empty">Is not empty</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                <input class="input-field first-input" type="text" name="filter_value_stock[]" style="" class="short">
                                                
                                                <a href="#" class="btn btn-danger remove_new_drop" data-block="stock"><i class="fa fa-trash"></i></a>
                                             </div>
                                             <a href="#" class="btn btn-success add_new_drop" data-block="stock"><i class="fa fa-plus"></i></a>
                                    
                                        </div>
                                        
                                    </div>
                                            
                                    <!-- Drop10 Perchase note -->
                                    <div class="purchase_note_block_main main">
                                        <div class="purchase_note_block" data-name="Purchase Note">
                                            
                                            <a href="#" class="btn btn-danger remove_block" data-block="purchase_note_block"><i class="fa fa-trash"></i></a>
                                             
                                            <div class="block" id="purchase_note_block">
                                               
                                                <span class="left_level"><b>Purchase Note</b></span> &mdash;
                                                
                                                <label for="product-type">
                                                    <select name="filter_type_purchase_note[]" class="block_brop">
                                                        <optgroup>
                                                            <option value="">Select Option</option>
                                                            <option value="purchase_note_starts_with">Starts with</option>
                                                            <option value="purchase_note_ends_with">Ends with</option>
                                                            <option value="purchase_note_contains">Contains</option>
                                                            <option value="purchase_note_does_not_contain">Does not contain</option>
                                                            <option value="purchase_note_is_empty">Is empty</option>
                                                            <option value="purchase_note_is_not_empty">Is not empty</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                <input class="input-field first-input" type="text" name="filter_value_purchase_note[]" style="" class="short">
                                                
                                                <a href="#" class="btn btn-danger remove_new_drop" data-block="purchase_note"><i class="fa fa-trash"></i></a>
                                               </div>
                                             <a href="#" class="btn btn-success add_new_drop" data-block="purchase_note"><i class="fa fa-plus"></i></a>
                                    
                                        </div>
                                        
                                    </div>
                                            
                                    <!-- Drop11 Status -->
                                    <div class="status_block_main main">
                                        <div class="status_block" data-name="Status">
                                            
                                            <a href="#" class="btn btn-danger remove_block" data-block="status_block"><i class="fa fa-trash"></i></a>
                                             
                                            <div class="block" id="status_block">
                                               
                                                
                                                 <span class="left_level"><b>Status</b></span> &mdash;
                                                
                                                <label for="product-type">
                                                    <select name="filter_type_status[]" class="block_brop">
                                                        <optgroup>
                                                            <option value="">Select Option</option>
                                                            <option value="status_publish">Published</option>
                                                            <option value="status_pending">Pending</option>
                                                            <option value="status_draft">Draft</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                <!--<input class="input-field" type="text" name="filter_value_status[]" style="" class="short">-->
                                                
                                                <a href="#" class="btn btn-danger remove_new_drop" data-block="status"><i class="fa fa-trash"></i></a>
                                             </div>
                                            <a href="#" class="btn btn-success add_new_drop" data-block="status"><i class="fa fa-plus"></i></a>
                                    
                                        </div>
                                        
                                    </div>
                                            
                                    <!-- Drop12 Attribute -->
                                    <div class="attribute_block_main main">
                                        <div class="attribute_block" data-name="Attribute">
                                            
                                            <a href="#" class="btn btn-danger remove_block" data-block="attribute_block"><i class="fa fa-trash"></i></a>
                                             
                                            <div class="block" id="attribute_block">
                                            
                                             
                                                <span class="left_level"><b>Attribute</b></span> &mdash;
                                                <?php $r = get_all_global_attributes(); 
                                                if($r){ ?>
                                               
                                                <label for="product-type">
                                                    <select name="filter_type_attribute[]" class="global-attribute">
                                                        <optgroup>
                                                            <option value="">Select Option</option>
                                                            <?php if(isset($r)){ foreach($r as $key){ ?>
                                                            <option value="<?php echo $key->attribute_name; ?>"><?php echo ucfirst($key->attribute_name); ?></option>
                                                            <?php }} ?>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                
                                                <?php } else { ?>
                                                
                                                <label for="product-type">
                                                    <select name="filter_type_attribute[]" class="global-attribute">
                                                        <optgroup>
                                                            <option value="">No attributes found, please add some first</option>
                                 
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                
                                                <?php }  ?>
                                                
                                                <div class="attribute_terms" style="display: inline-block;">
                                                    
                                                </div>    
                                                        
                                                <a href="#" class="btn btn-danger remove_new_drop" data-block="attribute"><i class="fa fa-trash"></i></a>
                                            </div>
                                             <a href="#" class="btn btn-success add_new_drop" data-block="attribute"><i class="fa fa-plus"></i></a>
                                    
                                        </div>
                                       
                                    </div>
                                            
                                    <!-- Drop13 dimentions -->
                                    <div class="dimention_block_main main">
                                        <div class="dimention_block" data-name="Dimention">
                                            
                                            <a href="#" class="btn btn-danger remove_block" data-block="dimention_block"><i class="fa fa-trash"></i></a>
                                             
                                            <div class="block" id="dimention_block">
                                                
                                             
                                                <span class="left_level"><b>Dimention</b></span> &mdash;
                                                
                                                <label for="product-type">
                                                    <select name="filter_type_dimention[]" >
                                                        <optgroup>  
                                                            <option value="">Select Option</option>
                                                            <option value="dimention_width">Width</option>
                                                            <option value="dimention_height">Height</option>
                                                            <option value="dimention_depth">Depth</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                <label for="product-type">
                                                    <select name="filter_type_dimention_type[]" class="block_brop is_between">
                                                        <optgroup> 
                                                            <option value="">Select Option</option>
                                                            <option value="dimention_is_lower_than">smaller-than</option>
                                                            <option value="dimention_is_grater_than">greater-than</option>
                                                            
                                                            <option value="dimention_is_between">is between</option>
                                                            <option value="dimention_is_empty">is empty</option>
                                                            <option value="dimention_is_not_empty">is not empty</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                <input class="input-field first-input" type="text" name="filter_value_dimention[]" style="" class="short">
                                                
                                                <a href="#" class="btn btn-danger remove_new_drop" data-block="dimention"><i class="fa fa-trash"></i></a>
                                             </div>
                                               <a href="#" class="btn btn-success add_new_drop" data-block="dimention"><i class="fa fa-plus"></i></a>
                                    
                                        </div>
                                     
                                    </div>
                                            
                                    <!-- Drop14 Category -->
                                    <div class="category_block_main main">
                                        <div class="category_block" data-name="Category">
                                            
                                            <a href="#" class="btn btn-danger remove_block" data-block="category_block"><i class="fa fa-trash"></i></a>
                                             
                                            <div class="block" id="category_block">
                                               
                                                
                                                <span class="left_level"><b>Category</b></span> &mdash;
                                                
                                                <label for="product-type">
                                                    <select name="filter_type_category[]" class="block_brop">
                                                        <optgroup>  
                                                            <option value="">Select Option</option>
                                                            <option value="cat_is_empty">Is empty</option>
                                                            <option value="cat_is_not_empty">Is not empty</option>
                                                            <option value="cat_has_certains_values">Has certain values </option>
                           
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                
                                                
                                                <div class="product_category" style="display: inline-block;">
                                                    
                                                </div> 
                                            
                                                   
                                            
                                                <input class="input-field first-input" type="text" name="filter_value_category[]" style="" class="short">
                                                 
                                                <a href="#" class="btn btn-danger remove_new_drop" data-block="category"><i class="fa fa-trash"></i></a>
                                            </div>
                                               <a href="#" class="btn btn-success add_new_drop" data-block="category"><i class="fa fa-plus"></i></a>
                                    
                                        </div>
                                       
                                    </div>
                                            
                                    <!-- Drop15 Tags -->
                                    <div class="tag_block_main main">
                                        <div class="tag_block" data-name="Tags">
                                            
                                            <a href="#" class="btn btn-danger remove_block" data-block="tag_block"><i class="fa fa-trash"></i></a>
                                             
                                            <div class="block" id="tag_block">
                                                
                                                
                                                <span class="left_level"><b>Tags</b></span> &mdash;
                                                
                                                
                                                <label for="product-type">
                                                    <select name="filter_type_tag[]" class="block_brop">
                                                        <optgroup>  
                                                            <option value="">Select Option</option>
                                                            <option value="tag_is_empty">Is empty</option>
                                                            <option value="tag_is_not_empty">Is not empty</option>
                                                            <option value="tag_has_certains_values">Has certain values </option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                
                                                <div class="product_category" style="display: inline-block;">
                                                    
                                                </div> 
                                            
                                                <input class="input-field first-input" type="text" name="filter_value_tag[]" style="" class="short">
                                                
                                                <a href="#" class="btn btn-danger remove_new_drop" data-block="tag"><i class="fa fa-trash"></i></a>
                                           </div>
                                            <a href="#" class="btn btn-success add_new_drop" data-block="tag"><i class="fa fa-plus"></i></a>
                                    
                                        </div>
                                         
                                    </div>                                    
                                    
                                    <!-- Drop16 Product type -->
                                    <div class="product_type_block_main main">
                                        <div class="product_type_block" data-name="Product type">
                                            
                                            <a href="#" class="btn btn-danger remove_block" data-block="product_type_block"><i class="fa fa-trash"></i></a>
                                             
                                            <div class="block" id="product_type_block">
                                                
                                                
                                                 
                                                <span class="left_level"><b>Product type</b></span> &mdash;
                                                
                                                
                                                <label for="product-type">
                                                    <select name="filter_type_product_type[]" class="block_brop">
                                                        <optgroup>  
                                                            <option value="">Select Option</option>
                                                            <option value="product_type_is_empty">Is empty</option>
                                                            <option value="product_type_is_not_empty">Is not empty</option>
                                                            <option value="product_type_has_certains_values">Has certain values </option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                
                                                <div class="product_category" style="display: inline-block;">
                                                    
                                                </div> 
                                            
                                                <input class="input-field first-input" type="text" name="filter_value_product_type[]" style="" class="short">
                                                
                                                <a href="#" class="btn btn-danger remove_new_drop" data-block="product_type"><i class="fa fa-trash"></i></a>
                                           </div>
                                            <a href="#" class="btn btn-success add_new_drop" data-block="product_type"><i class="fa fa-plus"></i></a>
                                    
                                        </div>
                                         
                                    </div>
                                    
                                    <!-- Drop17 Availability -->
                                    <div class="availability_block_main main" >
                                        <div class="availability_block" style="display: none;" data-name="Stock Status">                                          
                                           
                                            <a href="#" class="btn btn-warning remove_block" data-block="availability_block" name="submit"><i class="fa fa-trash"></i></a>                                            
                                            
                                            <div class="block" id="availability_block" style="display: inline-block;">
                                                <span class="left_level"><b>Stock Status</b></span> &mdash; 
                                                
                                                <label for="product-type">
                                                    <select name="filter_type_availability[]" class="block_brop">
                                                        <optgroup>
                                                            <option value="">Select Option</option>
                                                            <option value="availability_in_stock">in stock</option>
                                                            <option value="availability_out_of_stock">out of stock</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                 
                                                <input style="display: none;" class="input-field first-input" type="text" name="filter_value_availability[]" style="" class="short">
                                                
                                                <button href="#" class="btn btn-danger remove_new_drop" data-block="availability" name="submit"><i class="fa fa-trash"></i></button> 
                                 
                                            </div>
                                             
                                            <a href="#" style="margin-left: 5px;" class="btn btn-success add_new_drop" data-block="availability"><i class="fa fa-plus"></i></a>
       
                                        </div>         
                                    </div>   
                                    
                                    <!-- Drop18 Shipping Class -->
                                    <div class="shipping_class_block_main main" >
                                        <div class="shipping_class_block" style="display: none;" data-name="Shipping Class">                                          
                                           
                                            <a href="#" class="btn btn-warning remove_block" data-block="shipping_class_block" name="submit"><i class="fa fa-trash"></i></a>                                            
                                            
                                            <div class="block" id="shipping_class_block" style="display: inline-block;">
                                                <span class="left_level"><b>Shipping Class</b></span> &mdash; 
                                                
                                                <div class="shipping_class" style="display: inline-block;">
                                                    
                                                </div> 
                                                 
                                                <input style="display: none;" class="input-field first-input" type="text" name="filter_value_shipping[]" style="" class="short">
                                                
                                                <!--<button href="#" class="btn btn-danger remove_new_drop" data-block="shipping_class" name="submit"><i class="fa fa-trash"></i></button>--> 
                                 
                                            </div>
                                             
                                            <!--<a href="#" style="margin-left: 5px;" class="btn btn-success add_new_drop" data-block="shipping_class"><i class="fa fa-plus"></i></a>-->
       
                                        </div>         
                                    </div>  
                                            
                                    
                                 
                                    
                            </div>  
                                
                                <div class="second_filter_criteria" style="display: none;margin-top: 30px;">
                                    
                                    <div class="main-dropdown">
                                    <span>Product Data<span class="type_box"> &mdash; 
                                            <label for="product-type">
                                                <select name="product-type" class="product_type">
                                                    <optgroup label="Product Type">
                                                        <option selected="selected" value="simple">Choose Criteria</option>
                                                        <option value="name">Name</option>
                                                        <option value="attribute">Attribute</option>
                                                        <option value="price">Price</option>
                                                        <option value="sale_price">Sale Price</option>
                                                        <option value="sku">SKU</option>
                                                        <option value="category">Category</option>
                                                        <option value="tags">Tags</option>
                                                        <option value="status">Status</option>
                                                        <option value="dimention">Dimention</option>
                                                        <option value="weight">Weight</option>
                                                        <option value="stock">Stock Quantity</option>
                                                        <option value="availability">Stock Status</option>
                                                        <option value="shipping_class">Shipping Class</option>
                                                        <option value="ids">IDs</option>
                                                        <option value="purchase_note">Purchase Note</option>
                                                        <option value="long_des">Long Description</option>
                                                        <option value="short_des">Short Description</option>
                                                    </optgroup>
                                                </select>
                                            </label>

                                    </div>
                                </div>
                                
                                
                                <br>
                                <input type="radio" name="do_not_include_variants" value="simple"><b> Do not include variants</b><br>
                                <input type="radio" name="include_variants_as_well" value="simple_variant"><b> Include variants as well</b><br>
                                <input type="radio" name="include_variants_only" value="variant"><b> Include variants only</b><br>
                                
                                
                                                    
                                        <br class="clear">
                                        <div class="spinner_filter_div">
                                        <span class="spinner" style="float: left;"></span>
                                        </div>
                                        <input class="button-primary" id="bulk_filter" type="submit" name="submit" value="<?php _e( 'Filter' ); ?>" />
                                        <input type="hidden" name="action" value="filter" />                
                                           
                            </form>     
                                        
                        </div>  
                       
                                   
                    </div> <!-- .inside -->
                </div> <!-- .inside -->
                           
                            
                            
                        <!-- Bulk Edit Section -->
                        <div class="postbox">

                            <!-- Showing Bulk Edit options -->
                            <?php include_once(RS_BRAS_PLUGIN_DIR . '/include/view/edit_options.php'); ?>
                            
                        </div>
                            
                            
                            
        </div> <!-- .postbox -->

    </div> <!-- .meta-box-sortables .ui-sortable -->

</div> <!-- post-body-content -->
                
                
                
                
                
                     
                
                


    </div> <!-- #post-body .metabox-holder .columns-2 -->
    



        
 