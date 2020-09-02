<?php
/* Write your awesome functions below */
function load_my_script(){
    wp_register_script(
        'my_script',
        get_stylesheet_directory_uri() . '/js/olympic_1142020.js',
        array( 'jquery' )
    );
    wp_enqueue_script( 'my_script' );
    wp_enqueue_style( 'cusotm', get_stylesheet_directory_uri() . '/custom_1142020.css' );
    wp_enqueue_style( 'bootstrap-extra', get_stylesheet_directory_uri() . '/bootstrap-extra.css' );

}
add_action('wp_enqueue_scripts', 'load_my_script', 100);

 function get_contact_us ( $params ){
    $result = 'I worked hard!';

    $uname='kevin bollman'; 
   	$mailid='KevinBollman@gmail.com';
   	$message='a silly test message';
   	$headers = 'From: Kevin Bollman<KevinBollman@gmail.com>' . 'rn' . 'Reply-To: ' . 'digitalkdogg@gmail.com';
   	try {
   		$sendmail = wp_mail($mailid, 'very cool submject kev', 'my body is a god like work of art ','');
   		var_dump($sendmail);
   		if(wp_mail($mailid, 'very cool submject kev', 'my body is a god like work of art ',''))
   		{
     		echo "mail sent";
   		}
   		else
   		{
     		echo "mail failed";
   		}
   	} catch (Exception $e) {var_dump($e);} 
    return json_encode($result);

 }


 add_action( 'rest_api_init', function () {     
    register_rest_route( 'contact/v1', 'contact_us',array( 
        'methods'  => 'GET',
        'callback' => 'get_contact_us'
    ) );

       
      
     } );  

?>
