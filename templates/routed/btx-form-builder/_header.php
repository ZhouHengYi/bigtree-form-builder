<?
	// Make sure this page is never cached.
	if (!defined("BIGTREE_DO_NOT_CACHE")) {
		define("BIGTREE_DO_NOT_CACHE",true);
	}
	
	$form = BTXFormBuilder::getForm($form);
	$settings = $cms->getSetting("settings");
	
	// Make sure we're serving over HTTPS
	if ($form["paid"]) {
		$cms->makeSecure();

		$form["fields"] = array_merge($form["fields"],array(
			// Section Header
			array(
				"type" => "section",
				"data" => json_encode(array(
					"title" => "Billing Address & Payment",
					"description" => "Please enter your billing information as it appears on your credit card.",
				))
			),
			// Billing Nmae
			array(
				"type" => "name",
				"data" => json_encode(array(
					"name" => "fb_cc_billing_name",
					"required" => true,
					"label" => "Billing Name"	
				))
			),
			// Billing Email
			array(
				"type" => "email",
				"data" => json_encode(array(
					"name" => "fb_cc_billing_email",
					"required" => true,
					"label" => "Billing Email"
				))
			),
			// Billing Address
			array(
				"type" => "address",
				"data" => json_encode(array(
					"name" => "fb_cc_billing_address",
					"required" => true,
					"label" => "Billing Address"
				))
			),
			// Credit Card
			array(
				"type" => "credit-card",
				"data" => json_encode(array(
					"name" => "fb_cc_card",
					"required" => true
				))
			)
		));
		
		$page_link = str_replace("http://","https://",WWW_ROOT).$bigtree["page"]["path"]."/";
	} else {
		$page_link = WWW_ROOT.$bigtree["page"]["path"]."/";
	}
?>