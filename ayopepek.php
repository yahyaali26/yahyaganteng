
<?php
date_default_timezone_set("Asia/Jakarta");
$date = date("H:i:s Y-m-d");

/*      
        * Created by : will pratama - facebook.com/yaelahhwil
        * Mesenger EROR bg
*/

/*      PENGEN GANTI PAYMENT BANK ? REPLACE SADJA 

        BCA : "mode":"BCAVA" || "paymentChannelCode":"DPVABCA"
        BNI : "mode":"BCAVA" || "paymentChannelCode":"DPVABCA"
*/      

class akunNgereff
{
        protected $gaid;
        protected $deviceId;
        protected $androidId;
        public $modules;

        public function __construct()
        {
                $this->modules = new modules();
                $this->gaid = $this->modules->randStr("huruf_angka", "12")."-".$this->modules->randStr("huruf_angka", "4")."-".$this->modules->randStr("huruf_angka", "4")."-".$this->modules->randStr("huruf_angka", "15");
                $this->deviceId = $this->modules->randStr("angka", "25");
                $this->androidId = $this->modules->randStr("huruf_angka", "10");
        }

        public function registerAccount($phoneNumber, $email, $nama, $password)
        {
                $headers = array();
                $headers[] = "OAuth: ";
                $headers[] = "platform: Android".rand(000, 999);
                $headers[] = "OSVersion: ".rand(0, 9).".".rand(0, 9).".".rand(0, 9);
                $headers[] = "GAID: ".$this->gaid;
                $headers[] = "deviceId: ".$this->deviceId;
                $headers[] = "androidId: ".$this->androidId;
                $headers[] = "appVersion: ".rand(0, 9).".".rand(0, 9).".".rand(0, 9);
                $headers[] = "userId: ";
                $headers[] = "deviceType: ".rand(00000,99909);
                $headers[] = "authToken: ";
                $headers[] = "deviceSize: medium".rand(0, 9).".".rand(0, 9).".".rand(0, 9);
                $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
                $headers[] = "Host: ayopop.com";
                $registerAccount = $this->modules->curl("https://ayopop.com/registerApi", 'device_type=Android&password='.$password.'&loginType=default&age=15-28&password_confirm='.$password.'&userLanguage=IN&email='.str_replace("@", "%40", $email).'&name='.$nama.'&phone='.$phoneNumber.'&', false, false, $headers);
                return $registerAccount;
        }

        public function verifyOTP($otpCode, $userId)
        {
                $headers = array();
                $headers[] = "OAuth: ";
                $headers[] = "platform: Android".rand(000, 999);
                $headers[] = "OSVersion: ".rand(0, 9).".".rand(0, 9).".".rand(0, 9);
                $headers[] = "GAID: ".$this->gaid;
                $headers[] = "deviceId: ".$this->deviceId;
                $headers[] = "androidId: ".$this->androidId;
                $headers[] = "appVersion: ".rand(0, 9).".".rand(0, 9).".".rand(0, 9);
                $headers[] = "userId: ";
                $headers[] = "deviceType: ".rand(00000,99909);
                $headers[] = "authToken: ";
                $headers[] = "deviceSize: medium".rand(0, 9).".".rand(0, 9).".".rand(0, 9);
                $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
                $headers[] = "Host: ayopop.com";
                $verifyOTP = $this->modules->curl("https://ayopop.com/verificationApi", 'verificationPin='.$otpCode.'&id='.$userId.'&loginType=default&', false, false, $headers);
                return $verifyOTP;
        }

        public function login($phoneNumber, $password)
        {
                $headers = array();
                $headers[] = "OAuth: ";
                $headers[] = "platform: Android".rand(000, 999);
                $headers[] = "OSVersion: ".rand(0, 9).".".rand(0, 9).".".rand(0, 9);
                $headers[] = "GAID: ".$this->gaid;
                $headers[] = "deviceId: ".$this->deviceId;
                $headers[] = "androidId: ".$this->androidId;
                $headers[] = "appVersion: ".rand(0, 9).".".rand(0, 9).".".rand(0, 9);
                $headers[] = "userId: ";
                $headers[] = "deviceType: ".rand(00000,99909);
                $headers[] = "authToken: ";
                $headers[] = "deviceSize: medium".rand(0, 9).".".rand(0, 9).".".rand(0, 9);
                $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
                $headers[] = "Host: ayopop.com";
                $login = $this->modules->curl("https://ayopop.com/loginApi", 'phone='.$phoneNumber.'&device_type=Android&password='.$password.'&loginType=default&', false, false, $headers);
                return $login;
        }

