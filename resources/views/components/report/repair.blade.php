<style>
    .repair-icon{
        height: 30px;
    }
    .repair-icon:hover{
        opacity: 0.9;
        transform: scale(1.03);
        transition: .2s ease;
    }
</style>

@if($report->repair_chain == '1')
    <img src="{{asset('icons/report/minus-sign.png')}}" class="repair-icon" alt="minus-sign">
@elseif($report->time === "00:00:00")
    <img src="{{asset('icons/report/cancel.png')}}" class="repair-icon" alt="cancel">
@elseif($report->repair_chain =='0')
    <img src="{{asset('icons/report/checked.png')}}" class="repair-icon" alt="checked">
@endif
