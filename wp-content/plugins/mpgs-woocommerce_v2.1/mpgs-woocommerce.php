<?php
/*
Plugin Name:  MPGS Payment Gateway WooCommerce
Plugin URI: http://ospayment.com
Description:  New Technology of migs Payment Gateway(MPGS)
Version: 2.1
Author: OsPayment
Author URI: http://ospayment.com
*/

add_action('plugins_loaded', 'woocommerce_mpgs_init', 0);
define("WC_MPGS_DIR",WP_PLUGIN_DIR . "/" . plugin_basename(dirname(__file__)));
define("WC_MPGS_VERSION","V2.1");

function woocommerce_mpgs_init()
{
    if (!class_exists('WC_Payment_Gateway')) {
        return;
    }
    /**
     * Gateway class
     **/
    class wc_mpgs extends WC_Payment_Gateway
    {
      
	   
        public function __construct()
        {
            // Load the settings.
            $this->id = 'mpgs';
            $this->has_fields = false;
            $this->return_url = add_query_arg('wc-api', 'wc_mpgs', home_url('/')); //Only using server hosted
			#domain.com/?wc-api=wc_mpgs
			
            // Create plugin fields and settings
            $this->init_form_fields();
            $this->init_settings();
			
            // Get setting values
            foreach ($this->settings as $key => $val) {
                $this->$key = $val;
            }
            $this->icon = WP_PLUGIN_URL . "/" . plugin_basename(dirname(__file__)) . '/mpgs-logo.png';
            $this->method_title = __('MPGS Pro - '.WC_MPGS_VERSION, 'woocommerce');
            add_action('woocommerce_api_wc_mpgs', array($this, 'mpgs_response_process'));
            // Hooks
            add_action('woocommerce_update_options_payment_gateways', array($this, 'process_admin_options'));
            add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));	
			add_action('woocommerce_receipt_mpgs', array(&$this, 'receipt_page'));
        }		
        /**
         * Initialize Gateway Settings Form Fields
         */
        function init_form_fields()
        {
            $this->form_fields = array(
                'title' => array(
                    'title' => __('Title', 'woocommerce'),
                    'type' => 'text',
                    'description' => __('This controls the title which the user sees during checkout.', 'woocommerce'),
                    'default' => __('Mastercard Payment Gateway Services', 'woocommerce')
                    ),
                'enabled' => array(
                    'title' => __('Enable/Disable', 'woocommerce'),
                    'label' => __('Enable MPGS Payment Gateway Pro', 'woocommerce'),
                    'type' => 'checkbox',
                    'description' => '',
                    'default' => 'no'
                    ),
                'description' => array(
                    'title' => __('Description', 'woocommerce'),
                    'type' => 'textarea',
                    'description' => __('This controls the description which the user sees during checkout.', 'woocommerce'),
                    'default' => 'Pay with your credit card or debit card.'
                    ),  
				'mpgs_checkout_url' => array(
                    'title' => __('Checkout URL', 'woocommerce'),
                    'type' => 'text',
					'css'=>'width:100%',
                    'description' => __("This is example:<br/>https://eu-gateway.mastercard.com/checkout/version/43/checkout.js <br/>OR <br/>https://paymentgateway.commbank.com.au/checkout/version/40/checkout.js", 'woocommerce')
                 ),	
                'mpgs_Merchant' => array(
                    'title' => __('Merchant ID', 'woocommerce'),
                    'type' => 'text',
                    'description' => __('Merchant ID (Add TEST Prefix MerchantID for TEST MODE exam: TEST123456789)', 'woocommerce'),
                    'default' => ''
                    ),
				'mpgs_APIPassword' => array(
                    'title' => __('API password', 'woocommerce'),
                    'type' => 'text',
                    'description' => __('Integration Authentication Password, <a style="color:red" href="#" target="_blank">Click here </a> to see how to get API Password', 'woocommerce'),
                    'default' => ''
                    ),
				'mpgs_MerchantName' => array(
                    'title' => __('Merchant Name', 'woocommerce'),
                    'type' => 'text',
                    'description' => __('', 'woocommerce'),
                    'default' => ''
                    ),
				'mpgs_AddressLine1' => array(
                    'title' => __('Merchant Address Line 1', 'woocommerce'),
                    'type' => 'text',
					'css'=>'width:100%',
                    'description' => __('', 'woocommerce'),
                    'default' => ''
                    ),
				'mpgs_AddressLine2' => array(
                    'title' => __('Merchant Address Line 2', 'woocommerce'),
                    'type' => 'text',
					'css'=>'width:100%',
                    'description' => __('', 'woocommerce'),
                    'default' => ''
                ),
				
				'mpgs_order_status' => array(
                    'title' => __('Order Status', 'gate_mpgs'),                    
                    'type' => 'select',
                    'description' => __('Set order status wen payment success .', 'woocommerce'),
                    'options' => array('1' => 'Processing', '2' => 'Completed'),
					'default' => '1',
                    )
                );

        }


        /**
         * Admin Panel Options 
         * - Options for bits like 'title' and availability on a country-by-country basis
         */
        function admin_options()
        {
            ?>
            <h3><?php _e('MPGS Payment Gateway Pro - '.WC_MPGS_VERSION, 'woocommerce'); ?></h3>
			<p style="color:red">Document Online : <a target="_blank" href="http://docs.ospayment.com/mpgs/index.html">Click here</a></p>
            <table class="form-table">
            <?php $this->generate_settings_html(); ?>
            </table>
            <!--/.form-table-->
	    	<?php
        }

       /**
         * Payment form on checkout page
         */
        function payment_fields()
        {
           if ($this->description)
                echo wpautop(wptexturize($this->description));
            
        }
		
		/**
		 * Receipt Page
		 **/
		function receipt_page($order_id){
			global $woocommerce;		
			if(isset($_REQUEST['sessionId']) && !empty($_REQUEST['sessionId']))
			{
				$mpgs_sessionId = get_post_meta($order_id,"mpgs_sessionId",true);
				if($mpgs_sessionId == $_REQUEST['sessionId'])
				{
					
					echo '<p>'.__('Thank you for your payment. We are now redirecting you to the order received.').'</p>';
					
				}else{
					#update_post_meta($order_id,"mpgs_sessionId",$_REQUEST['sessionId']);
					echo '<p>'.__('Thank you for your order, please click the button below to proceed with your payment.').'</p>';
					#echo $this->process_payment_mpgs($order_id);
				}
				#echo '<p>'.__('Thank you for your order, please click the button below to proceed with your payment.').'</p>';
				echo $this->process_payment_mpgs($order_id);
			}else{
				wc_add_notice( __('Payment error : ', 'mpgs') . "Session not found.", 'error' );
				wp_redirect($woocommerce->cart->get_checkout_url());
				exit;
			}
		}
		
		
		function process_payment($order_id){           
            global $woocommerce;
			$order = new WC_Order( $order_id );
			/* We need create checkout session here */
			$responseArr = $this->createSessionCheckout($order_id);
		
			
			$is_valid = false;
			$message  	= "";
			$sessionId  = "";
			$sessionVersion = "";
			if($responseArr['result'] == 'SUCCESS')
			{
				if(!empty($responseArr['successIndicator']))
				{
					update_post_meta($order_id,"mpgs_successIndicator",$responseArr['successIndicator']);
					#update_post_meta($order_id,"mpgs_sessionId",$responseArr['session']['id']);
					update_post_meta($order_id,"mpgs_sessionVersion",$responseArr['session']['version']);
					$is_valid = true;
					$sessionId = $responseArr['session']['id'];
					$sessionVersion = $responseArr['session']['version'];
				}
			}else{
				$message = $responseArr['error']['explanation'];
			}
			
			if($is_valid){
				$payURL = add_query_arg('order',$order->id, add_query_arg('key',$order->order_key, get_permalink(woocommerce_get_page_id('pay'))));
				$payURL .="&sessionId=".$sessionId;
				return array(
					'result' 	=> 'success',
					'redirect'	=> $payURL
				);
			}else{
				wc_add_notice( __('Payment error : ', 'mpgs') . $message , 'error' );
			}			
			
		}
		
		function RemoveEmptyValues($array) {
			foreach ($array as $i => $value) {
			  // If member is an array
			  if (is_array($array[$i])) {
				// if array has no members, unset array
				if (count($array[$i]) == 0)
				  unset($array[$i]);
				// if array has members, recurse and pass in the array
				// recursive function will then loop through all members of this array
				else {
				  // overwrite old array with new structure
				  $array[$i] = $this->RemoveEmptyValues($array[$i]);
				  // if array is empty unset it
				  if (count($array[$i]) == 0)
					unset($array[$i]);
				}
			  }
			  // if member not an array
			  else {
				// if member variable is empty, unset it
				if ($array[$i] == "")
				  unset($array[$i]);
			  }
			}
			return $array;
		}
		
		function createSessionCheckout($order_id)
		{
			global $woocommerce;
			$order = new WC_Order( $order_id);
			
			$mpgs_Merchant = $this->mpgs_Merchant;
			$mpgs_APIPassword = $this->mpgs_APIPassword;
			$checkout_script   =  $this->mpgs_checkout_url;
			
			$user_id = $order->user_id;
			$order_amount = $order->order_total;
			$order_currency = get_woocommerce_currency();
			
			$requestArr = array();
			$requestArr['apiOperation'] = "CREATE_CHECKOUT_SESSION";
			$requestArr['userId'] = $user_id;
			$requestArr['order']['id'] = $order_id;
			$requestArr['order']['amount']=  $order_amount;
			$requestArr['order']['currency'] = $order_currency;
			$request  = json_encode($this->RemoveEmptyValues($requestArr));
			
			$temp_url = explode("/checkout/version/",$checkout_script);
			$gatewayBaseURL = $temp_url[0];
			$temp_url2 = explode("/",$temp_url[1]);
			$version = $temp_url2[0];
			$gatewayUrl=$gatewayBaseURL."/api/rest/version/".$version ."/merchant/".$mpgs_Merchant."/session";
			
			// CURL FOR POST
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_POST, 1);
			  // [Snippet] howToPost - end
			curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
			  // [Snippet] howToSetHeaders - start
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Length: " . strlen($request)));
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: Application/json;charset=UTF-8"));
			
				// [Snippet] howToSetURL - start
			// call the function below to construct the URL for sending the transaction
			curl_setopt($ch, CURLOPT_URL, $gatewayUrl);
				// [Snippet] howToSetURL - end

			// [Snippet] howToSetCredentials - start
			// set the API Password in the header authentication field.
			curl_setopt($ch, CURLOPT_USERPWD, "merchant.".$mpgs_Merchant. ":" . $mpgs_APIPassword);
			// [Snippet] howToSetCredentials - end

			// tells cURL to return the result if successful, of FALSE if the operation failed
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			
			$response = curl_exec($ch);
			if (curl_error($ch)){
			 die("cURL Error: " . curl_errno($ch) . " - " . curl_error($ch));
			}
			return json_decode($response,true);
		}
		
		
		function retrieveOrder($order_id)
		{
			$mpgs_Merchant = $this->mpgs_Merchant;
			$mpgs_APIPassword = $this->mpgs_APIPassword;
			$checkout_script   =  $this->mpgs_checkout_url;
			
			$temp_url = explode("/checkout/version/",$checkout_script);
			$gatewayBaseURL = $temp_url[0];
			$temp_url2 = explode("/",$temp_url[1]);
			$version = $temp_url2[0];
			$gatewayUrl=$gatewayBaseURL."/api/rest/version/".$version ."/merchant/".$mpgs_Merchant."/order/".$order_id;
			
			// CURL FOR POST
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_POST, false);
			  // [Snippet] howToPost - end
			
				// [Snippet] howToSetURL - start
			// call the function below to construct the URL for sending the transaction
			curl_setopt($ch, CURLOPT_URL, $gatewayUrl);
				// [Snippet] howToSetURL - end

			// [Snippet] howToSetCredentials - start
			// set the API Password in the header authentication field.
			curl_setopt($ch, CURLOPT_USERPWD, "merchant.".$mpgs_Merchant. ":" . $mpgs_APIPassword);
			// [Snippet] howToSetCredentials - end

			// tells cURL to return the result if successful, of FALSE if the operation failed
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			
			$response = curl_exec($ch);
			if (curl_error($ch)){
			 die("cURL Error: " . curl_errno($ch) . " - " . curl_error($ch));
			}
			$data = json_decode($response,true);
			if(isset($data['sourceOfFunds'])){
				$merchant   = $data['merchant'];
				$cardBrand  = $data['sourceOfFunds']['provided']['card']['brand'];
				$cardNumber = $data['sourceOfFunds']['provided']['card']['number'];
				$month 		= $data['sourceOfFunds']['provided']['card']['expiry']['month'];
				$year 		= $data['sourceOfFunds']['provided']['card']['expiry']['year'];
				$CardIssuer = $data['sourceOfFunds']['provided']['card']['issuer'];
				$TranReceipt = $data['transaction'][0]['transaction']['receipt'];
				$authorizationCode = $data['transaction'][0]['transaction']['authorizationCode'];
				update_post_meta( $order_id, 'CardNumber', sanitize_text_field($cardNumber));
				update_post_meta( $order_id, 'CardBrand', sanitize_text_field($cardBrand));
				update_post_meta( $order_id, 'CardExpiryDate', sanitize_text_field($month."/20".$year));
				update_post_meta( $order_id, 'CardIssuer', sanitize_text_field($CardIssuer));
				update_post_meta( $order_id, 'MerchantID', sanitize_text_field($merchant));
				update_post_meta( $order_id, 'Transaction_Receipt', sanitize_text_field($TranReceipt));
				update_post_meta( $order_id, 'Authorization_Code', sanitize_text_field($authorizationCode));
			}
		}
		

        /**
         * Process the payment
         */
		function process_payment_mpgs($order_id)
        {
			
            global $woocommerce;
            $order = new WC_Order($order_id);
			
			$sessionId  	   = $_REQUEST['sessionId'];
			if(!empty($sessionId))
			{
				
				$mpgs_Merchant 	   = $this->mpgs_Merchant;
				$mpgs_MerchantName = $this->mpgs_MerchantName;
				$mpgs_AddressLine1 = $this->mpgs_AddressLine1;
				$mpgs_AddressLine2 = $this->mpgs_AddressLine2;
				$mpgs_order_status = $this->mpgs_order_status;
				$amount 		   = $order->order_total;
				$customerOrderDate = date("Y-m-d");
				$currency 		   = get_woocommerce_currency();
				$description 	   = "Pay for order #".$order_id." via ".$this->title;
				$user_id 		   = $order->user_id;
				$checkout_script   =  $this->mpgs_checkout_url;
				$completed_link    = $this->return_url.'&order_id='.$order_id;
				$cancel_link       =  $woocommerce->cart->get_checkout_url();
				
				$mpgs_sessionId = get_post_meta($order_id,"mpgs_sessionId",true);
				if($mpgs_sessionId == $sessionId)
				{
						return '<script src="'.$checkout_script.'"
								data-error="errorCallback"
								data-cancel="'.esc_url($cancel_link).'"
								data-complete="'.esc_url($completed_link).'"></script>
							 <script type="text/javascript">
								jQuery(function(){		
									 jQuery("body").block({
										message: "'.__('We are now redirecting you to the order received page.').'", 
										overlayCSS: {
											background: "#fff",
											opacity: 0.6
										},
										css: {
											padding: 20,
											textAlign: "center",
											color: "#555",
											border: "3px solid #aaa",
											backgroundColor: "#fff",
											cursor: "wait",
											lineHeight: "32px"
										}
									});		
									
								});

							</script>';
				}else{
					update_post_meta($order_id,"mpgs_sessionId",$sessionId);
					return  '<a class="button alt" id="mpgs_payment_button" onclick="Checkout.showPaymentPage();" >'.__('Pay '.$this -> title, 'woocommerce').'</a>
						<a class="button cancel" href="'.esc_url($cancel_link).'">'.__('Cancel order &amp; restore cart', 'woocommerce').'</a>
						 <script src="'.$checkout_script.'"
								data-error="errorCallback"
								data-cancel="'.esc_url($cancel_link).'"
								data-complete="'.esc_url($completed_link).'"
							>
						</script>
						 <script type="text/javascript">
							
							function errorCallback(error) {
								  alert("Error : "+JSON.stringify(error));
								  window.location.href = "'.esc_url($cancel_link).'";
							}
							
							Checkout.configure({
								merchant: "'.$mpgs_Merchant.'",
								order: {
									id: "'.$order_id.'",
									amount: '.$amount.',
									currency: "'.$currency.'",
									description: "'.$description.'",								
									customerOrderDate:"'.$customerOrderDate.'",
									customerReference:"'.$user_id .'",
									reference:"'.$order_id .'"
								}, 
								session: { 
									id: "'.$sessionId.'"
								},
								billing:{
									address: {
										city:"'.$order->billing_city.'",
										country:"'.$this->kia_convert_country_code($order->billing_country).'",
										postcodeZip:"'.$order->billing_postcode.'",
										stateProvince:"'.$order->billing_state.'",
										street:"'.$order->billing_address_1.'",
										street2:"'.$order->billing_address_2.'"
									}
									
								},
								customer:{
									email:"'.$order->billing_email.'",
									firstName:"'.$order->billing_first_name.'",
									lastName:"'.$order->billing_last_name.'",
									phone:"'.$order->billing_phone.'"
								},
								interaction: {
									merchant: {
										name: "'.$mpgs_MerchantName.'",
										address: {
											line1: "'.$mpgs_AddressLine1.'",
											line2: "'.$mpgs_AddressLine2.'"            
										}    
									}
								}
							});
						</script>
						<script type="text/javascript">
							jQuery(function(){		
								 jQuery("body").block({
									message: "'.__('Thank you for your order. We are now redirecting you to the Payment Gateway to proceed with the payment.').'", 
									overlayCSS: {
										background: "#fff",
										opacity: 0.6
									},
									css: {
										padding: 20,
										textAlign: "center",
										color: "#555",
										border: "3px solid #aaa",
										backgroundColor: "#fff",
										cursor: "wait",
										lineHeight: "32px"
									}
								});		
								
							});
							jQuery( document ).ready(function() {
								setTimeout(
								  function() 
								  {
									Checkout.showPaymentPage();
								  }, 5000);
								
							});
						</script>
				';
				}
				
				
					
			}else{
				wc_add_notice( __('Payment error : ', 'mpgs') . "Session not found.", 'error' );
				wp_redirect($woocommerce->cart->get_checkout_url());
				exit;
			}
            
        }
		
		
		 /**
         * wait callback the payment
         */
		function waitcallback_payment_mpgs()
        {
			
			return  '<script type="text/javascript">
						jQuery(function(){		
							 jQuery("body").block({
								message: "'.__('Thank you for your payment. We are now redirecting you to the order received.').'", 
								overlayCSS: {
									background: "#fff",
									opacity: 0.6
								},
								css: {
									padding: 20,
									textAlign: "center",
									color: "#555",
									border: "3px solid #aaa",
									backgroundColor: "#fff",
									cursor: "wait",
									lineHeight: "32px"
								}
							});		
							
						});
					</script>
			';
            
        }
		

        function thankyou()
        {
            if ($this->instructions != '') {
                echo wpautop($this->instructions);
            }
        }

		
		
        /**
        * Process Value return by mpgs
         **/
        function mpgs_response_process()
        {
            global $woocommerce;	
			$woocommerce->cart->empty_cart();			
			$resultIndicator = $_REQUEST['resultIndicator'];
			$order_id=$_REQUEST['order_id'];
			$this->retrieveOrder($order_id);			
			$order = new WC_Order($order_id);
			$mpgs_successIndicator = get_post_meta($order_id,"mpgs_successIndicator",true);
			
			if($resultIndicator == $mpgs_successIndicator )
			{
				
				$order->add_order_note(__('MPGS Payment completed', 'woocommerce') .
						' (Transaction ID: ' . $resultIndicator . ', Transaction_receipt:'.$resultIndicator.')');
				$order->payment_complete( $resultIndicator);
				if($this->mpgs_order_status == 2){
						$order->update_status('completed', sprintf(__('Payment %s .', 'woocommerce'),strtolower("APPROVED")));
				}
				
				wp_redirect($this->get_return_url($order));
				exit;
			}else{
				wc_add_notice( __('Payment error : ', 'mpgs') . "Invalid transaction.", 'error' );
				wp_redirect($woocommerce->cart->get_checkout_url());
				exit;
			}
			
        }

        /**
        * Validate plugin settings
        */
        function validate_settings()
        { // if need
                return true;

        }

        /**
        * Get user's IP address
        */
        function get_user_ip()
        {
            $ret = "";
            if (!empty($_SERVER['HTTP_X_FORWARD_FOR'])) {
                $ret =  $_SERVER['HTTP_X_FORWARD_FOR'];
            } else {
                $ret =  $_SERVER['REMOTE_ADDR'];
            }
            return $ret;
        }
		function kia_convert_country_code( $country ) {
		  $countries = array(
				'AF' => 'AFG', //Afghanistan
				'AX' => 'ALA', //&#197;land Islands
				'AL' => 'ALB', //Albania
				'DZ' => 'DZA', //Algeria
				'AS' => 'ASM', //American Samoa
				'AD' => 'AND', //Andorra
				'AO' => 'AGO', //Angola
				'AI' => 'AIA', //Anguilla
				'AQ' => 'ATA', //Antarctica
				'AG' => 'ATG', //Antigua and Barbuda
				'AR' => 'ARG', //Argentina
				'AM' => 'ARM', //Armenia
				'AW' => 'ABW', //Aruba
				'AU' => 'AUS', //Australia
				'AT' => 'AUT', //Austria
				'AZ' => 'AZE', //Azerbaijan
				'BS' => 'BHS', //Bahamas
				'BH' => 'BHR', //Bahrain
				'BD' => 'BGD', //Bangladesh
				'BB' => 'BRB', //Barbados
				'BY' => 'BLR', //Belarus
				'BE' => 'BEL', //Belgium
				'BZ' => 'BLZ', //Belize
				'BJ' => 'BEN', //Benin
				'BM' => 'BMU', //Bermuda
				'BT' => 'BTN', //Bhutan
				'BO' => 'BOL', //Bolivia
				'BQ' => 'BES', //Bonaire, Saint Estatius and Saba
				'BA' => 'BIH', //Bosnia and Herzegovina
				'BW' => 'BWA', //Botswana
				'BV' => 'BVT', //Bouvet Islands
				'BR' => 'BRA', //Brazil
				'IO' => 'IOT', //British Indian Ocean Territory
				'BN' => 'BRN', //Brunei
				'BG' => 'BGR', //Bulgaria
				'BF' => 'BFA', //Burkina Faso
				'BI' => 'BDI', //Burundi
				'KH' => 'KHM', //Cambodia
				'CM' => 'CMR', //Cameroon
				'CA' => 'CAN', //Canada
				'CV' => 'CPV', //Cape Verde
				'KY' => 'CYM', //Cayman Islands
				'CF' => 'CAF', //Central African Republic
				'TD' => 'TCD', //Chad
				'CL' => 'CHL', //Chile
				'CN' => 'CHN', //China
				'CX' => 'CXR', //Christmas Island
				'CC' => 'CCK', //Cocos (Keeling) Islands
				'CO' => 'COL', //Colombia
				'KM' => 'COM', //Comoros
				'CG' => 'COG', //Congo
				'CD' => 'COD', //Congo, Democratic Republic of the
				'CK' => 'COK', //Cook Islands
				'CR' => 'CRI', //Costa Rica
				'CI' => 'CIV', //Côte d\'Ivoire
				'HR' => 'HRV', //Croatia
				'CU' => 'CUB', //Cuba
				'CW' => 'CUW', //Curaçao
				'CY' => 'CYP', //Cyprus
				'CZ' => 'CZE', //Czech Republic
				'DK' => 'DNK', //Denmark
				'DJ' => 'DJI', //Djibouti
				'DM' => 'DMA', //Dominica
				'DO' => 'DOM', //Dominican Republic
				'EC' => 'ECU', //Ecuador
				'EG' => 'EGY', //Egypt
				'SV' => 'SLV', //El Salvador
				'GQ' => 'GNQ', //Equatorial Guinea
				'ER' => 'ERI', //Eritrea
				'EE' => 'EST', //Estonia
				'ET' => 'ETH', //Ethiopia
				'FK' => 'FLK', //Falkland Islands
				'FO' => 'FRO', //Faroe Islands
				'FJ' => 'FIJ', //Fiji
				'FI' => 'FIN', //Finland
				'FR' => 'FRA', //France
				'GF' => 'GUF', //French Guiana
				'PF' => 'PYF', //French Polynesia
				'TF' => 'ATF', //French Southern Territories
				'GA' => 'GAB', //Gabon
				'GM' => 'GMB', //Gambia
				'GE' => 'GEO', //Georgia
				'DE' => 'DEU', //Germany
				'GH' => 'GHA', //Ghana
				'GI' => 'GIB', //Gibraltar
				'GR' => 'GRC', //Greece
				'GL' => 'GRL', //Greenland
				'GD' => 'GRD', //Grenada
				'GP' => 'GLP', //Guadeloupe
				'GU' => 'GUM', //Guam
				'GT' => 'GTM', //Guatemala
				'GG' => 'GGY', //Guernsey
				'GN' => 'GIN', //Guinea
				'GW' => 'GNB', //Guinea-Bissau
				'GY' => 'GUY', //Guyana
				'HT' => 'HTI', //Haiti
				'HM' => 'HMD', //Heard Island and McDonald Islands
				'VA' => 'VAT', //Holy See (Vatican City State)
				'HN' => 'HND', //Honduras
				'HK' => 'HKG', //Hong Kong
				'HU' => 'HUN', //Hungary
				'IS' => 'ISL', //Iceland
				'IN' => 'IND', //India
				'ID' => 'IDN', //Indonesia
				'IR' => 'IRN', //Iran
				'IQ' => 'IRQ', //Iraq
				'IE' => 'IRL', //Republic of Ireland
				'IM' => 'IMN', //Isle of Man
				'IL' => 'ISR', //Israel
				'IT' => 'ITA', //Italy
				'JM' => 'JAM', //Jamaica
				'JP' => 'JPN', //Japan
				'JE' => 'JEY', //Jersey
				'JO' => 'JOR', //Jordan
				'KZ' => 'KAZ', //Kazakhstan
				'KE' => 'KEN', //Kenya
				'KI' => 'KIR', //Kiribati
				'KP' => 'PRK', //Korea, Democratic People\'s Republic of
				'KR' => 'KOR', //Korea, Republic of (South)
				'KW' => 'KWT', //Kuwait
				'KG' => 'KGZ', //Kyrgyzstan
				'LA' => 'LAO', //Laos
				'LV' => 'LVA', //Latvia
				'LB' => 'LBN', //Lebanon
				'LS' => 'LSO', //Lesotho
				'LR' => 'LBR', //Liberia
				'LY' => 'LBY', //Libya
				'LI' => 'LIE', //Liechtenstein
				'LT' => 'LTU', //Lithuania
				'LU' => 'LUX', //Luxembourg
				'MO' => 'MAC', //Macao S.A.R., China
				'MK' => 'MKD', //Macedonia
				'MG' => 'MDG', //Madagascar
				'MW' => 'MWI', //Malawi
				'MY' => 'MYS', //Malaysia
				'MV' => 'MDV', //Maldives
				'ML' => 'MLI', //Mali
				'MT' => 'MLT', //Malta
				'MH' => 'MHL', //Marshall Islands
				'MQ' => 'MTQ', //Martinique
				'MR' => 'MRT', //Mauritania
				'MU' => 'MUS', //Mauritius
				'YT' => 'MYT', //Mayotte
				'MX' => 'MEX', //Mexico
				'FM' => 'FSM', //Micronesia
				'MD' => 'MDA', //Moldova
				'MC' => 'MCO', //Monaco
				'MN' => 'MNG', //Mongolia
				'ME' => 'MNE', //Montenegro
				'MS' => 'MSR', //Montserrat
				'MA' => 'MAR', //Morocco
				'MZ' => 'MOZ', //Mozambique
				'MM' => 'MMR', //Myanmar
				'NA' => 'NAM', //Namibia
				'NR' => 'NRU', //Nauru
				'NP' => 'NPL', //Nepal
				'NL' => 'NLD', //Netherlands
				'AN' => 'ANT', //Netherlands Antilles
				'NC' => 'NCL', //New Caledonia
				'NZ' => 'NZL', //New Zealand
				'NI' => 'NIC', //Nicaragua
				'NE' => 'NER', //Niger
				'NG' => 'NGA', //Nigeria
				'NU' => 'NIU', //Niue
				'NF' => 'NFK', //Norfolk Island
				'MP' => 'MNP', //Northern Mariana Islands
				'NO' => 'NOR', //Norway
				'OM' => 'OMN', //Oman
				'PK' => 'PAK', //Pakistan
				'PW' => 'PLW', //Palau
				'PS' => 'PSE', //Palestinian Territory
				'PA' => 'PAN', //Panama
				'PG' => 'PNG', //Papua New Guinea
				'PY' => 'PRY', //Paraguay
				'PE' => 'PER', //Peru
				'PH' => 'PHL', //Philippines
				'PN' => 'PCN', //Pitcairn
				'PL' => 'POL', //Poland
				'PT' => 'PRT', //Portugal
				'PR' => 'PRI', //Puerto Rico
				'QA' => 'QAT', //Qatar
				'RE' => 'REU', //Reunion
				'RO' => 'ROU', //Romania
				'RU' => 'RUS', //Russia
				'RW' => 'RWA', //Rwanda
				'BL' => 'BLM', //Saint Barth&eacute;lemy
				'SH' => 'SHN', //Saint Helena
				'KN' => 'KNA', //Saint Kitts and Nevis
				'LC' => 'LCA', //Saint Lucia
				'MF' => 'MAF', //Saint Martin (French part)
				'SX' => 'SXM', //Sint Maarten / Saint Matin (Dutch part)
				'PM' => 'SPM', //Saint Pierre and Miquelon
				'VC' => 'VCT', //Saint Vincent and the Grenadines
				'WS' => 'WSM', //Samoa
				'SM' => 'SMR', //San Marino
				'ST' => 'STP', //S&atilde;o Tom&eacute; and Pr&iacute;ncipe
				'SA' => 'SAU', //Saudi Arabia
				'SN' => 'SEN', //Senegal
				'RS' => 'SRB', //Serbia
				'SC' => 'SYC', //Seychelles
				'SL' => 'SLE', //Sierra Leone
				'SG' => 'SGP', //Singapore
				'SK' => 'SVK', //Slovakia
				'SI' => 'SVN', //Slovenia
				'SB' => 'SLB', //Solomon Islands
				'SO' => 'SOM', //Somalia
				'ZA' => 'ZAF', //South Africa
				'GS' => 'SGS', //South Georgia/Sandwich Islands
				'SS' => 'SSD', //South Sudan
				'ES' => 'ESP', //Spain
				'LK' => 'LKA', //Sri Lanka
				'SD' => 'SDN', //Sudan
				'SR' => 'SUR', //Suriname
				'SJ' => 'SJM', //Svalbard and Jan Mayen
				'SZ' => 'SWZ', //Swaziland
				'SE' => 'SWE', //Sweden
				'CH' => 'CHE', //Switzerland
				'SY' => 'SYR', //Syria
				'TW' => 'TWN', //Taiwan
				'TJ' => 'TJK', //Tajikistan
				'TZ' => 'TZA', //Tanzania
				'TH' => 'THA', //Thailand    
				'TL' => 'TLS', //Timor-Leste
				'TG' => 'TGO', //Togo
				'TK' => 'TKL', //Tokelau
				'TO' => 'TON', //Tonga
				'TT' => 'TTO', //Trinidad and Tobago
				'TN' => 'TUN', //Tunisia
				'TR' => 'TUR', //Turkey
				'TM' => 'TKM', //Turkmenistan
				'TC' => 'TCA', //Turks and Caicos Islands
				'TV' => 'TUV', //Tuvalu     
				'UG' => 'UGA', //Uganda
				'UA' => 'UKR', //Ukraine
				'AE' => 'ARE', //United Arab Emirates
				'GB' => 'GBR', //United Kingdom
				'US' => 'USA', //United States
				'UM' => 'UMI', //United States Minor Outlying Islands
				'UY' => 'URY', //Uruguay
				'UZ' => 'UZB', //Uzbekistan
				'VU' => 'VUT', //Vanuatu
				'VE' => 'VEN', //Venezuela
				'VN' => 'VNM', //Vietnam
				'VG' => 'VGB', //Virgin Islands, British
				'VI' => 'VIR', //Virgin Island, U.S.
				'WF' => 'WLF', //Wallis and Futuna
				'EH' => 'ESH', //Western Sahara
				'YE' => 'YEM', //Yemen
				'ZM' => 'ZMB', //Zambia
				'ZW' => 'ZWE', //Zimbabwe

		  );

		  $iso_code = isset( $countries[$country] ) ? $countries[$country] : false;
		  return $iso_code;

		}


    } // class
	
	


    /**
    * Add the Gateway to WooCommerce
    **/
    function woocommerce_add_mpgs_gateway($methods)
    {
        $methods[] = 'WC_MPGS';
        return $methods;
    }
    // Adding Gateway to WooCommerce Gateways
    add_filter('woocommerce_payment_gateways', 'woocommerce_add_mpgs_gateway');
} // end woocommerce_mpgs
?>