        public function validateReferral($userId, $authToken, $referralCode, $phoneOvo)
        {
                $headers = array();
                $headers[] = "authToken: ".$authToken;
                $headers[] = "deviceType: ".rand(00000,99909);
                $headers[] = "deviceSize: medium".rand(0, 9).".".rand(0, 9).".".rand(0, 9);
                $headers[] = "OAuth: ";
                $headers[] = "OSVersion: ".rand(0, 9).".".rand(0, 9).".".rand(0, 9);
                $headers[] = "platform: Android".rand(000, 999);
                $headers[] = "userId: ".$userId;
                $headers[] = "appVersion: ".rand(0, 9).".".rand(0, 9).".".rand(0, 9);
                $headers[] = "deviceId: ".$this->deviceId;
                $headers[] = "androidId: ".$this->androidId;
                $headers[] = "GAID: ";
                $headers[] = "Content-Type: application/json";
                $headers[] = "Host: ayopop.com";
                $validateReferral = $this->modules->curl("https://ayopop.com/api/promos/checkPromo", '{"userId":'.$userId.',"authToken":"'.$authToken.'","productId":1050,"promoCode":"'.$referralCode.'","productPrice":51950,"idpel":"'.$phoneOvo.'"}', false, false, $headers);
                return $validateReferral;
        }

        public function buySaldoOVO($userId, $authToken, $referralCode, $phoneOvo)
        {
                $headers = array();
                $headers[] = "OAuth: ";
                $headers[] = "platform: Android".rand(000, 999);
                $headers[] = "OSVersion: ".rand(0, 9).".".rand(0, 9).".".rand(0, 9);
                $headers[] = "GAID: ".rand(0, 9).".".rand(0, 9).".".rand(0, 9);
                $headers[] = "deviceId:  ".$this->deviceId;
                $headers[] = "androidId: ".$this->androidId;
                $headers[] = "appVersion: ".rand(0, 9).".".rand(0, 9).".".rand(0, 9);
                $headers[] = "userId: ".$userId;
                $headers[] = "deviceType: ".rand(00000,99909);
                $headers[] = "authToken: ".$authToken;
                $headers[] = "deviceSize: mediumm".rand(0, 9).".".rand(0, 9).".".rand(0, 9);
                $headers[] = "Content-Type: application/json; charset=utf-8";
                $headers[] = "Host: ayopop.com";
                $buySaldoOVO = $this->modules->curl("https://ayopop.com/api/transactions/doRecharge", '{"authToken":"'.$authToken.'","mode":"BCAVA","p_id":1050,"productPrice":"51950","userId":"'.$userId.'","userPhone":"'.$phoneOvo.'","promoCode":"'.$referralCode.'","paymentChannelCode":"DPVABCA"}', false, false, $headers);
                return $buySaldoOVO;
        }

        public function execute_login($phoneNumber, $password, $referralCode)
        {
                $login = $this->login($phoneNumber, $password);
                $objLog = json_decode($login);
                $userId = $objLog->userId;
                if(!empty($objLog->userId))
                {
                        $authToken = $objLog->userAuth;
                        //$this->modules->fwrite("akun_ayopop.txt", $email."/".$password."/".$nama."/".$authToken.PHP_EOL);
                        echo PHP_EOL."Success Login..".PHP_EOL."Go buy Saldo OVO..".PHP_EOL;
                        echo "Input Phone Number OVO : ";
                        $phoneOvo = trim(fgets(STDIN));
                        $validateReferral = $this->validateReferral($userId, $authToken, $referralCode, $phoneOvo);
                        if(strpos($validateReferral, '"status_code":200'))
                        {
                                $buySaldoOVO = $this->buySaldoOVO($userId, $authToken, $referralCode, $phoneOvo);
                                $objBuy = json_decode($buySaldoOVO, true);
                                @$codePay = $objBuy['paymentCode'];
                                if(!empty($objBuy['paymentCode']) or !empty($objBuy['Product Name']))
                                {
                                        print PHP_EOL."Success Buy ".$objBuy['Product Name']." - Payment : Virtual BCA || Payment Code : ".$codePay.PHP_EOL;
                                        return false;
                                }else{
                                        print PHP_EOL."Failed Buy Saldo OVO!".PHP_EOL;
                                        return $buySaldoOVO;
                                }
                        }else{  
                                print PHP_EOL."Code Referral not Valid".PHP_EOL;
                                print_r($validateReferral);
                        }
                }else{
                        print PHP_EOL."Failed Login!";
                }
        }       

