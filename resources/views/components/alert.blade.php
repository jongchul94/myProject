<div class="alert alert-{{$type}}" {{$attributes}}>
    {{$message}}
</div>

<x-alert type="error" :message="$message" id="alertId" name="alertName">
    주의 사항을 확인하십시오.
</x-alert>
