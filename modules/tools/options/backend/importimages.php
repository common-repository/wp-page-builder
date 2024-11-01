<?php
return array(
	'name' => 'Replace url',
        'sections' => array(
            1 => __('Main','zgpbd_admin')
        ),
        'groups' => array(
            1 => __('Basic','zgpbd_admin')
        ),
	'options' => array(
	
            array(
			"label" => __('Choose option','zgth_admin'),
			"help_note"=>__("Choose option to proceed changes",'zgth_admin'),
			"id" => "lnda_tools_replaceurl_option",
			"default" => 'right',
			"options" => array(
                                "Select" => __('Select','zgth_admin'),
				"importimg" => __('Import external images to local','zgth_admin'),
				"reveal" => __('Reveal url','zgth_admin'),
                                "remove" => __('Remove links and keep anchor text','zgth_admin'),
                                "replace" => __('Replace String','zgth_admin')
                                
			),
			"type" => "radiobutton",
                        "value" => "",
                        "group_order" =>1,
                        "sec_order" =>1
		),
                array(
			"label" => __('urls to exclude','zgpbd_admin'),
			"help_note"=>__("it will exclude urls from the search",'zgpbd_admin'),
			"id" => "lnda_tools_replaceurl_exclude",
			"default" => '',
			"type" => "textarea",
                        "value" => "",
                        "group_order" =>1,
                        "sec_order" =>1
		),
            	array(
			"label" => __('String to search','zgpbd_admin'),
			"help_note"=>__("it will search this url in the content and will proceed to make the changes",'zgpbd_admin'),
			"id" => "lnda_tools_replaceurl_path",
			"default" => '',
			"type" => "textbox",
                        "value" => "",
                        "wrapper_style"=>'display:none;',
                        "group_order" =>1,
                        "sec_order" =>1
		),
                array(
			"label" => __('replace','zgpbd_admin'),
			"help_note"=>__("it will be replaced with this text",'zgpbd_admin'),
			"id" => "lnda_tools_replaceurl_rpl",
			"default" => '',
			"type" => "textbox",
                        "value" => "",
                        "wrapper_style"=>'display:none;',
                        "group_order" =>1,
                        "sec_order" =>1
		),
            
        ),
        'buttons'=>array(
              array(
			"label" =>  __('Replace','zgpbd_admin'),
                        "help_note" => '',
			"id" => "lnda_tools_replaceurl_replace",
			"default" => "100",
			"type" => "button",
                        "value" => "Run option",
                        "onclick" =>"javascript:zgpb_tools.replaceurl_process();return false;",
                        "group_order" =>1,
                        "sec_order" =>1
		) 
        )
);