        public function execute_register($referralCode, $phoneNumber)
        {
                $email = rand(00000000, 99999999)."@gmail.com";
                $nama = $this->modules->random_nama()['nama'];
                $password = "willzz4490";
                $registerAccount = $this->registerAccount($phoneNumber, $email, $nama, $password);
                $objReg = json_decode($registerAccount);
                if(!empty($objReg->userId))
                {
                        $userIdOTP = $objReg->userId;
                        echo PHP_EOL."Success Sent OTP".PHP_EOL;
                        echo "Input OTP Code : ";
                        $otpCode = trim(fgets(STDIN));
                        $verifyOTP = $this->verifyOTP($otpCode, $userIdOTP);
                        if(strpos($verifyOTP, '"success":"1"'))
                        {
                                print PHP_EOL."Success Register!, Data ~> Email : ".$email." || Phone : ".$phoneNumber." || Pw : ".$password." || Nama : ".$nama.PHP_EOL."Go Login..";
                                $login = $this->login($phoneNumber, $password);
                                $objLog = json_decode($login);
                                $userId = $objLog->userId;
                                if(!empty($objLog->userId))
                                {
                                        $authToken = $objLog->userAuth;
                                        $this->modules->fwrite("akun_ayopop.txt", $userId."/".$phoneNumber."/".$email."/".$password."/".$nama."/".$authToken.PHP_EOL);
                                        echo PHP_EOL."Success Login..".PHP_EOL."Go buy Saldo OVO..".PHP_EOL;
                                        echo "Input Phone Number OVO : ";
                                        $phoneOvo = trim(fgets(STDIN));
                                        $validateReferral = $this->validateReferral($userId, $authToken, $referralCode, $phoneOvo);
                                        if(strpos($validateReferral, '"status_code":200'))
                                        {
                                                $buySaldoOVO = $this->buySaldoOVO($userId, $authToken, $referralCode, $phoneOvo);
                                                $objBuy = json_decode($buySaldoOVO, true);
                                                @$codePay = $objBuy['paymentCode'];
                                                if(!empty($objBuy['paymentCode']) or !empty($objBuy['Product Name']))
                                                {
                                                        print PHP_EOL."Success Buy : ".$objBuy['Product Name']." - Payment : Virtual BCA || Payment Code : ".$codePay.PHP_EOL;
                                                        return false;
                                                }else{
                                                        print PHP_EOL."Failed Buy Saldo OVO!".PHP_EOL;
                                                        return $buySaldoOVO;
                                                }
                                        }else{  
                                                print PHP_EOL."Code Referral not Valid".PHP_EOL;
                                                print_r($validateReferral);
                                        }
                                }else{
                                        print PHP_EOL."Failed Login!";
                                }
                        }else{
                                print PHP_EOL."Failed Verify OTP";
                        }
                }else{
                        //print "Failed!".PHP_EOL;
                        return $registerAccount.PHP_EOL;
                }
        }
}

class akunUtama
{
        protected $authToken = "123|123|!23|!@3"; // set akun lo disini authnya
        protected $userId = "6969"; // set user id lo disini
        protected $emailUtama = "081322154556"; // ini nomor gue, lo mau masukin pulsa / ovo / gopay boleh
        protected $gaid;
        protected $deviceId;
        protected $androidId;
        public $modules;

        public function __construct()
        {
                $this->modules = new modules();
                $this->gaid = $this->modules->randStr("huruf_angka", "12")."-".$this->modules->randStr("huruf_angka", "4")."-".$this->modules->randStr("huruf_angka", "4")."-".$this->modules->randStr("huruf_angka", "15");
                $this->deviceId = $this->modules->randStr("angka", "25");
                $this->androidId = $this->modules->randStr("huruf_angka", "10");
        }

        public function validateVoucher($voucherCode)
        {
                $headers = array();
                $headers[] = "authToken: ".$this->authToken;
                $headers[] = "deviceType: OPPO ".rand(0000, 9999);
                $headers[] = "deviceSize: medium";
                $headers[] = "OAuth: ";
                $headers[] = "OSVersion: ".rand(0, 9).".".rand(0, 9).".".rand(0, 9);
                $headers[] = "platform: Android".rand(000, 999);
                $headers[] = "userId: ".$this->userId;
                $headers[] = "appVersion: 5.12.3";
                $headers[] = "deviceId: ".$this->deviceId;
                $headers[] = "androidId: ".$this->androidId;
                $headers[] = "GAID: ";
                $headers[] = "Content-Type: application/json";
                $headers[] = "ost: ayopop.com";
                $validateVoucher = $this->modules->curl("https://ayopop.com/api/promos/checkPromo", '{"userId":'.$this->userId.',"authToken":"'.$this->authToken.'","productId":701,"promoCode":"'.$voucherCode.'","productPrice":55000,"idpel":"'.$this->emailUtama.'"}', false, false, $headers);
                return $validateVoucher;
        }

