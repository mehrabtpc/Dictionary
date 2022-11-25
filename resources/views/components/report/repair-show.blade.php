<span class="badge label-light border border-@if($report->repair_chain =='0')success @elseif($report->repair_chain == '1')danger @endif text-white" style="font-size: 14px;">
  @if($report->repair_chain =='0')
    <span class="text-bold text-success">
        NO
    </span>
  @elseif($report->repair_chain == '1')
    <span class="text-bold text-danger">
        YES
    </span>
  @endif
</span>
