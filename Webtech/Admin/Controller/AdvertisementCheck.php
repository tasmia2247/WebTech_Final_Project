<?php
include('../Model/AdvertisementListModel.php');

if(isset($_REQUEST['mydata'])){
      $json = $_REQUEST['mydata'];
      $Advertisement = json_decode($json);
      $Status = "Request";
      $username = "testname";
      $adid = "testID";
      $imageurl = "https//test.com";
      $productname = $Advertisement->productname;
      $adDate = $Advertisement->adDate;
      $Payment = $Advertisement->payment;
      

if(empty($username) || empty($productname) || empty($adDate) || empty($Payment) || empty($adid) || empty($imageurl)){
    echo "Null Data Found";
}
else{
    $status = Addadvertisement($adid,$username,$productname,$adDate,$imageurl,$Status,$Payment);
    if($status != null){
        echo "AdvertisementRequest added successfully";
    }
    else{
       echo "Failed to add";
    }
}

}

else{
   echo "Please Submit Advertisement Request first";
}
?>