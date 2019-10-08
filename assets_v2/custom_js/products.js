(function($) {
    'use strict';
    
    
    //alert(site_url);
   
   
    //  allow only number
    
    $(".cu_phone_js").on("keypress keyup blur",function (event) { 
        $(this).val($(this).val().replace(/[^\d].+/, ""));
         if ((event.which < 48 || event.which > 57)) {
             event.preventDefault();
         }

    });
        
    $(".modal_prdimgg").on("click","[data-toggle='modal']", function(e){
        
        e.preventDefault();
        var url = $(this).attr('href');
        var container = $(this).attr('data-target');
       $.post(
               url,
                function(data){
                    $(container).html(data).modal();
                }
            );
    });
    
        
    // on discount checked
    $('.dst').change(function() {
        if($(this).is(":checked"))
        {
            $('.dicountprice_div').fadeIn(500);
            $('.dicountprice_div').find('i').removeClass('fa-percent').addClass('fa-money');
            $(".dst_show").removeClass('per_calculate').addClass('dst_inp');
            $(".dst_show").attr("onkeyup", "");
            $(".dst_inp").attr("placeholder", "0,000").blur();
            $(".dst_inp").attr("max", "");
            $(".dst_inp").val("");
            $(".dst_inp").focus();
            $(".dst_inp").removeClass(' dst_show');
            $(".dicspam").hide();
        }
        else
        { 
            $('.dicountprice_div').fadeOut(500);
            $('.dicountprice_div').find('i').removeClass('fa-percent').addClass('fa-money');
            $(".dst_show").removeClass('per_calculate').addClass('dst_inp');
            $(".dst_show").attr("onkeyup", "");
            $(".dst_inp").val("");
            $(".dicspam").hide();
        }
        
    });
    
     
    $("#varanttable thead tr th:first input:checkbox").click(function () {
        var checkedStatus = this.checked;
        $("#varanttable tbody tr td:first-child input:checkbox").each(function () {
            this.checked = checkedStatus;
        });
    });
    $("input[type='image']").click(function() {
        $("input[class='var_color_sizeimg']").click();
    });

    var sizesArray = [];
    var colorArray = [];
    
    
    //remove all color size 
    function remove_color_size(colorA){ 
        $.each(colorA, function(key_color, color){
            console.log('value index='+key_color + ' value='+color);
            $(".varcolor"+color).remove();
        });
    }
    
    function add_color_size()
    {
        if (colorArray != '' && sizesArray == '')
        {
            remove_color_size(colorArray);
            $.each(colorArray, function(key_color, color)
                {
                    //$("#result").append(key_color + ": " + value + '<br>');
                    console.log('--- key color='+key_color + ' color='+color);
                    generatetablerow(color,'');
            
                });
        }
        else if (sizesArray != '' && colorArray == '')
        {
            remove_color_size(sizesArray);
            $.each(sizesArray, function(key_size, size)
                {
                    console.log(' --- key size= '+key_size+' value='+size);
                    generatetablerow('',size);
                });
                
        }
        else if (colorArray != '' && sizesArray != '')
        {
            remove_color_size(colorArray);remove_color_size(sizesArray);
            $.each(colorArray, function(key_color, color){
              //for( ii = 0, l = myArray2.length; ii < l; ii++ ) {
                $.each(sizesArray, function(key_size, size)
                    {
                        console.log(' --- key color= '+key_size+' color ='+color+' --- key size= '+key_size+' value='+size);
                        generatetablerow(color,size);
                    });
                
            });
        }
        else
        {
            console.log(' color field empty');
        }
                
    };

    function jqremove_(mainarray, removevalue) 
    {
        for (var index = mainarray.length - 1; index >= 0; index--) 
            {
                if (mainarray[index] == removevalue)
                    {
                        $(".varcolor"+removevalue).remove();
                        mainarray.splice(index, 1);
                        break;
                    }
            }
        
        $.each(mainarray, function(key, get)
            {
               // console.log(' --- key= '+key+' allsizes = '+get);
            });
        //return mainarray;
    };

    function jqadd_(mainarray,addvalue)
    {
        mainarray.push(addvalue);
        $.each(mainarray, function(key, get)
            {
                //console.log(' --- jqadd key= '+key+' values = '+get);
            });
                
    };
  
    function createvariant() 
    {
        if(colorArray == '' && sizesArray == '')
        {
            $('.var_div').hide();
        }
        else
        {
            $('.var_div').show();
        }
    };
    
    var $select_size = $('#allsizes').selectize({
        //theme: 'repositories',
        valueField: 'sizecode',
        labelField: 'sizecode',
        searchField: ['sizecode','sizecategory','sizename'],
        //optgroupField: 'sizecategory',
        options: [],
        create: false,

        delimiter: ',',
        persist: false,
        preload: true,
        openOnFocus: true,
        //maxOptions: 10,
        plugins: 
                [
                    'optgroup_columns',
                    //'drag_drop',
                    'remove_button'
                ],
        render: {
            option: function(item, escape) {
                return "<li>" 
                            + "<div style='display: inline-block; padding-left: 10px;'>\n\
                                <div class='full_name'>" + escape(item.sizecode) + " " + escape(item.sizename) + "</div>\n\
                                <div class='email'>" + escape(item.sizecategory)+ "</div>\n\
                               </div>\n\
                            </li>" ;
            }
        },
        load: function(query, callback) {
            //if (!query.length) return callback();
            $.ajax({
                url: site_url+'fashionadmin/products/all_sizes',//'https://api.github.com/legacy/repos/search/' + encodeURIComponent(query),
                type: 'GET',
                dataType: 'json',
                data: {
                    q: query
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    console.log('Success URL RES :' + res);
                    callback(res);
                }
            });
        },
        onChange: function(value) {

                    console.log('onchange SizevalueL RES :' + value);

                    //createvariant(value,false);
        },
        onItemAdd: function(value) {
                    console.log('onItemAdd SizevalueL  :' + value);

                    jqadd_(sizesArray,value);
                    add_color_size();
                    //console.table(sizesArray);

                    createvariant();
        },
        onItemRemove: function(value) {
                    console.log('onItemRemove SizevalueL  :' + value);

                    jqremove_(sizesArray,value);
                    add_color_size();
                    //console.table(sizesArray);

                    createvariant();
        }
    });
   
    var selectize_s = $select_size[0].selectize;


    var $select_color = $('#allcolor').selectize({
        //theme: 'repositories',
        valueField: 'colorname',
        labelField: 'colorname',
        searchField: ['colorname'],
        //optgroupField: 'sizecategory',
        options: [],
        create: false,

        delimiter: ',',
        persist: false,
        preload: true,
        openOnFocus: true,
        //maxOptions: 10,
        plugins: 
                [
                    'optgroup_columns',
                    //'drag_drop',
                    'remove_button'
                ],
        render: {
            option: function(item, escape) {
                return "<li> \n\
                            <b style=''>" + escape(item.colorname) + " </b> \n\
                        </li>" ;
            }
        },
        load: function(query, callback) {
            //if (!query.length) return callback();
            $.ajax({
                url: site_url+'fashionadmin/products/all_colors',//'https://api.github.com/legacy/repos/search/' + encodeURIComponent(query),
                type: 'GET',
                dataType: 'json',
                data: {
                    color: query
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    console.log('Success URL RES :' + res);
                    callback(res);
                }
            });
        },
        onChange: function(value) {
                    console.log('onchange colorvalue RES :' + value);
        },
        onItemAdd: function(value) {
                    console.log('onItemAdd Colorvalue  :' + value);

                    jqadd_(colorArray,value);
                    add_color_size();
                    //console.table(colorArray);

                    createvariant();
        },
        onItemRemove: function(value) {
                    console.log('onItemRemove ColorvalueL  :' + value);

                    jqremove_(colorArray,value);
                    add_color_size();
                    //console.table(colorArray);
                    
                    createvariant();
        }
    });
    
    
    function generatetablerow(color,size){
        var code,discount;
        var colorname='';

        if ($('.dst_inp').val()!== "")
        {
          discount= 
                  "<input \n\
                   type='number' \n\
                   class='form-control var_dis jboxtooltipp' \n\
                   name= 'variant_discount[]' \n\
                   data-toggle='tooltip' \n\
                   data-tooltip='true' \n\
                   title='Discount Price' \n\
                   min='0' \n\
                   placeholder= "+$('.dst_inp').attr("placeholder")+" \n\
                   value = "+$('.dst_inp').val()+" >";
        }
        else
        {
            discount= 
                  "<input \n\
                   type='number' \n\
                   class='form-control var_dis jboxtooltipp' \n\
                   name= 'variant_discount[]' \n\
                   data-toggle='tooltip' \n\
                   data-tooltip='true' \n\
                   title='Discount Price' \n\
                   min='0' \n\
                   readonly \n\
                  >";
        }


        if(color==='' && size !=='')
        {
            code = size;
        }
        else if(size==='' && color!=='')
        {
            code = color;
            colorname=    "<div class='col-xs-12 cat_namediv_"+color+" nopadding'>\n\
                              <div class='col-xs-1 nopadding'>\n\
                                  <a href='javascript:void(0);' class='editcolor' data-col_id='"+color+"' data-col_name='"+color+"' data-tooltip='true' data-toggle='tooltip' title='Edit Variant Name'>\n\
                                       <i class='ti-pencil-alt' style='color:green;'></i>\n\
                                  </a>\n\
                              </div>\n\
                              <div class='col-xs-10 nopadding' style='padding-left:5px;' data-col_id='"+color+"' data-tooltip='true' data-toggle='tooltip' title='Variant Name'>\n\
                                  "+color+"\n\
                              </div>\n\
                              <input \n\
                                  id="+color+"\n\
                                  type='hidden' \n\
                                  class='form-control var_name' \n\
                                  data-col_id='"+color+"'\n\
                                  name= 'variant_name[]' \n\
                                  value="+color+" \n\
                                  readonly \n\
                                  required=''\n\
                              >\n\
                          </div>";


        }
        else if(size!=='' && color!=='')
        {
            code = color;
            colorname=    "<div class='col-xs-12 cat_namediv_"+color+" nopadding'>\n\
                              <div class='col-xs-1 nopadding'>\n\
                                  <a href='javascript:void(0);' class='editcolor ' data-col_id='"+color+"' data-col_name='"+color+"' data-tooltip='true' data-toggle='tooltip' title='Edit Variant Name'>\n\
                                       <i class='ti-pencil-alt' style='color:green;'></i>\n\
                                  </a>\n\
                              </div>\n\
                              <div class='col-xs-10 nopadding' style='padding-left:5px;' data-col_id='"+color+"' data-tooltip='true' data-toggle='tooltip' title='Variant Name'>\n\
                                  "+color+"\n\
                              </div>\n\
                              <input  \n\
                                  id="+color+"\n\
                                  type='hidden' \n\
                                  class='form-control var_name' \n\
                                  name= 'variant_name[]' \n\
                                  value="+color+" \n\
                                  readonly \n\
                                  required=''\n\
                               >\n\
                          </div>";

        }
        /*else{
            code=color;
            colorname=    "<div class='col-xs-12 cat_namediv_1 nopadding'>\n\
                              <div class='col-xs-1 nopadding'>\n\
                                  <a href='javascript:void(0);' class='editcolor jboxtooltip' data-col_id='"+color+"' data-col_name='"+color+"' data-tooltip='tooltip' data-toggle='tooltip' title='Edit Variant Name'>\n\
                                       <i class='fa fa-pencil-square-o' style='color:green;'></i>\n\
                                  </a>\n\
                              </div>\n\
                              <div class='col-xs-10 nopadding jboxtooltip' style='padding-left:5px;' data-tooltip='tooltip' data-toggle='tooltip' title='Variant Name'>\n\
                                  "+color+"\n\
                              </div>\n\
                          </div>";
        }*/
        $("#varanttable").find('tbody')
                  .append($("<tr id='varcolor"+code+size+"' class='varcolor"+code+"'>")
                      .append(
                          $('<td>').append(
                                  $("<input/>", {
                                      'type': 'checkbox',
                                      'class': 'checkbox jboxtooltipp var_checkbox',
                                      'name': 'variant_check[]',
                                      'data-tooltip':'true',
                                      'data-toggle':'tooltip',
                                      'title':'Remove Variant',
                                      'value':color,
                                      'checked':''
                                              })
                                          ),
                          $("<td class='jboxtooltipp' title='Click to add Image' data-tooltip='true' data-toggle='tooltip' >").append(
                                  $('<img>', {
                                      'class': 'var_editimage',
                                      'id':'image'+color+size,
                                      'data-dataimage':'image'+color+size,
                                      'data-dataimggroup':'imggrp_varcolor'+color,
                                      'width':'40',
                                      'height':'40'
                                              }).attr('src', 'http://www.placehold.it/40x40'),
                                  $('<input>', {
                                          'type':'file',
                                          'accept':'image/*',
                                          'name':'variant_img[]',
                                          'id':'variant_img_'+color+size,
                                          'class':'var_color_sizeimg img_varcolor'+color,
                                          'style': 'display: none;'
                                              }),
                                  $('<input>', {
                                          'type':'hidden',
                                          'name':'variant_colorimage[]',
                                          'id':'variant_id_varcolor'+color,
                                          'class': 'variant_colorimage',
                                          'data-datainput':'datainput_varcolor'+color,
                                          'value': ''
                                              })

                                   ),
                          $('<td>').append(
                                  /*
                                  $("<div>", {
                                      'class':'col-xs-12 cat_namediv_1 nopadding'
                                              }).append(
                                                      $("<div>", {
                                                          'class':'col-xs-1 nopadding'
                                                              }).append(
                                                                      $("<a>", {
                                                                          'class':'editcolor jboxtooltip',
                                                                          'href':'javascript:void(0)',
                                                                          'data-col_id':color,
                                                                          'data-col_name':color,
                                                                          'data-toggle':'tooltip',
                                                                          'data-tooltip':'tooltip',
                                                                          'title':'Edit Variant Name'
                                                                              }).append(
                                                                                      $("<i>", {
                                                                                          'class':'fa fa-pencil-square-o',
                                                                                          'style':'color:green'
                                                                                              })
                                                                  )
                                                          ),
                                                      $("<div>", {
                                                          'class':'col-xs-11 nopadding jboxtooltip',
                                                          'style':'padding-left:5px;',
                                                          'data-toggle':'tooltip',
                                                          'data-tooltip':'tooltip',
                                                          'title':'Variant Name'
                                                                  }).append(color)
                                                      ),*/
                                  colorname,
                                  $("<div>", {
                                      'class':'col-xs-12 text-center'
                                              }).append("<b class='' data-tooltip='true' data-toggle='tooltip' title='Variant Size' >"+size+" <input type='hidden' class='form-control var_sizearray' name='variant_size[]' value='"+size+"' readonly required='required'></b>")
                                  ),
                          $('<td>').append(
                                  $("<input/>", {
                                      'type': 'number',
                                      'class': 'form-control var_pri',
                                      'name': 'variant_price[]',
                                      'min':'0',
                                      'value': $(".prd_pri").val(),
                                      'required':''
                                              }).attr('placeholder','0.000')
                                  ),
                          $('<td>').append(
                                  /*$("<input/>", {
                                      'type': 'number',
                                      'class': 'form-control var_dis jboxtooltip',
                                      'name': 'variant_discount[]',
                                      'data-toggle':'tooltip',
                                      'data-tooltip':'tooltip',
                                      'title':'Discount in %',
                                      'min':'0',
                                      'value':$(".dst_inp").val()
                                              }).attr('placeholder','00%')*/
                                  discount),
                          $('<td>').append(
                                  $("<input/>", {
                                      'type': 'number',
                                      'class': 'form-control var_qty',
                                      'name': 'variant_qty[]',
                                      'min':'1',
                                      'value':$(".prd_qty").val(),
                                      'required':''
                                              }).attr('placeholder','0000')
                                  ),
                      )
                  );
    } 
    
    
    var selectize_c = $select_color[0].selectize;
 
 
    $('.checkbox_size').change(function(){
        if(this.checked)
            {
                //var fieldHTML = '<div class="add_variant form-group addsizeclass"><div class="var_size">'+$(".var_size").html()+'</div></div>';
                //$('body').find('.add_variant:last').after(fieldHTML);
                $(".var_size").fadeIn(500);
                //getsize();
                
            }
        else{
                remove_color_size(sizesArray);
                sizesArray=[];
                add_color_size();
                createvariant();
                $(".var_size").fadeOut(500);
                selectize_s.clear();
            }
        });

    
    
    $('.checkbox_color').change(function(){
        if(this.checked)
            {
                $(".var_color").fadeIn(500);
                
            }
        else
            { 
                remove_color_size(colorArray);
                colorArray=[];
                add_color_size();
                createvariant();
                $(".var_color").fadeOut(500);
                selectize_c.clear();
            }

    });
    
    
    
    
    // check if size Inventory is checked or not
    $('.checkbox_size').change(function(){
        if(this.checked)
        {
            $(".var_size").fadeIn(500); 
        }
        else
        {
            remove_color_size(sizesArray);
            sizesArray=[];
            add_color_size();
            createvariant();
            $(".var_size").fadeOut(500);
            selectize_s.clear();
        }
    });
    
    // Check if Color Inventory is checked or not
    $('.checkbox_color').change(function(){
        if(this.checked)
        {
            $(".var_color").fadeIn(500);
        }
        else
        { 
            remove_color_size(colorArray);
            colorArray=[];
            add_color_size();
            createvariant();
            $(".var_color").fadeOut(500);
            selectize_c.clear();
        }

    });
      
      
      
    // Edit Variant Color name 
    $("#sortvariant").on("click",".editcolor", function(e){
        e.preventDefault();
        
        var col_Id = $(this).data('col_id');
        var col_Name = $(this).data('col_name');
        
        $('[name="new_col_name"]').val(col_Name);
        $('[name="new_col_name"]').data('col_id',col_Id); // sets value
        
        var elm = $(this);
        var xPos = e.pageX - elm.offset().left;
        var yPos = e.pageY - elm.offset().top;
       
        var position = $(this).offset(); //position();
        var newtop = position.top - 8;
        var newleft = position.left - 5;
        $('#color_name').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // close the name option button
    $('#closecolorname').click(function (e) {
        e.preventDefault();
        $('#color_name').hide();
    });
    
    
    // on name change 
    $('#colo_name_save').click(function (e) {
            e.preventDefault();
            
            var new_name = $('[name="new_col_name"]').val();
            var cat_id   = $('[name="new_col_name"]').data('col_id'); // gets value
            
            $(".cat_namediv_"+cat_id).find("div[data-col_id='" + cat_id +"']").text(new_name);
            $(".cat_namediv_"+cat_id).find(" #"+cat_id +"").val(new_name);
            $(".cat_namediv_"+cat_id).find(".editcolor[data-col_id='" + cat_id +"']").data('col_name',new_name); 
            $('#color_name').hide();

    });
    
    
    
    // add color image thumbs
    function uplodethumbs(imgdiv){
        
        if (window.File && window.FileList && window.FileReader) 
            {
                var files = $('#variant_img_'+imgdiv)[0].files;//or event.target.files; //FileList object
                var form_data = new FormData();

                for (var count = 0; count < files.length; count++) 
                    {
                        var file = files[count];
                        if (!file.type.match('image')) continue;
                        form_data.append("var_files[]", files[count]);
                    }
                    var coldiv = $(this).next().attr('class');
                    var check_id = $(this).closest('tr').attr('id');
                $.ajax({
                    url:site_url+'fashionadmin/products/save_colorimage', //base_url() return http://localhost/tutorial/codeigniter/
                    method:"POST",
                    data:form_data,
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data)
                        {
                            //$('#variant_img_'+imgdiv).val(data);
                            $("#"+check_id).find('#variant_img_'+imgdiv).val('');
                            //$("input[id='variant_img_']").val('');
                        }
                });
            } 
            else 
            {
                console.log('Browser not support');
            }
            
    }
    //images 
    var reader; 
    $("#sortvariant").on("click",".var_editimage", function(e){
        e.preventDefault();
        $(this).next(".var_color_sizeimg").click();
        
        $(this).next(".var_color_sizeimg").change(function () {
            
            
            var tr_class = $(this).closest('tr').attr('class');
            var imgdiv_id = $(this).prev().attr('id');
            var dataimg = $(this).prev().data('dataimage');//alert(dataimg +'--imgdiv_id= '+imgdiv_id);
            if (this.files && this.files[0]) 
                {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        $('img[data-dataimggroup= imggrp_'+tr_class+']').attr('src', e.target.result);
                        //$('img[data-dataimage='+dataimg+']').attr('src', e.target.result);
                        //$('#'+imgdiv_id).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            if (window.File && window.FileList && window.FileReader) 
            {
                var files =  event.target.files; //FileList object
                var form_data = new FormData();

                for (var count = 0; count < files.length; count++) 
                    {
                        var file = files[count];
                        if (!file.type.match('image')) continue;
                        form_data.append("var_files[]", files[count]);
                    }
                    var coloinput = $(this).next().attr('class');
                    var check_id = $(this).closest('tr').attr('id');
                    var check_class = $(this).closest('tr').attr('class');
                    //alert(check_class+'-- coldiv= '+coloinput+'--- check_id= '+check_id);
                $.ajax({
                    url:site_url+'fashionadmin/products/savecolorimage', //base_url() return http://localhost/tutorial/codeigniter/
                    method:"POST",
                    data:form_data,
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data)
                        {
                            //$("#"+check_id).find('.'+coloinput).val(data);
                            $("#varanttable").find("."+coloinput+"[data-datainput='datainput_"+check_class+"']").val(data); 
                            //$("#varanttable").find('.img_'+check_class).val('');
                            $("#"+check_id).find('#variant_img_'+dataimg).val('');
                        }
                });
            } 
            else 
            {
                console.log('Browser not support');
            }    
            
        });
    });
    
   
    function GetUpload(input) {
        if (input.files && input.files[0]) {
             reader = new FileReader();
            reader.onload = function (e) {
                $('.var_editimage')
                        .attr('src', e.target.result)
                        //.width(200)
                        //.height(200)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    function RemoveUpload() {
        $('.UploadView').attr('src', 'http://www.placehold.it/40x40');
        $('#fake-input').val('Choose your Image');
        $('.Prd_UploadView').hide();
    }
   
   //$(".var_checkbox").change(function(e){
    $("#sortvariant").on("change",".var_checkbox", function(e){
        e.preventDefault();
        var check_id = $(this).closest('tr').attr('id');
        if($(this).is(":checked"))
            {
                
                $("#"+check_id).find(".var_qty").prop('required',true);
                $("#"+check_id).find('input:not(:checkbox)').prop('disabled', false);
                
                
            }
        else
            { 
                $("#"+check_id).find(".var_qty").prop('required', false);
                $("#"+check_id).find('input:not(:checkbox)').prop('disabled', true);
            }

    });


    
    
    // delete uploaded image on upload form page
    $('.preview-images-zone').on('click', '.image-cancel', function(e) {
        
        var no = $(this).data('no');
        var key =$(this).data('key');
        $.ajax({
                url:site_url+'fashionadmin/products/delete_multipleimage', //base_url() return http://localhost/tutorial/codeigniter/
                method:"POST",
                data:{ key: key},
                success:function(data)
                    {
                        $(".preview-image.preview-show-"+no).remove();

                    }
            });

    });
    
    // to crop product image and save  
    var options =
    {
        thumbBox: '.thumbBox',
        spinner: '.spinner',
        //imgSrc: 'avatar.png'
    }
    var cropper = $('.imageBox').cropbox(options);
    $('#file').on('change', function(){
        var reader = new FileReader();
        reader.onload = function(e) {
            options.imgSrc = e.target.result;
            cropper = $('.imageBox').cropbox(options);
        }
        reader.readAsDataURL(this.files[0]);
        //this.files = [];
    });
    $('#btnCrop').on('click', function(){
        var img = cropper.getDataURL();
        $('.stepshide').hide();
        $('#Viewcrop_banner').remove();
        $('#Gp_rmv_banner').remove();
        $('.cropped').append('<input type="hidden" name="cropimg" value="'+img+'"/>');
        $('.cropped').append('<img id="Viewcrop_banner" class="Viewcrop_banner" src="'+img+'">');
        $('.cropped').append('<span id="Gp_rmv_banner" class="Gp_rmv_banner Removecrop" data-placement="top" data-toggle="tooltip" title="Remove Cover pics"><i class="far fa-trash-alt"></i></span>');
        $('.savebtn').show();
    });
    
    $('#btnZoomIn').on('click', function(){
        cropper.zoomIn();
    });
    $('#btnZoomOut').on('click', function(){
        cropper.zoomOut();
    });
    
    function Removecrop_banner() {
        
        $('.Viewcrop_banner').attr('src', '');
        $('#Viewcrop_banner').remove();
        $('#Gp_rmv_banner').remove();
        $('#fake-input_banner').val('Step 1: Choose your Image');
        $('.banner_UploadView').hide();
        $('.savebtn').hide();
        $('.banner_crop').hide();
    }
    $('input[id=file]').change(function() {
        $('.banner_UploadView').show();
        $('.stepshide').show();
        $('.banner_crop').show();
        //$('#fake-input_banner').val($(this).val().replace("C:\\fakepath\\", ""));
    });
    
    // on closing  product image modal
    $('#modal_imagee').on('click','.close',function(){
        /*$('#modal_image').hide('hide');
        $('#modal_image').html('').modal();
        $('.modal-backdrop').remove();
        $('body').removeClass('modal-open');*/
        Removecrop_banner();
    });
    
    // on closing  product image modal
    $('body').on('hidden.bs.modal', '#modal_imagee', function () {
        Removecrop_banner();
    });
    
    // clear crop image on click trash icon in product image modal
    $('#modal_imagee').on('click','.Removecrop',function(){
        Removecrop_banner();
    });
    
    
    $('input[id=base-input_banner]').change(function() {
        //$('.logo_UploadView').show();
        $('#fake-input_banner').val($(this).val().replace("C:\\fakepath\\", ""));
    });


    function GetUpload_banner(input) {
        if (input.files && input.files[0]) {
            reader = new FileReader();
            reader.onload = function (e) {
                $('.UploadView_banner')
                        .attr('src', e.target.result)
                        //.width(200)
                        //.height(500)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function RemoveUpload_banner() {


        $('.UploadView_banner').attr('src', 'https://placeholdit.co//i/555x200?bg=BDBDBD');
        $('#fake-input_banner').val('Choose your Image');
    }
    
    // save product image 
    $("#productimg_form").submit(function (e){
        
        e.preventDefault();
        //alert($(this).attr('action'));
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var data = $(this).serialize();
        $('#modal_imagee').modal('hide');
        $.ajax({
        url:url,//site_url+'fashionadmin/products/productimagesave',
        type:method,
        dataType: 'json',
        data:new FormData(this),
        processData:false,
        contentType:false,
        cache:false,
        beforeSend: function(){
            // Show image container
            $('input[class=sbmtbtn]').prop("disabled", true);
            $('.ajax-loader').css("visibility", "visible");
            $(".banner_UploadView").removeClass('slider_homebanner slider_homecenter slider_resslider');
            //$(".modal-dialog").removeClass('modal_dialog_edit');
        },
        success:function(data)
            {
                $('input[class=sbmtbtn]').prop("disabled", false);
                if(data.status === '1' )
                {
                    //alert('welcome success' + data.status); \
                    $(".preview-images-zone").append(data.content);
                    $("#pro-image").val('');

                    $('#modal_imagee').modal('hide'); 

                }

                else if(data.status === '0' )
                {
                    //alert('error ' + data.status); 
                    //$(".get_error").show("fast");

                    $(".get_error").show('fast').delay(4000).fadeOut('slow');
                    $(".get_error").effect("shake");
                    $(".error_msgr_lg").text(data.content);
                    //($".get_error").delay(5000).fadeOut('slow');
                    //$("#cat_form")[0].reset();
                    $("#cate_form").trigger('reset');
                    $("#save_url").focus();
                } 

                   //$('#order_datatable').DataTable().ajax.reload();

            },
        complete:function(data){
            // Hide image container
            $('input[class=sbmtbtn]').prop("disabled", false);
            $('.ajax-loader').css("visibility", "hidden");
           }
        });
    });
        
        
     //Edit Product Variant price,stock,Discount Form 
    $("#variant_datatable").on("click",".editprice", function(e){
        e.preventDefault();
        
        var _Id = $(this).data('_id');
        var _variant = $(this).data('_variant');
        var variant_Type = $(this).data('_varianttype');
        
        $('[name="new_variant_price"]').val(_variant);
        $('[name="new_variant_price"]').data('cat_id',_Id);
        $('[name="new_variant_price"]').data('cat_type',variant_Type); 
        
        var position = $(this).offset(); //position();
        var newtop = position.top - 8;
        var newleft = position.left - 5;
        $('#variant_price').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // close the Product Variant price option button
    $('#closeprice').click(function (e) {
        e.preventDefault();
        $('#variant_price').hide();
    });


    //Edit Product Variant price,stock,Discount Form 
    $("#variant_datatable").on("click",".editprice", function(e){
        e.preventDefault();
        
        var _Id = $(this).data('_id');
        var _variant = $(this).data('_variant');
        var variant_Type = $(this).data('_varianttype');
        
        $('[name="new_variant_price"]').val(_variant);
        $('[name="new_variant_price"]').data('cat_id',_Id);
        $('[name="new_variant_price"]').data('cat_type',variant_Type); 
        
        var position = $(this).offset(); //position();
        var newtop = position.top - 8;
        var newleft = position.left - 5;
        $('#prdprice_order').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // close the Product Variant price option button
    $('#closeprice').click(function (e) {
        e.preventDefault();
        $('#prdprice_order').hide();
    });

    // on Product Variant price change 
    $('#cat_order_save').click(function (e) {
            e.preventDefault();
            
            var _new_data = $('[name="new_variant_price"]').val(); // gets value
            var _id_   = $('[name="new_variant_price"]').data('cat_id'); // gets id
            var _type_   = $('[name="new_variant_price"]').data('cat_type'); // gets type
            
                $.ajax({
                    type:'POST',
                    url:site_url+'fashionadmin/products/productinventoryedit',
                    dataType: 'json',
                    data:{
                            data:_new_data,
                            id:_id_,
                            type:_type_
                        },
                    success:function(html){
                        
                        window.location.reload();
                    } 
                    
                });
                
            $('#variant_price').hide();
        
    });




    
    //Edit Product Variant color name Form 
    $("#variant_datatable").on("click",".editcolorname", function(e){
        e.preventDefault();
        
        var cat_Id = $(this).data('_id');
        var cat_Name = $(this).data('_variant');
        var variant_Type = $(this).data('_varianttype');
        
        $('[name="new_variant_name"]').val(cat_Name);
        $('[name="new_variant_name"]').data('cat_id',cat_Id); 
        $('[name="new_variant_name"]').data('cat_type',variant_Type); 
        
        
        var position = $(this).offset(); //position();
        var newtop = position.top - 8;
        var newleft = position.left - 5;
        $('#variant_name').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // close the name option button
    $('#closename').click(function (e) {
        e.preventDefault();
        $('#variant_name').hide();
    });
   
    // on Product Variant color name change 
    $('#cat_name_save').click(function (e) {
            e.preventDefault();
            
            var _new_data = $('[name="new_variant_name"]').val(); // gets value
            var _id_      = $('[name="new_variant_name"]').data('cat_id'); // gets id
            var _type_    = $('[name="new_variant_name"]').data('cat_type'); // gets type
            
                $.ajax({
                    type:'POST',
                    url:site_url+'fashionadmin/products/productinventoryedit',
                    dataType: 'json',
                    data:{
                            data:_new_data,
                            id:_id_,
                            type:_type_
                        },
                    success:function(html){
                        
                        window.location.reload();
                    } 
                    
                });
                
            $('#variant_name').hide();
        
    });

    
    //Edit Product Variant discount and stock name Form 
    $("#variant_datatable").on("click",".editdiscount", function(e){
        e.preventDefault();
        
        var cat_Id = $(this).data('_id');
        var cat_Name = $(this).data('_variant');
        var variant_Type = $(this).data('_varianttype');
        
        $('[name="new_variant_discount"]').val(cat_Name);
        $('[name="new_variant_discount"]').data('cat_id',cat_Id); 
        $('[name="new_variant_discount"]').data('cat_type',variant_Type); 
        
        
        var position = $(this).offset(); //position();
        var newtop = position.top - 8;
        var newleft = position.left - 5;
        $('#variant_discount').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // close the discount and stock option button
    $('#closediscount').click(function (e) {
        e.preventDefault();
        $('#variant_discount').hide();
    });

    // on Product Variant discount and stock name change 
    $('#cat_discount_save').click(function (e) {
        e.preventDefault();
        
        var _new_data = $('[name="new_variant_discount"]').val(); // gets value
        var _id_      = $('[name="new_variant_discount"]').data('cat_id'); // gets id
        var _type_    = $('[name="new_variant_discount"]').data('cat_type'); // gets type
        var _prductid_= $('[name="new_variant_discount"]').data('cat_productid'); // gets type
        
            $.ajax({
                type:'POST',
                url:site_url+'fashionadmin/products/productinventoryedit/'+_prductid_,
                dataType: 'json',
                data:{
                        data:_new_data,
                        id:_id_,
                        type:_type_
                    },
                success:function(html){
                    
                    window.location.reload();
                } 
                
            });
            
        $('#variant_discount').hide();
        
    });
    

   // save product Inventory form
    $("#productInventory_form").submit(function (e){
            
        e.preventDefault();
        var url =  site_url+'fashionadmin/products/productinventorysave';
        var method = $(this).attr('method');
        var data = $(this).serialize();
        
        $.ajax({
           url:url,
           type:method,
           dataType: 'json',
           data:data
        }).done(function(data)
                {
                    if(data.status === '1' )
                    { 
                        window.location.reload();

                    }
                    else if(data.status === '0' )
                    {
                        window.location.reload();
                    } 

                });
       // window.location.reload();
        }); 

    // inventory product image
    $('#base-input').on('change', function(){
        var reader = new FileReader();
        reader.onload = function (e) {
          $('.div_UploadView').show();
                $('.UploadView')
                        .attr('src', e.target.result)
                        //.width(200)
                        //.height(200)
            };
            reader.readAsDataURL(this.files[0]);
    });
     $('input[id=base-input]').change(function() {
        //$('.logo_UploadView').show();
        $('#fake-input').val($(this).val().replace("C:\\fakepath\\", ""));
    });
     function Removecover() {
        
        $('.UploadView').attr('src', '');
        $('#fake-input').val('Choose your Image');
        $('.div_UploadView').hide();
    }
    
    // on closing  inventory product image modal
    $('#imagethumbs').on('click','.close',function(){
        Removecover();
    });
    
    // on closing inventory product image modal
    $('body').on('hidden.bs.modal', '#imagethumbs', function () {
        Removecover();
    });
    
    // clear crop image on click trash icon in product image modal
    $('#imagethumbs').on('click','.Removecover',function(){
        Removecover();
    });

    // pass value from into modal
    $(".inventClass").click(function () {
          var imagename = $(this).data('imagename');
          var colorid = $(this).data('colorid');
          $(".modal-body #modal_imagename").val(imagename);
          $(".modal-body #modal_colorid").val(colorid);
      }) 

})(jQuery);