        public function checkoutProduct($voucherCode)
        {
                $headers = array();
                $headers[] = "OAuth: ";
                $headers[] = "platform: Android".rand(000, 999);
                $headers[] = "OSVersion: ".rand(0, 9).".".rand(0, 9).".".rand(0, 9);
                $headers[] = "GAID: ";
                $headers[] = "deviceId: ".$this->deviceId;
                $headers[] = "androidId: ".$this->androidId;
                $headers[] = "appVersion: 5.12.3";
                $headers[] = "userId: ".$this->userId;
                $headers[] = "deviceType: OPPO ".rand(0000, 9999);
                $headers[] = "authToken: ".$this->authToken;
                $headers[] = "deviceSize: medium";
                $headers[] = "Content-Type: application/json; charset=utf-8";
                $headers[] = "Host: ayopop.com";
                $checkoutProduct = $this->modules->curl("https://ayopop.com/api/transactions/doRecharge", '{"authToken":"'.$this->authToken.'","mode":"BCAVA","p_id":701,"productPrice":"55000","userId":"'.$this->userId.'","userPhone":"'.$this->emailUtama.'","promoCode":"'.$voucherCode.'","paymentChannelCode":"DPVABCA"}', false, false, $headers);
                return $checkoutProduct;
        }

        public function execute_buyProduct($voucherCode)
        {
                $validateVoucher = $this->validateVoucher($voucherCode);
                $objValid = json_decode($validateVoucher);
                if(strpos($validateVoucher, '"status_code":200'))
                {
                        print PHP_EOL.$objValid->label;
                        $checkoutProduct = $this->checkoutProduct($voucherCode);
                        $objCheckout = json_decode($checkoutProduct, true);
                        if(!empty($objCheckout['paymentCode']) or !empty($objCheckout['Product Name']))
                        {
                                print PHP_EOL."Success Buy : ".$objCheckout['Product Name']." - Payment : Virtual BCA || Payment Code : ".$objCheckout['paymentCode'];
                                return false;
                        }else{
                                print PHP_EOL."Failed Buy Product!".PHP_EOL;
                                return $checkoutProduct;
                        }
                }else{
                        print PHP_EOL."Failed".PHP_EOL.$validateVoucher;
                }
        }
}

class modules 
{
        public function curl($url, $params, $cookie, $header, $httpheaders, $request = 'POST', $socks = "")
        {
                $this->ch = curl_init();
                        
                curl_setopt($this->ch, CURLOPT_URL, $url);
                curl_setopt($this->ch, CURLOPT_POSTFIELDS, $params);
                curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 1);

                curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, $request);

                if($cookie == true)
                {       
                        $cookies = tempnam('/tmp','cookie.txt');
                        curl_setopt($this->ch, CURLOPT_COOKIEJAR, $cookies);
                        curl_setopt($this->ch, CURLOPT_COOKIEFILE, $cookies);
                }

                curl_setopt($this->ch, CURLOPT_HEADER, $header);
                @curl_setopt($this->ch, CURLOPT_HTTPHEADER, $httpheaders);

                curl_setopt($this->ch, CURLOPT_HTTPPROXYTUNNEL, 1);
                curl_setopt($this->ch, CURLOPT_PROXY, $socks);
                curl_setopt($this->ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);

                curl_setopt($this->ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                $response = curl_exec($this->ch);
                return $response;
                curl_close($this->ch);
        }

        public function randStr($type, $length) 
        {
                $characters = array();
                $characters['angka'] = '0123456789';
                $characters['kapital'] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $characters['huruf'] = 'abcdefghijklmnopqrstuvwxyz';
                $characters['kapital_angka'] = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $characters['huruf_angka'] = '0123456789abcdefghijklmnopqrstuvwxyz';
                $characters['all'] = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters[$type]);
                $randomString = '';

                for ($i = 0; $i < $length; $i++) 
                {
                        $randomString .= $characters[$type][rand(0, $charactersLength - 1)];
                }

                return $randomString;

        }   

        public function fwrite($namafile, $data)
        {
                $fh = fopen($namafile, "a");
                fwrite($fh, $data);
                fclose($fh);  
        }

        public function random_nama()
        {
                $get = file_get_contents("https://api.randomuser.me");
                $j = json_decode($get, true);
                $first = @preg_replace("/\b(?!\|)(?!,)(?!\s)\W\b/", "", @iconv('UTF-8', 'ASCII//TRANSLIT', $j['results'][0]['name']['first']));
                $last = @preg_replace("/\b(?!\|)(?!,)(?!\s)\W\b/", "", @iconv('UTF-8', 'ASCII//TRANSLIT', $j['results'][0]['name']['last']));
                $nama = $first .$last.$this->randStr('huruf_angka','2');
                $rand = rand(00000,99999);
                $domain = array("@gmail.com","@yahoo.com","@hotmail.co.id");
                $email = $first.$last.$this->randStr("all", "2").$domain[rand(0, 2)];   
                $nomorhp = "+628".$this->randStr('angka','10')."";
                $password = $first.$this->randStr('huruf_angka','6');   
                if(empty($first) or empty($last))
                {
                        $this->random_nama();
                }else{
                        return array("first" => $first, "last" => $last, "nama" => $nama, "email" => $email, "nope" => $nomorhp, "password" => $password);
                }
        }
}       


