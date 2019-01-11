<?php

/**
 * gituser: JonathanMackie
 * Date: 01/11/2019
 * Time: 11:00 AM
 * Retain.me Smartslip PHP Example
 * Example that allows information to be passed into an array, encoded into a JSON format then posted via curl to the retainme order api
 * For the sake of this example the array is hard coded but the curl will work fine with a dynamic array
 */

//Set the request url
$url = 'https://orders-beta.smartslip.io/api/v2/orders';
//This array contains order information, shipping information and two items for the order.
$field = array(
        "0" => array(
        //Order information
        "order_number" => "1012test",
        "order_created_at" => "2018-07-16T11:00:26+00:00",
        "total_price" => 0,
        "subtotal_price" => 0,
        "total_shipping_price" => 0,
        "total_tax" => 0,
        "tax_rate" => 0,
        "currency" => "",
        "total_discounts" => 0,
        "total_products_price" => 0,
        "shipping_methods" => array(
            "0" => array(
                "shipping_method_id" => 0,
                "name" => "N/A",
            ),
        ),
        //shipping information
        "shipments" => array(
            "0" => array(
                "shipment_id" => 1,
                "shipping_method_id" => 0,
                "first_name" => "Jonathan",
                "last_name" => "Mackie",
                "is_gift" => "",
                "gift_message" => "",
                "address1" => "L7 Rockingham Motor Speedway",
                "address2" => "Mitchell Road",
                "city" => "Corby",
                "country_code" => "UK",
                "country" => "United Kingdom",
                "zip_postalcode" => "NN17 5AF",
                "phone" => "+44 (0) 20 7504 1250",
                "latitude" => "",
                "longitude" => "",
                "custom_1" => "",
                "custom_2" => "",
                "custom_3" => "",
                "custom_4" => "",
                "custom_5" => "",
                "custom_6" => "",
                "custom_7" => "",
                "custom_8" => "",
                "custom_9" => "",
                "custom_10" => "",
                "custom_11" => "",
                "custom_12" => "",
                "custom_13" => "",
                "custom_14" => "",
                "custom_15" => "",
                "custom_16" => "",
                "custom_17" => "",
                "custom_18" => "",
                "custom_19" => "",
                "custom_20" => "",
            ),
        ),
        //Customer information
        "customer" => array(
            "customer_id" => 14349023,
            "email" => "jon@retain.me",
        ),
        "billing_address" => "",
        //Products
        "products" => array(
            //Item 1
            "0" => array(
                "product_id" => 1319714390117,
                "name" => "Cat in a box",
                "imageurl" => "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Cat03.jpg/1200px-Cat03.jpg",
                "quantity" => 1,
                "price" => 1429.0000,
                "tax" => 0,
                "shipment_id" => 1,
                "color" => "",
                "size" => "",
                "custom_1" => "",
                "custom_2" => "",
                "custom_3" => "",
                "custom_4" => "",
                "custom_5" => "",
                "custom_6" => "",
                "custom_7" => "",
                "custom_8" => "",
                "custom_9" => "",
                "custom_10" => "",
                "custom_11" => "",
                "custom_12" => "",
                "custom_13" => "",
                "custom_14" => "",
                "custom_15" => "",
                "custom_16" => "",
                "custom_17" => "",
                "custom_18" => "",
                "custom_19" => "",
                "custom_20" => "",
            ),
            //Item 2
            "1" => array(
                "product_id" => 1316449026147,
                "name" => "Tumi - Larkin Erin Brief Bag",
                "imageurl" => "https://cdn.shopify.com/s/files/1/1602/7127/products/erin-brief-bag-164304.jpg",
                "quantity" => 1,
                "price" => 545.0000,
                "tax" => 0,
                "shipment_id" => 1,
                "color" => "",
                "size" => "",
                "custom_1" => "",
                "custom_2" => "",
                "custom_3" => "",
                "custom_4" => "",
                "custom_5" => "",
                "custom_6" => "",
                "custom_7" => "",
                "custom_8" => "",
                "custom_9" => "",
                "custom_10" => "",
                "custom_11" => "",
                "custom_12" => "",
                "custom_13" => "",
                "custom_14" => "",
                "custom_15" => "",
                "custom_16" => "",
                "custom_17" => "",
                "custom_18" => "",
                "custom_19" => "",
                "custom_20" => "",
            ),
        ),
        //custom fields
        "custom_1" => 1006,
        "custom_2" => "FIGL",
        "custom_3" => "",
        "custom_4" => "",
        "custom_5" => "",
        "custom_6" => "",
        "custom_7" => "",
        "custom_8" => "",
        "custom_9" => "",
        "custom_10" => "",
        "custom_11" => "",
        "custom_12" => "",
        "custom_13" => "",
        "custom_14" => "",
        "custom_15" => "",
        "custom_16" => "",
        "custom_17" => "",
        "custom_18" => "",
        "custom_19" => "",
        "custom_20" => "",
    ),
    );

//encodes the array into json
$fieldjson = json_encode($field);

//open connection
$ch = curl_init();

//sets headers and auth
$headers = [
    'Content-Type:application/json',
    'Authorization: Basic '. base64_encode("USER:PASS") // <--- Enter the api username & password
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


//set the url, POST data and a few more recommended settings
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldjson);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_ENCODING, "");
curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

//execute post
$result = curl_exec($ch);

//stores errors
$err = curl_error($ch);

//close connection
curl_close($ch);

//displays output
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $result;
}
