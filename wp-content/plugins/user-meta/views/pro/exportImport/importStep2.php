<?php
global $userMeta;
//Expented: $key, $fullpath, $csvHeader, $csvSample, $fieldList, $roles


$html = null;
$html .= '<form id="um_user_import_form" method="post" onsubmit="umUserImportDialog(this);return false;" >';   

$filepath = urlencode( $fullpath );
$filesize = filesize( $fullpath );
$html .= "<input type=\"hidden\" name=\"filepath\" id=\"filepath\" value=\"$filepath\" />";
$html .= "<input type=\"hidden\" name=\"filesize\" id=\"filesize\" value=\"$filesize\" />";

$html .= $userMeta->createInput( "import_by", "radio",
    array(
        "label"         => __( 'Identify Uniquely', $userMeta->name ),
        "value"         => "both",
        "id"            => "um_import_by",
        "by_key"        => true,
        "enclose"       => 'p',                
    ),
    array(
        "email"         => __( 'By Email', $userMeta->name ),
        "username"      => __( 'By Username', $userMeta->name ),
        "both"          => __( 'By Both Email & Username', $userMeta->name ),
    )
);


$html .= "<div class='clear'></div>";
$html .= "<div class=\"pf_left pf_width_20\"><strong>". __( "CSV Header", $userMeta->name ) ."</strong></div>";
$html .= "<div class=\"pf_left pf_width_20\"><strong>". __( "Assigning Field", $userMeta->name ) ."</strong></div>";
//$html .= "<div class=\"um_left um_width_20\">__(\"Add To Field Editor\", $userMeta->name )</div>";
$html .= "<div class=\"pf_left\"><strong>". __( "Sample Data", $userMeta->name ) ."</strong></div>";
$html .= "<div class='clear'></div>";

foreach($csvHeader as $key => $header){
    $assignedField = $userMeta->createInput( 'selected_field[]', 'select', array(
        'by_key'    => true,
        'onchange'  => 'umToggleCustomField(this)',
    ), $fieldList );
    
    $assignedField .= $userMeta->createInput( 'custom_field[]', 'text', array(
        'value'         => str_replace( ' ', '_', strtolower($header) ),
        'after'         => '<br />(' . __( 'Field Name', $userMeta->name ) . ')',
        'label_class'   => 'pf_label',
        'enclose'       => 'div class="um_custom_field" style="display:none;"',
    ));
    //$checkbox = $userMeta->createInput( "custom_field", "checkbox");
    $sampleData = @$csvSample[$key];
    if( strlen( $sampleData ) > 60)
        $sampleData = substr( $sampleData, 0, 60 ) . ' ...';
      
    $html .= "<div class='pf_left pf_width_20'>$header</div>";
    $html .= "<div class='pf_left pf_width_20'>$assignedField</div>";
    //$html .= "<div class='um_left um_width_20'>$checkbox</div>";
    $html .= "<div class='pf_left'>$sampleData</div>";
    $html .= "<div class='clear'></div>";            
}

$html .= $userMeta->createInput( "user_role", "select",
    array(
        "label"         => __( 'User Role :', $userMeta->name ),
        "by_key"        => true,
        "label_class"   => "pf_label",     
        "enclose"       => 'p'             
    ),
    $roles
);

$html .= $userMeta->createInput( "overwrite", "checkbox",
    array(
        "label"     => __( 'Overwrite existing users.', $userMeta->name ),
        "id"        => "um_user_import_overwrite",
        "by_key"    => true,
        "enclose"   => "p",
    )
);

$html .= $userMeta->createInput( "send_email", "checkbox",
    array(
        "label"     => __( 'Send email to new user.', $userMeta->name ),
        "id"        => "um_user_import_send_email",
        "by_key"    => true,
        "enclose"   => "p",
    )
);

$fieldUrl = $userMeta->adminPageUrl( 'fields_editor' );
$html .= $userMeta->createInput( "add_fields", "checkbox",
    array(
        "label"     => sprintf( __( ' Add custom field to %s (if not already added)', $userMeta->name ), $fieldUrl ),
        "id"        => "um_user_import_add_fields",
        "by_key"    => true,
        "enclose"   => "p",
    )
);
            
$html .= $userMeta->createInput( "save_field", "submit", array(
    "value"     => __( 'Import', $userMeta->name ),
    "class"     => "button-primary",
    "style"     => "width:60px",
    "enclose"   => "p",
) );
          
$html .= "</form>";

$html .= "<li>". __( 'Username will accept only alphanumeric characters plus these: _, space, ., -, *, and @. All other characters will replace with null.', $userMeta->name ) ."</li>";
$html .= "<li>". __( 'In case of new user, If password field not set then user will get the password by email.', $userMeta->name ) ."</li>";

echo $userMeta->metaBox( __('User Import', $userMeta->name ), $html );
?>

<div id="import_user_dialog" title="<?php _e( 'User Import Status', $userMeta->name ); ?>" style="display:none">
</div>