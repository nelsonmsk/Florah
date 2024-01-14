<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Response;
use Auth;
use Carbon\Carbon;

use App\Models\Flower;
use App\Models\Hire;
use App\Models\MailSubscription;
use App\Models\MailPost;
use App\Models\Message;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\Order;
use App\Models\AppDefaults;
use App\Models\User;
use App\Models\Newsletter;
use App\Models\Weather;


class DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	

    public function index(Request $request)
    {
		function getLocation($ipAddress)
		{
			// Get your ipGeolocation API key
			$apiKey = env('IPGEOLOCATION_APIKEY');
			// Get the desired ip passed as function augument
			$ip = $ipAddress;   
			// API endpoint URL with your desired ip and units (e.g., Ip address, Metric units)
			$apiUrl = "https://api.ipgeolocation.io/ipgeo?apiKey={$apiKey}&ip={$ip}";
			try {
				// Make a GET request to the ipGeolocation API
				$promise = Http::get($apiUrl);
				// Get the response body as an object
				 $data = $promise->object();
				$location = $data->city;
				// Handle the retrieved location data as needed
				return $location;
			} catch (\Exception $e) {
				// Handle any errors that occur during the API request
					//$error = $e->getMessage();
					$response = "";
				 return $response; 
			}
		}

		function getWeather($desiredCity)
		{
			// Get your OpenWeather API key
			$apiKey = env('OPENWEATHERMAP_APIKEY');
			// Get the desired city passed as function augument
			$city = $desiredCity;  
			// API endpoint URL with your desired location and units (e.g., London, Metric units)
			$apiUrl = "https://api.openweathermap.org/data/2.5/weather?q={$city}&units=metric&appid={$apiKey}";
			try {
				// Make a GET request to the OpenWeather API
				$promise = Http::get($apiUrl);
				// Get the response body as an object
				$response = $promise->object();
				// Handle the retrieved weather data as needed 
				return $response;
			} catch (\Exception $e) {
				// Handle any errors that occur during the API request
					//$error = $e->getMessage();
					$response = "";
				 return $response; 
			}
		}
	
      try{
			$id = Auth::user()->id;	
			$weatherData = User::find($id)->weather; // get weather by user
			if(!$weatherData){
				//Get the ip address of the user
				$ipAddress = $request->ip();
				//Get location status from IpGeolocation Api
				$location = getLocation($ipAddress);
				if(!$location){
					$weather = "undefined";
				}else {
					//Get weather status from OpenWeather Api
					$response = getWeather($location);
					if(!$response){
						$weather = "undefined";
					}else{
						$weather = $response;
					}
				}
			}else{
				$weather = $weatherData;
			}
		
		/** Dashboard Banner Info  **/
		
		 $date = Date("Y-m-d");		  
		 //  Carbon::now()->subMinutes(2)->locale('en_US')->diffForHumans; // '2 minutes ago'
		 
			//Get Order total count
			$ordersTotal = Order::count();
			//Get Order Update diffInWeeks
			$orders_update = Order::max('created_at');	
			$orders_update_diff  = Carbon::createFromDate($orders_update)->diffInWeeks();
				if($orders_update_diff < 2 ){
					$orders_update_diff2  = Carbon::createFromDate($orders_update)->diffInDays();
						if($orders_update_diff2 < 2 ){
							$orders_update_diff3  = Carbon::createFromDate($orders_update)->diffInHours();
								if($orders_update_diff3 < 2 ){
										$orders_update_diff4  = Carbon::createFromDate($orders_update)->diffInMinutes();
										$ordersUpdate = $orders_update_diff4. ' mins ago';										
								}else{
									$ordersUpdate = $orders_update_diff3. ' hours ago';									
								}							
														
						}else{	
							$ordersUpdate = $orders_update_diff2. ' days ago';
						}	
				}else{
					$ordersUpdate = $orders_update_diff. ' weeks ago';
				}	
			//Get Order Completed Update diffInWeeks
			$orders_completed = Order::where('status', 'completed')
											->max('updated_at');
			$bcompleted_update_diff  = Carbon::createFromDate($orders_completed)->diffInWeeks();
				if($bcompleted_update_diff < 2 ){
					$bcompleted_update_diff2  = Carbon::createFromDate($orders_completed)->diffInDays();
						if($bcompleted_update_diff2 < 2 ){
							$bcompleted_update_diff3  = Carbon::createFromDate($orders_completed)->diffInHours();
								if($bcompleted_update_diff3 < 2 ){
										$bcompleted_update_diff4  = Carbon::createFromDate($orders_completed)->diffInMinutes();
										$bcompletedUpdate = $bcompleted_update_diff4. ' mins ago';										
								}else{
									$bcompletedUpdate = $bcompleted_update_diff3. ' hours ago';									
								}							
														
						}else{	
							$bcompletedUpdate = $bcompleted_update_diff2. ' days ago';
						}	
				}else{
					$bcompletedUpdate = $bcompleted_update_diff. ' weeks ago';
				}											
			$ordersActive = Order::where('status', 'active')
												->whereDate('orderDate', $date)	
												->count();				
			$ordersProcessing = Order::where('status', 'processing')
												->whereDate('orderDate', $date)	
												->count();		 


			//Get Hire total count
			$hiresTotal = Hire::count();
			//Get Hire Update diffInWeeks
			$hires_update = Hire::max('created_at');	
			$hires_update_diff  = Carbon::createFromDate($hires_update)->diffInWeeks();
				if($hires_update_diff < 2 ){
					$hires_update_diff2  = Carbon::createFromDate($hires_update)->diffInDays();
						if($hires_update_diff2 < 2 ){
							$hires_update_diff3  = Carbon::createFromDate($hires_update)->diffInHours();
								if($hires_update_diff3 < 2 ){
										$hires_update_diff4  = Carbon::createFromDate($hires_update)->diffInMinutes();
										$hiresUpdate = $hires_update_diff4. ' mins ago';										
								}else{
									$hiresUpdate = $hires_update_diff3. ' hours ago';									
								}							
														
						}else{	
							$hiresUpdate = $hires_update_diff2. ' days ago';
						}	
				}else{
					$hiresUpdate = $hires_update_diff. ' weeks ago';
				}
	
			//Get Flower total count
			$flowersTotal = Flower::count();
			//Get Flower Update diffInWeeks
			$flowers_update = Flower::max('created_at');	
			$flowers_update_diff  = Carbon::createFromDate($flowers_update)->diffInWeeks();
				if($flowers_update_diff < 2 ){
					$flowers_update_diff2  = Carbon::createFromDate($flowers_update)->diffInDays();
						if($flowers_update_diff2 < 2 ){
							$flowers_update_diff3  = Carbon::createFromDate($flowers_update)->diffInHours();
								if($flowers_update_diff3 < 2 ){
										$flowers_update_diff4  = Carbon::createFromDate($flowers_update)->diffInMinutes();
										$flowersUpdate = $flowers_update_diff4. ' mins ago';										
								}else{
									$flowersUpdate = $flowers_update_diff3. ' hours ago';									
								}							
														
						}else{	
							$flowersUpdate = $flowers_update_diff2. ' days ago';
						}	
				}else{
					$flowersUpdate = $flowers_update_diff. ' weeks ago';
				}					
				
			//Get New Messages Total count
			$messagesTotal = Message::whereDate('created_at', $date)
									->count();		
			//Get Messages Last created time						
			$messages_update = Message::max('created_at');									
			$messages_update_diff  = Carbon::createFromDate($messages_update)->diffInDays();	
				if($messages_update_diff < 2 ){
					$messages_update_diff2  = Carbon::createFromDate($messages_update)->diffInHours();
						if($messages_update_diff2 < 2 ){
							$messages_update_diff3  = Carbon::createFromDate($messages_update)->diffInMinutes();
							$messagesUpdate = $messages_update_diff3. ' mins ago';							
						}else{	
							$messagesUpdate = $messages_update_diff2. ' hours ago';
						}	
				}else{
					$messagesUpdate = $messages_update_diff. ' days ago';
				}


	
			//Get New Subscribers Total count
			$mailSubscriptions_total = MailSubscription::whereDate('created_at', $date)
											->count(); 	
			//Get Last Update time
			$mailSubscriptions_update = MailSubscription::max('created_at');
			$mailSubscriptionsCancelled = MailSubscription::where('status', 'cancelled')
												->whereDate('created_at', $date)											
												->count();									
			$mailSubscriptionsActive = MailSubscription::where('status', 'active')
												->whereDate('created_at', $date)	
												->count();
			//Calculate the % change in the no: of mailsubscriptions
			$d0 = Carbon::now();
			$ms0 = MailSubscription::whereDate('created_at', $d0)
									->count();
			$d1 = Carbon::now()->subDay(1);								
			$ms1 = MailSubscription::whereDate('created_at', $d1)
									->count();						
				if ($ms0 == 0 && $ms1 == 0)	{
					$msChange = 0;
				}else{
					$msChange = ($ms0 /($ms0 + $ms1) ) * 100 ; 									
				}
			//Get MailSubscriptions Last updated time						
			$mailsub_update = MailSubscription::where(function ($query) {
												$query->where('status','processing')
													->orWhere('status', 'active');
												})->max('created_at');									
			$mailsub_update_diff  = Carbon::createFromDate($mailsub_update)->diffInDays();	
				if($mailsub_update_diff < 2 ){
					$mailsub_update_diff2  = Carbon::createFromDate($mailsub_update)->diffInHours();
						if($mailsub_update_diff2 < 2 ){
							$mailsub_update_diff3  = Carbon::createFromDate($mailsub_update)->diffInMinutes();
							$mailsubUpdate = $mailsub_update_diff3. ' mins ago';							
						}else{	
							$mailsubUpdate = $mailsub_update_diff2. ' hours ago';
						}	
				}else{
					$mailsubUpdate = $mailsub_update_diff. ' days ago';
				}				
				
			//Get Newsletters sent to subscribers this month
			$this_month = Carbon::now()->month;
			$newsletters = Newsletter::where('status','sent')
									  ->whereMonth('published_date',$this_month)
									  ->get();
									  
		/** Dashboard Banner Info ends here **/		


		/**Order Line Chart & MailSubscription Bar Chart **/
			$fDate = Carbon::now();
			$tDate = Carbon::now()->subMonth(5);			
			$ordCompleted = Order::whereBetween('created_at', [$tDate, $fDate])
						->where('status','completed')
						->count();	
			$ordActive = Order::whereBetween('orderDate', [$tDate, $fDate])
						->where('status','active')
						->count();	
			$ordProcessing = Order::whereBetween('orderDate', [$tDate, $fDate])
						->where('status','processing')
						->count();
			$ordCancelled = Order::whereBetween('orderDate', [$tDate, $fDate])
						->where('status','cancelled')
						->count();	
						

		/** Detailed Report ClientsChart Info  **/
			//Get Hire total count
			$hiresTotal = Hire::count();	
			//Get All Hires By Status Type
			$hiresbyStatus = Hire::select('status')->distinct()->get();
			$hiresbyStatusTotal = Hire::select('status')->distinct()->count();	
			$hirPercentage = [];			
			$hiresColor = [];
			$hstatusNames = [];
			$hiresperStatus = [];
			$bColor = ['bg-primary','bg-warning','bg-info','bg-danger','bg-success','bg-primary','bg-warning','bg-info','bg-danger','bg-success'];
			if($hiresTotal != 0 ){
				$i = 0;
				foreach($hiresbyStatus as $bs){					
					$hiresperStatus[$bs->status] = Hire::where('status', $bs->status)
										->count();
					if($hiresTotal == 0 ){
						$hirPercentage[$bs->status] = 0;
					}else{
						$hirPercentage[$bs->status] = $hiresperStatus[$bs->status] / $hiresTotal * 100;						
					}										
					$hiresColor[$bs->status] = $bColor[$i];
					$hstatusNames[$bs->status] = $bs->status;
					$i++;
				}
			}	
		
		/** Detailed Report OrdersChart Info  **/
			//Get Order total count
			$ordersTotal = Order::count();	
			//Get All Orders By Status Type
			$ordersbyStatus = Order::select('status')->distinct()->get();
			$ordersbyStatusTotal = Order::select('status')->distinct()->count();	
			$ordPercentage = [];			
			$ordersColor = [];
			$statusNames = [];
			$ordersperStatus = [];
			$bColor = ['bg-primary','bg-warning','bg-info','bg-danger','bg-success','bg-primary','bg-warning','bg-info','bg-danger','bg-success'];
			if($ordersTotal != 0 ){
				$i = 0;
				foreach($ordersbyStatus as $bs){					
					$ordersperStatus[$bs->status] = Order::where('status', $bs->status)
										->count();
					if($ordersTotal == 0 ){
						$ordPercentage[$bs->status] = 0;
					}else{
						$ordPercentage[$bs->status] = $ordersperStatus[$bs->status] / $ordersTotal * 100;						
					}										
					$ordersColor[$bs->status] = $bColor[$i];
					$statusNames[$bs->status] = $bs->status;
					$i++;
				}
			}				

				
			$dashboard = [
				'flowersTotal' => $flowersTotal,
				'flowersUpdate' => $flowersUpdate,				
				'hiresUpdate' => $hiresUpdate,				
				'messagesTotal' => $messagesTotal,
				'messagesUpdate' => $messagesUpdate,
				'mailSubscriptions_total' => $mailSubscriptions_total,
				'mailSubscriptions_update' => $mailSubscriptions_update,	
				'mailSubscriptionsActive' => $mailSubscriptionsActive,
				'mailsubUpdate' => $mailsubUpdate,
				'ordersTotal' => $ordersTotal,
				'ordersUpdate' => $ordersUpdate,	
				'bcompletedUpdate' => $bcompletedUpdate,
				'ordersProcessing' => $ordersProcessing,
				'msChange' => $msChange,
				'ordCompleted' => $ordCompleted,
				'ordActive' => $ordActive,
				'ordProcessing' => $ordProcessing,
				'ordCancelled' => $ordCancelled,
				'hiresTotal' => $hiresTotal,
				'hiresbyStatus' => $hiresbyStatus,
				'hiresbyStatusTotal' => $hiresbyStatusTotal,
				'hiresperStatus' => $hiresperStatus,
				'hirPercentage' => $hirPercentage, 
				'hiresColor' => $hiresColor,
				'ordersTotal' => $ordersTotal,
				'ordersbyStatus' => $ordersbyStatus,
				'ordersbyStatusTotal' => $ordersbyStatusTotal,
				'ordersperStatus' => $ordersperStatus,
				'ordPercentage' => $ordPercentage, 
				'ordersColor' => $ordersColor,
			];
			$status = '200';
			return View('dashboard',compact('dashboard','newsletters','status','weather'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Dashboard cannot be found.'] ], 404);	
			return 	$response;
	   } 
   }
   
   
    public function getView()
    {
		try{
			
		/**
		*** Total Orders Line Chart & Mail Subscriptions Bar Chart ***
		**/
		
			//Get New Subscribers Daily Total count
			$sm = [];
			$d0 = Carbon::now()->month;
			$sm[0] = Carbon::createFromDate($d0)->month;
			$msa0 = MailSubscription::whereMonth('created_at', $sm[0])
									->where('status','active')
									->count();
			$msc0 = MailSubscription::whereMonth('created_at', $sm[0])
									->where('status','cancelled')
									->count();									
			$d1 = Carbon::now()->subMonth(1);			
			$sm[1] = Carbon::createFromDate($d1)->month;			
			$msa1 = MailSubscription::whereMonth('created_at', $sm[1])
									->where('status','active')
									->count();
			$msc1 = MailSubscription::whereMonth('created_at', $sm[1])
									->where('status','cancelled')
									->count();
			$d2 = Carbon::now()->subMonth(2);
			$sm[2] = Carbon::createFromDate($d2)->month;
			$msa2 = MailSubscription::whereMonth('created_at', $sm[2])
									->where('status','active')
									->count();
			$msc2 = MailSubscription::whereMonth('created_at', $sm[2])
									->where('status','cancelled')
									->count();									
			$d3 = Carbon::now()->subMonth(3);
			$sm[3] = Carbon::createFromDate($d3)->month;			
			$msa3 = MailSubscription::whereMonth('created_at', $sm[3])
									->where('status','active')
									->count();
			$msc3 = MailSubscription::whereMonth('created_at', $sm[3])
									->where('status','cancelled')
									->count();									
			$d4 = Carbon::now()->subMonth(4);
			$sm[4] = Carbon::createFromDate($d4)->month;
			$msa4 = MailSubscription::whereMonth('created_at', $sm[4])
									->where('status','active')
									->count();
			$msc4 = MailSubscription::whereMonth('created_at', $sm[4])
									->where('status','cancelled')
									->count();									
			$d5 = Carbon::now()->subMonth(5);	
			$sm[5] = Carbon::createFromDate($d5)->month;			
			$msa5 = MailSubscription::whereMonth('created_at', $sm[5])
									->where('status','active')
									->count();	
			$msc5 = MailSubscription::whereMonth('created_at', $sm[5])
									->where('status','cancelled')
									->count();	
			$mon = [];
			for($p=0; $p < 6; $p++){
				$month = $sm[$p];
			    switch ($month) //make url from form-id 
					{
						case "1":{$mon[$p] = "Jan";}
							break;
						case "2":{$mon[$p] = "Feb";}
							break;
						case "3":{$mon[$p] = "Mar";}
							break;
						case "4":{$mon[$p] = "Apr";}
							break;
						case "5":{$mon[$p] = "May";}
							break;
						case "6":{$mon[$p] = "Jun";}
							break;
						case "7":{$mon[$p] = "Jul";}
							break;
						case "8":{$mon[$p] = "Aug";}
							break;
						case "9":{$mon[$p] = "Sep";}
							break;
						case "10":{$mon[$p] = "Oct";}
							break;
						case "11":{$mon[$p] = "Nov";}
							break;
						case "12":{$mon[$p] = "Dec";}
							break;
					}
			}
			$msData = [
				'sm0' => $mon[0],'sm1' => $mon[1],'sm2' => $mon[2],'sm3' => $mon[3],'sm4' => $mon[4],'sm5' => $mon[5],			
				'msa0' => $msa0,'msa1' => $msa1,'msa2' => $msa2,'msa3' => $msa3,'msa4' => $msa4,'msa5' => $msa5,
				'msc0' => $msc0,'msc1' => $msc1,'msc2' => $msc2,'msc3' => $msc3,'msc4' => $msc4,'msc5' => $msc5,
			];
			  
			//Get Orders Monthly Total Count by Status			  
			$m0 = Carbon::now()->month;
			$pc0 = Order::whereMonth('orderDate', $m0)
						->where('status','completed')
						->count();	
			$pi0 = Order::whereMonth('orderDate', $m0)
						->where('status','active')
						->count();	
			$pp0 = Order::whereMonth('orderDate', $m0)
						->where('status','processing')
						->count();
			$pa0 = Order::whereMonth('orderDate', $m0)
						->where('status','cancelled')
						->count();	
						
			$pd1 = Carbon::now()->subMonth(1);
			$m1 = Carbon::createFromDate($pd1)->month;			
			$pc1 = Order::whereMonth('orderDate', $m1)
						->where('status','completed')
						->count();	
			$pi1 = Order::whereMonth('orderDate', $m1)
						->where('status','active')
						->count();	
			$pp1 = Order::whereMonth('orderDate', $m1)
						->where('status','processing')
						->count();	
			$pa1 = Order::whereMonth('orderDate', $m1)
						->where('status','cancelled')
						->count();	
						
			$pd2 = Carbon::now()->subMonth(2);
			$m2 = Carbon::createFromDate($pd2)->month;			
			$pc2 = Order::whereMonth('orderDate', $m2)
						->where('status','completed')
						->count();
			$pi2 = Order::whereMonth('orderDate', $m2)
						->where('status','active')
						->count();
			$pp2 = Order::whereMonth('orderDate', $m2)
						->where('status','processing')
						->count();
			$pa2 = Order::whereMonth('orderDate', $m2)
						->where('status','cancelled')
						->count();			
						
			$pd3 = Carbon::now()->subMonth(3);	
			$m3 = Carbon::createFromDate($pd3)->month;			
			$pc3 = Order::whereMonth('orderDate', $m3)
						->where('status','completed')
						->count();	
			$pi3 = Order::whereMonth('orderDate', $m3)
						->where('status','active')
						->count();	
			$pp3 = Order::whereMonth('orderDate', $m3)
						->where('status','processing')
						->count();	
			$pa3 = Order::whereMonth('orderDate', $m3)
						->where('status','cancelled')
						->count();	
						
			$pd4 = Carbon::now()->subMonth(4);
			$m4 = Carbon::createFromDate($pd4)->month;			
			$pc4 = Order::whereMonth('orderDate', $m4)
						->where('status','completed')			
						->count();
			$pi4 = Order::whereMonth('orderDate', $m4)
						->where('status','active')			
						->count();
			$pp4 = Order::whereMonth('orderDate', $m4)
						->where('status','processing')			
						->count();
			$pa4 = Order::whereMonth('orderDate', $m4)
						->where('status','cancelled')			
						->count();
						
			$pd5 = Carbon::now()->subMonth(5);	
			$m5 = Carbon::createFromDate($pd5)->month;			
			$pc5 = Order::whereMonth('orderDate', $m5)
						->where('status','completed')			
						->count();
			$pi5 = Order::whereMonth('orderDate', $m5)
						->where('status','active')			
						->count();
			$pp5 = Order::whereMonth('orderDate', $m5)
						->where('status','processing')			
						->count();						
			$pa5 = Order::whereMonth('orderDate', $m5)
						->where('status','cancelled')			
						->count();						
					
			$pData = [
				'pc0' => $pc0,'pi0' => $pi0,'pp0' => $pp0,'pa0' => $pa0,'m0' => $m0,
				'pc1' => $pc1,'pi1' => $pi1,'pp1' => $pp1,'pa1' => $pa1,'m1' => $m1,
				'pc2' => $pc2,'pi2' => $pi2,'pp2' => $pp2,'pa2' => $pa2,'m2' => $m2,
				'pc3' => $pc3,'pi3' => $pi3,'pp3' => $pp3,'pa3' => $pa3,'m3' => $m3,
				'pc4' => $pc4,'pi4' => $pi4,'pp4' => $pp4,'pa4' => $pa4,'m4' => $m4,
				'pc5' => $pc5,'pi5' => $pi5,'pp5' => $pp5,'pa5' => $pa5,'m5' => $m5,
			];		  
			
			
		/** 
		*** ClientsByLocation Pie Chart & OrdersByType Pie Chart	***
		**/
			/** HiresbyStatus Pie Chart **/
			
			//Get Hire total count
			$hiresTotal = Hire::count();	
			//Get All Hires By Status Type
			$hiresbyStatus = Hire::select('status')->distinct()->get();
			$hiresbyStatusTotal = Hire::select('status')->distinct()->count();	
			$hiresColor = [];
			$hstatusNames = [];
			$hColor = ['#4B49AC','#FFC100','#248AFD','#FF4747','#57B657','#4B49AC','#FFC100','#248AFD','#FF4747','#57B657'];
			if($hiresTotal != 0 ){
				$i = 0;
				foreach($hiresbyStatus as $hs){					
					$hiresperStatus[$i] = Hire::where('status', $hs->status)
										->count();
					$hiresColor[$i] = $hColor[$i];
					$hstatusNames[$i] = $hs->status;
					$i++;
				}
			}	
			
			/** ordersbyStatus Pie Chart **/
			
			//Get Order total count
			$ordersTotal = Order::count();	
			//Get All Orders By Status Type
			$ordersbyStatus = Order::select('status')->distinct()->get();
			$ordersbyStatusTotal = Order::select('status')->distinct()->count();	
			$ordersColor = [];
			$statusNames = [];
			$oColor = ['#4B49AC','#FFC100','#248AFD','#FF4747','#57B657','#4B49AC','#FFC100','#248AFD','#FF4747','#57B657'];
			if($ordersTotal != 0 ){
				$i = 0;
				foreach($ordersbyStatus as $os){					
					$ordersperStatus[$i] = Order::where('status', $os->status)
										->count();
					$ordersColor[$i] = $oColor[$i];
					$statusNames[$i] = $os->status;
					$i++;
				}
			}			
			$dcData = [
				'hiresTotal' => $hiresTotal,
				'hiresbyStatus' => $hiresbyStatus,
				'hiresbyStatusTotal' => $hiresbyStatusTotal,
				'hiresperStatus' => $hiresperStatus,
				'hiresColor' => $hiresColor,
				'hstatusNames' => $hstatusNames,
				'ordersTotal' => $ordersTotal,
				'ordersbyStatus' => $ordersbyStatus,
				'ordersbyStatusTotal' => $ordersbyStatusTotal,
				'ordersperStatus' => $ordersperStatus,
				'ordersColor' => $ordersColor,				
				'statusNames' => $statusNames,
				
			];			
	
			return $response = Response::json(['msData' => $msData,'pData' => $pData,'dcData' => $dcData], 200);
			  
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Dashboard cannot be found.'] ], 404);
			return 	$response;
	   }
	}	   

 
	
	
	public function getCart()
	{
	 try{
		 
		 $appDefaults = AppDefaults::latest()->first();							//Get the first appDefaults  available for templates					
			$rtemplate = [
				'appDefaults'=>$appDefaults,
			];
			return View('/cart',compact('rtemplate'));
		}catch(Exception $e){
			$response = Response::json(['error' => ['message' => 'Cart cannot be found.'] ], 404);		
			return 	$response;
	   } 	
	}
	
	public function getList()
	{
	 try{
		 
		 $appDefaults = AppDefaults::latest()->first();							//Get the first appDefaults  available for templates					
			$rtemplate = [
				'appDefaults'=>$appDefaults,
			];
			return View('/list',compact('rtemplate'));
		}catch(Exception $e){
			$response = Response::json(['error' => ['message' => 'List cannot be found.'] ], 404);		
			return 	$response;
	   } 	
	}
	public function checkoutCart()
	{
	 try{
			return View('/checkoutCart');
		}catch(Exception $e){
			$response = Response::json(['error' => ['message' => 'checkoutCart cannot be found.'] ], 404);		
			return 	$response;
	   } 	
	}	
	
	public function checkoutList()
	{
	 try{
			return View('/checkoutList');
		}catch(Exception $e){
			$response = Response::json(['error' => ['message' => 'checkoutList cannot be found.'] ], 404);		
			return 	$response;
	   } 	
	}
	public function contract()
	{
	 try{
			return View('/contract');
		}catch(Exception $e){
			$response = Response::json(['error' => ['message' => 'contract cannot be found.'] ], 404);		
			return 	$response;
	   } 	
	}	
}
