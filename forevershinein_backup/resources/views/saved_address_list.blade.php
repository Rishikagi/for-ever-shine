@if(!empty($result))
    @foreach($result as $raw)
    <li class="add-div">
        <label>
            <input type="radio" name="address_id" value="{{ $raw['id'] }}" required data-countryid="{{$raw['country_id']}}" class="getcountryid">
            <p class="add-title">{{ ucfirst($raw['name']) }}</p>
            <p class="add-body">{{ ucfirst($raw['address_line1']) }} {{ ucfirst($raw['address_line2']) }}</p>
        </label>
        <!--
        <div class="dropdown">
            <a href="javascript: void(0);" data-toggle="dropdown" aria-expanded="false">
                <i class="icon-options-vertical"></i>
            </a>
           
            <ul class="dropdown-menu">
                <li><a href="#" class="address-update" data-toggle="modal" data-target="#add-address-modal">
                    <i class="icon-pencil"></i> Edit</a></li>
                <li><a href="#" class="address-delete">
                    <i class="icon-trash"></i> Delete</a></li>
            </ul>

        </div>
-->
    </li>
    @endforeach
@else
    <li class="add-div">
        <p>Address not found.</p>
    </li>
@endif

<script>
    $('.getcountryid').click(function(){

        countryId=$(this).data('countryid');

        getPriceDetail();

    });
</script>