
@foreach($result as $key=>$addres)
	<div class="col-md-12">
		<div class="address-box">
		<h3>{{$addres['name']}}</h3>
		<p >
			{{$addres['address_line1']}},<br>
			{{$addres['address_line2']}}, {{\App\Helpers\commonHelper::getCityNameById($addres['city_id'])}}, {{\App\Helpers\commonHelper::getStateNameById($addres['state_id'])}}, {{\App\Helpers\commonHelper::getCountryNameById($addres['country_id'])}} -{{$addres['pincode']}}<br>
			<br>
		</p>
		<a href="javascript:void(0)" onclick="getUpdateAddress({{ $addres['id'] }})" class="edit_address edit-icon">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M16.474 5.40783L18.592 7.52483L16.474 5.40783ZM17.836 3.54283L12.109 9.26983C11.8131 9.56533 11.6113 9.94181 11.529 10.3518L11 12.9998L13.648 12.4698C14.058 12.3878 14.434 12.1868 14.73 11.8908L20.457 6.16383C20.6291 5.99173 20.7656 5.78742 20.8588 5.56256C20.9519 5.33771 20.9998 5.09671 20.9998 4.85333C20.9998 4.60994 20.9519 4.36895 20.8588 4.14409C20.7656 3.91923 20.6291 3.71492 20.457 3.54283C20.2849 3.37073 20.0806 3.23421 19.8557 3.14108C19.6309 3.04794 19.3899 3 19.1465 3C18.9031 3 18.6621 3.04794 18.4373 3.14108C18.2124 3.23421 18.0081 3.37073 17.836 3.54283V3.54283Z" stroke="#A56852" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M19 15V18C19 18.5304 18.7893 19.0391 18.4142 19.4142C18.0391 19.7893 17.5304 20 17 20H6C5.46957 20 4.96086 19.7893 4.58579 19.4142C4.21071 19.0391 4 18.5304 4 18V7C4 6.46957 4.21071 5.96086 4.58579 5.58579C4.96086 5.21071 5.46957 5 6 5H9" stroke="#A56852" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>                                 
		</a>
		@if($resultData['data']['designation_id'] != '3')
			<a  onclick="return confirm('Are you sure want to delete this address ?')" href="{{ url('remove-address',$addres['id']) }}" class="delete_address icon edit-icon">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M0.610188 15.3415C-0.203396 14.528 -0.203396 13.2088 0.610188 12.3953L12.3953 0.610203C13.2089 -0.203401 14.528 -0.203401 15.3416 0.610203C16.1551 1.42379 16.1551 2.74289 15.3416 3.55647L3.55646 15.3415C2.74288 16.1553 1.42379 16.1553 0.610188 15.3415Z" fill="#A56852"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M0.610188 0.610188C1.42379 -0.203396 2.74287 -0.203396 3.55648 0.610188L15.3416 12.3952C16.1551 13.209 16.1551 14.5279 15.3416 15.3417C14.5281 16.1552 13.2089 16.1552 12.3954 15.3417L0.610188 3.55648C-0.203396 2.74287 -0.203396 1.42379 0.610188 0.610188Z" fill="#A56852"/>
				</svg>                                                                  
			</a>
		@endif
		</div>
	</div>
@endforeach
