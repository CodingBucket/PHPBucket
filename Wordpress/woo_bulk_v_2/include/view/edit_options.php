   <h3><span><b>What do you want to change ?</b></span></h3>
                            <form method="post">
                            <div class="inside">
                                
                                <div class="first_edit_criteria">
                                    <div class="main-dropdown">
                                        <span>Product Data<span class="type_box"> &mdash; 
                                        <label for="product-type">
                                            <select name="bulk-product-type" class="product_bulk_edit">
                                                <optgroup label="Product Type">
                                                    <option selected="selected" value="simple">Choose Criteria</option>
                                                    <option value="bulk_name">Name</option>
                                                    <option value="bulk_attribute">Attribute</option>
                                                    <option value="bulk_price">Price</option>
                                                    <option value="bulk_sale_price">Sale Price</option>
                                                    <option value="bulk_sku">SKU</option>
                                                    <option value="bulk_category">Category</option>
                                                    <option value="bulk_tag">Tag</option>                                                 
                                                    <option value="bulk_weight">Weight</option>
                                                    <option value="bulk_stock">Stock Quantity</option>                                                    
                                                    <option value="bulk_shipping_class">Shipping Class</option>                                                    
                                                    <option value="bulk_long_des">Long Description</option>
                                                    <option value="bulk_short_des">Short Description</option>                                                   
                                                    <option value="bulk_height">Height</option>
                                                    <option value="bulk_width">Width</option>
                                                    <option value="bulk_depth">Depth</option>
                                                    <option value="bulk_variation">Variation</option>
                                                    
                                                </optgroup>
                                            </select>
                                        </label>                                      
                                    </div>
                                </div>
                                
                                <div class="bulk_edit_section">
                                
                                    <div class="show_edit_section"> 
                                    
                                        <!-- Showing all filter drop here -->
                                    
                                    </div>  
                                            
                                    
                                    <!-- Drop1 Name bulk-->
                                    <div class="name_bulk_block_main bulk_main" style="margin-bottom: 40px;">
                                        <div class="name_bulk_block" data-name="Name">

                                            <a href="#" class="btn btn-warning remove_bulk_block" data-block="name_bulk_block" name="submit"><i class="fa fa-trash"></i></a> 

                                            <div class="bulk_block" id="name_bulk_block">
                                                <span class="left_level"><b>Name</b></span> &mdash;

                                                <label for="product-type">
                                                    <select name="name_bulk_filter_type[]" class="bulk_replace bulk_block_brop" >
                                                        <optgroup>
                                                            <option selected="selected">Select Option</option>
                                                            <option value="name_bulk_starts_with">Add text at the beginning </option>
                                                            <option value="name_bulk_ends_with">Add text at the end</option>
                                                            <option value="name_bulk_define_new_text">Define new text</option>
                                                            <option value="name_bulk_replace">Replace</option>
                                                        </optgroup>
                                                    </select>
                                                </label>

                                                <input class="input-field first-input" type="text" name="name_bulk_filter_value[]" style="" class="short">
                                                <a href="#" class="btn btn-danger remove_new_drop_bulk" data-block="name"><i class="fa fa-trash"></i></a>

                                            </div>

                                            <a href="#" class="btn btn-success add_new_drop_bulk" data-block="name"><i class="fa fa-plus"></i></a>


                                        </div>
                                    </div>
                                            
                                    <!-- Drop2 Short des bulk-->
                                    <div class="short_des_bulk_block_main bulk_main" style="margin-bottom: 40px;">
                                        <div class="short_des_bulk_block" data-name="Short Descripton">
                                                    
                                            <a href="#" class="btn btn-warning remove_bulk_block" data-block="short_des_bulk_block" name="submit"><i class="fa fa-trash"></i></a> 
                                            
                                            <div class="bulk_block" id="short_des_bulk_block" class="bulk_replace">
                                                
                                                <span class="left_level"><b>Short Descripton</b></span> &mdash;
                                               
                                                
                                                <label for="product-type">
                                                    <select name="short_des_bulk_filter_type[]" class="bulk_replace bulk_block_brop">
                                                        <optgroup>
                                                            <option selected="selected">Select Option</option>
                                                            <option value="short_des_bulk_starts_with">Add text at the beginning </option>
                                                            <option value="short_des_bulk_ends_with">Add text at the end</option>
                                                            <option value="short_des_bulk_define_new_text">Define new text</option>
                                                            <option value="short_des_bulk_replace">Replace</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                              
                                                <input class="input-field first-input" type="text" name="short_des_bulk_filter_value[]" style="" class="short">
                                                <a href="#" class="btn btn-danger remove_new_drop_bulk" data-block="short_des"><i class="fa fa-trash"></i></a>

                                            
                                            </div>
                                            
                                            <a href="#" class="btn btn-success add_new_drop_bulk" data-block="short_des"><i class="fa fa-plus"></i></a>
                                       
                                        </div>
                                    </div>
                                            
                                    <!-- Drop3 Long des bulk-->
                                    <div class="long_des_bulk_block_main bulk_main" style="margin-bottom: 40px;">
                                        <div class="long_des_bulk_block" data-name="Long Descripton">
                                            
                                            <a href="#" class="btn btn-warning remove_bulk_block" data-block="long_des_bulk_block" name="submit"><i class="fa fa-trash"></i></a> 
                                            
                                            <div class="bulk_block" id="long_des_bulk_block"  class="bulk_replace">
                                                
                                                <span class="left_level"><b>Long Descripton</b></span> &mdash;
                                       
                                                <label for="product-type">
                                                    <select name="long_des_bulk_filter_type[]" class="bulk_replace bulk_block_brop">
                                                        <optgroup>
                                                            <option selected="selected">Select Option</option>
                                                            <option value="long_des_bulk_starts_with">Add text at the beginning </option>
                                                            <option value="long_des_bulk_ends_with">Add text at the end</option>
                                                            <option value="long_des_bulk_define_new_text">Define new text</option>
                                                            <option value="long_des_bulk_replace">Replace</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                               
                                                <input class="input-field first-input" type="text" name="long_des_bulk_filter_value[]" style="" class="short">
                                                <a href="#" class="btn btn-danger remove_new_drop_bulk" data-block="long_des"><i class="fa fa-trash"></i></a>

                                                
                                            </div>
                                            
                                            <a href="#" class="btn btn-success add_new_drop_bulk" data-block="long_des"><i class="fa fa-plus"></i></a>                                      
                                            
                                        </div>
                                    </div>
                                            
                                    <!-- Drop4 Price bulk-->
                                    <div class="price_bulk_block_main bulk_main" style="margin-bottom: 40px;">
                                        <div class="price_bulk_block" data-name="Price">
                                            
                                            <a href="#" class="btn btn-warning remove_bulk_block" data-block="price_bulk_block" name="submit"><i class="fa fa-trash"></i></a> 
                                            
                                            
                                            <div class="bulk_block" id="price_bulk_block">
                                                
                                                <span class="left_level"><b>Price</b></span> &mdash;
                                                
                                                <label for="product-type">
                                                    <select name="price_bulk_filter_type[]" class="bulk_block_brop">
                                                        <optgroup>
                                                            <option selected="selected">Select Option</option>
                                                            <option value="price_bulk_define_new_price">Define new price</option>
                                                            <option value="price_bulk_increase_by_value">Increase by value </option>
                                                            <option value="price_bulk_reduce_by_value">Reduce by value </option>
                                                            <option value="price_bulk_increase_by_per">Increase by % </option>
                                                            <option value="price_bulk_reduce_by_per">Reduce by % </option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                
                                                <input class="input-field first-input numaric" type="text" name="price_bulk_filter_value[]" style="" class="short">
                                                <a href="#" class="btn btn-danger remove_new_drop_bulk" data-block="price"><i class="fa fa-trash"></i></a>

                                            
                                            </div>
                                            
                                            <a href="#" class="btn btn-success add_new_drop_bulk" data-block="price"><i class="fa fa-plus"></i></a>                                      
                                            
                                            
                                        </div>
                                    </div>
                                            
                                    <!-- Drop5 Sale Price bulk-->
                                    <div class="sale_price_bulk_block_main bulk_main" style="margin-bottom: 40px;">
                                        <div class="sale_price_bulk_block" data-name="Sale Price">
                                            
                                            <a href="#" class="btn btn-warning remove_bulk_block" data-block="sale_price_bulk_block" name="submit"><i class="fa fa-trash"></i></a> 
                                            
                                            <div class="bulk_block" id="sale_price_bulk_block">

                                                
                                                <span class="left_level"><b>Sale Price</b></span> &mdash;
                                                
                                                <label for="product-type">
                                                    <select name="sale_price_bulk_filter_type[]" class="bulk_block_brop">
                                                        <optgroup>
                                                            <option selected="selected">Select Option</option>
                                                            <option value="sale_price_bulk_define_new_price">Define new price</option>
                                                            <option value="sale_price_bulk_increase_by_value">Increase by value </option>
                                                            <option value="sale_price_bulk_reduce_by_value">Reduce by value </option>
                                                            <option value="sale_price_bulk_increase_by_per">Increase by % </option>
                                                            <option value="sale_price_bulk_reduce_by_per">Reduce by % </option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                               
                                                <input class="input-field first-input numaric" type="text" name="sale_price_bulk_filter_value[]" style="" class="short">
                                                <a href="#" class="btn btn-danger remove_new_drop_bulk" data-block="sale_price"><i class="fa fa-trash"></i></a>

                                            </div>
                                            
                                            <a href="#" class="btn btn-success add_new_drop_bulk" data-block="sale_price"><i class="fa fa-plus"></i></a>                                      
                                            
                                            
                                        </div>
                                    </div>
                                            
                                    <!-- Drop6 Attribute bulk -->
                                    <div class="attribute_bulk_block_main bulk_main" style="margin-bottom: 40px;">
                                        <div class="attribute_bulk_block" data-name="Attribute">
                                            
                                            <a href="#" class="btn btn-warning remove_bulk_block" data-block="attribute_bulk_block" name="submit"><i class="fa fa-trash"></i></a> 
                                            
                                            <div class="bulk_block" id="attribute_bulk_block">
                                             
                                                <span class="left_level"><b>Attribute</b></span> &mdash;
                                                        
                                                <label for="product-type">
                                                    <select name="attribute_bulk_action_type[]" >
                                                        <optgroup>
                                                            <option selected="selected">Select Option</option>
                                                            <option value="attribute_bulk_add">Add</option>
                                                            <option value="attribute_bulk_remove">Remove</option>

                                                        </optgroup>
                                                    </select>
                                                </label>        
                                                        
                                                        
                                                <?php $r = get_all_global_attributes(); 
                                                    if($r){
                                                ?>
                                               
                                                    <label for="product-type">
                                                        <select name="attribute_bulk_filter_type[]" class="global-attribute-bulk">
                                                            <optgroup>
                                                                <option value="">Select Option</option>
                                                                <?php if(isset($r)){ foreach($r as $key){ ?>
                                                                <option value="<?php echo $key->attribute_name; ?>"><?php echo ucfirst($key->attribute_name); ?></option>
                                                                <?php }} ?>
                                                            </optgroup>
                                                        </select>
                                                    </label>
                                                
                                                <?php }else{ ?>
                                                
                                                    <label for="product-type">
                                                        <select name="attribute_bulk_filter_type[]" class="global-attribute-bulk">
                                                            <optgroup>
                                                                <option value="">No attributes found, please add some first</option>
                                                            
                                                            </optgroup>
                                                        </select>
                                                    </label>
                                                
                                                <?php } ?>
                                                
                                                <div class="bulk_attribute_terms" style="display: inline-block;">
                                                    
                                                </div> 
                                                        
                                              
                                                        
                                                <!--<input class="button-primary add_new_drop_bulk" data-bulk="attribute" type="Button" name="submit" value="<?php _e( 'Add' ); ?>" />-->
                                            
                                                <!--<input class="input-field first-input" type="text" name="sale_price_bulk_filter_value[]" style="" class="short">-->
                                                <a href="#" class="btn btn-danger remove_new_drop_bulk" data-block="attribute"><i class="fa fa-trash"></i></a>

                                                
                                                <!--<input class="input-field" type="text" name="filter_value_status[]" style="" class="short">-->
                                            </div>
                                            
                                            <a href="#" class="btn btn-success add_new_drop_bulk" data-block="attribute"><i class="fa fa-plus"></i></a>                                      
                                            
                                        </div>
                                    </div>
                                            
                                    <!-- Drop7 Variation bulk-->
                                    <div class="variation_bulk_block_main bulk_main" style="margin-bottom: 40px;">
                                        <div class="variation_bulk_block" data-name="Variations">
                                            
                                            <a href="#" class="btn btn-warning remove_bulk_block" data-block="variation_bulk_block" name="submit"><i class="fa fa-trash"></i></a> 
                                            
                                            
                                            <div class="bulk_block" id="variation_bulk_block">

                                                <span class="left_level"><b>Variations</b></span> &mdash;
                                                
                                                <label for="product-type">
                                                    <select name="variation_bulk_update_type[]" class="modification_type">
                                                        <optgroup>                                                         
                                                            <option value="">Select Option</option>
                                                            <option value="variation_bulk_add">Add</option>
                                                            <option value="variation_bulk_remove">Remove</option>
                                                            <option value="variation_bulk_set_new">Set New</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                                        
                                                <label for="product-type">
                                                    <select name="variation_bulk_update_param[]" class="bulk_block_brop">
                                                        <optgroup>
                                                            <option value="">Select Option</option>
                                                            <option value="variation_bulk_sku">SKU</option>
                                                            <option value="variation_bulk_stock">Stock</option>
                                                            <option value="variation_bulk_price">Price</option>
                                                            <option value="variation_bulk_sale_price">Sale Price</option>
                                                            <option value="variation_bulk_weight">Weight</option>
                                                            <option value="variation_bulk_height">Height</option>
                                                            <option value="variation_bulk_width">Width</option>
                                                            <option value="variation_bulk_depth">Depth</option>
                                                            <option value="variation_bulk_availibility">Stock Status</option>
                                                            
                                                        </optgroup>
                                                    </select>
                                                </label>  
                                                
                                                <div class="bulk_update_availibility" style="display: inline-block;display: none;">
                         
                                                    <label for="product-type">
                                                        <select name="variation_bulk_update_availibility[]" class="variation_bulk_update_stock">
                                                            <optgroup>
                                                                <option value="">Select Option</option>
                                                                <option value="instock">In Stock</option>
                                                                <option value="outofstock">Out Of Stock</option>
  
                                                            </optgroup>
                                                        </select>
                                                    </label>
                                                   
                                                </div>    
                                                        
                                                <div class="bulk_update_increase" style="display: inline-block;display: none;">
                                                    
                                                    <label for="product-type">
                                                        <select name="variation_bulk_update_param2[]" class="bulk_block_brop">
                                                            <optgroup>
                                                                <option value="">Select Option</option>
                                                                <option value="variation_increase_by_value">Increase by value</option>
                                                                <option value="variation_increase_by_per">Increase by %</option>
                                                                <option value="variation_decrease_by_per">Decrease by %</option>

                                                            </optgroup>
                                                        </select>
                                                    </label> 
                                                </div>    
                                                
                            
                                                
                                                <div class="variation_bulk_update_price" style="display: inline-block;display: none;">
                                                    
                                                    <label for="product-type">
                                                        <select name="variation_bulk_update_price[]" class="bulk_block_brop">
                                                            <optgroup>
                                                                <option value="">Select Option</option>
                                                            
                                                            <option value="variation_price_bulk_define_new_price">Define new price</option>
                                                            <option value="variation_price_bulk_increase_by_value">Increase by value </option>
                                                            <option value="variation_price_bulk_reduce_by_value">Reduce by value </option>
                                                            <option value="variation_price_bulk_increase_by">Increase by % </option>
                                                            <option value="variation_price_bulk_reduce_by">Reduce by % </option>

                                                            </optgroup>
                                                        </select>
                                                    </label> 
                                                </div>
                                                
                                                <div class="variation_bulk_update_sale_price" style="display: inline-block;display: none;">
                                                    
                                                    <label for="product-type">
                                                        <select name="variation_bulk_update_sale_price[]" class="bulk_block_brop">
                                                            <optgroup>
                                                                <option value="">Select Option</option>
                                                            
                                                            <option value="variation_price_bulk_define_new_price">Define new price</option>
                                                            <option value="variation_price_bulk_increase_by_value">Increase by value </option>
                                                            <option value="variation_price_bulk_reduce_by_value">Reduce by value </option>
                                                            <option value="variation_price_bulk_increase_by">Increase by % </option>
                                                            <option value="variation_price_bulk_reduce_by">Reduce by % </option>

                                                            </optgroup>
                                                        </select>
                                                    </label> 
                                                </div>
                                                
                                                
                                                <input class="input-field first-input" type="text" name="variation_bulk_update_value[]" style="" class="short">
                                                <a href="#" class="btn btn-danger remove_new_drop_bulk" data-block="variation"><i class="fa fa-trash"></i></a>

                                            </div>
                                            
                                            <a href="#" class="btn btn-success add_new_drop_bulk" data-block="variation"><i class="fa fa-plus"></i></a>                                      
                                            
                                        </div>
                                    </div>
                                    
                                    <!-- Drop8 Category bulk -->
                                    <div class="category_bulk_block_main bulk_main" style="margin-bottom: 40px;display: none">
                                        <div class="category_bulk_block" data-name="Category">
                                            
                                            <a href="#" class="btn btn-warning remove_bulk_block" data-block="category_bulk_block" name="submit"><i class="fa fa-trash"></i></a> 
                                            
                                            <div class="bulk_block" id="category_bulk_block">
                                             
                                                <span class="left_level"><b>Category</b></span> &mdash;
                                                        
                                                <label for="product-type">
                                                    <select name="category_bulk_action_type[]" class="bulk_block_brop">
                                                        <optgroup>
                                                            <option value="">Select Option</option>
                                                            <option value="category_bulk_add">Add</option>
                                                            <option value="category_bulk_remove">Remove</option>
                                                            <option value="category_bulk_set_new">Set New</option>
                                                        </optgroup>
                                                    </select>
                                                </label>        
                                                                                                                
                                                
                                                <div class="bulk_category" style="display: inline-block;">
                                                    
                                                </div> 
                                                        
                                                <a href="#" class="btn btn-danger remove_new_drop_bulk" data-block="category"><i class="fa fa-trash"></i></a>
                                                
                                            </div>
                                            
                                            <a href="#" class="btn btn-success add_new_drop_bulk" data-block="category"><i class="fa fa-plus"></i></a>                                      
                                            
                                        </div>
                                    </div>
                                    
                                    <!-- Drop9 Tag bulk -->
                                    <div class="tag_bulk_block_main bulk_main" style="margin-bottom: 40px;display: none">
                                        <div class="tag_bulk_block" data-name="Tag">
                                            
                                            <a href="#" class="btn btn-warning remove_bulk_block" data-block="tag_bulk_block" name="submit"><i class="fa fa-trash"></i></a> 
                                            
                                            <div class="bulk_block" id="tag_bulk_block">
                                             
                                                <span class="left_level"><b>Tag</b></span> &mdash;
                                                        
                                                <label for="product-type">
                                                    <select name="tag_bulk_action_type[]" class="bulk_block_brop">
                                                        <optgroup>
                                                            <option value="">Select Option</option>
                                                            <option value="tag_bulk_add">Add</option>
                                                            <option value="tag_bulk_remove">Remove</option>
                                                            <option value="tag_bulk_set_new">Set New</option>
                                                        </optgroup>
                                                    </select>
                                                </label>        
                                                                                                                
                                                
                                                <div class="bulk_tag" style="display: inline-block;">
                                                    
                                                </div> 
                                                        
                                                <a href="#" class="btn btn-danger remove_new_drop_bulk" data-block="tag"><i class="fa fa-trash"></i></a>
                                                
                                            </div>
                                            
                                            <a href="#" class="btn btn-success add_new_drop_bulk" data-block="tag"><i class="fa fa-plus"></i></a>                                      
                                            
                                        </div>
                                    </div>
                                    
                                    <!-- Drop10 Weight bulk-->
                                    <div class="weight_bulk_block_main bulk_main" style="margin-bottom: 40px;display: none">
                                        <div class="weight_bulk_block" data-name="Weight">
                                            
                                            <a href="#" class="btn btn-warning remove_bulk_block" data-block="weight_bulk_block" name="submit"><i class="fa fa-trash"></i></a> 
                                            
                                            
                                            <div class="bulk_block" id="weight_bulk_block">

                                                <span class="left_level"><b>Weight</b></span> &mdash;
                                                
                                                <label for="product-type">
                                                    <select name="weight_bulk_filter_type[]" >
                                                        <optgroup>                                                         
                                                            <option value="weight_bulk_update">Update</option>
                                                        </optgroup>
                                                    </select>
                                                </label>

                                                <input class="input-field numaric" type="text" name="weight_bulk_filter_value[]" style="" class="short">
                                                <a href="#" class="btn btn-danger remove_new_drop_bulk" data-block="weight"><i class="fa fa-trash"></i></a>

                                            </div>
                                            
                                            <a href="#" class="btn btn-success add_new_drop_bulk" data-block="weight"><i class="fa fa-plus"></i></a>                                      
                                            
                                        </div>
                                    </div>
                                    
                                    <!-- Drop11 Height bulk-->
                                    <div class="height_bulk_block_main bulk_main" style="margin-bottom: 40px;display: none">
                                        <div class="height_bulk_block" data-name="height">
                                            
                                            <a href="#" class="btn btn-warning remove_bulk_block" data-block="height_bulk_block" name="submit"><i class="fa fa-trash"></i></a> 
                                            
                                            
                                            <div class="bulk_block" id="height_bulk_block">

                                                <span class="left_level"><b>Height</b></span> &mdash;
                                                
                                                <label for="product-type">
                                                    <select name="height_bulk_filter_type[]" >
                                                        <optgroup>                                                         
                                                            <option value="height_bulk_update">Update</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                
                                                <input class="input-field numaric" type="text" name="height_bulk_filter_value[]" style="" class="short">
                                                <a href="#" class="btn btn-danger remove_new_drop_bulk" data-block="height"><i class="fa fa-trash"></i></a>

                                            </div>
                                            
                                            <a href="#" class="btn btn-success add_new_drop_bulk" data-block="height"><i class="fa fa-plus"></i></a>                                      
                                            
                                        </div>
                                    </div>
                                    
                                    <!-- Drop12 Width bulk-->
                                    <div class="width_bulk_block_main bulk_main" style="margin-bottom: 40px;display: none">
                                        <div class="width_bulk_block" data-name="width">
                                            
                                            <a href="#" class="btn btn-warning remove_bulk_block" data-block="width_bulk_block" name="submit"><i class="fa fa-trash"></i></a> 
                                            
                                            
                                            <div class="bulk_block" id="width_bulk_block">

                                                <span class="left_level"><b>Width</b></span> &mdash;
                                                
                                                <label for="product-type">
                                                    <select name="width_bulk_filter_type[]" >
                                                        <optgroup>                                                         
                                                            <option value="width_bulk_update">Update</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                
                                                <input class="input-field numaric" type="text" name="width_bulk_filter_value[]" style="" class="short">
                                                <a href="#" class="btn btn-danger remove_new_drop_bulk" data-block="width"><i class="fa fa-trash"></i></a>

                                            </div>
                                            
                                            <a href="#" class="btn btn-success add_new_drop_bulk" data-block="width"><i class="fa fa-plus"></i></a>                                      
                                            
                                        </div>
                                    </div>
                                    
                                    <!-- Drop13 Depth bulk-->
                                    <div class="depth_bulk_block_main bulk_main" style="margin-bottom: 40px;display: none">
                                        <div class="depth_bulk_block" data-name="depth">
                                            
                                            <a href="#" class="btn btn-warning remove_bulk_block" data-block="depth_bulk_block" name="submit"><i class="fa fa-trash"></i></a> 
                                            
                                            
                                            <div class="bulk_block" id="depth_bulk_block">

                                                <span class="left_level"><b>Depth</b></span> &mdash;
                                                
                                                <label for="product-type">
                                                    <select name="depth_bulk_filter_type[]" >
                                                        <optgroup>                                                         
                                                            <option value="depth_bulk_update">Update</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                
                                                <input class="input-field numaric" type="text" name="depth_bulk_filter_value[]" style="" class="short">
                                                <a href="#" class="btn btn-danger remove_new_drop_bulk" data-block="depth"><i class="fa fa-trash"></i></a>

                                            </div>
                                            
                                            <a href="#" class="btn btn-success add_new_drop_bulk" data-block="depth"><i class="fa fa-plus"></i></a>                                      
                                            
                                        </div>
                                    </div>
                                    
                                    <!-- Drop14 SKU bulk-->
                                    <div class="sku_bulk_block_main bulk_main" style="margin-bottom: 40px;display: none">
                                        <div class="sku_bulk_block" data-name="sku">
                                            
                                            <a href="#" class="btn btn-warning remove_bulk_block" data-block="sku_bulk_block" name="submit"><i class="fa fa-trash"></i></a> 
                                            
                                            
                                            <div class="bulk_block" id="sku_bulk_block">

                                                <span class="left_level"><b>SKU</b></span> &mdash;
                                                
                                                <label for="product-type">
                                                    <select name="sku_bulk_filter_type[]" >
                                                        <optgroup>                                                         
                                                            <option value="sku_bulk_update">Update</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                
                                                <input class="input-field" type="text" name="sku_bulk_filter_value[]" style="" class="short">
                                                <a href="#" class="btn btn-danger remove_new_drop_bulk" data-block="sku"><i class="fa fa-trash"></i></a>

                                            </div>
                                            
                                            <a href="#" class="btn btn-success add_new_drop_bulk" data-block="sku"><i class="fa fa-plus"></i></a>                                      
                                            
                                        </div>
                                    </div>
                                    
                                    <!-- Drop15 Stock bulk-->
                                    <div class="stock_bulk_block_main bulk_main" style="margin-bottom: 40px;display: none">
                                        <div class="stock_bulk_block" data-name="Stock Quantity">
                                            
                                            <a href="#" class="btn btn-warning remove_bulk_block" data-block="stock_bulk_block" name="submit"><i class="fa fa-trash"></i></a> 
                                            
                                            
                                            <div class="bulk_block" id="stock_bulk_block">

                                                <span class="left_level"><b>Stock Quantity</b></span> &mdash;
                                                
                                                <label for="product-type">
                                                    <select name="stock_bulk_filter_type[]" >
                                                        <optgroup>                                                         
                                                            <option value="stock_bulk_update">Update</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                
                                                <input class="input-field numaric" type="text" name="stock_bulk_filter_value[]" style="" class="short">
                                                <a href="#" class="btn btn-danger remove_new_drop_bulk" data-block="stock"><i class="fa fa-trash"></i></a>

                                            </div>
                                            
                                            <a href="#" class="btn btn-success add_new_drop_bulk" data-block="stock"><i class="fa fa-plus"></i></a>                                      
                                            
                                        </div>
                                    </div>
                                    
                                    <!-- Drop16 Shipping Class bulk -->
                                    <div class="shipping_class_bulk_block_main bulk_main" style="margin-bottom: 40px;display: none">
                                        <div class="shipping_class_bulk_block" data-name="Shipping Class">
                                            
                                            <a href="#" class="btn btn-warning remove_bulk_block" data-block="shipping_class_bulk_block" name="submit"><i class="fa fa-trash"></i></a> 
                                            
                                            <div class="bulk_block" id="shipping_class_bulk_block">
                                             
                                                <span class="left_level"><b>Shipping Class</b></span> &mdash;
                                                        
                                                <label for="product-type">
                                                    <select name="shipping_class_bulk_action_type[]" class="bulk_block_brop">
                                                        <optgroup>
                                                            <option value="">Select Option</option>
                                                            <option value="shipping_class_bulk_add">Add</option>
                                                            <option value="shipping_class_bulk_remove">Remove</option>
                                                            <option value="shipping_class_bulk_set_new">Set New</option>
                                                        </optgroup>
                                                    </select>
                                                </label>        
                                                                                                                
                                                
                                                <div class="bulk_shipping_class" style="display: inline-block;">
                                                    
                                                </div> 
                                                        
                                                <a href="#" class="btn btn-danger remove_new_drop_bulk" data-block="shipping_class"><i class="fa fa-trash"></i></a>
                                                
                                            </div>
                                            
                                            <a href="#" class="btn btn-success add_new_drop_bulk" data-block="shipping_class"><i class="fa fa-plus"></i></a>                                      
                                            
                                        </div>
                                    </div>
                                            
                                            
                                    
                                </div>  
                                
                                
                                <div class="second_edit_criteria">
                                    <div class="main-dropdown">
                                        <span>Product Data<span class="type_box"> &mdash; 
                                        <label for="product-type">
                                            <select name="bulk-product-type" class="product_bulk_edit">
                                                <optgroup label="Product Type">
                                                    <option selected="selected" value="simple">Choose Criteria</option>
                                                    <option value="bulk_name">Name</option>
                                                    <option value="bulk_attribute">Attribute</option>
                                                    <option value="bulk_price">Price</option>
                                                    <option value="bulk_sale_price">Sale Price</option>
                                                    <option value="bulk_sku">SKU</option>
                                                    <option value="bulk_category">Category</option>
                                                    <option value="bulk_tag">Tag</option>                                                 
                                                    <option value="bulk_weight">Weight</option>
                                                    <option value="bulk_stock">Stock Quantity</option>                                                    
                                                    <option value="bulk_shipping_class">Shipping Class</option>                                                    
                                                    <option value="bulk_long_des">Long Description</option>
                                                    <option value="bulk_short_des">Short Description</option>                                                   
                                                    <option value="bulk_height">Height</option>
                                                    <option value="bulk_width">Width</option>
                                                    <option value="bulk_depth">Depth</option>
                                                    <option value="bulk_variation">Variation</option>
                                                </optgroup>
                                            </select>
                                        </label>                                      
                                    </div>
                                </div>
                                
                       
                                
                                
                                                    
                        <br class="clear">
                        <div class="spinner_edit_div">
                            <span class="spinner" style="float: left;"></span>
                         </div>    
                        <input class="button-primary" id="perform_changes" type="submit" name="submit" value="<?php _e( 'Perform changes' ); ?>" />
                        <input type="hidden" name="action" value="perform_changes" /> 
                       
                        
                            <?php 
                                if($the_query->have_posts()){    
                                    while ( $the_query->have_posts() ) {
                                        $the_query->the_post();
                            ?>
                                    <input type="hidden" name="post_id[]" value="<?php echo get_the_ID() ?>"> 
                        
                            <?php        }
                                }  
                            ?>
                        
                        
                    
                                        
                    </div>  
                     
                             </form>   
                            
                            