$modules = new modules();
$akunNgereff = new akunNgereff();
$akunUtama = new akunUtama();

echo "Menu : \n\n 1. Login\n 2. Login + Checkout\n 3. Register + Checkout + Checkout\n 4. Checkout\n 5. Voc\n\nPilih NOMOR Menu : ";
$menu = trim(fgets(STDIN));
if($menu == "1"){
        echo "Input Phone / Email : ";
        $phoneNumber = trim(fgets(STDIN));
        echo "Input Password : ";
        $password = trim(fgets(STDIN));
        $login = $akunNgereff->login($phoneNumber, $password);
        $obj = json_decode($login);
        $json = json_encode($obj, JSON_PRETTY_PRINT);
        print_r($json);
}elseif($menu == "2"){  
        echo "Input Phone Number : ";
        $phoneNumber = trim(fgets(STDIN));
        echo "Input Password : ";
        $password = trim(fgets(STDIN));
        echo "Input Referral Code : ";
        $referralCode = trim(fgets(STDIN));
        $execute = $akunNgereff->execute_login($phoneNumber, $password, $referralCode);
        print $execute;
}elseif($menu == "3"){
        echo "Input File Phone Number : ";
        $filephone = trim(fgets(STDIN));
        echo "Input Code Referral : ";
        $referralCode = trim(fgets(STDIN));

        echo PHP_EOL."Jumlah Phone : ".count(explode(PHP_EOL, @file_get_contents($filephone))).PHP_EOL;
        foreach(explode(PHP_EOL, file_get_contents($filephone)) as $a => $phoneNumber)
        {
                echo PHP_EOL."Ekse Phone : ".$phoneNumber.PHP_EOL;
                print $akunNgereff->execute_register($referralCode, $phoneNumber);
                echo PHP_EOL.PHP_EOL."Lanjut ? y/n : ";
                $lanjut = trim(fgets(STDIN));
                if($lanjut == "y")
                {
                        print PHP_EOL."Silahkan Bayar dulu boss :v";sleep(1);echo".";sleep(1);echo".";sleep(1);echo".";sleep(1).PHP_EOL;
                        echo PHP_EOL."Input Voucher Code Discon : ";
                        $voucherCode = trim(fgets(STDIN));
                        print $akunUtama->execute_buyProduct($voucherCode);
                        print PHP_EOL."Silahkan Bayar dulu boss :v Robot nak lanjut Dolo";sleep(1);echo".";sleep(1);echo".";sleep(1);echo".";sleep(1).PHP_EOL.PHP_EOL;
                }else{
                        continue;
                }
        }
}elseif($menu == "4"){
        echo PHP_EOL."Input Voucher Code Discon : ";
        $voucherCode = trim(fgets(STDIN));
        print $akunUtama->execute_buyProduct($voucherCode);
}elseif($menu == "5"){
        echo "Jumlah : ";
        $jumlah = trim(fgets(STDIN));
        for($a = 0; $a <= $jumlah; $a++)
        {
                $voucherCode = "J2G".$modules->randStr("kapital_angka","5");
                $check = $akunUtama->execute_buyProduct($voucherCode);
                print $check;
        }
}else{
        print PHP_EOL."Check Menu!";
        exit();
}

?>
